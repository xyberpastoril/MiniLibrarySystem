<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">

    <!--begin::Aside toolbar-->
    {{-- <div class="aside-toolbar py-5" id="kt_aside_toolbar">
        <div class="d-flex align-items-center flex-stack">
            <!-- Select Theme -->
            <div class="me-3 flex-row-fluid">
                <select class="form-select form-select-white" data-control="select2" data-placeholder="Select Project" data-hide-search="true">
                    <option value="1" selected="selected">Light Theme</option>
                    <option value="2">Dark Theme</option>
                </select>
            </div>
        </div>
    </div> --}}
    <!--end::Aside toolbar-->

    <!--begin::Aside Menu-->
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}" data-kt-scroll-offset="0">

            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold" id="#kt_aside_menu" data-kt-menu="true">

                <!-- Dashboard -->
                <div class="menu-item">
                    <a class="menu-link
                        @if(Route::currentRouteName() == 'home' )
                        active
                        @endif "
                    href="{{ route('home') }}">
                        <span class="menu-icon">
                            <!-- Svg Icon | path: ../../assets/media/icons/duotune/general/gen008.svg-->
                            <span class="svg-icon svg-icon-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black"/>
                                    <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black"/>
                                    <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black"/>
                                    <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">
                            @role('Member')
                                Home
                            @else
                                Dashboard
                            @endrole
                        </span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link
                        @if(Route::currentRouteName() == 'books.index' ||
                            Route::currentRouteName() == 'books.edit' ||
                            Route::currentRouteName() == 'books.show' ||
                            Route::currentRouteName() == 'home.search')
                            active
                        @endif"
                    href="@role('Librarian') {{ route('books.index') }} @endrole @role('Member') {{ route('home.search') }} @endrole @role('Unverified Member') {{ route('home.search') }} @endrole">
                        <span class="menu-icon">
                            <!-- Svg Icon | path: ../../assets/media/icons/duotune/files/fil012.svg-->
                            <span class="svg-icon svg-icon-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black"/>
                                    <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="black"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Books</span>
                    </a>
                </div>

                <!-- Users -->
                @role('Librarian')
                <div class="menu-item">
                    <a class="menu-link
                        @if(Route::currentRouteName() == 'users.index' ||
                            Route::currentRouteName() == 'users.edit')
                            active
                        @endif"
                        href="{{ route('users.index') }}"> <!-- users-page.html route('admin.users') -->
                        <span class="menu-icon">
                            <!-- Svg Icon | path: ../../assets/media/icons/duotune/arrows/arr001.svg-->
                            <span class="svg-icon svg-icon-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="black"/>
                                    <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black"/>
                                    <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="black"/>
                                    <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Users</span>
                    </a>
                </div>
                @endrole

                <!-- Transactions -->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion
                    @if(Route::currentRouteName() == "transactions.waiting_for_approval" ||
                        Route::currentRouteName() == "transactions.in_progress" ||
                        Route::currentRouteName() == "transactions.history")
                        show here
                    @endif
                ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!-- Svg Icon | path: ../../assets/media/icons/duotune/arrows/arr001.svg-->
                            <span class="svg-icon svg-icon-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M11 6.5C11 9 9 11 6.5 11C4 11 2 9 2 6.5C2 4 4 2 6.5 2C9 2 11 4 11 6.5ZM17.5 2C15 2 13 4 13 6.5C13 9 15 11 17.5 11C20 11 22 9 22 6.5C22 4 20 2 17.5 2ZM6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13ZM17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13Z" fill="black"/>
                                    <path d="M17.5 16C17.5 16 17.4 16 17.5 16L16.7 15.3C16.1 14.7 15.7 13.9 15.6 13.1C15.5 12.4 15.5 11.6 15.6 10.8C15.7 9.99999 16.1 9.19998 16.7 8.59998L17.4 7.90002H17.5C18.3 7.90002 19 7.20002 19 6.40002C19 5.60002 18.3 4.90002 17.5 4.90002C16.7 4.90002 16 5.60002 16 6.40002V6.5L15.3 7.20001C14.7 7.80001 13.9 8.19999 13.1 8.29999C12.4 8.39999 11.6 8.39999 10.8 8.29999C9.99999 8.19999 9.20001 7.80001 8.60001 7.20001L7.89999 6.5V6.40002C7.89999 5.60002 7.19999 4.90002 6.39999 4.90002C5.59999 4.90002 4.89999 5.60002 4.89999 6.40002C4.89999 7.20002 5.59999 7.90002 6.39999 7.90002H6.5L7.20001 8.59998C7.80001 9.19998 8.19999 9.99999 8.29999 10.8C8.39999 11.5 8.39999 12.3 8.29999 13.1C8.19999 13.9 7.80001 14.7 7.20001 15.3L6.5 16H6.39999C5.59999 16 4.89999 16.7 4.89999 17.5C4.89999 18.3 5.59999 19 6.39999 19C7.19999 19 7.89999 18.3 7.89999 17.5V17.4L8.60001 16.7C9.20001 16.1 9.99999 15.7 10.8 15.6C11.5 15.5 12.3 15.5 13.1 15.6C13.9 15.7 14.7 16.1 15.3 16.7L16 17.4V17.5C16 18.3 16.7 19 17.5 19C18.3 19 19 18.3 19 17.5C19 16.7 18.3 16 17.5 16Z" fill="black"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Transactions</span>
                        <span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion menu-active-bg
                    @if(Route::currentRouteName() == "transactions.waiting_for_approval" ||
                        Route::currentRouteName() == "transactions.in_progress" ||
                        Route::currentRouteName() == "transactions.history")
                        show
                    @endif
                    ">
                        <div class="menu-item">
                            <a class="menu-link @if(Route::currentRouteName() == "transactions.waiting_for_approval") active @endif" href="{{ route('transactions.waiting_for_approval') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Waiting for Approval</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if(Route::currentRouteName() == "transactions.in_progress") active @endif" href="{{ route('transactions.in_progress') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">In Progress</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if(Route::currentRouteName() == "transactions.history") active @endif" href="{{ route('transactions.history') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">History</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Account -->
                <div data-kt-menu-trigger="click" class="menu-item here menu-accordion
                @if(Route::currentRouteName() == "account.overview" ||
                    Route::currentRouteName() == "account.settings")
                    show
                @endif
                ">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!-- Svg Icon | path: ../../assets/media/icons/duotune/communication/com006.svg-->
                            <span class="svg-icon svg-icon-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black"/>
                                    <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Account</span>
                        <span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @if(Route::currentRouteName() == "account.overview") active @endif" href="{{ route('account.overview') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Overview</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if(Route::currentRouteName() == "account.settings") active @endif" href="{{ route('account.settings') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Settings</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Menu-->

        </div>
    </div>
    <!--end::Aside Menu-->

    <!--begin::Aside Footer-->
    <div class="aside-footer flex-column-auto pb-5" id="kt_aside_footer">
        <div class="aside-user">

            <!--begin::User-->
            <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">

                <!--begin::Hover Content-->
                <div class="me-5">
                    <div class="symbol symbol-40px cursor-pointer" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-overflow="true">
                        <img alt="Logo" src="@if(Auth::user()->cover_url == null) {{ asset("media/avatars/blank.png") }} @else {{ asset("media/avatars/" . Auth::user()->cover_url . "") }} @endif">
                    </div>

                    <!--begin:: Hover Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">

                        <!-- Menu item -->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">

                                <!-- Avatar -->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="@if(Auth::user()->cover_url == null) {{ asset("media/avatars/blank.png") }} @else {{ asset("media/avatars/" . Auth::user()->cover_url . "") }} @endif">
                                </div>

                                <!-- Username -->
                                <div class="d-flex flex-column">
                                    <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->first_name . " " . Auth::user()->last_name }}
                                    <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ Auth::user()->getRoleNames()[0] }}</span></div>
                                    <p class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</p>
                                </div>

                            </div>
                        </div>

                        <!-- Menu separator -->
                        <div class="separator my-2"></div>

                        <!-- Menu item -->
                        <div class="menu-item px-5">
                            <a href="{{ route('account.overview') }}" class="menu-link px-5">My Profile</a>
                        </div>

                        <!-- Menu separator -->
                        <div class="separator my-2"></div>


                        <!-- Menu item -->
                        <div class="menu-item px-5 my-1">
                            <a href="{{ route('account.settings') }}" class="menu-link px-5">Account Settings</a>
                        </div>

                        <!-- Menu item -->
                        <div class="menu-item px-5">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="menu-link px-5">Sign Out</a> <!-- ../authentication/sign-in.html route("sign_in") -->
                        </div>

                        <!-- Menu separator -->
                        <div class="separator my-2"></div>

                        <!-- Menu item | Dark Mode-->
                        {{-- <div class="menu-item px-5">
                            <div class="menu-content px-5">
                                <label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode" id="kt_user_menu_dark_mode_toggle" data-kt-url="/good/dark/index.html">
                                    <span class="pulse-ring ms-n1"></span>
                                    <span class="form-check-label text-gray-600 fs-7">Dark Mode</span>
                                </label>
                            </div>
                        </div> --}}

                    </div>
                    <!--end:: Hover Menu-->

                </div>
                <!--end::Hover Content-->

                <!--begin:: User Section-->
                <div class="flex-row-fluid flex-wrap">
                    <div class="d-flex align-items-center flex-stack">
                        <!--begin::Info-->
                        <div class="me-2">
                            <!--begin::Username-->
                            <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold lh-0">{{ Auth::user()->username }}</a>
                            <!--end::Username-->
                            <!--begin::Description-->
                            <span class="text-gray-400 fw-bold d-block fs-8">{{ Auth::user()->getRoleNames()[0] }}</span>
                            <!--end::Description-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Sign-out-->
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="btn btn-icon btn-active-color-primary me-n4" data-bs-toggle="tooltip" title="End session and singout"> <!-- ../authentication/sign-in.html route("sign_in") -->
                            <span class="svg-icon svg-icon-2 svg-icon-gray-400">

                                <!-- Svg Icon | path: ../assests/media/icons/duotune/arrows/arr076.svg -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(-1 0 0 1 15.5 11)" fill="black"/>
                                    <path d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z" fill="black"/>
                                    <path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="#C4C4C4"/>
                                </svg>

                            </span>
                        </a>
                        <!--end::Sign-out-->
                    </div>
                </div>
                <!--end:: User Section-->

            </div>
            <!--end::User-->

        </div>
    </div>
    <!--end::Aside Footer-->

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

</div>


