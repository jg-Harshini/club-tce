@extends('layout.clubadmin')

@section('title', 'Club Admin Dashboard')

@section('content')
<div class="row mb-4">
  <div class="col-12">
    <h3 class="text-dark fw-bold mt-0">Welcome, {{ Auth::user()->name }}</h3>
    <p class="text-muted">Here’s your club’s overview</p>
  </div>
</div>

<!-- Summary Cards -->
<div class="row mb-4">
  <div class="col-lg-6 col-md-6">
    <div class="card shadow-sm text-dark" style="background-color: #e8f0fe;">
      <div class="card-body">
        <h5 class="card-title">Total Events</h5>
        <h2 class="fw-bold">{{ $eventCount }}</h2>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-md-6">
    <div class="card shadow-sm text-dark" style="background-color: #fff3cd;">
      <div class="card-body">
        <h5 class="card-title">Upcoming Event</h5>
        <h5 class="fw-bold">{{ $nextEvent ? $nextEvent->event_name : 'No Upcoming Events' }}</h5>
        <p>{{ $nextEvent ? \Carbon\Carbon::parse($nextEvent->date)->format('d M, Y') : '' }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
