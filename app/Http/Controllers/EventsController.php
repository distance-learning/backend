<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class EventsController
 * @package App\Http\Controllers
 */
class EventsController extends Controller
{
    /**
     * Get events by interval
     *
     * @api {get} /api/events Get events by interval
     * @apiSampleRequest /api/events
     * @apiDescription Get events by interval
     * @apiGroup Events
     *
     * @apiHeader {String} Authorization User auth token
     *
     * @apiParam {String} year Year
     * @apiParam {String} month Month
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEventsByInterval(Request $request)
    {
        //TODO need refactoring
        $year = intval($request->get('year'));
        $month = intval($request->get('month'));
        $from_date = Carbon::create($year, $month, 1);
        $to_date = Carbon::createFromDate($year, $month, $from_date->daysInMonth);
        $user = $request->user();

        if ($request->user()->isStudent()) {
            $events = Event::where('recipient_id', $user->id)
                ->where('deadline', '>=', $from_date)
                ->where('deadline', '<=', $to_date)
                ->with('attachment.attachment')
                ->get();
        } else {
            $events = Event::where('sender_id', $user->id)
                ->where('deadline', '>=', $from_date)
                ->where('deadline', '<=', $to_date)
                ->with('attachment.attachment', 'recipient')
                ->get();
        }

        foreach ($events as $event) {
            if (!($event->attachment instanceof Task)) {
                continue;
            }

            $event->attachment->attachment;
        }

        return response()->json($events);
    }

    /**
     * Get notifications
     *
     * @api {get} /api/events/notifications Get notifications
     * @apiSampleRequest /api/events/notifications
     * @apiDescription Get notifications
     * @apiGroup Events
     *
     * @apiHeader {String} Authorization User auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNotificationsAction(Request $request)
    {
        //TODO need refactoring
        $today = Carbon::now()->format('Y-m-d H:i:s');
        $plusThreeDays = Carbon::now()->addDay(3)->format('Y-m-d H:i:s');
        $user = $request->user();

        if ($user->isStudent()) {
            $notifications = Event::where('deadline', '>=', $today)
                ->where('deadline', '<=', $plusThreeDays)
                ->where('recipient_id', $user->id)
                ->get();
        } else {
            $notifications = Event::where('deadline', '>=', $today)
                ->where('deadline', '<=', $plusThreeDays)
                ->where('sender_id', $user->id)
                ->with('recipient.group')
                ->get();
        }

        foreach ($notifications as $notification) {
            if (!($notification->attachment instanceof Task)) {
                continue;
            }

            $notification->attachment->attachment;
        }

        return response()->json($notifications);
    }
}
