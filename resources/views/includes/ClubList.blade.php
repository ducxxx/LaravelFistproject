@extends("includes.header")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Clubs List</a></span></li>
@endsection
@extends("layouts.index")
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
                                                    class="ant-table-column-title">Name</span><span
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
                    <ul class="ant-pagination ant-table-pagination ant-table-pagination-right css-12jzuas">
                        <li title="Previous Page" class="ant-pagination-prev ant-pagination-disabled"
                            aria-disabled="true">
                            <button class="ant-pagination-item-link" type="button" tabindex="-1"
                                    disabled=""><span role="img" aria-label="left"
                                                      class="anticon anticon-left"><svg
                                        viewBox="64 64 896 896" focusable="false" data-icon="left"
                                        width="1em" height="1em" fill="currentColor" aria-hidden="true"><path
                                            d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 000 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path></svg></span>
                            </button>
                        </li>
                        <li title="1"
                            class="ant-pagination-item ant-pagination-item-1 ant-pagination-item-active"
                            tabindex="0"><a rel="nofollow">1</a></li>
                        <li title="Next Page" class="ant-pagination-next ant-pagination-disabled"
                            aria-disabled="true">
                            <button class="ant-pagination-item-link" type="button" tabindex="-1"
                                    disabled=""><span role="img" aria-label="right"
                                                      class="anticon anticon-right"><svg
                                        viewBox="64 64 896 896" focusable="false" data-icon="right"
                                        width="1em" height="1em" fill="currentColor" aria-hidden="true"><path
                                            d="M765.7 486.8L314.9 134.7A7.97 7.97 0 00302 141v77.3c0 4.9 2.3 9.6 6.1 12.6l360 281.1-360 281.1c-3.9 3-6.1 7.7-6.1 12.6V883c0 6.7 7.7 10.4 12.9 6.3l450.8-352.1a31.96 31.96 0 000-50.4z"></path></svg></span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
