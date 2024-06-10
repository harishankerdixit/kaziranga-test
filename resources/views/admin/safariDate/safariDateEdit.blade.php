@extends('admin.layouts.frontend')
@section('title', 'Jungle Trail Edit')
@section('meta_description', 'Kaziranga Safari Date Jungle Trail Edit Page')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Edit Kaziranga Safari Date</h3>
            <div class="card-body py-3">
                <form class="row" action="{{ route('date.jungle.trail.update', $date->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-2">
                        <label for="inputdate" class="form-label fw-semibold mb-0">Date</label>
                        <input type="date" name="date" class="form-control" id="inputdate"
                            value="{{ old('date', $date->date) }}">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="mode" class="form-label fw-semibold mb-0">Mode</label>
                        <select class="form-select" id="mode" name="mode">
                            <option value="" selected disabled>Select Mode</option>
                            <option value="jeep" {{ old('mode', $date->mode) == 'jeep' ? 'selected' : '' }}>Jeep</option>
                            <option value="elephant" {{ old('mode', $date->mode) == 'elephant' ? 'selected' : '' }}>Elephant
                            </option>
                        </select>
                        @error('mode')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="zone" class="form-label fw-semibold mb-0">Zone</label>
                        <select class="form-control" id="zone" name="zone">
                            <option value="" selected disabled>Select Zone</option>
                            <option value="Kaziranga Range, Kohora"
                                {{ old('zone', $date->zone) == 'Kaziranga Range, Kohora' ? 'selected' : '' }}>
                                Kaziranga Range, Kohora
                            </option>
                            <option value="2"
                                {{ old('zone', $date->zone) == 'Western Range, Bagori' ? 'selected' : '' }}>
                                Western Range, Bagori
                            </option>
                            <option value="3"
                                {{ old('zone', $date->zone) == 'Burapahar Range, Ghorakati' ? 'selected' : '' }}>
                                Burapahar Range, Ghorakati
                            </option>
                            <option value="4"
                                {{ old('zone', $date->zone) == 'Eastern Range, Agaratoli' ? 'selected' : '' }}>
                                Eastern Range, Agaratoli
                            </option>
                        </select>
                        @error('zone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="time" class="form-label fw-semibold mb-0">Select Time</label>
                        <select class="form-select" id="time" name="time" aria-label="Select Time">
                            <option value="" selected disabled>Select Time</option>
                            <option value="7:30 AM to 10:00 AM"
                                {{ old('time', $date->time) == '7:30 AM to 10:00 AM' ? 'selected' : '' }}>
                                7:30 AM to 10:00 AM
                            </option>
                            <option value="1:30 PM to 3:00 PM"
                                {{ old('time', $date->time) == '1:30 PM to 3:00 PM' ? 'selected' : '' }}>
                                1:30 PM to 3:00 PM
                            </option>
                            <option value="5:30 AM to 6:00 AM"
                                {{ old('time', $date->time) == '5:30 AM to 6:00 AM' ? 'selected' : '' }}>
                                5:30 AM to 6:00 AM
                            </option>
                            <option value="6:00 AM to 7:00 AM"
                                {{ old('time', $date->time) == '6:00 AM to 7:00 AM' ? 'selected' : '' }}>
                                6:00 AM to 7:00 AM
                            </option>
                        </select>
                        @error('time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="availability" class="form-label fw-semibold mb-0">Availability</label>
                        <select class="form-select" id="availability" aria-label="Select availability" name="availability">
                            <option value="" selected disabled>Select Availability</option>
                            <option value="1" {{ old('availability', $date->status) == '1' ? 'selected' : '' }}>
                                Available
                            </option>
                            <option value="0" {{ old('availability', $date->status) == '0' ? 'selected' : '' }}>
                                Not Available
                            </option>
                        </select>
                        @error('availability')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-success col-md-2">Submit</button>
                        <a href="{{ route('getJungleTrail') }}" class="btn btn-outline-danger col-md-2 col-lg-1">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
