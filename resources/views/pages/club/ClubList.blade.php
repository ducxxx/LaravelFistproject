@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Club List</a></span></li>
@endsection
@section("title")
    <title>Club List</title>
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
                                                    class="ant-table-column-title">Name</span>
                                            </div>
                                        </th>
                                        <th class="ant-table-cell" scope="col">Description</th>
                                        <th class="ant-table-cell" scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="ant-table-tbody">
                                    @forelse ($clubs as $index => $club)
                                        <tr class="ant-table-row ant-table-row-level-{{ $index % 2 }}">
                                            <td class="ant-table-cell">{{ $index + 1 }}</td>
                                            <td class="ant-table-cell">{{ $club->name }}</td>
                                            <td class="ant-table-cell">{{ $club->address }}</td>
                                            <td class="ant-table-cell">{{ $club->description }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No clubs found</td>
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
        <br>
        {{ $clubs->links() }}
    </div>
</main>
@endsection
