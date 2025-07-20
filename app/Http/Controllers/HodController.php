<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Registration;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HodController extends Controller
{
    public function index()
    {
        $hodDeptId = auth()->user()->department_id;

        // Clubs under HOD's department
        $clubs = Club::where('department_id', $hodDeptId)->get();
        $clubIds = $clubs->pluck('id');

        // Total number of clubs
        $totalClubs = $clubs->count();

        // Total number of applications (registrations in these clubs)
        $totalApplications = DB::table('club_registration')
            ->whereIn('club_id', $clubIds)
            ->count();

        // Total unique students in these clubs
        $totalStudents = DB::table('club_registration')
            ->whereIn('club_id', $clubIds)
            ->distinct('registration_id')
            ->count('registration_id');

        // Popular clubs (top 3 by registration count)
       $popularClubs = DB::table('club_registration')
    ->join('clubs', 'club_registration.club_id', '=', 'clubs.id')
    ->whereIn('clubs.id', $clubIds)
    ->groupBy('clubs.club_name')
    ->select('clubs.club_name', DB::raw('count(*) as total'))
    ->orderByDesc('total')
    ->take(3)
    ->pluck('total', 'clubs.club_name');  // FIXED: use 'clubs.club_name'

    $activeClubsByEvents = DB::table('events')
    ->join('clubs', 'events.club_id', '=', 'clubs.id')
    ->whereIn('clubs.id', $clubIds)
    ->groupBy('clubs.club_name')
    ->select('clubs.club_name', DB::raw('count(*) as total'))
    ->pluck('total', 'clubs.club_name');  // FIXED: use 'clubs.club_name'


        // Gender distribution in these clubs
        $genderDistribution = DB::table('club_registration')
            ->join('registrations', 'club_registration.registration_id', '=', 'registrations.id')
            ->whereIn('club_registration.club_id', $clubIds)
            ->select('registrations.gender', DB::raw('count(*) as total'))
            ->groupBy('registrations.gender')
            ->pluck('total', 'gender');

        return view('hod.dash', compact(
            'totalClubs',
            'totalApplications',
            'totalStudents',
            'popularClubs',
            'activeClubsByEvents',
            'genderDistribution'
        ));
    }

public function clubs(Request $request, $id = null, $action = null)
    {
        $hod = Auth::user();
        $deptId = $hod->department_id;

        switch ($action) {
            case 'edit':
                $club = Club::where('department_id', $deptId)->findOrFail($id);

                if ($request->isMethod('post')) {
                    $request->validate([
                        'club_name' => 'required|string|max:255',
                        'staff_coordinator_email' => 'required|email',
                    ]);

                    $club->club_name = $request->club_name;
                    $club->introduction = $request->introduction;
                    $club->mission = $request->mission;
                    $club->staff_coordinator_name = $request->staff_coordinator_name;
                    $club->staff_coordinator_email = $request->staff_coordinator_email;
                    $club->year_started = $request->year_started;

                    if ($request->hasFile('logo')) {
                        Storage::disk('public')->delete($club->logo);
                        $club->logo = $request->file('logo')->store('club_logos', 'public');
                    }

                    if ($request->hasFile('staff_coordinator_photo')) {
                        Storage::disk('public')->delete($club->staff_coordinator_photo);
                        $club->staff_coordinator_photo = $request->file('staff_coordinator_photo')->store('staff_photos', 'public');
                    }

                    $club->save();

                    return redirect('/hod/clubs')->with('success', 'Club updated successfully!');
                }

return view('clubs.edit', compact('club'))->with('layout', 'layout.hod');

            case 'view':
                $club = Club::where('department_id', $deptId)->findOrFail($id);
                $baseUrl = url('/hod/clubs/' . $club->id . '/events');
return view('clubs.profile', compact('club', 'baseUrl'))->with('layout', 'layout.hod');


            default:
                $clubs = Club::where('department_id', $deptId)->get();
                return view('hod.clubs', compact('clubs'));
        }
    }
    public function viewEvent($id)
{
    $event = Event::findOrFail($id);
    $layout = 'layout.hod'; // or conditionally set
    if (auth()->user()->role == 'superadmin') {
            $baseUrl = '/tce/superadmin/events';
        } else {
            $baseUrl = '/tce/hod/events';
        }
    return view('events.view', compact('event', 'layout','baseUrl'));
}

public function editEvent($id)
{
    $event = Event::findOrFail($id);
    $layout = 'layout.hod'; // or conditionally set
    if (auth()->user()->role == 'superadmin') {
            $baseUrl = '/tce/superadmin/events';
        } else {
            $baseUrl = '/tce/hod/events';
        }
    return view('events.edit', compact('event', 'layout','baseUrl'));
}

}
