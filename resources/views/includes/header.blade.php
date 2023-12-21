<div class="sc-gTRrQi iJGdAN">
    <div class="sc-bgqQcB gimnnZ">
        <nav class="ant-breadcrumb css-12jzuas">
            <ol>
                <li><span class="ant-breadcrumb-link"><a
                            href="http://localhost:8000/app">Home</a></span></li>
                <li class="ant-breadcrumb-separator" aria-hidden="true">/</li>
                @yield('breadcrumb')
            </ol>
        </nav>
    </div>
    <div style="float: left; display: flex;"></div>
    <div style="float: right; display: flex; align-items: center;">
        @guest
            <div class="sc-ewnqHT fQATKp">
                <button id="loginButton" type="button" class="ant-btn css-12jzuas ant-btn-primary"><span
                        class="ant-btn-icon"><span role="img" aria-label="user"
                                                   class="anticon anticon-user"><svg viewBox="64 64 896 896"
                                                                                     focusable="false"
                                                                                     data-icon="user"
                                                                                     width="1em"
                                                                                     height="1em"
                                                                                     fill="currentColor"
                                                                                     aria-hidden="true"><path
                                    d="M858.5 763.6a374 374 0 00-80.6-119.5 375.63 375.63 0 00-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 00-80.6 119.5A371.7 371.7 0 00136 901.8a8 8 0 008 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 008-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path></svg></span></span>
                    <div class="ant-space css-12jzuas ant-space-horizontal ant-space-align-center"
                         style="display: flex; justify-content: flex-end; margin-left: 5px; gap: 8px;">
                        <div class="ant-space-item">Login</div>
                    </div>
                </button>
                <button id="registerButton" type="button" class="ant-btn css-12jzuas ant-btn-default"><span
                        class="ant-btn-icon"><span role="img" aria-label="user-add"
                                                   class="anticon anticon-user-add"><svg
                                viewBox="64 64 896 896" focusable="false" data-icon="user-add" width="1em"
                                height="1em" fill="currentColor" aria-hidden="true"><path
                                    d="M678.3 642.4c24.2-13 51.9-20.4 81.4-20.4h.1c3 0 4.4-3.6 2.2-5.6a371.67 371.67 0 00-103.7-65.8c-.4-.2-.8-.3-1.2-.5C719.2 505 759.6 431.7 759.6 349c0-137-110.8-248-247.5-248S264.7 212 264.7 349c0 82.7 40.4 156 102.6 201.1-.4.2-.8.3-1.2.5-44.7 18.9-84.8 46-119.3 80.6a373.42 373.42 0 00-80.4 119.5A373.6 373.6 0 00137 888.8a8 8 0 008 8.2h59.9c4.3 0 7.9-3.5 8-7.8 2-77.2 32.9-149.5 87.6-204.3C357 628.2 432.2 597 512.2 597c56.7 0 111.1 15.7 158 45.1a8.1 8.1 0 008.1.3zM512.2 521c-45.8 0-88.9-17.9-121.4-50.4A171.2 171.2 0 01340.5 349c0-45.9 17.9-89.1 50.3-121.6S466.3 177 512.2 177s88.9 17.9 121.4 50.4A171.2 171.2 0 01683.9 349c0 45.9-17.9 89.1-50.3 121.6C601.1 503.1 558 521 512.2 521zM880 759h-84v-84c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v84h-84c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h84v84c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-84h84c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8z"></path></svg></span></span>
                    <div class="ant-space css-12jzuas ant-space-horizontal ant-space-align-center"
                         style="display: flex; justify-content: flex-end; margin-left: 5px; gap: 8px;">
                        <div class="ant-space-item">Register</div>
                    </div>
                </button>
                <script>
                    // Get the button element by ID
                    var registerButton = document.getElementById('registerButton');

                    // Add a click event listener to the button
                    registerButton.addEventListener('click', function () {
                        // Redirect the user to the register page
                        window.location.href = '{{ route("register") }}';
                    });
                    var loginButton = document.getElementById('loginButton');

                    // Add a click event listener to the button
                    loginButton.addEventListener('click', function () {
                        // Redirect the user to the register page
                        window.location.href = '{{ route("login") }}';
                    });
                </script>
            </div>
        @else
            <div style="float: right; display: flex; align-items: center;"><span
                    class="ant-tag ant-tag-success css-12jzuas"><span role="img" aria-label="check-circle"
                                                                      class="anticon anticon-check-circle"><svg
                            viewBox="64 64 896 896" focusable="false" data-icon="check-circle" width="1em" height="1em"
                            fill="currentColor" aria-hidden="true"><path
                                d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0051.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z"></path><path
                                d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path></svg></span><span>Verified</span></span>
                <div class="ant-select css-12jzuas ant-select-single ant-select-show-arrow"
                     style="width: 15px; margin-right: 8px; margin-left: 8px;">
                </div>
                <div class="ant-image css-12jzuas" style="width: 25px;"><img class="ant-image-img"
                                                                             src="{{ asset('image/avata.jpg') }}"
                                                                             width="25"
                                                                             style="float: left; border: 1px solid rgb(255, 255, 255); border-radius: 50%;">
                </div>
                <a class="ant-dropdown-trigger">
                    <div class="ant-space css-12jzuas ant-space-horizontal ant-space-align-center"
                         style="display: flex; justify-content: flex-end; margin-left: 5px; gap: 8px;">
                        <div class="userDropdownTrigger ant-space-item" style="" id="userDropdownTrigger">{{ Auth::user()->username }}</div>
                        <div class="ant-space-item">
            <span role="img" aria-label="profile" class="anticon anticon-profile">
                <svg viewBox="64 64 896 896" focusable="false" data-icon="profile" width="1em" height="1em"
                     fill="currentColor" aria-hidden="true">
                    <!-- SVG path here -->
                </svg>
            </span>
                        </div>
                    </div>
                </a>

                <div>
                    <div id="userDropdownMenu" class="d-none ant-dropdown css-12jzuas ant-dropdown-show-arrow ant-dropdown-placement-bottomRight"
                         style="--arrow-x: 103.671875px; --arrow-y: -6px; inset: 66.9844px auto auto 1740.81px; box-sizing: border-box; min-width: 83.0312px; pointer-events: none;">
                        <div class="ant-dropdown-arrow">
                        </div>
                        <ul class="ant-dropdown-menu ant-dropdown-menu-root ant-dropdown-menu-vertical ant-dropdown-menu-light css-12jzuas"
                            role="menu" tabindex="0" data-menu-list="true">
                            <li class="ant-dropdown-menu-item ant-dropdown-menu-item-only-child" role="menuitem" tabindex="-1"
                                data-menu-id="rc-menu-uuid-74221-3-1"><span
                                    class="ant-dropdown-menu-title-content" >Change Password</span></li>
                            <li class="ant-dropdown-menu-item ant-dropdown-menu-item-only-child" role="menuitem" tabindex="-1"
                                data-menu-id="rc-menu-uuid-74221-3-2"><span class="ant-dropdown-menu-title-content">Logout</span></li>
                        </ul>
                        <div aria-hidden="true" style="display: none;"></div>
                    </div>
                </div>
                <style>
                    .d-none {
                        display: none;
                    }
                </style>

                <script>
                    $(".userDropdownTrigger").on('click', function (event) {
                        event.preventDefault();
                        //$('#userDropdownTrigger').on('click', function(){
                        console.log("99")
                        if ($('#userDropdownMenu').hasClass('d-none')) {
                            console.log("111")
                            $('#userDropdownMenu').removeClass('d-none')

                        }else{
                            console.log("222")
                            $('#userDropdownMenu').addClass('d-none')
                        }
                    });




                </script>
            </div>
        @endguest
    </div>
</div>

