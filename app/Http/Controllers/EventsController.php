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
            ->get()
        ;

        return response()->json($events);
    }
}
