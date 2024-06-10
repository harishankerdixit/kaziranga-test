@extends('admin.layouts.frontend')
@section('title', 'Default Price')
@section('meta_description', 'Kaziranga Default Price Page')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">{{ ucfirst($type) == 'Date-range' ? 'Festival' : ucfirst($type) }} Price Create</h3>
            <div class="card-body py-0">
                <form method="POST" action="{{ route('price-store') }}" class="indian-price">
                    @csrf
                    <input type="hidden" name="type" value="{{ $type }}">
                    @if ($type == 'date-range')
                        <div class="row mt-3">
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="start" class="form-label fw-bold">Start Date</label>
                                    <input type="date" class="form-control" id="start" name="start"
                                        value="{{ old('start') }}">
                                    @error('start')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="end" class="form-label fw-bold">End Date</label>
                                    <input type="date" class="form-control" id="end" name="end" placeholder="₹"
                                        min="0" step="any" value="{{ old('end') }}">
                                    @error('end')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-2">
                            <div class="form-group">
                                <label for="mode" class="form-label fw-bold">Mode</label>
                                <select class="form-control" id="mode" name="mode">
                                    <option value="">Select Mode</option>
                                    <option value="jeep" {{ old('mode') == 'jeep' ? 'selected' : '' }}>Jeep
                                    </option>
                                    <option value="elephant" {{ old('mode') == 'elephant' ? 'selected' : '' }}>
                                        Elephant
                                    </option>
                                </select>
                                @error('mode')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-2">
                            <div class="form-group">
                                <label for="indian" class="form-label fw-bold">Indian Price</label>
                                <input type="number" class="form-control" id="indian" name="indian" placeholder="₹"
                                    min="0" step="any" value="{{ old('indian') }}">
                                @error('indian')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-2">
                            <div class="form-group">
                                <label for="foreigner" class="form-label fw-bold">Foriegner Price</label>
                                <input type="number" class="form-control" id="foreigner" name="foreigner" placeholder="₹"
                                    min="0" step="any" value="{{ old('foreigner') }}">
                                @error('foreigner')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-3 my-4">
                        <button type="submit" class="btn btn-success px-5">Submit</button>
                        <a href="{{ route('price', ['type' => $type]) }}"
                            class="btn btn-outline-danger ms-auto px-5 ">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    {{-- <script>
        function getTimingsData() {
            var start = $("#start").val();
            var end = $("#end").val();
            var type = "{{ $type }}";
            var zone = "{{ $zone }}";

            if ($("#start").val() != "") {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ route('date.range.get.timings') }}',
                    data: JSON.stringify({
                        'start': start,
                        'end': end,
                        'type': type,
                        'zone': zone
                    }),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(response) {
                        // Show a success popup
                        if (response.status == "start_failed") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.msg,
                            });
                        } else if (response.status == "booking_type_failed") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.msg,
                            });
                        } else {
                            const time = response.data;
                            const selectElement = document.getElementById('time');
                            selectElement.innerHTML = '<option value="">Select Timing</option>';
                            time.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item;
                                option.text = item;
                                selectElement.appendChild(option);
                            });

                        }
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to fetch timing. Please try again later.',
                        });
                    }
                });

            }
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('date.range.get.timings') }}',
                data: JSON.stringify({
                    'start': '{{ $id == 'Create' ? '' : $price->start }}',
                    'end': '{{ $id == 'Create' ? '' : $price->end }}',
                    'type': '{{ $id == 'Create' ? '' : $type }}',
                    'zone': '{{ $id == 'Create' ? '' : $zone }}'
                }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response) {
                    const time = response.data;
                    const selectElement = document.getElementById('time');
                    selectElement.innerHTML = '<option value="">Select Timing</option>';

                    time.forEach(item => {
                        const option = document.createElement('option');
                        option.value = item;
                        option.text = item;
                        selectElement.appendChild(option);
                    });


                    $("#time").val('{{ $id == 'Create' ? '' : $price->time }}');
                },
                error: function(error) {
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to fetch time. Please try again later.',
                    });
                }
            });
        });
    </script> --}}
@endsection
