@extends('admin.layouts.frontend')
@section('title', 'Room Facility')
@section('meta_description', 'Kaziranga Room Facility List')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div class="row">
                    <div class="d-flex justify-content-between p-2">
                        <h3>Room Facility</h3>

                        <a href="{{ route('facility.add.view.index') }}" class="btn btn-success px-3">Add Room
                            Facility</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="tabsection jungle">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Facility</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($facilities??[] as $facility)
                                    <tr>
                                        <td>{{ $facility['id'] }}</td>
                                        <td>{{ $facility['facility'] }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="{{ route('facility.item.edit.view', $facility['id']) }}"
                                                    class="btn btn-warning">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a href="{{ route('facility.delete', $facility['id']) }}"
                                                    class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
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
                                Total records: {{ $facilities->total() }},
                                Displaying records {{ $facilities->firstItem() }}
                                to {{ $facilities->lastItem() }}
                                of {{ $facilities->total() }}
                            </b>
                        </p>
                        {{ $facilities->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
