<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Club;
use App\Models\Event;
use Carbon\Carbon;

class ClubAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Keep 'auth' middleware to ensure user is logged in
        // Removed 'club_admin' middleware
    }

    public function dashboard()
    {
        // Manual role check
        if (!Auth::check() || Auth::user()->role !== 'club_admin') {
            abort(403, 'Unauthorized');
        }

        $clubId = Auth::user()->club_id;

        $eventCount = Event::where('club_id', $clubId)->count();

        $nextEvent = Event::where('club_id', $clubId)
                          ->whereDate('date', '>=', today())
                          ->orderBy('date')
                          ->first();

        return view('ca.dash', compact('eventCount', 'nextEvent'));
    }

    public function profile()
    {
        // Manual role check
        if (!Auth::check() || Auth::user()->role !== 'club_admin') {
            abort(403, 'Unauthorized');
        }

        $clubId = Auth::user()->club_id;
        $club = Club::with('events')->findOrFail($clubId);

        return view('clubs.profile', [
            'club'   => $club,
            'layout' => 'layout.clubadmin',
            'baseUrl'=> url('/clubadmin/events'),
        ]);
    }

    public function events(Request $request, $action = null, $id = null)
    {
        // Manual role check
        if (!Auth::check() || Auth::user()->role !== 'club_admin') {
            abort(403, 'Unauthorized');
        }

        $clubId = Auth::user()->club_id;

        switch ($action) {
            case 'create':
                if ($request->isMethod('post')) {
                    $data = $request->validate([
                        'event_name'  => 'required|string|max:255',
                        'description' => 'nullable|string',
                        'date'        => 'required|date',
                        'time'        => 'required',
                        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $data['club_id'] = $clubId;

                    if ($request->hasFile('image')) {
                        $data['image_path'] = $request->file('image')->store('event_images', 'public');
                    }

                    Event::create($data);

                    return redirect()->route('clubadmin.profile')->with('success', 'Event created!');
                }

                return view('events.create', ['layout' => 'layout.clubadmin']);

            case 'edit':
                $event = Event::where('club_id', $clubId)->findOrFail($id);

                if ($request->isMethod('post')) {
                    $updates = $request->validate([
                        'event_name'  => 'required|string|max:255',
                        'description' => 'nullable|string',
                        'date'        => 'required|date',
                        'time'        => 'required',
                        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    if ($request->hasFile('image')) {
                        $updates['image_path'] = $request->file('image')->store('event_images', 'public');
                    }

                    $event->update($updates);

                    return redirect()->route('clubadmin.profile')->with('success', 'Event updated!');
                }

                return view('events.edit', [
                    'event'     => $event,
                    'layout'    => 'layout.clubadmin',
                    'formRoute' => route('clubadmin.events', ['action' => 'edit', 'id' => $event->id])
                ]);

            case 'delete':
                $event = Event::where('club_id', $clubId)->findOrFail($id);
                $event->delete();

                return redirect()->route('clubadmin.profile')->with('success', 'Event deleted!');

            default:
                $events = Event::where('club_id', $clubId)->get();

                return view('events.index', compact('events'))->with('layout', 'layout.clubadmin');
        }
    }
}
