@extends('admin.layouts.frontend')
@section('title', 'Room Benefits')
@section('meta_description', 'Kaziranga Room Benefits List')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div class="row">
                    <div class="d-flex justify-content-between p-2">
                        <h3>Room Benefits</h3>

                        <a href="{{ route('benefit.add.view.index') }}" class="btn btn-success float-end me-3 px-5">
                            Add Room Benefits
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="tabsection jungle">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Benefits</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($benefits??[] as $benefit)
                                    <tr>
                                        <td>{{ $benefit['id'] }}</td>
                                        <td>{{ $benefit['benefit'] }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="{{ route('benefit.item.edit.view', $benefit['id']) }}"
                                                    class="btn btn-warning">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a href="{{ route('benefit.delete', $benefit['id']) }}"
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
                                Total records: {{ $benefits->total() }},
                                Displaying records {{ $benefits->firstItem() }}
                                to {{ $benefits->lastItem() }}
                                of {{ $benefits->total() }}
                            </b>
                        </p>
                        {{ $benefits->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
