@extends('admin.layouts.frontend')
@section('title', 'Features List')
@section('meta_description', 'Kaziranga Features List')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Features</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('feature.add.view.index') }}" class="btn btn-success float-end me-3 px-5">Add
                            Feature</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="top_fields">
                    <div class="tabsection jungle">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($features??[] as $feature)
                                        <tr>
                                            <td>{{ $feature['id'] }}</td>
                                            <td>{{ $feature['name'] }}</td>
                                            <td>
                                                <img src="{{ asset($feature['image']) }}" alt="" width="40px" height="40px">
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a href="{{ route('features.edit.view', $feature['id']) }}"
                                                        class="btn btn-warning">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>
                                                    <a href="{{ route('features.delete', $feature['id']) }}"
                                                        class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <h6>Records Not Found.</h1>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-container">
                            <p><b>Total records: {{ $features->total() }}, Displaying records {{ $features->firstItem() }}
                                    to
                                    {{ $features->lastItem() }} of {{ $features->total() }}</b></p>
                            {{ $features->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
