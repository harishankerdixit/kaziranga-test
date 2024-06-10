@extends('admin.layouts.frontend')
@section('title', 'Safari Block Date')
@section('meta_description', 'Kaziranga Safari Block Date')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header m-0 py-0">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Safari Block Date</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('blockdates.add.view.index') }}" class=" btn btn-success float-end">
                            Add Safari Block Date
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="top_fields">
                    <div class="tabsection jungle">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Zone</th>
                                        <th scope="col">From</th>
                                        <th scope="col">To</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($features??[] as $feature)
                                        <tr>
                                            <td>{{ $feature['id'] }}</td>
                                            <td>{{ $feature['zone'] }}</td>
                                            <td>{{ $feature['from'] }}</td>
                                            <td>{{ $feature['to'] }}</td>
                                            <td>{{ $feature['message'] }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('blockdates.edit.view', $feature['id']) }}"
                                                        class="btn btn-warning"
                                                        style="height: 9%; margin-top: 30%; margin-right: 10%;">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('blockdates.delete', $feature['id']) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">
                                                            <span data-feather="trash"></span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
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
