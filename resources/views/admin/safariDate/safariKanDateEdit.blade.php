@extends('admin.layouts.frontend')
@section('title', 'Kankai Edit')
@section('meta_description', 'Kaziranga Manage Safari Date Kankai Edit Page')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div>
        <h1> Kaziranga Kankai Edit </h1>

        <form class="row" action="{{ route('date.kankai.trail.update', $date->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-2 col-md-3">
                <label for="availability" class="form-label">Availability</label>
                <select class="form-select" id="availability" aria-label="Select availability" name="availability">
                    <option value="1" {{ $date->status == 1 ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ $date->status == 0 ? 'selected' : '' }}>Not Available</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputdate" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" id="inputdate" value="{{ $date->date }}">
            </div>
            <div class="col-md-4">
                <label for="time" class="form-label">Select Time</label>
                <select class="form-select" id="time" name="time" aria-label="Select Time">
                    @foreach([
                        '6:45 AM to 9:45 AM',
                        '6:00 AM to 9:00 AM',
                        '8:30 AM to 11:30 AM',
                        '4 PM to 7 PM',
                        '6:30 AM to 9:30 AM',
                        '9:30 AM to 12:30 PM',
                        '3:00 PM to 6:00 PM',
                    ] as $timeOption)
                        <option value="{{ $timeOption }}" {{ $date->time == $timeOption ? 'selected' : '' }}>
                            {{ $timeOption }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex gap-3">
                <button type="submit" class="btn btn-success col-md-2">Submit</button>
                <a href="{{ route('getkankaiTrail') }}" class="btn btn-outline-danger col-md-2">Go Back</a>
            </div>
        </form>
    </div>
</main>

@endsection
