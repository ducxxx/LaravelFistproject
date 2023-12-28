@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Member Detail</a></span></li>
@endsection
@section("title")
    <title>Member Detail</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <div style="display: flex; align-items: center; justify-content: center;">
            <div style="display: flex; padding: 30px; background: rgb(255, 255, 255); border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.12) 0px 5px 5px;">
                <form id="control-ref" class="ant-form ant-form-horizontal css-12jzuas" enctype="multipart/form-data" method="POST" action="{{ route('member.update', ['id' => $memberDetail->id]) }}"
                      style="width: 600px;">
                    @csrf
                    @method('PUT')
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_full_name" class="ant-form-item-required"
                                    title="Full Name">Full Name</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_full_name" aria-required="true" name="fullName"
                                            class="ant-input ant-input-status-success css-12jzuas"
                                            type="text" value="{{ $memberDetail->full_name }}" fdprocessedid="u5g27o"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_address" class="ant-form-item-required"
                                    title="Address">Address</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_address" aria-required="true"
                                            class="ant-input ant-input-status-success css-12jzuas" name="address"
                                            type="text" value="{{ $memberDetail->address }}" fdprocessedid="btzix5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_phone_number" class="ant-form-item-required"
                                    title="Phone Number">Phone Number</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_phone_number" aria-required="true"
                                            class="ant-input ant-input-status-success css-12jzuas" name="phoneNumber"
                                            type="text" value="{{ $memberDetail->phone_number }}" fdprocessedid="ia3rrq"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_phone_number" class="ant-form-item-required"
                                    title="Birth Date">Birth Date</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref-birth-date" aria-required="true"
                                            class="ant-input ant-input-status-success css-12jzuas" name="birthDate"
                                            type="text" value="{{ $memberDetail->birth_date }}" fdprocessedid="ia3rrq"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_phone_number" class="ant-form-item-required"
                                    title="email">Email</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_phone_number" aria-required="true"
                                            class="ant-input ant-input-status-success css-12jzuas" name="email"
                                            type="text" value="{{ $memberDetail->email }}" fdprocessedid="ia3rrq"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_phone_number" class="ant-form-item-required"
                                    title="Join Date">Join Date</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_phone_number" aria-required="true" disabled=""
                                            class="ant-input ant-input-status-success css-12jzuas"
                                            type="text" value="{{ $memberDetail->created_at }}" fdprocessedid="ia3rrq"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-16 ant-col-offset-8 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content">
                                        <button type="submit" class="ant-btn css-12jzuas ant-btn-primary"
                                                style="margin-right: 10px;"><span>Submit</span>
                                        </button>
                                        <button  type="button" id="cancelButton" class="ant-btn css-12jzuas ant-btn-default"
                                                 fdprocessedid="g5id65"><span>Cancel</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var cancelButton = document.getElementById('cancelButton');
                            var updateButton = document.getElementById('updateButton');

                            cancelButton.addEventListener('click', function () {
                                location.reload();
                            });
                        });

                    </script>
                </form>
            </div>
        </div>
    </main>
@endsection
