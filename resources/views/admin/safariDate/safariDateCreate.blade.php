@extends('admin.layouts.frontend')
@section('title', 'Jungle Trail Create')
@section('meta_description', 'Kaziranga Safari Date Jungle Trail Create Page')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Create Safari Date</h3>
            <div class="card-body py-3">
                <form class="row" action="{{ route('date.jungle.trail.created') }}" method="POST">
                    @method('post')
                    @csrf
                    {{-- <input type="hidden" name="mode" value="jungle_trail"> --}}
                    <div class="mb-2">
                        <label for="inputdate" class="form-label fw-semibold mb-0">Date</label>
                        <input type="date" name="date" class="form-control" id="inputdate"
                            value="{{ old('date') }}">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="mode" class="form-label fw-semibold mb-0">Mode</label>
                        <select class="form-select" id="mode" name="mode">
                            <option value="" selected disabled>Select Mode</option>
                            <option value="jeep" {{ old('mode') == 'jeep' ? 'selected' : '' }}>Jeep</option>
                            <option value="elephant" {{ old('mode') == 'elephant' ? 'selected' : '' }}>Elephant</option>
                        </select>
                        @error('mode')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="zone" class="form-label fw-semibold mb-0">Zone</label>
                        <select class="form-select" id="zone" name="zone">
                            <option value="">Select Zone</option>
                        </select>
                        @error('zone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="time" class="form-label fw-semibold mb-0">Select Time</label>
                        <select class="form-select" id="time" name="time">
                            <option value="">Select Time</option>
                        </select>
                        @error('time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="availability" class="form-label fw-semibold mb-0">Availability</label>
                        <select class="form-select" id="availability" aria-label="Select availability" name="availability">
                            <option value="" selected disabled>Select Availability</option>
                            <option value="1" {{ old('availability') == '1' ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ old('availability') == '0' ? 'selected' : '' }}>Not Available
                            </option>
                        </select>
                        @error('availability')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex gap-4 mt-3">
                        <button type="submit" class="btn btn-success col-md-2">Submit</button>
                        <a href="{{ route('getJungleTrail') }}" class="btn btn-outline-danger col-md-2 col-lg-1">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @push('scripts')
        <script>
            // $(document).ready(function() {
            //     $('#mode').change(function() {
            //         var mode = $(this).val();
            //         var $zoneSelect = $('#zone');
            //         $zoneSelect.empty();
            //         $zoneSelect.append(`<option value="">Choose Mode</option>`);
            //         if (mode === 'jeep') {
            //             var zones = ['Kaziranga Range, Kohora', 'Western Range, Bagori',
            //                 'Burapahar Range, Ghorakati', 'Eastern Range, Agaratoli'
            //             ];

            //             $.each(zones, function(index, zone) {
            //                 $zoneSelect.append(`<option value="${zone}">${zone}</option>`);
            //             });
            //         } else if (mode === 'elephant') {
            //             $zoneSelect.append(
            //                 `<option value="Western Range, Bagori">Western Range, Bagori</option>`);
            //         }
            //     });
            // });

            $('#mode').change(function() {
                    var mode = $(this).val();
                    var $zoneSelect = $('#zone');
                    $zoneSelect.empty();

                    var $timingSelect = $('#time');
                    $timingSelect.empty();
                    if (mode === 'jeep') {
                        var zones = ['Kaziranga Range, Kohora', 'Western Range, Bagori',
                            'Burapahar Range, Ghorakati', 'Eastern Range, Agaratoli'
                        ];
                        $zoneSelect.append(`<option value="">Choose Mode</option>`);
                        $.each(zones, function(index, zone) {
                            $zoneSelect.append(`<option value="${zone}">${zone}</option>`);
                        });


                        var timings = ['7:30 AM to 10:00 AM', '1:30 PM to 3:00 PM'];
                        $timingSelect.append(`<option value="">Choose TimeSlot</option>`);
                        $.each(timings, function(index, time) {
                            $timingSelect.append(`<option value="${time}">${time}</option>`);
                        });
                    } else if (mode === 'elephant') {
                        $zoneSelect.append(
                            `<option value="Western Range, Bagori">Western Range, Bagori</option>`);
                        $timingSelect.append(
                            `<option value="5 - 6 AM | 6 - 7 AM">5 - 6 AM | 6 - 7 AM</option>`);
                    }
                });
        </script>
    @endpush
@endsection
