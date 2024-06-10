@extends('admin.layouts.frontend')
@section('title', 'News')
@section('meta_description', 'Kaziranga News List')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div class="row">
                    <div class="d-flex justify-content-between p-2">
                        <h3>News Page</h3>

                        <a href="{{ route('news.list.item.add.index') }}" class="btn btn-success float-end px-5">
                            Add News
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="top_fields">
                    <form method="get" action="{{ route('news-list') }}">
                        <div class="row">
                            <div class="col-lg-4 mb-2">
                                <label for="date" class="form-label">News Date</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="{{ $date ?? '' }}" placeholder="News Date">
                            </div>
                            <div class="col-lg-4 mb-2">
                                <label for="status" class="form-label">Availability</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="" {{ $status === '' ? 'selected' : '' }}>Select Availability
                                    </option>
                                    <option value="1" {{ $status === '1' ? 'selected' : '' }}>Availability
                                    </option>
                                    <option value="0" {{ $status === '0' ? 'selected' : '' }}>Not Availability
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-4 d-flex gap-3 align-items-end mb-2">
                                <button type="submit" class="btn btn-primary">Filter</button>

                                <a href="{{ route('news-list') }}" class="btn btn-primary">Clear Filter</a>
                            </div>
                        </div>
                    </form>
                    <div class="mobiletable">
                        <div class="tabsection jungle">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">News Date</th>
                                        <th scope="col">News Description</th>
                                        <th scope="col">News Url</th>
                                        <th scope="col">Availability</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($newsess??[] as $news)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $news->date }}</td>
                                            <td>{!! \Str::limit($news->description, 80, '...') !!}</td>
                                            <td>{{ $news->url }}</td>
                                            <td>
                                                <label class="switch availability-switch"
                                                    onchange="checkAvailability({{ $news->id }});">
                                                    <input type="checkbox" {{ $news->status == 1 ? 'checked' : '' }}
                                                        data-val="{{ $news->id }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a href="{{ route('news-list.item.edit', $news['id']) }}"
                                                        class="btn btn-warning">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>
                                                    <a href="{{ route('news-list.item.delete', $news['id']) }}"
                                                        class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
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
                            <div class="pagination-container">
                                <p><b>Total records: {{ $newsess->total() }}, Displaying records
                                        {{ $newsess->firstItem() }}
                                        to
                                        {{ $newsess->lastItem() }} of {{ $newsess->total() }}</b></p>
                                {{ $newsess->links('pagination::bootstrap-4') }}
                            </div>
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
                url: "{{ route('news-list.item.updateAvailability') }}",
                data: JSON.stringify({
                    'id': id,
                    'status': newAvailability
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
