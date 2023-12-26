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
                                                        class="ant-table-column-title">Book Name</span><span
                                                        role="button" tabindex="-1"
                                                        class="ant-dropdown-trigger ant-table-filter-trigger"><span
                                                            role="img" aria-label="search"
                                                            class="anticon anticon-search"><svg
                                                                viewBox="64 64 896 896" focusable="false"
                                                                data-icon="search" width="1em" height="1em"
                                                                fill="currentColor" aria-hidden="true"><path
                                                                    d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0011.6 0l43.6-43.5a8.2 8.2 0 000-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z"></path></svg></span></span>
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
