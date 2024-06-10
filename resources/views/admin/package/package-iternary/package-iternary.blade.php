@extends('admin.layouts.frontend')
@section('title', 'Package Iternary')
@section('meta_description', 'Kaziranga Package Iternary List')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Package Iternary</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-success float-end me-3 px-5" onclick="addIternaryRow()">Add
                            Iternary</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('add-iternary-add-item', ['package_id' => $package_id]) }}" method="POST"
                    class="mt-4">
                    @csrf

                    <div class="tabsection jungle">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm" id="itineraryTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Iternary Title</th>
                                        <th scope="col">Iternary Content</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($iternaries??[] as $iternary)
                                        <tr>
                                            <td style="width:30%;">
                                                <textarea name="iternaries[{{ $loop->index }}][title]" style="width:100%;">{{ $iternary->title ?? '' }}</textarea>
                                            </td>
                                            <td style="width:60%;">
                                                <textarea name="iternaries[{{ $loop->index }}][content]" style="width:100%;">{{ $iternary->content ?? '' }}</textarea>
                                            </td>
                                            <td style="width:10%;">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeIternaryRow(this)">Remove</button>
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

                        <div class="d-flex gap-3 my-3">
                            <button type="submit" class="btn btn-success px-5">Submit</button>
                            <a href="{{ route('package-list') }}" class="btn btn-outline-danger">Back</a>
                        </div>

                        <div class="pagination-container">
                            <p>
                                <b>
                                    Total records: {{ $iternaries->total() }},
                                    Displaying records {{ $iternaries->firstItem() }}
                                    to {{ $iternaries->lastItem() }}
                                    of {{ $iternaries->total() }}
                                </b>
                            </p>
                            {{ $iternaries->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        function addIternaryRow() {
            var table = document.getElementById('itineraryTable');
            var newRow = table.insertRow(table.rows.length);

            var titleCell = newRow.insertCell(0);
            var contentCell = newRow.insertCell(1);
            var actionCell = newRow.insertCell(2);

            titleCell.innerHTML = '<textarea name="iternaries[' + (table.rows.length - 1) +
                '][title]" style="width:100%;"></textarea>';
            contentCell.innerHTML = '<textarea name="iternaries[' + (table.rows.length - 1) +
                '][content]" style="width:100%;"></textarea>';
            actionCell.innerHTML =
                '<button type="button" class="btn btn-danger" onclick="removeIternaryRow(this)">Remove</button>';
        }

        function removeIternaryRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>

@endsection
