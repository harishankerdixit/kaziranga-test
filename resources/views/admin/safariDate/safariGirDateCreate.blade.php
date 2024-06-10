@extends('admin.layouts.frontend')
@section('title', 'Girnar Create')
@section('meta_description', 'Kaziranga Manage Safari Date Girnar Create Page')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div>
        <h1> Create Girnar Date </h1>

        <form class="row" action="{{ route('date.girnar.hills.created') }}" method="POST">
            @method('post')
            @csrf
            <div class="mb-2 col-md-3">
                <label for="availability" class="form-label">Availability</label>
                <select class="form-select" id="availability" aria-label="Select availability" name="availability">
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>
            </div>
            <input type="hidden" name="mode" value="girnar">
            <div class="col-md-4">
                <label for="inputdate" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" id="inputdate" value="{{ old('date') }}">
            </div>
            <div class="col-md-4">
                <label for="time" class="form-label">Select Time</label>
                <select class="form-select" id="time" name="time" aria-label="Select Time">
                    <option value="6:45 AM to 9:45 AM">6:45 AM to 9:45 AM</option>
                    <option value="6:00 AM to 9:00 AM">6:00 AM to 9:00 AM</option>
                    <option value="8:30 AM to 11:30 AM">8:30 AM to 11:30 AM</option>
                    <option value="4 PM to 7 PM">4 PM to 7 PM</option>
                    <option value="6:30 AM to 9:30 AM">6:30 AM to 9:30 AM</option>
                    <option value="9:30 AM to 12:30 PM">9:30 AM to 12:30 PM</option>
                    <option value="3:00 PM to 6:00 PM">3:00 PM to 6:00 PM</option>
                </select>
            </div>
            <div class="d-flex gap-3">
                <button type="submit" class="btn btn-success col-md-2">Submit</button>
                <a href="{{ route('getgirnarHills') }}" class="btn btn-outline-danger col-md-2">Go Back</a>
            </div>
        </form>
    </div>
</main>

@endsection
