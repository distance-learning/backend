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
}
