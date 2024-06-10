@extends('admin.layouts.frontend')
@section('title', 'Package Cateogry')
@section('meta_description', 'Kaziranga Package Cateogry List')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Package Cateogry</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('package.category.add.view', $package_id) }}"
                            class="btn btn-success float-end me-3 px-5">
                            Add Package Cateogry
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="top_fields">
                    <div class="tabsection jungle">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Cateogry</th>
                                        <th scope="col">Availability</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($PackageCategory??[] as $package)
                                        <tr>
                                            <td>{{ $package->id }}</td>
                                            <td>{{ $package->category }}</td>
                                            <td>
                                                <label class="switch availability-switch"
                                                    onchange="checkAvailability({{ $package->id }});">
                                                    <input type="checkbox" {{ $package->status == 1 ? 'checked' : '' }}
                                                        data-val="{{ $package->id }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a href="{{ route('package.category.edit', $package->id) }}"
                                                        class="btn btn-warning">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>
                                                    <a href="{{ route('package.category.delete', $package->id) }}"
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
                            <p><b>Total records: {{ $PackageCategory->total() }}, Displaying records
                                    {{ $PackageCategory->firstItem() }} to {{ $PackageCategory->lastItem() }} of
                                    {{ $PackageCategory->total() }}</b></p>
                            {{ $PackageCategory->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function checkAvailability(id) {
            var checkbox = $('input[data-val="' + id + '"]');
            var newAvailability = checkbox.prop('checked') ? 1 : 0;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('package-category-list.item.updateAvailability') }}',
                data: JSON.stringify({
                    'id': id,
                    'newAvailability': newAvailability
                }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response) {
                    // Handle the success response

                    // Show a success popup
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.msg,
                    });
                },
                error: function(error) {
                    // Handle the error response
                    console.error(error);

                    // Show an error popup
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to update availability. Please try again later.',
                    });
                }
            });
        }
    </script>
@endsection
