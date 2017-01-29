<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Group;
use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Class TasksController
 * @package App\Http\Controllers
 */
class TasksController extends Controller
{
    /**
     * @api {get} /api/tasks/:task_id Get task by id
     * @apiSampleRequest /api/tasks/:task_id
     * @apiDescription Create new task
     * @apiGroup Tasks
     *
     * @apiHeader {String} Authorization User token
     *
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTaskAction(Request $request, Task $task)
    {
        return response()->json($task->load('attachment'));
    }

    /**
     * @api {post} /api/tasks Create new task
     * @apiSampleRequest /api/tasks
     * @apiDescription Create new task
     * @apiGroup Tasks
     *
     * @apiHeader {String} Authorization User token
     *
     * @apiSuccess (200) success Returned task
     *
     * @apiParam {Integer} attachment_id Attachment object id
     * @apiParam {String} attachment_type Attachment object name
     * @apiParam {Integer} student_id Student object id
     * @apiParam {Date} deadline Tasks deadline
     * @apiParam {Integer} subject_id Subject id
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTaskAction(Request $request)
    {
        $user = $request->user();

        if (!Task::filterAttachmentType($request->get('attachment_type'))) {
            return response()->json('Attachment type not allowed', 422);
        }

        $task = Task::create([
            'attachment_id' => $request->get('attachment_id'),
            'attachment_type' => $request->get('attachment_type'),
            'sender_id' => $user->id,
            'recipient_id' => $request->get('student_id'),
            'deadline' => $request->get('deadline'),
            'subject_id' => $request->get('subject_id'),
        ]);

        //Create event on create task
        $task->events()->create([
            'sender_id' => $task->sender_id,
            'recipient_id' => $task->recipient_id,
            'deadline' => $task->deadline
        ]);

        return response()->json($task);
    }

    /**
     * @api {post} /api/tasks/groups Create new task for group
     * @apiSampleRequest /api/tasks/groups
     * @apiDescription Create new task for group
     * @apiGroup Tasks
     *
     * @apiHeader {String} Authorization User token
     *
     * @apiSuccess (200) success Returned task
     *
     * @apiParam {Integer} attachment_id Attachment object id
     * @apiParam {String} attachment_type Attachment object name
     * @apiParam {String} group_slug Group slug
     * @apiParam {Date} deadline Tasks deadline
     * @apiParam {Integer} subject_id Subject id
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTaskForGroupAction(Request $request)
    {
        //TODO need some refactoring
        $user = $request->user();
        $response = [];
        $group = Group::findBySlug($request->get('group_slug'));

        foreach ($group->students as $student) {
            $task = Task::create([
                'attachment_id' => $request->get('attachment_id'),
                'attachment_type' => $request->get('attachment_type'),
                'sender_id' => $user->id,
                'recipient_id' => $student->id,
                'deadline' => $request->get('deadline'),
                'subject_id' => $request->get('subject_id'),
            ]);

            //Create event on create task
            $task->events()->create([
                'sender_id' => $task->sender_id,
                'recipient_id' => $task->recipient_id,
                'deadline' => $task->deadline
            ]);

            $response[] = $task;
        }

        return response()->json($response);
    }

    /**
     * @api {put} /api/tasks/:task_id Update task
     * @apiSampleRequest /api/tasks/:task_id
     * @apiDescription Update task
     * @apiGroup Tasks
     *
     * @apiHeader {String} Authorization User token
     *
     * @apiSuccess (200) success Returned task
     *
     * @apiParam {Integer} student_id Student object id
     * @apiParam {Date} deadline Tasks deadline
     * @apiParam {Integer} subject_id Subject id
     *
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateTaskAction(Request $request, Task $task)
    {
        $task->update([
            'recipient_id' => $request->get('student_id'),
            'deadline' => $request->get('deadline'),
            'subject_id' => $request->get('subject_id'),
        ]);

        $task->events()->update([
            'recipient_id' => $request->get('student_id'),
            'deadline' => $request->get('deadline'),
        ]);

        return response()->json($task);
    }

    /**
     * @api {delete} /api/tasks/:task_id Delete task
     * @apiSampleRequest /api/tasks/:task_id
     * @apiDescription Delete task
     * @apiGroup Tasks
     *
     * @apiHeader {String} Authorization User token
     *
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteTaskAction(Request $request, Task $task)
    {
        foreach ($task->events as $event) {
            $event->delete();
        }

        $task->delete();

        return response()->json(null, 204);
    }

    /**
     * @api {put} /api/tasks/:task_id/files/:file_id Set answer to task
     * @apiSampleRequest /api/tasks/:task_id/answers
     * @apiDescription Set answer to task
     * @apiGroup Tasks
     *
     * @apiHeader {String} Authorization User token
     *
     * @apiParam {Integer} answer_id Answer id
     *
     * @param Request $request
     * @param Task $task
     * @param File $file
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendAnswerToTaskAction(Request $request, Task $task, File $file)
    {
        $task->files()->attach($file->id);
        $task->save();

        return response()->json($task);
    }

    /**
     * @api {get} /api/tasks/:task_id/files Get task files
     * @apiSampleRequest /api/tasks/:task_id/files
     * @apiDescription Get task files
     * @apiGroup Tasks
     *
     * @apiHeader {String} Authorization User token
     *
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFilesByTaskAction(Request $request, Task $task)
    {
        return response()->json($task->files);
    }
}
