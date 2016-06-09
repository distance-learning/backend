<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class EventsController
 * @package App\Http\Controllers
 */
class EventsController extends Controller
{
    /**
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
        $year = intval($request->get('year'));
        $month = intval($request->get('month'));
        $from_date = Carbon::create($year, $month, 1);
        $to_date = Carbon::createFromDate($year, $month, $from_date->daysInMonth);
        $user = $request->user();

        if ($request->user()->isStudent()) {
            $events = Event::where('recipient_id', $user->id)
                ->where('deadline', '>=', $from_date)
                ->where('deadline', '<=', $to_date)
                ->with('attachment.attachment', 'recipient')
                ->get();
        } else {
            $events = Event::where('sender_id', $user->id)
                ->where('deadline', '>=', $from_date)
                ->where('deadline', '<=', $to_date)
                ->with('attachment.attachment', 'recipient')
                ->get();
        }

        foreach ($events as $event) {
            $event->attachment->attachment;
        }

        return response()->json($events);
    }
}
