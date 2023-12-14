@extends("layouts.index")
@section("title")
    <title>My Profile</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <div style="display: flex; align-items: center; justify-content: center;">
            <div style="display: flex; padding: 30px; background: rgb(255, 255, 255); border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.12) 0px 5px 5px;">
                <form id="control-ref" class="ant-form ant-form-horizontal css-12jzuas" method="POST" action="{{ route('user.update', ['id' => Auth::user()->id]) }}"
                      style="width: 600px;">
                    @csrf
                    @method('PUT')
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_username" class="ant-form-item-required"
                                    title="Username">Username</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_username" aria-required="true" disabled=""
                                            name="username"
                                            class="ant-input ant-input-disabled ant-input-status-success css-12jzuas"
                                            type="text" value="{{ Auth::user()->username }}" fdprocessedid="tp9uf6"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                            type="text" value="{{ Auth::user()->full_name }}" fdprocessedid="u5g27o"></div>
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
                                            type="text" value="{{ Auth::user()->address }}" fdprocessedid="btzix5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_email" class="ant-form-item-required" title="Email">Email</label>
                            </div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_email" aria-required="true"
                                            class="ant-input ant-input-status-success css-12jzuas" name="email"
                                            type="text" value="{{ Auth::user()->email }}"
                                            fdprocessedid="tsl9lj"></div>
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
                                            type="text" value="{{ Auth::user()->phone_number }}" fdprocessedid="ia3rrq"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_phone_number" class="ant-form-item-required"
                                    title="Phone Number">Birth Date</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_phone_number" aria-required="true"
                                            class="ant-input ant-input-status-success css-12jzuas" name="birthDate"
                                            type="text" value="{{ optional(Auth::user()->birth_date)->format('Y-m-d') }}" fdprocessedid="ia3rrq"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-16 ant-col-offset-8 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content">
                                        <button id="cancelButton" type="submit" class="ant-btn css-12jzuas ant-btn-primary"
                                                style="margin-right: 10px;"><span>Submit</span>
                                        </button>
                                        <button  type="button" class="ant-btn css-12jzuas ant-btn-default"
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
