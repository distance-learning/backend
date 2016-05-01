<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests;

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
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTaskAction(Request $request, Task $task)
    {
        return response()->json();
    }

    /**
     * @api {post} /api/tasks Create new task
     * @apiSampleRequest /api/tasks
     * @apiDescription Create new task
     * @apiGroup Tasks
     *
     * @apiSuccess (200) success Returned task
     *
     * @apiParam {Integer} attachment_id Attachment object id
     * @apiParam {String} attachment_type Attachment object name
     * @apiParam {Integer} student_id Student object id
     * @apiParam {Date} deadline Tasks deadline
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTaskAction(Request $request)
    {
        $user = $request->user();

        $task = Task::create([
            'attachment_id' => $request->get('attachment_id'),
            'attachment_type' => $request->get('attachment_type'),
            'sender_id' => $user->id,
            'recipient_id' => $request->get('student_id'),
            'deadline' => $request->get('deadline'),
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
     * @api {put} /api/tasks/:task_id Update task
     * @apiSampleRequest /api/tasks/:task_id
     * @apiDescription Update task
     * @apiGroup Tasks
     *
     * @apiSuccess (200) success Returned task
     *
     * @apiParam {Integer} student_id Student object id
     * @apiParam {Date} deadline Tasks deadline
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

        return response()->json();
    }
}
