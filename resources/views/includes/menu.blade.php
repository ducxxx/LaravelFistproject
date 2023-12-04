<aside class="ant-layout-sider ant-layout-sider-dark"
       style="flex: 0 0 280px; max-width: 280px; min-width: 280px; width: 280px;">
    <div class="ant-layout-sider-children"><h3 class="ant-typography css-12jzuas"
                                               style="text-align: center; color: rgb(255, 255, 255); margin-top: 30px;">
            Book Over There</h3>
        <hr class="sc-fFGjHI cbAMKj">
        <ul class="ant-menu ant-menu-root ant-menu-inline ant-menu-dark css-12jzuas" role="menu"
            tabindex="0" data-menu-list="true" style="margin-top: 30px;">
            <li id="homePageItem" class="ant-menu-item ant-menu-item-selected" role="menuitem" tabindex="-1"
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
            <li class="ant-menu-submenu ant-menu-submenu-inline" role="none">
                <div role="menuitem" class="ant-menu-submenu-title" tabindex="-1" aria-expanded="false"
                     aria-haspopup="true" data-menu-id="rc-menu-uuid-11402-1-sub1"
                     aria-controls="rc-menu-uuid-11402-1-sub1-popup" style="padding-left: 24px;"><span
                        role="img" aria-label="team" class="anticon anticon-team ant-menu-item-icon"><svg
                            viewBox="64 64 896 896" focusable="false" data-icon="team" width="1em"
                            height="1em"
                            fill="currentColor" aria-hidden="true"><path
                                d="M824.2 699.9a301.55 301.55 0 00-86.4-60.4C783.1 602.8 812 546.8 812 484c0-110.8-92.4-201.7-203.2-200-109.1 1.7-197 90.6-197 200 0 62.8 29 118.8 74.2 155.5a300.95 300.95 0 00-86.4 60.4C345 754.6 314 826.8 312 903.8a8 8 0 008 8.2h56c4.3 0 7.9-3.4 8-7.7 1.9-58 25.4-112.3 66.7-153.5A226.62 226.62 0 01612 684c60.9 0 118.2 23.7 161.3 66.8C814.5 792 838 846.3 840 904.3c.1 4.3 3.7 7.7 8 7.7h56a8 8 0 008-8.2c-2-77-33-149.2-87.8-203.9zM612 612c-34.2 0-66.4-13.3-90.5-37.5a126.86 126.86 0 01-37.5-91.8c.3-32.8 13.4-64.5 36.3-88 24-24.6 56.1-38.3 90.4-38.7 33.9-.3 66.8 12.9 91 36.6 24.8 24.3 38.4 56.8 38.4 91.4 0 34.2-13.3 66.3-37.5 90.5A127.3 127.3 0 01612 612zM361.5 510.4c-.9-8.7-1.4-17.5-1.4-26.4 0-15.9 1.5-31.4 4.3-46.5.7-3.6-1.2-7.3-4.5-8.8-13.6-6.1-26.1-14.5-36.9-25.1a127.54 127.54 0 01-38.7-95.4c.9-32.1 13.8-62.6 36.3-85.6 24.7-25.3 57.9-39.1 93.2-38.7 31.9.3 62.7 12.6 86 34.4 7.9 7.4 14.7 15.6 20.4 24.4 2 3.1 5.9 4.4 9.3 3.2 17.6-6.1 36.2-10.4 55.3-12.4 5.6-.6 8.8-6.6 6.3-11.6-32.5-64.3-98.9-108.7-175.7-109.9-110.9-1.7-203.3 89.2-203.3 199.9 0 62.8 28.9 118.8 74.2 155.5-31.8 14.7-61.1 35-86.5 60.4-54.8 54.7-85.8 126.9-87.8 204a8 8 0 008 8.2h56.1c4.3 0 7.9-3.4 8-7.7 1.9-58 25.4-112.3 66.7-153.5 29.4-29.4 65.4-49.8 104.7-59.7 3.9-1 6.5-4.7 6-8.7z"></path></svg></span><span
                        class="ant-menu-title-content">Club</span><i class="ant-menu-submenu-arrow"></i>
                </div>
            </li>

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
