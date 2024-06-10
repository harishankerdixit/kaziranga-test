@extends('admin.layouts.frontend')
@section('title', 'SEO Manager')
@section('meta_description', 'Kaziranga Booking SEO Manager')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>SEO Manager</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('add-seo-manager-view') }}" class="btn btn-success float-end me-3 px-5">Add SEO</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="top_fields">
                    <div class="tabsection jungle mt-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">URL</th>
                                        <th scope="col">Meta Title</th>
                                        <th scope="col">Meta Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customers??[] as $customer)
                                        <tr>
                                            <td>{{ $customer['type'] }}</td>
                                            <td style="width:20%;">{{ $customer['meta_title'] }}</td>
                                            <td style="width:55%;">{{ $customer['meta_description'] }}</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a href="{{ route('edit-seo-manager-view', $customer['id']) }}"
                                                        class="btn btn-warning">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>
                                                    <a href="{{ route('seo.manager.delete', $customer['id']) }}"
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
                            <p><b>Total records: {{ $customers->total() }}, Displaying records {{ $customers->firstItem() }}
                                    to
                                    {{ $customers->lastItem() }} of {{ $customers->total() }}</b></p>
                            {{ $customers->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
