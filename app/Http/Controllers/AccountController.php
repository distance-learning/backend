<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Task;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
     * Method that authenticate user
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
            $user = $request
                ->user()
                ->load('group.courses')
            ;
        } elseif ($user->isTeacher()) {
            $user = $request
                ->user()
                ->load('courses.group')
                ->load('courses.subject')
            ;
        }

        return response()->json($user->load('avatar'));
    }

    /**
     * Method that authenticate user
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

        return response()->json('successful', 204);
    }

    /**
     * Get user by slug
     *
     * @api {put} /api/account/update Update user information
     * @apiSampleRequest /api/account/update
     * @apiDescription Update user information
     * @apiGroup Users
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} name
     * @apiParam {String} surname
     * @apiParam {String} birthday
     * @apiParam {String} email
     * @apiParam {String} phone
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserInformationAction(Request $request)
    {
        $user = $request->user();
        $data = $request->only('name', 'surname', 'birthday', 'email', 'phone');

        $user->update($data);

        return response()->json($data, 200);
    }

    /**
     * Get user by slug
     *
     * @api {put} /api/account/reset-password Update user password
     * @apiSampleRequest /api/account/update-password
     * @apiDescription Update user password
     * @apiGroup Users
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} old_password
     * @apiParam {String} password
     * @apiParam {String} password_confirmation
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserPasswordAction(Request $request)
    {
        $user = $request->user();

        if (!Auth::check($request->get('old_password'), $user->password)) {
            return response()->json('Old password not correct', 400);
        }

        if ($request->get('password') != $request->get('password_confirmation')) {
            return response()->json('New passwords not equals');
        }

        $user->update([
            'password' => bcrypt($request->get('password')),
        ]);

        return response()->json($user, 200);
    }

    /**
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
        $tasks = Task::where('recipient_id', $request->user()->id)->get()->load('attachment');

        return response()->json($tasks);
    }

    /**
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
        $tasks = $subject->tasks->where('recipient_id', $user->id)->load('attachment');

        return response()->json($tasks);
    }

    /**
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

        if ($user->isStudent()) {
            if (!$user->group) {
                return response()->json([], 200);
            }

            $courses = $user->group->courses->where('is_active', true)->load('subject', 'teacher.avatar');

            return response()->json($courses);
        }

        return response()->json(null, 400);
    }

    /**
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

        if ($user->isTeacher()) {
            $subjects = [];

            foreach ($user->courses as $course) {
                $subjects[$course->subject->id] = $course->subject->toArray();
                $subjects[$course->subject->id]['groups'][] = $course->group->load('students');
            }

//            $subjectsCopy = [];
//
//            foreach ($subjects as $subject) {
//                $subjectsCopy[] = $subject;
//            }

            return response()->json($subjects);
        }

        return response()->json(null, 400);
    }

    /**
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
        $moduleGroups = $request->user()->moduleGroups->load(['modules' => function ($query) {
            return $query->orderBy('id');
        }])->sortBy('id');
        $tests = $request->user()->tests;

        return response()->json([
            "moduleGroups" => $moduleGroups,
            "tests" => $tests,
        ]);
    }

    /**
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
        $user = $request->user();
        $file = $this->uploadFile($request);

        if ($file && $user->avatar && file_exists(public_path($user->avatar->path))) {
            unlink(public_path($user->avatar->path));
        }

        $user->avatar_id = $file->id;
        $user->save();

        return response()->json($user->load('avatar'));
    }

    /**
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
        return response()->json($request->user()->tests);
    }
}
