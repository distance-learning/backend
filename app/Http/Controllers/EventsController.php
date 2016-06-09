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
        $year = $request->get('year');
        $month = $request->get('month');
        $from_date = Carbon::createFromDate($year, $month, 1);
        $to_date = Carbon::createFromDate($year, $month, 31);
        $user = $request->user();

        if ($request->user()->isStudent()) {
            $events = Event::where('recipient_id', $user->id)
                ->where('deadline', '>=', $from_date)
                ->where('deadline', '<=', $to_date)
                ->with('objects.attachment')
                ->get();
        } else {
            $events = Event::where('sender_id', $user->id)
                ->where('deadline', '>=', $from_date)
                ->where('deadline', '<=', $to_date)
                ->with('objects.attachment')
                ->get();
        }

        return response()->json($events);
    }
}
