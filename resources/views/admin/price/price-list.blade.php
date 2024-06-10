@extends('admin.layouts.frontend')
@section('title', ucfirst($type) == 'Date-range' ? 'Festival' : ucfirst($type) . ' Price')
@section('meta_description', 'Kaziranga Default Price Page')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header m-0 p-0">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="p-2">{{ ucfirst($type) == 'Date-range' ? 'Festival' : ucfirst($type) }} Price</h3>
                    </div>
                    @if ($type == 'date-range')
                        <div class="col-md-6">
                            <a href="{{ route('price-create', ['type' => $type]) }}"
                                class="btn btn-success float-end me-3 px-5 m-2">Create</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                @if ($type == 'date-range')
                                    <th class="text-center">Date Range</th>
                                @endif
                                <th class="text-center">Mode</th>
                                <th class="text-center">Indian Price</th>
                                <th class="text-center">Foreigner Price</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($prices??[] as $price)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    @if ($type == 'date-range')
                                        <td class="text-center">
                                            {{ $price->start }} - {{ $price->end }}
                                        </td>
                                    @endif
                                    <td class="text-center">{{ $price['mode'] }}</td>
                                    <td class="text-center">{{ $price['indian'] }}</td>
                                    <td class="text-center">{{ $price['foreigner'] }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('price-edit', ['id' => $price['id']]) }}"
                                                class="btn btn-warning"
                                                style="height: 9%; margin-top: 30%; margin-right: 10%;">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    @if ($type == 'date-range')
                                        <td colspan="6" class="text-center">
                                            <h6>Records Not Found.</h1>
                                        </td>
                                    @else
                                        <td colspan="5" class="text-center">
                                            <h6>Records Not Found.</h1>
                                        </td>
                                    @endif
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="pagination-container">
                <p><b>Total records: {{ $price->zone }},  Displaying records {{ $price->firstItem() }} to {{ $price->lastItem() }} of {{ $price->zone }}</b></p>
                {{ $price->links('pagination::bootstrap-4') }}
            </div> --}}
        </div>
    </main>
@endsection
