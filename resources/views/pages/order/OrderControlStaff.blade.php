@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Order list</a></span></li>
@endsection
@section("title")
    <title>Order List</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <form method="POST" action="{{ route('order.offline.dialog') }}">
            @csrf
            <div class="sc-gxYJeL iVyfZn">
                <div class="card shadow mb-4" style="width: 1340px">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">CLUB BOOKS LIST</h6>
                    </div>
                    <div class="card-body">
                        <button id="orderButton" type="submit" class="ant-btn css-12jzuas ant-btn-primary"><span
                                class="ant-btn-icon"><span role="img" aria-label="plus-circle"
                                                           class="anticon anticon-plus-circle"><svg
                                        viewBox="64 64 896 896" focusable="false" data-icon="plus-circle" width="1em"
                                        height="1em" fill="currentColor" aria-hidden="true"><path
                                d="M696 480H544V328c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v152H328c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h152v152c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V544h152c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z"></path><path
                                d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path></svg></span></span><span>Create Order</span>
                        </button>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Book Name</th>
                                    <th>Reader Full Name</th>
                                    <th>Phone Number</th>
                                    <th>Order Status</th>
                                    <th style="width: 110px">Order Date</th>
                                    <th style="width: 110px">Due Date</th>
                                    <th style="width: 110px">Return Date</th>
                                    <th>Overdue Day</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $index => $order)
                                    <tr class="ant-table-row ant-table-row-level-{{ $index % 2 }}">
                                        <td class="ant-table-cell">{{ $order->id }}</td>
                                        <td class="ant-table-cell">{{ $order->book_name }}</td>
                                        <td class="ant-table-cell">{{ $order->full_name }}</td>
                                        <td class="ant-table-cell">{{ $order->phone_number }}</td>
                                        <td class="ant-table-cell" style="color: @if($order->order_status == 2)
                                                            green
                                                        @elseif($order->order_status == 3)
                                                            red
                                                        @elseif($order->order_status == 1 || $order->order_status == 0)
                                                            blue
                                                        @endif
                                                    ">
                                            @if($order->order_status == \App\Models\Order::ORDER_STATUS_PENDING)
                                                Pending
                                            @endif
                                            @if($order->order_status == \App\Models\Order::ORDER_STATUS_CREATED)
                                                Created
                                            @endif
                                            @if($order->order_status == \App\Models\Order::ORDER_STATUS_RETURN)
                                                Return
                                            @endif
                                            @if($order->order_status == \App\Models\Order::ORDER_STATUS_OVER_DUA_DATE)
                                                OverDue
                                            @endif
                                        </td>
                                        <td class="ant-table-cell">{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                                        <td class="ant-table-cell">{{ \Carbon\Carbon::parse($order->due_date)->format('Y-m-d') }}</td>
                                        <td class="ant-table-cell">
                                            @if($order->return_date)
                                                {{ \Carbon\Carbon::parse($order->return_date)->format('Y-m-d') }}
                                            @endif
                                        </td>
                                        <td class="ant-table-cell">{{ $order->overdue_day_count }}</td>
                                        <td class="ant-table-cell">
                                            <div class="ant-space css-12jzuas ant-space-horizontal ant-space-align-center" style="gap: 8px;">
                                                <div class="ant-space-item">
                                                @if ($order->order_status == \App\Models\Order::ORDER_STATUS_PENDING)
                                                    <button type="button" class="confirm-button btn btn-outline-primary mr-2" value="{{$order->id}}" data-toggle="modal" data-target="#confirmModal">Confirm</button>
                                                @endif
                                                @if ($order->order_status != \App\Models\Order::ORDER_STATUS_PENDING && $order->order_status != \App\Models\Order::ORDER_STATUS_RETURN)
                                                    <button type="button" class="return-button btn btn-outline-primary" value="{{$order->id}}" data-toggle="modal" data-target="#returnModal">Return</button>
                                                @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Return Book?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Return" if user want to return book.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" id="returnButton">Return</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Borrowing Book?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Confirm" if have book send to user.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" id="confirmButton">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.confirm-button').on('click', function () {
                    // Get the member ID from the button's value attribute
                    var id = $(this).val();
                    $('#confirmButton').on('click', function () {
                        var confirmUrl = '/order/confirm/' + id;
                        window.location.href = confirmUrl;
                    });
                });
                $('.return-button').on('click', function () {
                    // Get the member ID from the button's value attribute
                    var id = $(this).val();
                    $('#returnButton').on('click', function () {
                        var returnUrl = '/order/return/' + id;
                        window.location.href = returnUrl;
                    });
                });
            });
        </script>
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
