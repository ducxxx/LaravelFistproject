<aside class="ant-layout-sider ant-layout-sider-dark"
       style="flex: 0 0 280px; max-width: 280px; min-width: 280px; width: 280px;">
    <div class="ant-layout-sider-children"><h3 class="ant-typography css-12jzuas"
                                               style="text-align: center; color: rgb(255, 255, 255); margin-top: 30px;">
            Book Over There</h3>
        <hr class="sc-fFGjHI cbAMKj">
        <ul class="ant-menu ant-menu-root ant-menu-inline ant-menu-dark css-12jzuas" role="menu"
            tabindex="0" data-menu-list="true" style="margin-top: 30px;">
            <li id="homePageItem" class="ant-menu-item {{ \Illuminate\Support\Facades\Route::is('homepage') ? 'ant-menu-item-selected' : '' }} " role="menuitem" tabindex="-1"
                data-menu-id="rc-menu-uuid-11402-1-" style="padding-left: 24px;"><span role="img"
                                                                                       aria-label="home"
                                                                                       class="anticon anticon-home ant-menu-item-icon"><svg
                        viewBox="64 64 896 896" focusable="false" data-icon="home" width="1em" height="1em"
                        fill="currentColor" aria-hidden="true"><path
                            d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 00-44.4 0L77.5 505a63.9 63.9 0 00-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0018.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7 23.1 23.1L882 542.3h-96.1z"></path></svg></span><span
                    class="ant-menu-title-content">Home Page</span></li>
            <script>
                // Get the list item element by ID
                var homePageItem = document.getElementById('homePageItem');

                // Add a click event listener to the list item
                homePageItem.addEventListener('click', function() {
                    // Redirect the user to the home page
                    window.location.href = '{{ route("homepage") }}';
                });
            </script>
            <li id="clubsListItem" class="ant-menu-item {{ \Illuminate\Support\Facades\Route::is('club.page') ? 'ant-menu-item-selected' : '' }} " role="menuitem" tabindex="-1"
                data-menu-id="rc-menu-uuid-11402-1-" style="padding-left: 24px;"><span role="img"
                                                                                       aria-label="home"
                                                                                       class="anticon anticon-home ant-menu-item-icon"><svg viewBox="64 64 896 896" focusable="false" data-icon="team" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M824.2 699.9a301.55 301.55 0 00-86.4-60.4C783.1 602.8 812 546.8 812 484c0-110.8-92.4-201.7-203.2-200-109.1 1.7-197 90.6-197 200 0 62.8 29 118.8 74.2 155.5a300.95 300.95 0 00-86.4 60.4C345 754.6 314 826.8 312 903.8a8 8 0 008 8.2h56c4.3 0 7.9-3.4 8-7.7 1.9-58 25.4-112.3 66.7-153.5A226.62 226.62 0 01612 684c60.9 0 118.2 23.7 161.3 66.8C814.5 792 838 846.3 840 904.3c.1 4.3 3.7 7.7 8 7.7h56a8 8 0 008-8.2c-2-77-33-149.2-87.8-203.9zM612 612c-34.2 0-66.4-13.3-90.5-37.5a126.86 126.86 0 01-37.5-91.8c.3-32.8 13.4-64.5 36.3-88 24-24.6 56.1-38.3 90.4-38.7 33.9-.3 66.8 12.9 91 36.6 24.8 24.3 38.4 56.8 38.4 91.4 0 34.2-13.3 66.3-37.5 90.5A127.3 127.3 0 01612 612zM361.5 510.4c-.9-8.7-1.4-17.5-1.4-26.4 0-15.9 1.5-31.4 4.3-46.5.7-3.6-1.2-7.3-4.5-8.8-13.6-6.1-26.1-14.5-36.9-25.1a127.54 127.54 0 01-38.7-95.4c.9-32.1 13.8-62.6 36.3-85.6 24.7-25.3 57.9-39.1 93.2-38.7 31.9.3 62.7 12.6 86 34.4 7.9 7.4 14.7 15.6 20.4 24.4 2 3.1 5.9 4.4 9.3 3.2 17.6-6.1 36.2-10.4 55.3-12.4 5.6-.6 8.8-6.6 6.3-11.6-32.5-64.3-98.9-108.7-175.7-109.9-110.9-1.7-203.3 89.2-203.3 199.9 0 62.8 28.9 118.8 74.2 155.5-31.8 14.7-61.1 35-86.5 60.4-54.8 54.7-85.8 126.9-87.8 204a8 8 0 008 8.2h56.1c4.3 0 7.9-3.4 8-7.7 1.9-58 25.4-112.3 66.7-153.5 29.4-29.4 65.4-49.8 104.7-59.7 3.9-1 6.5-4.7 6-8.7z"></path></svg></span><span
                    class="ant-menu-title-content">Clubs List</span></li>
            <script>
                // Get the list item element by ID
                var clubsListItem = document.getElementById('clubsListItem');

                // Add a click event listener to the list item
                clubsListItem.addEventListener('click', function() {
                    // Redirect the user to the home page
                    window.location.href = '{{ route("club.page") }}';
                });
            </script>
            @if(Auth::check())
                <li id="ordersListItem" class="ant-menu-item {{ \Illuminate\Support\Facades\Route::is('order.get.list') ? 'ant-menu-item-selected' : '' }} " role="menuitem" tabindex="-1"
                    data-menu-id="rc-menu-uuid-11402-1-" style="padding-left: 24px;"><span role="img"
                                                                                           aria-label="history"
                                                                                           class="anticon anticon-history ant-menu-item-icon"><svg
                            viewBox="64 64 896 896" focusable="false" data-icon="history" width="1em"
                            height="1em" fill="currentColor" aria-hidden="true"><path
                                d="M536.1 273H488c-4.4 0-8 3.6-8 8v275.3c0 2.6 1.2 5 3.3 6.5l165.3 120.7c3.6 2.6 8.6 1.9 11.2-1.7l28.6-39c2.7-3.7 1.9-8.7-1.7-11.2L544.1 528.5V281c0-4.4-3.6-8-8-8zm219.8 75.2l156.8 38.3c5 1.2 9.9-2.6 9.9-7.7l.8-161.5c0-6.7-7.7-10.5-12.9-6.3L752.9 334.1a8 8 0 003 14.1zm167.7 301.1l-56.7-19.5a8 8 0 00-10.1 4.8c-1.9 5.1-3.9 10.1-6 15.1-17.8 42.1-43.3 80-75.9 112.5a353 353 0 01-112.5 75.9 352.18 352.18 0 01-137.7 27.8c-47.8 0-94.1-9.3-137.7-27.8a353 353 0 01-112.5-75.9c-32.5-32.5-58-70.4-75.9-112.5A353.44 353.44 0 01171 512c0-47.8 9.3-94.2 27.8-137.8 17.8-42.1 43.3-80 75.9-112.5a353 353 0 01112.5-75.9C430.6 167.3 477 158 524.8 158s94.1 9.3 137.7 27.8A353 353 0 01775 261.7c10.2 10.3 19.8 21 28.6 32.3l59.8-46.8C784.7 146.6 662.2 81.9 524.6 82 285 82.1 92.6 276.7 95 516.4 97.4 751.9 288.9 942 524.8 942c185.5 0 343.5-117.6 403.7-282.3 1.5-4.2-.7-8.9-4.9-10.4z"></path></svg></span><span
                        class="ant-menu-title-content">Book History</span></li>
                <script>
                    // Get the list item element by ID
                    var ordersListItem = document.getElementById('ordersListItem');

                    // Add a click event listener to the list item
                    ordersListItem.addEventListener('click', function() {
                        // Redirect the user to the home page
                        window.location.href = '{{ route("order.get.list", ['user_id' => Auth::id()]) }}';
                    });
                </script>
                <li id="myProfileItem" class="ant-menu-item {{ \Illuminate\Support\Facades\Route::is('user.profile') ? 'ant-menu-item-selected' : '' }} " role="menuitem" tabindex="-1"
                    data-menu-id="rc-menu-uuid-11402-1-" style="padding-left: 24px;"><span role="img" aria-label="user"
                                                                                           class="anticon anticon-user ant-menu-item-icon"><svg
                            viewBox="64 64 896 896" focusable="false" data-icon="user" width="1em"
                            height="1em" fill="currentColor" aria-hidden="true"><path
                                d="M858.5 763.6a374 374 0 00-80.6-119.5 375.63 375.63 0 00-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 00-80.6 119.5A371.7 371.7 0 00136 901.8a8 8 0 008 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 008-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path></svg></span><span
                        class="ant-menu-title-content">My Profile</span></li>
                <script>
                    // Get the list item element by ID
                    var myProfileItem = document.getElementById('myProfileItem');

                    // Add a click event listener to the list item
                    myProfileItem.addEventListener('click', function() {
                        // Redirect the user to the home page
                        window.location.href = '{{ route("user.profile", ['user_id' => Auth::id()]) }}';
                    });
                </script>
            @endif


        </ul>
        <div aria-hidden="true" style="display: none;"></div>
        <div>
            <div style="position: absolute; right: 27px; bottom: 20px; font-size: 30px;"><span role="img"
                                                                                               aria-label="menu-fold"
                                                                                               tabindex="-1"
                                                                                               class="anticon anticon-menu-fold"
                                                                                               style="color: white;"><svg
                        viewBox="64 64 896 896" focusable="false" data-icon="menu-fold" width="1em"
                        height="1em"
                        fill="currentColor" aria-hidden="true"><path
                            d="M408 442h480c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8H408c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8zm-8 204c0 4.4 3.6 8 8 8h480c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8H408c-4.4 0-8 3.6-8 8v56zm504-486H120c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0 632H120c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zM115.4 518.9L271.7 642c5.8 4.6 14.4.5 14.4-6.9V388.9c0-7.4-8.5-11.5-14.4-6.9L115.4 505.1a8.74 8.74 0 000 13.8z"></path></svg></span>
            </div>
        </div>
    </div>
</aside>
