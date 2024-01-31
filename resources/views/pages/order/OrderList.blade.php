@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Book History</a></span></li>
@endsection
@section("title")
    <title>Book History</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <div class="sc-gxYJeL iVyfZn">
            <div class="card shadow mb-4" style="width: 1340px">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">MEMBERS LIST</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Book Name</th>
                                <th>Reader Full Name</th>
                                <th>Phone Number</th>
                                <th>Order Status</th>
                                <th>Order Date</th>
                                <th>Due Date</th>
                                <th>Return Date</th>
                                <th>Overdue Day</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $index => $order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order->book_name }}</td>
                                    <td>{{ $order->full_name }}</td>
                                    <td>{{ $order->phone_number }}</td>
                                    <td style="color: @if($order->order_status == 1 || $order->order_status == 2)
                                                            green
                                                        @elseif($order->order_status == 3)
                                                            red
                                                        @elseif($order->order_status == 0)
                                                            blue
                                                        @endif
                                                    ">
                                        @if($order->order_status == 0)
                                            Pending
                                        @endif
                                        @if($order->order_status ==1)
                                            Created
                                        @endif
                                        @if($order->order_status ==2)
                                            Return
                                        @endif
                                        @if($order->order_status ==3)
                                            OverDue
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->due_date)->format('Y-m-d') }}</td>
                                    <td>
                                        @if($order->return_date)
                                            {{ \Carbon\Carbon::parse($order->return_date)->format('Y-m-d') }}
                                        @endif
                                    </td>
                                    <td>{{ $order->overdue_day_count }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
            searching: true, // Enable searching
             "dom": '<"top"f>rt<"bottom"p>',
            });
        });
    </script>
@endsection
