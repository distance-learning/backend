<?php

namespace App\Http\Controllers;

use App\Event;
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
     * @apiParam {String} from From date
     * @apiParam {String} to From date
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEventsByInterval(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $user = $request->user();

        $events = Event::where('receiver_id', $user->id)
            ->where('deadline', '>=', $from)
            ->where('deadline', '<=', $to)
            ->with('attachment')
            ->get();

        return response()->json($events);
    }
}
