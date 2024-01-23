@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Order Offline Create</a></span></li>
@endsection
@section("title")
    <title>Create Order Offline</title>
@endsection
@section("css")
    <link href="{{ asset('css/styleMutil.css') }}" rel="stylesheet" type="text/css">
@endsection
@section("js")
    <script src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <div style="display: flex; align-items: center; justify-content: center;">
            <div tabindex="-1" class="ant-modal-wrap">
                <div role="dialog" aria-labelledby=":rj:" aria-modal="true" class="ant-modal css-12jzuas"
                     style="width: 800px; transform-origin: 1257px 422px;">
                    <div tabindex="0" aria-hidden="true"
                         style="width: 0px; height: 0px; overflow: hidden; outline: none;"></div>
                    <div class="ant-modal-content">
                        <button type="button" aria-label="Close" class="ant-modal-close" onclick="goBack()"><span
                                class="ant-modal-close-x"><span role="img" aria-label="close"
                                                                class="anticon anticon-close ant-modal-close-icon"><svg
                                        viewBox="64 64 896 896" focusable="false" data-icon="close" width="1em" height="1em"
                                        fill="currentColor" aria-hidden="true"><path
                                            d="M563.8 512l262.5-312.9c4.4-5.2.7-13.1-6.1-13.1h-79.8c-4.7 0-9.2 2.1-12.3 5.7L511.6 449.8 295.1 191.7c-3-3.6-7.5-5.7-12.3-5.7H203c-6.8 0-10.5 7.9-6.1 13.1L459.4 512 196.9 824.9A7.95 7.95 0 00203 838h79.8c4.7 0 9.2-2.1 12.3-5.7l216.5-258.1 216.5 258.1c3 3.6 7.5 5.7 12.3 5.7h79.8c6.8 0 10.5-7.9 6.1-13.1L563.8 512z"></path></svg></span></span>
                        </button>
                        <div class="ant-modal-header">
                            <div class="ant-modal-title" id=":rj:">Book Order</div>
                        </div>
                        <div class="ant-modal-body">
                            <div class="sc-iVCKna jTcnru">
                                <form method="POST" action="{{ route('order.offline.create') }}" id="Order-offline-form" class="ant-form ant-form-horizontal css-12jzuas">
                                    @csrf
                                    <div class="ant-form-item css-12jzuas">
                                        <div class="ant-row ant-form-item-row css-12jzuas">
                                            <div class="ant-col ant-col-4 ant-form-item-label css-12jzuas"><label
                                                    for="control-ref_full_name" class="ant-form-item-required"
                                                    title="Member">Member</label></div>
                                            <div class="ant-form-item-control-input">
                                                <div class="ant-form-item-control-input-content">
                                                    <input
                                                        id="control-ref-search-member" aria-required="true"
                                                        placeholder="PhoneNumber"
                                                        autofocus="autofocus"
                                                        class="ant-input ant-input css-12jzuas" type="text"
                                                        name="search_member">
                                                </div>
                                                <button id="searchButton" type="button" class="btn btn-primary btn-sm mr-2">Search</button>
                                            </div>
                                            <div class="ant-row ant-form-item-row css-12jzuas" style="width: 100%;display: block;padding-left: 125px;">
                                                <span id="message-show" class="mr-2" style="color: red"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            // Attach a click event handler to the Search button
                                            $('#searchButton').on('click', function () {
                                                // Get the phone number from the input field
                                                var phoneNumber = $('#control-ref-search-member').val();
                                                // Make an AJAX request to the API endpoint
                                                if(phoneNumber){
                                                    $.ajax({
                                                    url: '/member/search/' + phoneNumber,
                                                    type: 'GET',
                                                    success: function (data) {
                                                        if (data) {
                                                            // Handle the API response here
                                                            $('#control-ref_full_name').val(data.full_name).
                                                            prop('disabled', true);
                                                            $('#ref_full_name').val(data.full_name)
                                                            $('#ref_phone_number').val(data.phone_number)
                                                            $('#control-ref_phone_number').val(data.phone_number)
                                                                .prop('disabled', true);
                                                            $('#control-ref_address').val(data.address);
                                                            $('#message-show').text('');
                                                        } else {
                                                            $('#control-ref_address').val('');
                                                            $('#control-ref_phone_number').val(phoneNumber);
                                                            $('#ref_phone_number').val(phoneNumber);
                                                            $('#message-show').text('Phone Number not exist,' +
                                                                ' please input name and address');
                                                            $('#control-ref_full_name').val('').prop('disabled', false);
                                                        }
                                                    },
                                                    error: function (error) {
                                                        // Handle errors here
                                                        console.error(error);
                                                    },
                                                    complete: function () {
                                                        $('#newMember').prop('checked', false);
                                                    }
                                                });
                                                }else{
                                                    $('#message-show').text('Please input Phone Number');
                                                }
                                            });
                                        });
                                    </script>
                                    <div class="ant-form-item css-12jzuas">
                                        <div class="ant-row ant-form-item-row css-12jzuas">
                                            <div class="ant-col ant-col-4 ant-form-item-label css-12jzuas"><label
                                                    for="control-ref_full_name" class="ant-form-item-required"
                                                    title="Full Name">Full Name</label></div>
                                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                                <div class="ant-form-item-control-input">
                                                    <div class="ant-form-item-control-input-content">
                                                        <input id="ref_full_name" type="hidden" name="full_name"
                                                               value="" >
                                                        <input
                                                            id="control-ref_full_name" aria-required="true"
                                                            class="ant-input css-12jzuas" type="text"
                                                            name="full_name" value=""></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-form-item css-12jzuas">
                                        <div class="ant-row ant-form-item-row css-12jzuas">
                                            <div class="ant-col ant-col-4 ant-form-item-label css-12jzuas"><label
                                                    for="control-ref_phone_number" class="ant-form-item-required"
                                                    title="Phone Number">Phone Number</label></div>
                                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                                <div class="ant-form-item-control-input">
                                                    <div class="ant-form-item-control-input-content">
                                                        <input id="ref_phone_number" type="hidden" name="phone_number"
                                                               value="" >
                                                        <input
                                                            id="control-ref_phone_number" aria-required="true"
                                                            class="ant-input css-12jzuas" type="text"
                                                            name="phone_number" value=""></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-form-item css-12jzuas">
                                        <div class="ant-row ant-form-item-row css-12jzuas">
                                            <div class="ant-col ant-col-4 ant-form-item-label css-12jzuas"><label
                                                    for="control-ref_address" class="ant-form-item-required"
                                                    title="Address">Address</label></div>
                                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                                <div class="ant-form-item-control-input">
                                                    <div class="ant-form-item-control-input-content">
                                                        <input
                                                            id="control-ref_address" aria-required="true"
                                                            class="ant-input css-12jzuas" type="text"
                                                            name="address" value=""></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-form-item css-12jzuas">
                                        <div class="ant-row ant-form-item-row css-12jzuas">
                                            <div class="ant-col ant-col-4 ant-form-item-label css-12jzuas"><label
                                                    for="control-ref_order_date" class="ant-form-item-required"
                                                    title="Order Date">Order Date</label></div>
                                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                                <div class="ant-form-item-control-input">
                                                    <div class="ant-form-item-control-input-content">
                                                        <div class="ant-picker css-12jzuas ant-picker-disabled">
                                                            <div class="ant-picker-input">
                                                                <input id="request_order_date" type="hidden" name="order_date"
                                                                       value="" >
                                                                <input
                                                                    id="control-ref_order_date" aria-required="true"
                                                                    class="ant-input css-12jzuas" type="text" name="order_date"
                                                                    disabled=""><span
                                                                    class="ant-picker-suffix"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            // Get the current date
                                            var currentDate = new Date();

                                            // Format the date as needed
                                            var formattedDate = currentDate.toISOString().split('T')[0];

                                            // Set the value of the input field
                                            $('#control-ref_order_date').val(formattedDate);
                                            $('#request_order_date').val(formattedDate);
                                        });
                                    </script>
                                    <div class="ant-form-item css-12jzuas">
                                        <div class="ant-row ant-form-item-row css-12jzuas">
                                            <div class="ant-col ant-col-4 ant-form-item-label css-12jzuas"><label
                                                    for="control-ref_due_date" class="ant-form-item-required"
                                                    title="Due Date">Due Date</label></div>
                                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                                <div class="ant-form-item-control-input">
                                                    <div class="ant-form-item-control-input-content">
                                                        <div class="ant-picker css-12jzuas ant-picker-disabled">
                                                            <div class="ant-picker-input">
                                                                <input id="request_due_date" type="hidden" name="due_date"
                                                                       value="" >
                                                                <input
                                                                    id="control-ref_due_date" aria-required="true"
                                                                    class="ant-input css-12jzuas" type="text" name="due_date"
                                                                    disabled=""><span
                                                                    class="ant-picker-suffix"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            // Get the current date
                                            var currentDate = new Date();

                                            // Calculate the date for one month later
                                            var oneMonthLater = new Date(currentDate);
                                            oneMonthLater.setMonth(oneMonthLater.getMonth() + 1);

                                            // Format the date as needed
                                            var formattedDate = oneMonthLater.toISOString().split('T')[0];

                                            // Set the value of the input field
                                            $('#control-ref_due_date').val(formattedDate);
                                            $('#request_due_date').val(formattedDate);
                                        });
                                    </script>
                                    <div class="ant-form-item css-12jzuas">
                                        <div class="ant-row ant-form-item-row css-12jzuas">
                                            <div class="ant-col ant-col-4 ant-form-item-label css-12jzuas"><label
                                                    for="control-ref_club_name" class="ant-form-item-required"
                                                    title="ClubName">Club Name</label></div>
                                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Club Name
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" data-value="1">CLB Sách Chuyên Hùng Vương</a>
                                                        <a class="dropdown-item" data-value="2">CLB Sách FPT</a>
                                                        <a class="dropdown-item" data-value="3">D Free Book Đại La</a>
                                                        <a class="dropdown-item" data-value="4">D Free Book Cầu Giấy</a>
                                                        <a class="dropdown-item" data-value="5">Free Book Test</a>
                                                    </div>
                                                    <div class="ant-form-item-control-input-content"><input
                                                            id="control-ref_club_id" aria-required="true" name="clubId" type="hidden"
                                                            class="ant-input ant-input-status-success css-12jzuas"
                                                            fdprocessedid="u5g27o"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-form-item css-12jzuas">
                                        <div class="ant-row ant-form-item-row css-12jzuas">
                                            <div class="ant-col ant-col-4 ant-form-item-label css-12jzuas"><label
                                                    for="control-ref_select_book" class="ant-form-item-required"
                                                    title="SelectBook">Select Book</label></div>
                                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                                <div class="text-left align-items-center">
                                                    <input
                                                        id="control-ref_club_book_id" aria-required="true" name="club_book_id" type="hidden"
                                                        class="ant-input ant-input-status-success css-12jzuas"
                                                        fdprocessedid="u5g27o">
                                                    <select name="club_book_ids[]" id="multiple-checkboxes" multiple="multiple">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="ant-row ant-form-item-row css-12jzuas" style="width: 100%;display: block;padding-left: 125px;">
                                                <span id="message-error" class="mr-2" style="color: red"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('.dropdown-item').on('click', function () {
                                                var selectedValue = $(this).data('value');
                                                var newItemName = $(this).text();
                                                $('#dropdownMenuButton').text(newItemName);
                                                $('#control-ref_club_id').val(selectedValue);
                                                $.ajax({
                                                    url: '/club/book/' + selectedValue,
                                                    type: 'GET',
                                                    success: function (data) {
                                                        $('#multiple-checkboxes').empty();
                                                        $('#multiple-checkboxes').multiselect("destroy");
                                                        console.log(data);
                                                        for (var i = 0; i < data.length; i++) {
                                                            $('#multiple-checkboxes').append('<option value="' + data[i].id + '">' + data[i].book_name + '</option>');
                                                        }
                                                        $('#multiple-checkboxes').multiselect('refresh');
                                                        // $('#multiple-checkboxes').multiselect('refresh');
                                                    },
                                                    error: function (error) {
                                                        console.error(error);
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    <div class="ant-form-item css-12jzuas">
                                        <div class="ant-row ant-form-item-row css-12jzuas">
                                            <div class="ant-col ant-col-4 ant-form-item-label css-12jzuas"><label
                                                    for="control-ref_note" class="" title="Notes">Notes</label></div>
                                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                                <div class="ant-form-item-control-input">
                                                    <div class="ant-form-item-control-input-content"><textarea rows="4"
                                                                                                               id="control-ref_note"
                                                                                                               class="ant-input css-12jzuas" name="note"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-modal-footer">
                                        <button id="cancelButton" type="button" class="ant-btn css-12jzuas ant-btn-default" onclick="goBack()"><span>Cancel</span></button>
                                        <button id="submitButton" type="button" class="ant-btn css-12jzuas ant-btn-primary"><span>Submit</span></button>
                                    </div>
                                    <script>
                                        $('#submitButton').on('click', function () {
                                            var csrfToken = $('meta[name="csrf-token"]').attr('content');
                                                $.ajax({
                                                url: '{{ route("order.offline.check") }}',
                                                type: 'POST',
                                                data: {
                                                    club_book_ids: $('#multiple-checkboxes').val(),
                                                    phone_number: $('#ref_phone_number').val(),
                                                },
                                                headers: {
                                                    'X-CSRF-TOKEN': csrfToken
                                                },
                                                success: function (orderResponse) {
                                                    if (orderResponse['isBorrow']){
                                                        $('#Order-offline-form').submit();
                                                    }else{
                                                        $('#message-error').text(orderResponse['message']);
                                                    }
                                                },
                                                error: function (orderError) {
                                                    console.error(orderError);
                                                }
                                            });
                                        });
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                    <div tabindex="0" aria-hidden="true"
                         style="width: 0px; height: 0px; overflow: hidden; outline: none;"></div>
                </div>
            </div>
        </div>
    </main>
@endsection
