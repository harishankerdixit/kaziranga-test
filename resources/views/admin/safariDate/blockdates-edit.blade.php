@extends('admin.layouts.frontend')
@section('title', 'Edit Safari Block Date')
@section('meta_description', 'Kaziranga Edit Safari Block Date')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Edit Safari Block Date</h3>
            <div class="card-body py-0">
                <form method="post" action="{{ route('blockdates.edit', ['id' => $id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="zone" class="form-label fw-bold">Zone</label>
                        <select class="form-control" id="zone" name="zone">
                            <option value="" selected disabled>Select Zone</option>
                            <option value="Kaziranga Range, Kohora"
                                {{ old('zone', $zone) == 'Kaziranga Range, Kohora' ? 'selected' : '' }}>
                                Kaziranga Range, Kohora
                            </option>
                            <option value="Western Range, Bagori" {{ old('zone', $zone) == 'Western Range, Bagori' ? 'selected' : '' }}>
                                Western Range, Bagori
                            </option>
                            <option value="Burapahar Range, Ghorakati"
                                {{ old('zone', $zone) == 'Burapahar Range, Ghorakati' ? 'selected' : '' }}>
                                Burapahar Range, Ghorakati
                            </option>
                            <option value="Eastern Range, Agaratoli" {{ old('zone', $zone) == 'Eastern Range, Agaratoli' ? 'selected' : '' }}>
                                Eastern Range, Agaratoli
                            </option>
                        </select>
                        @error('zone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-0 ps-0">
                            <div class="mb-2">
                                <label for="from" class="form-label fw-bold">From Date</label>
                                <input type="date" class="form-control" id="from" name="from"
                                    value="{{ old('from', $from) }}" placeholder="From Date....">
                                @error('from')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 my-0 pe-0">
                            <div class="mb-2">
                                <label for="to" class="form-label fw-bold">To Date</label>
                                <input type="date" class="form-control" id="to" name="to"
                                    value="{{ old('to', $to) }}" placeholder="To Date....">
                                @error('to')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="message" class="form-label fw-bold">Message</label>
                        <textarea type="text" class="form-control" id="message" name="message" value="" placeholder="Message....">{{ old('message', $message) }}</textarea>
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col my-0">
                        <div class="d-flex gap-3 mt-4">
                            <button type="submit" class="btn btn-success ms-2 px-5">Save</button>
                            <a href="{{ route('blockdates.list.view') }}" class="btn btn-danger ms-auto px-5 me-2">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
