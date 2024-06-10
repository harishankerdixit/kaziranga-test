@extends('admin.layouts.frontend')
@section('title', 'Dashboarb')
@section('meta_description', 'Kaziranga Dashboard')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Dashboard</h3>
            <div class="card-body py-0">
                <div class="cardsection">
                    <div class="card1">
                        <div class="left">
                            <h4>Hotels</h4>
                            <h1>{{ $hotels }}</h1>
                            <p>Total hotels available</p>
                        </div>
                        <div class="right">
                            <i class="bi bi-building"></i>
                        </div>
                    </div>
                    <div class="card2">
                        <div class="left">
                            <h4>Packages</h4>
                            <h1>{{ $packages }}</h1>
                            <p>Added to Kaziranga</p>
                        </div>

                        <div class="right">
                            <i class="bi bi-gift"></i>
                        </div>
                    </div>

                    <div class="card3">
                        <div class="left">
                            <h4>Enquiries</h4>
                            <h1>{{ $enquiries }}</h1>
                            <p>Since 2024</p>
                        </div>
                        <div class="right">
                            <i class="bi bi-chat-text"></i>
                        </div>
                    </div>
                    <div class="card4">
                        <div class="left">
                            <h4>Customers</h4>
                            <h1>{{ $customers }}</h1>
                            <p>Registered upto now</p>
                        </div>
                        <div class="right">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                </div>


                <div class="tabsection">
                    <h3>Recent Package Enquiries</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Booking Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($general_enquiries ?? [] as $general)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $general['booking_date'] }}</td>
                                        <td>{{ $general['traveller_name'] }}</td>
                                        <td>{{ $general['mobile_no'] }}</td>
                                        <td>{{ $general['type'] }}</td>
                                        <td><button class="btn btn-danger"
                                                onclick="deleteCustomerData({{ $general['id'] }})"><span
                                                    data-feather="trash"></span></button></td>
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
                </div>
                <div class="tabsection">
                    <h3>Recent Hotel Enquiries</h3>
                    <div class="table-responsive">
                        <table class="table table-striped  table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Booking Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hotel_enquiries??[] as $hotel)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hotel['booking_date'] }}</td>
                                        <td>{{ $hotel['traveller_name'] }}</td>
                                        <td>{{ $hotel['mobile_no'] }}</td>
                                        <td>{{ $hotel['type'] }}</td>
                                        <td><button class="btn btn-danger"
                                                onclick="deleteCustomerData({{ $hotel['id'] }})"><span
                                                    data-feather="trash"></span></button></td>
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
                </div>
            </div>
        </div>
        {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <span style="color:red; float:right; font-size:16px;" id="error_messagess"></span>
            <span style="color:green; float:right; font-size:16px;" id="success_messagess"></span>
        </div> --}}
    </main>

    <script>
        function deleteCustomerData(id) {

            if (id == '') {
                $("#error_messagess").html('All Fileds Are Required!!').fadeIn(2000).fadeOut(5000);
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ route('deleteCustomer') }}',
                data: JSON.stringify({
                    'id': id
                }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response) {
                    if (response.status = 'success') {
                        $("#success_messagess").html(response.msg).fadeIn(2000).fadeOut(5000);
                        window.location.href = '/dashboard';
                    } else if (response.status = 'failed') {
                        $("#error_messagess").html(response.msg).fadeIn(2000).fadeOut(5000);
                    }
                },
                error: function(error) {
                    $("#error_messagess").html(error).fadeIn(2000).fadeOut(5000);
                }
            });
        }
    </script>

@endsection
