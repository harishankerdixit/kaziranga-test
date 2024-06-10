@extends('admin.layouts.frontend')
@section('title', ucfirst($price->type) == 'Date-range' ? 'Festival Price Edit' : ucfirst($price->type) . ' Price Edit')
@section('meta_description', 'Kaziranga Default Price Page')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">{{ ucfirst($price->type) == 'Date-range' ? 'Festival' : ucfirst($price->type) }} Price
                Edit</h3>
            <div class="card-body pb-0">
                <form method="POST" action="{{ route('price-update', ['id' => $id, 'type' => $price->type]) }}"
                    class="indian-price">
                    @csrf
                    <input type="hidden" name="type" value="{{ $price->type }}">
                    @if ($price->type == 'date-range')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="start" class="form-label fw-bold">Start Date</label>
                                    <input type="date" class="form-control" id="start" name="start"
                                        value="{{ old('start', $price->start) }}">
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
                                        min="0" step="any" value="{{ old('end', $price->end) }}">
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
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label for="mode" class="form-label fw-bold">Mode</label>
                                <select class="form-control" id="mode" name="mode">
                                    <option value="">Select Mode</option>
                                    <option value="jeep" {{ old('mode', $price->mode) == 'jeep' ? 'selected' : '' }}>Jeep
                                    </option>
                                    <option value="elephant"
                                        {{ old('mode', $price->mode) == 'elephant' ? 'selected' : '' }}>
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
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label for="indian" class="form-label fw-bold">Indian Price</label>
                                <input type="number" class="form-control" id="indian" name="indian" placeholder="₹"
                                    min="0" step="any" value="{{ old('indian', $price->indian) }}">
                                @error('indian')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label for="foreigner" class="form-label fw-bold">Foriegner Price</label>
                                <input type="number" class="form-control" id="foreigner" name="foreigner" placeholder="₹"
                                    min="0" step="any" value="{{ old('foreigner', $price->foreigner) }}">
                                @error('foreigner')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-3 my-4 col-lg-6">
                        <button type="submit" class="btn btn-success col-lg-4">Update</button>
                        <a href="{{ route('price', ['type' => $price->type]) }}"
                            class="btn btn-outline-danger col-lg-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
