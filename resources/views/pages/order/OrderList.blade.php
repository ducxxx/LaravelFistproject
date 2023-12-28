@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Order list</a></span></li>
@endsection
@section("title")
    <title>Order List</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
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
                                            <th class="ant-table-cell" scope="col">Return Date</th>
                                            <th class="ant-table-cell" scope="col">Overdue Day</th>
                                        </tr>
                                        </thead>
                                        <tbody class="ant-table-tbody">
                                        @forelse ($orders as $index => $order)
                                            <tr class="ant-table-row ant-table-row-level-{{ $index % 2 }}">
                                                <td class="ant-table-cell">{{ $index + 1 }}</td>
                                                <td class="ant-table-cell">{{ $order->book_name }}</td>
                                                <td class="ant-table-cell">{{ $order->full_name }}</td>
                                                <td class="ant-table-cell">{{ $order->phone_number }}</td>
                                                <td class="ant-table-cell">{{ $order->order_status }}</td>
                                                <td class="ant-table-cell">{{ $order->order_date }}</td>
                                                <td class="ant-table-cell">{{ $order->return_date }}</td>
                                                <td class="ant-table-cell">{{ $order->overdue_day_count }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No Order found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>{{ $orders->links() }}</div>
        </div>
    </main>
@endsection
