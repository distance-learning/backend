<?php

namespace App\Http\Controllers;

use App\Exceptions\UserInvalidCredentials;
use App\Models\Subject;
use App\Models\Task;
use App\Models\User;
use App\Services\FileUploaderService;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

/**
 * Class AccountController
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{
    use FileUpload;

    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * Get user profile information
     *
     * @api {get} /api/account Get user info
     * @apiSampleRequest /api/account
     * @apiDescription Get user info
     * @apiGroup Users
     *
     * @apiHeader {String} authorization
     *
     * @apiError (401) error Returned if data not correct
     * @apiError (201) success Returned if user successful create
     * @apiError (500) error Returned if error on serve
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserInfoAction(Request $request)
    {
        $user = $request->user();

        if ($user->isStudent()) {
            $user->load('group.courses');
        }

        if ($user->isTeacher()) {
            $user->load('courses.group', 'courses.subject');
        }

        return response()->json([
            'user' => $user->load('avatar'),
        ]);
    }

    /**
     * Logout user
     *
     * TODO need move this method in AuthController
     *
     * @api {get} /api/account/logout Logout user
     * @apiSampleRequest /api/account/logout
     * @apiDescription Logout user
     * @apiGroup Users
     *
     * @apiHeader {String} authorization
     *
     * @apiError (401) error Returned if data not correct
     * @apiError (201) success Returned if user successful create
     * @apiError (500) error Returned if error on serve
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logoutAction()
    {
        Auth::logout();

        return response()->json(null, 204);
    }

    /**
     * Update information about user
     *
     * @api {put} /api/account/update Update user information
     * @apiSampleRequest /api/account/update
     * @apiDescription Update user information
     * @apiGroup Users
     *
     * @apiHeader {String} authorization User token
     *
     * @apiSuccess {Object} user User object
     * @apiParam {String} user.name
     * @apiParam {String} user.surname
     * @apiParam {String} user.birthday
     * @apiParam {String} user.email
     * @apiParam {String} user.phone
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserInformationAction(Request $request)
    {
        $user = $request->user();
        $attributes = $request->only(
            'user.name',
            'user.surname',
            'user.birthday',
            'user.email',
            'user.phone'
        );

        $user->update($attributes['user']);

        return response()->json([
            'user' => $user
        ], 200);
    }

    /**
     * Update user password
     *
     * @api {put} /api/account/reset-password Update user password
     * @apiSampleRequest /api/account/update-password
     * @apiDescription Update user password
     * @apiGroup Users
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {Object} user
     * @apiParam {String} user.old_password
     * @apiParam {String} user.password
     * @apiParam {String} user.password_confirmation
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserPasswordAction(Request $request)
    {
        $user = $request->user();
        $attributes = $request->only('user.old_password', 'user.password');

        try {
            $this->validate($request, User::$rulesUpdatePassword);

            if (!Auth::check($attributes['user']['old_password'], $user->password)) {
                throw new UserInvalidCredentials();
            }


            $user->update([
                'password' => $attributes['user']['password'],
            ]);
        } catch (ValidationException $e) {
            return $e->getResponse();
        } catch (UserInvalidCredentials $e) {
            return response()->json(null, 400);
        }

        return response()->json($user, 200);
    }

    /**
     * Get user tasks
     *
     * @deprecated Need remove in version 2.0
     *
     * @api {get} /api/account/tasks Get user tasks
     * @apiSampleRequest /api/account/tasks
     * @apiDescription Get user tasks
     * @apiGroup Users
     *
     * @apiHeader {String} authorization User token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTasksAction(Request $request)
    {
        $user = $request->user();
        $tasks = Task::where('recipient_id', $user->id)
            ->get()
            ->load('attachment');

        return response()->json([
            'tasks' => $tasks
        ]);
    }

    /**
     * Get subject tasks
     *
     * @api {get} /api/account/subjects/:subject_id/tasks Get user tasks by subject
     * @apiSampleRequest /api/account/subjects/:subject_id/tasks
     * @apiDescription Get user tasks by subject
     * @apiGroup Users
     *
     * @apiHeader {String} Authorization Auth user token
     *
     * @param Request $request
     * @param Subject $subject
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubjectTasksAction(Request $request, Subject $subject)
    {
        $user = $request->user();
        $tasks = $subject->tasks
            ->where('recipient_id', $user->id)
            ->load('attachment');

        return response()->json($tasks);
    }

    /**
     * Get user courses
     *
     * @api {get} /api/account/courses Get student courses
     * @apiSampleRequest /api/account/courses
     * @apiDescription Get student courses
     * @apiGroup Users|Student
     *
     * @apiHeader {String} authorization User token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCoursesAction(Request $request)
    {
        $user = $request->user();

        if (!$user->isStudent()) {
            return response()->json(null, 400);
        }

        if (!$user->group) {
            return response()->json([], 200);
        }

        $courses = $user->group
            ->courses
            ->where('is_active', true)
            ->load('subject', 'teacher.avatar');

        return response()->json([
            'courses' => $courses
        ]);
    }

    /**
     * Get teacher subjects
     *
     * @deprecated Should remove in version 2.0
     *
     * @api {get} /api/account/subjects Get teacher subjects
     * @apiSampleRequest /api/account/subjects
     * @apiDescription Get teacher subjects
     * @apiGroup Users|Teacher
     *
     * @apiHeader {String} authorization User token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubjectsAction(Request $request)
    {
        $user = $request->user();
        $subjects = [];

        if (!$user->isTeacher()) {
            return response()->json(null, 400);
        }

        //TODO need move in service
        foreach ($user->courses as $course) {
            if (!array_key_exists($course->subject->id, $subjects)) {
                $subjects[$course->subject->id] = $course->subject->toArray();
            }

            $subjects[$course->subject->id]['groups'][] = $course->group->load('students');
        }

        return response()->json($subjects);
    }

    /**
     * Get teacher modules and tests
     *
     * @deprecated Remove in version 2.0
     *
     * @api {get} /api/account/modules Get teacher modules and tests
     * @apiSampleRequest /api/account/modules
     * @apiDescription Get teacher modules and tests
     * @apiGroup Users|Teacher
     *
     * @apiHeader {String} authorization User token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getModulesAction(Request $request)
    {
        //TODO maybe need move in repository
        $user = $request->user();
        $moduleGroups = $user->moduleGroups
            ->load([
                'modules' => function ($query) {
                    return $query->orderBy('id');
                }
            ])->sortBy('id');

        $tests = $user->tests;

        return response()->json([
            'moduleGroups' => $moduleGroups,
            'tests' => $tests,
        ]);
    }

    /**
     * Upload user avatar
     *
     * @api {post} /api/account/image Set avatar for current user
     * @apiSampleRequest /api/account/image
     * @apiDescription Set avatar for current user
     * @apiGroup Account
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setAvatarAction(Request $request)
    {
        /** @var User $user */
        $user = $request->user();

        /** @var FileUploaderService $fileUploaderService */
        $fileUploaderService = app(FileUploaderService::class);

        $file = $fileUploaderService->upload();

        if ($file && $user->avatar) {
            $fileUploaderService->removeFile($user->avatar->path);
        }

        $user->avatar()->associate($file);
        $user->save();

        return response()->json([
            'user' => $user->load('avatar'),
        ]);
    }

    /**
     * Get teacher tests
     *
     * @deprecated Remove in version 2.0
     *
     * @api {get} /api/account/tests Get teacher tests
     * @apiSampleRequest /api/account/tests
     * @apiDescription Get teacher tests
     * @apiGroup Account
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTeacherTestsAction(Request $request)
    {
        return response()->json([
            'tests' => $request->user()->tests,
        ]);
    }
}
