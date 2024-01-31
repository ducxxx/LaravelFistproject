@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Book List</a></span></li>
@endsection
@section("title")
    <title>Book List In Club</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <form id="formOrderDialog" method="POST" action="{{ route('order.dialog') }}">
            @csrf
            <div class="sc-gxYJeL iVyfZn">
                <div class="card shadow mb-4" style="width: 1340px">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">CLUB BOOK LIST</h6>
                    </div>
                    <div class="card-body">
                        <button id="orderButton" type="button" class="ant-btn css-12jzuas ant-btn-primary">
                            <span class="ant-btn-icon">
                                <span role="img" aria-label="plus-circle" class="anticon anticon-plus-circle">
                                    <svg viewBox="64 64 896 896" focusable="false" data-icon="plus-circle" width="1em"
                                         height="1em" fill="currentColor" aria-hidden="true">
                                        <path d="M696 480H544V328c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v152H328c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h152v152c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V544h152c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z">
                                        </path>
                                        <path
                                d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z">
                                        </path></svg></span></span><span>Order</span>
                        </button>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th class="ant-table-cell ant-table-selection-column" scope="col"></th>
                                    <th>No</th>
                                    <th>Book Name</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Current Count</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clubBooks as $index => $clubBook)
                                    <tr class="ant-table-row ant-table-row-level-{{ $index % 2 }}">
                                        <td class="ant-table-cell ant-table-selection-column">
                                            <label class="ant-checkbox-wrapper css-12jzuas">
                                                <span class="ant-checkbox css-12jzuas">
                                                    <input class="cb-element" type="checkbox" name="order[]"
                                                           value="{{ $clubBook->id }}"
                                                        {{ $clubBook->current_count == 0 ? 'disabled' : '' }}>
                                                </span>
                                            </label>
                                        </td>
                                        <td class="ant-table-cell">{{ $index + 1 }}</td>
                                        <td class="ant-table-cell">{{ $clubBook->book_name }}</td>
                                        <td class="ant-table-cell">{{ $clubBook->category_name }}</td>
                                        <td class="ant-table-cell">{{ $clubBook->author_name}}</td>
                                        <td class="ant-table-cell">{{ $clubBook->current_count}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
@section('js')
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#orderButton').on('click', function () {
            var selectedValues = [];
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Use :checked selector to find selected checkboxes
            $('input[name="order[]"]:checked').each(function() {
                // Push the value of each selected checkbox into the array
                selectedValues.push($(this).val());
            });
            @if(Auth::user()->is_active === 1)
            $.ajax({
                url: '{{ route("order.check") }}',
                type: 'POST',
                data: {
                    orders: selectedValues,
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (orderResponse) {
                    if (orderResponse['isBorrow']==false){
                        location.reload();
                    }else{
                        $('#formOrderDialog').submit()
                    }
                },
                error: function (orderError) {
                    // console.log(data);
                    console.error(orderError);
                    // Handle errors from the order check route
                }
            });
            // $('#formOrderDialog').submit()
            @else
            $('#verifyModal').modal('show');
            $('#control_message').html('Please verify gmail before order').css('color', 'red');
            @endif
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
            searching: true, // Enable searching
             "dom": '<"top"f>rt<"bottom"p>',
            });
        });
    </script>
@endsection
