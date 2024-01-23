@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Order Create</a></span></li>
@endsection
@section("title")
    <title>Create Order</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <div style="display: flex; align-items: center; justify-content: center;">
                <div role="dialog" aria-labelledby=":rj:" aria-modal="true" class="ant-modal css-12jzuas"
                     style="width: 800px; transform-origin: 1257px 422px;">
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
                                <form method="POST" action="{{ route('order.create') }}" id="control-ref" class="ant-form ant-form-horizontal css-12jzuas">
                                    @csrf
                                    <div class="ant-form-item css-12jzuas">
                                        <div class="ant-row ant-form-item-row css-12jzuas">
                                            <div class="ant-col ant-col-4 ant-form-item-label css-12jzuas"><label
                                                    for="control-ref_full_name" class="ant-form-item-required"
                                                    title="Full Name">Full Name</label></div>
                                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                                <div class="ant-form-item-control-input">
                                                    <div class="ant-form-item-control-input-content">
                                                        <input type="hidden" name="full_name" value="{{ Auth::user()->full_name }}" >
                                                        <input
                                                            id="control-ref_full_name" aria-required="true" disabled=""
                                                            class="ant-input ant-input-disabled css-12jzuas" type="text"
                                                            name="full_name" value="{{ Auth::user()->full_name }}"></div>
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
                                                        <input type="hidden" name="phone_number" value="{{ Auth::user()->phone_number }}" >
                                                        <input
                                                            id="control-ref_phone_number" aria-required="true" disabled=""
                                                            class="ant-input ant-input-disabled css-12jzuas" type="text"
                                                            name="phone_number" value="{{ Auth::user()->phone_number }}"></div>
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
                                                            name="address" value="{{ Auth::user()->address }}"></div>
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
                                                    for="control-ref_selected_book" class="" title="Selected Books">Selected
                                                    Books</label></div>
                                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                                <div class="ant-form-item-control-input">
                                                    <div class="ant-form-item-control-input-content">
                                                        <div class="ant-list ant-list-split css-12jzuas">
                                                            <div class="ant-spin-nested-loading css-12jzuas">
                                                                <div class="ant-spin-container">
                                                                    <input type="hidden" name="clubBook"
                                                                           value="{{$clubBookName}}" >
                                                                    <ul class="ant-list-items">
                                                                        @foreach($clubBookName as $clubBook)
                                                                            <div class="ant-list-item-meta-content">
                                                                                <h4 class="ant-list-item-meta-title">
                                                                                    <p>{{$clubBook->name}}</p>
                                                                                </h4>

                                                                            </div>
                                                                        @endforeach

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(session('errors'))
                                        <div class="ant-row ant-form-item-row css-12jzuas" style="width: 100%;display: block;padding-left: 125px;">
                                            <span id="message-show" class="mr-2" style="color: red">{{session('errors')}}</span>
                                        </div>
                                    @endif
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
                                        <button id="submitButton" type="submit" class="ant-btn css-12jzuas ant-btn-primary"><span>Submit</span></button>
                                    </div>
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
    </main>
@endsection
