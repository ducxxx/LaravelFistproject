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
            <button id="orderButton" type="submit" class="ant-btn css-12jzuas ant-btn-primary"><span
                    class="ant-btn-icon"><span role="img" aria-label="plus-circle"
                                               class="anticon anticon-plus-circle"><svg
                            viewBox="64 64 896 896" focusable="false" data-icon="plus-circle"
                            width="1em"
                            height="1em" fill="currentColor" aria-hidden="true"><path
                                d="M696 480H544V328c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v152H328c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h152v152c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V544h152c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z"></path><path
                                d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path></svg></span></span><span>Create Order</span>
            </button>
            <div class="sc-gxYJeL iVyfZn">
                <div class="ant-table-wrapper css-12jzuas">
                    <div class="ant-spin-nested-loading css-12jzuas">
                        <div class="ant-spin-container">
                            <div class="ant-table">
                                <div class="ant-table-container">
                                    <div class="ant-table-content">
                                        <table style="table-layout: auto;">
                                            <colgroup></colgroup>
                                            <thead class="ant-table-thead">
                                            <tr>
                                                <th class="ant-table-cell" scope="col">No</th>
                                                <th class="ant-table-cell" scope="col">
                                                    <div class="ant-table-filter-column"><span
                                                            class="ant-table-column-title">Book Name</span>
                                                    </div>
                                                </th>

                                                <th class="ant-table-cell" scope="col">Reader Full Name</th>
                                                <th class="ant-table-cell" scope="col">Phone Number</th>
                                                <th class="ant-table-cell" scope="col">Order Status</th>
                                                <th class="ant-table-cell" scope="col">Order Date</th>
                                                <th class="ant-table-cell" scope="col">Due Date</th>
                                                <th class="ant-table-cell" scope="col">Return Date</th>
                                                <th class="ant-table-cell" scope="col">Overdue Day</th>
                                                <th class="ant-table-cell" scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="ant-table-tbody">
                                            @forelse ($orders as $index => $order)
                                                <tr class="ant-table-row ant-table-row-level-{{ $index % 2 }}">
                                                    <td class="ant-table-cell">{{ $index + 1 }}</td>
                                                    <td class="ant-table-cell">{{ $order->book_name }}</td>
                                                    <td class="ant-table-cell">{{ $order->full_name }}</td>
                                                    <td class="ant-table-cell">{{ $order->phone_number }}</td>
                                                    <td class="ant-table-cell">
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
                                                    <td class="ant-table-cell">{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                                                    <td class="ant-table-cell">{{ \Carbon\Carbon::parse($order->due_date)->format('Y-m-d') }}</td>
                                                    <td class="ant-table-cell">
                                                        @if($order->return_date)
                                                            {{ \Carbon\Carbon::parse($order->return_date)->format('Y-m-d') }}
                                                        @endif
                                                    </td>
                                                    <td class="ant-table-cell">{{ $order->overdue_day_count }}</td>
                                                    <td class="ant-table-cell">
                                                        <div class="ant-space css-12jzuas ant-space-horizontal ant-space-align-center"
                                                             style="gap: 8px;">
                                                            <div class="ant-space-item">
                                                                <button type="button" class="confirm-button btn btn-outline-primary" value="{{$order->id}}" data-toggle="modal" data-target="#confirmModal"
                                                                        @if ($order->order_status != 0) disabled @endif>Confirm</button>

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
                                                                <br>
                                                                <button type="button" class="return-button btn btn-outline-primary" value="{{$order->id}}" data-toggle="modal" data-target="#returnModal"
                                                                        @if ($order->order_status == 0 || $order->order_status == 2) disabled @endif>Return</button>
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
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">No Order found</td>
                                                </tr>
                                            @endforelse
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
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div>{{ $orders->links() }}</div>
            </div>
        </form>
    </main>
@endsection
