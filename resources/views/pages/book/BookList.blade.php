@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Book List</a></span></li>
@endsection
@section("title")
    <title>Book List In Club</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <form id="bookSearchForm" autocomplete="off"
              class="ant-form ant-form-vertical css-12jzuas ant-pro-query-filter home-page-search_book ant-pro-form"
              style="padding: 0px;"><input type="text" style="display: none;">
            <div class="ant-row ant-row-start ant-pro-query-filter-row css-1wx4d4d css-12jzuas"
                 style="margin-left: -12px; margin-right: -12px;">
                <div
                    class="ant-col ant-col-6 ant-pro-query-filter-row-split css-1wx4d4d css-12jzuas"
                    style="padding-left: 12px; padding-right: 12px;">
                    <div class="ant-form-item css-12jzuas">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-form-item-label css-12jzuas"><label
                                    for="book_name" class="" title="Search">Search</label></div>
                            <div class="ant-col ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><span
                                            class="ant-input-affix-wrapper css-12jzuas"
                                            style="width: 100%;"><input
                                                placeholder="Input book name to search"
                                                id="book_name"
                                                class="ant-input css-12jzuas" type="text"
                                                value=""><span
                                                class="ant-input-suffix"><span
                                                    class="ant-input-clear-icon ant-input-clear-icon-hidden"
                                                    role="button" tabindex="-1"><span role="img"
                                                                                      aria-label="close-circle"
                                                                                      class="anticon anticon-close-circle"><svg
                                                            viewBox="64 64 896 896"
                                                            focusable="false"
                                                            data-icon="close-circle" width="1em"
                                                            height="1em"
                                                            fill="currentColor" aria-hidden="true"><path
                                                                d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm165.4 618.2l-66-.3L512 563.4l-99.3 118.4-66.1.3c-4.4 0-8-3.5-8-8 0-1.9.7-3.7 1.9-5.2l130.1-155L340.5 359a8.32 8.32 0 01-1.9-5.2c0-4.4 3.6-8 8-8l66.1.3L512 464.6l99.3-118.4 66-.3c4.4 0 8 3.5 8 8 0 1.9-.7 3.7-1.9 5.2L553.5 514l130 155c1.2 1.5 1.9 3.3 1.9 5.2 0 4.4-3.6 8-8 8z"></path></svg></span></span></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ant-col ant-col-6 ant-col-offset-12 css-12jzuas"
                     style="padding-left: 12px; padding-right: 12px; text-align: end;">
                    <div class="ant-form-item ant-pro-query-filter-actions css-1wx4d4d css-12jzuas">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-form-item-label css-12jzuas"><label
                                    class="ant-form-item-no-colon" title=" "> </label></div>
                            <div class="ant-col ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content">
                                        <div
                                            class="ant-space css-12jzuas ant-space-horizontal ant-space-align-center"
                                            style="gap: 16px;">
                                            <div class="ant-space-item">
                                                <div
                                                    style="display: flex; gap: 8px; align-items: center;">
                                                    <button type="button"
                                                            class="ant-btn css-12jzuas ant-btn-default">
                                                        <span>Reset</span></button>
                                                    <button type="button"
                                                            class="ant-btn css-12jzuas ant-btn-primary">
                                                        <span>Search</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Get the form and the input field
                var form = document.getElementById('bookSearchForm');
                var inputField = form.querySelector('#book_name'); // Assuming the input field has an ID

                // Get the "Reset" button
                var resetButton = form.querySelector('.ant-btn-default');

                // Add an event listener to the "Reset" button
                resetButton.addEventListener('click', function () {
                    // Set the value of the input field to an empty string
                    inputField.value = '';
                });
            });
        </script>
        <form id="formOrderDialog" method="POST" action="{{ route('order.dialog') }}">
            @csrf
            <button id="orderButton" type="button" class="ant-btn css-12jzuas ant-btn-primary"><span
                    class="ant-btn-icon"><span role="img" aria-label="plus-circle"
                                               class="anticon anticon-plus-circle"><svg
                            viewBox="64 64 896 896" focusable="false" data-icon="plus-circle"
                            width="1em"
                            height="1em" fill="currentColor" aria-hidden="true"><path
                                d="M696 480H544V328c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v152H328c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h152v152c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V544h152c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z"></path><path
                                d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path></svg></span></span><span>Order</span>
            </button>
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
            <div class="sc-gxYJeL iVyfZn">
                <div class="ant-table-wrapper css-12jzuas">
                    <div class="ant-spin-nested-loading css-12jzuas">
                        <div class="ant-spin-container">
                            <div class="ant-table">
                                <div class="ant-table-container">
                                    <div class="ant-table-content">
                                        <table id="books-table" style="table-layout: auto;">
                                            <colgroup></colgroup>
                                            <thead class="ant-table-thead">
                                            <tr>
                                                <th class="ant-table-cell ant-table-selection-column"
                                                    scope="col">
                                                </th>
                                                <th class="ant-table-cell" scope="col">No</th>
                                                <th class="ant-table-cell" scope="col">
                                                    <div class="ant-table-filter-column"><span
                                                            class="ant-table-column-title">Name</span>
                                                    </div>
                                                </th>
                                                <th class="ant-table-cell" scope="col">Category</th>
                                                <th class="ant-table-cell" scope="col">Author</th>
                                            </tr>
                                            </thead>
                                            <tbody class="ant-table-tbody">
                                            @forelse ($clubBooks as $index => $clubBook)
                                                <tr class="ant-table-row ant-table-row-level-{{ $index % 2 }}">
                                                    <td class="ant-table-cell ant-table-selection-column"><label
                                                            class="ant-checkbox-wrapper css-12jzuas"><span
                                                                class="ant-checkbox css-12jzuas"><input
                                                                    class="cb-element" type="checkbox" name="order[]" value="{{ $clubBook->id }}"></span></label></td>
                                                    <td class="ant-table-cell">{{ $index + 1 }}</td>
                                                    <td class="ant-table-cell">{{ $clubBook->book_name }}</td>
                                                    <td class="ant-table-cell">{{ $clubBook->category_name }}</td>
                                                    <td class="ant-table-cell">{{ $clubBook->author_name}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">No clubs found</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {

                                                var form = document.getElementById('bookSearchForm');
                                                var inputField = form.querySelector('#book_name');
                                                var searchButton = form.querySelector('.ant-btn-primary');
                                                var booksTable = document.getElementById('booksTable');

                                                searchButton.addEventListener('click', function () {
                                                    var searchTerm = inputField.value;

                                                    if(searchTerm===''){
                                                        location.reload();
                                                    }else{
                                                        fetch('{{ route('club.book.search', ['club_id'=> $club_id, 'book_name' => '__book_name__']) }}'.replace('__book_name__', searchTerm))
                                                            .then(response => response.json())
                                                            .then(books => {
                                                                const tableBody = document.querySelector('#books-table tbody');
                                                                tableBody.innerHTML = "";
                                                                no=1;

                                                                // Populate the table with the search results
                                                                books.forEach(book => {
                                                                    var row = document.createElement('tr');
                                                                    row.innerHTML = `
                        <td class="ant-table-cell ant-table-selection-column"><label
                                                        class="ant-checkbox-wrapper css-12jzuas"><span
                                                            class="ant-checkbox css-12jzuas"><input
                                                                class="cb-element" type="checkbox" name="order[]" value="${book.id}"></span></label></td>
                        <td>${no}</td>
                        <td>${book.book_name}</td>
                        <td>${book.author_name}</td>
                        <td>${book.category_name}</td>
                        `;
                                                                    tableBody.appendChild(row);
                                                                    no=no+1;
                                                                });
                                                            })
                                                            .catch(error => console.error('Error fetching data:', error));
                                                    }
                                                });
                                            });
                                        </script>
{{--                                        <script>--}}
{{--                                            $(document).ready(function(){--}}
{{--                                                $('.check:checkbox').click(function(){--}}
{{--                                                    if ($('.check:checkbox').is(":checked"))--}}
{{--                                                    {--}}
{{--                                                        $('.cb-element').attr('checked','checked');--}}
{{--                                                    }else--}}
{{--                                                    {--}}
{{--                                                        $('.cb-element').removeAttr('checked');--}}
{{--                                                    }--}}
{{--                                                });--}}
{{--                                            })--}}
{{--                                        </script>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </main>
@endsection
