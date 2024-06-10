@extends('admin.layouts.frontend')
@section('title', 'Amenities')
@section('meta_description', 'Kaziranga Amenities List')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div>
                    <div class="d-flex justify-content-between p-2">
                        <h3>Amenities</h3>

                        <a href="{{ route('amenities.add.view.index') }}" class=" btn btn-success">Add Amenities</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="tabsection jungle">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Amenity</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($amenities??[] as $amenity)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $amenity['amenity'] }}</td>
                                        <td>
                                            <img src="{{ $amenity->image }}" width="50px" height="50px">
                                        </td>
                                        <td>{{ $amenity['status'] == 1 ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="{{ route('amenities.item.edit', $amenity['id']) }}"
                                                    class="btn btn-warning">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a href="{{ route('amenities.delete', $amenity['id']) }}"
                                                    class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <h6>Records Not Found.</h1>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container">
                        <p>
                            <b>
                                Total records: {{ $amenities->total() }},
                                Displaying records {{ $amenities->firstItem() }}
                                to {{ $amenities->lastItem() }}
                                of {{ $amenities->total() }}
                            </b>
                        </p>
                        {{ $amenities->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
