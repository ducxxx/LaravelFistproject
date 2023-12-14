@extends("layouts.index")
@section("body")
<div class="ant-modal-mask"></div>
<div tabindex="-1" class="ant-modal-wrap">
    <div role="dialog" aria-labelledby=":rj:" aria-modal="true" class="ant-modal css-12jzuas"
         style="width: 800px; transform-origin: 1257px 422px;">
        <div tabindex="0" aria-hidden="true"
             style="width: 0px; height: 0px; overflow: hidden; outline: none;"></div>
        <div class="ant-modal-content">
            <button type="button" aria-label="Close" class="ant-modal-close"><span
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
                    <form id="control-ref" class="ant-form ant-form-horizontal css-12jzuas"
                          style="width: 800px;">
                        <div class="ant-form-item css-12jzuas">
                            <div class="ant-row ant-form-item-row css-12jzuas">
                                <div class="ant-col ant-col-4 ant-form-item-label css-12jzuas"><label
                                        for="control-ref_full_name" class="ant-form-item-required"
                                        title="Full Name">Full Name</label></div>
                                <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                    <div class="ant-form-item-control-input">
                                        <div class="ant-form-item-control-input-content"><input
                                                id="control-ref_full_name" aria-required="true" disabled=""
                                                class="ant-input ant-input-disabled css-12jzuas" type="text"
                                                value="{{ Auth::user()->username }}"></div>
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
                                        <div class="ant-form-item-control-input-content"><input
                                                id="control-ref_phone_number" aria-required="true" disabled=""
                                                class="ant-input ant-input-disabled css-12jzuas" type="text"
                                                value="{{ Auth::user()->phone_number }}"></div>
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
                                        <div class="ant-form-item-control-input-content"><input
                                                id="control-ref_address" aria-required="true"
                                                class="ant-input css-12jzuas" type="text" value="{{ Auth::user()->address }}"></div>
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
                                                <div class="ant-picker-input"><input
                                                        id="control-ref_order_date" aria-required="true"
                                                        class="ant-input css-12jzuas" type="text" value=""><span
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
                                                <div class="ant-picker-input"><input
                                                        id="control-ref_due_date" aria-required="true"
                                                        class="ant-input css-12jzuas" type="text" value=""><span
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
                                                        <ul class="ant-list-items">

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ant-form-item css-12jzuas">
                            <div class="ant-row ant-form-item-row css-12jzuas">
                                <div class="ant-col ant-col-4 ant-form-item-label css-12jzuas"><label
                                        for="control-ref_note" class="" title="Notes">Notes</label></div>
                                <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                    <div class="ant-form-item-control-input">
                                        <div class="ant-form-item-control-input-content"><textarea rows="4"
                                                                                                   id="control-ref_note"
                                                                                                   class="ant-input css-12jzuas"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ant-modal-footer">
                <button type="button" class="ant-btn css-12jzuas ant-btn-default"><span>Cancel</span></button>
                <button type="button" class="ant-btn css-12jzuas ant-btn-primary"><span>Submit</span></button>
            </div>
        </div>
        <div tabindex="0" aria-hidden="true"
             style="width: 0px; height: 0px; overflow: hidden; outline: none;"></div>
    </div>
</div>
@endsection
