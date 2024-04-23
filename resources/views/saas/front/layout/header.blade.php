<!-- Header Start -->
<header class="header-area">
    <!-- Start mobile menu -->
    <div class="mobile-menu d-xl-none">
        <div class="container">
            <div class="mobile-menu-wrapper"></div>
        </div>
    </div>
    <!-- End mobile menu -->

    <div class="main-responsive-nav">
        <div class="container">
            <!-- Mobile Logo -->
            <div class="logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('assets/saas/admin/img/' . $websiteInfo->logo) }}" alt="logo">
                </a>
            </div>
            <!-- Menu toggle button -->
            <button class="menu-toggler" type="button">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
    <div class="main-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('index') }}">
                 <img src="{{ asset('assets/saas/admin/img/' . $websiteInfo->logo) }}" alt="logo">
                </a>
                <!-- Navigation items -->
                <div class="collapse navbar-collapse">
                    <ul id="mainMenu" class="navbar-nav mobile-item">
     @php $menuDatas = json_decode($menuInfos); @endphp

              @foreach ($menuDatas as $menuData)
                @php $href = get_href($menuData); @endphp

                @if (!property_exists($menuData, 'children'))
                  <li class="nav-item">
                    <a class="nav-link " href="{{ $href }}">{{ $menuData->text }}</a>
                  </li>
                @else
                  <li class="nav-item ">
                    <a class="nav-link toggle" href="{{ $href }}">{{ $menuData->text }} <i class="fal fa-plus"></i></a>
                    <ul class="menu-dropdown">
                      @php $childMenuDatas = $menuData->children; @endphp

                      @foreach ($childMenuDatas as $childMenuData)
                        @php $child_href = get_href($childMenuData); @endphp

                        <li class="nav-item">
                          <a class="nav-link" href="{{ $child_href }}">{{ $childMenuData->text }}</a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                @endif
              @endforeach
              
                     {{--    <li class="nav-item">
                            <a class="nav-link " target="_self" href="{{ route('index') }}">{{ __('Home') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " target="_self" href="listings.html">For schools</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " target="_self" href="pricing.html">Mission</a>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <a class="nav-link toggle" target="_self" href="#">Pages<i
                                    class="fal fa-plus"></i></a>
                            <ul class="menu-dropdown">
                                <li class="nav-item">
                                    <a class="nav-link" href="p/about-us.html" target="_self">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="p/terms-%26-conditions.html" target="_self">Terms &amp;
                                        Conditions</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " target="_self" href="blogs.html">Blog</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " target="_self" href="faqs.html">FAQs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " target="_self" href="contact.html">Contact</a>
                        </li> --}}
                    </ul>
                </div>
                <div class="more-option mobile-item">
                    <div class="item">
                      {{-- @guest('web')
              <li><a href="{{ route('user.login') }}"><i class="fal fa-sign-in-alt"></i> <span>{{ __('Login') }}</span></a></li>
              <li><a href="{{ route('user.signup') }}"><i class="fal fa-user-plus"></i> <span>{{ __('Signup') }}</span></a></li>
            @endguest

            @auth('web')
              @php $authUserInfo = Auth::guard('web')->user(); @endphp

              <li><a href="{{ route('user.dashboard') }}"><i class="fal fa-user"></i> <span>{{ $authUserInfo->username }}</span></a></li>
              <li><a href="{{ route('user.logout') }}"><i class="fal fa-sign-out-alt"></i> <span>{{ __('Logout') }}</span></a></li>
            @endauth --}}
            @guest('web')
                        <a href="{{ route('user.login') }}" class="btn primary-btn">
                            <span>{{ __('Login') }}</span>

                        </a>
                          @endguest
                    </div>
                    <div class="item">
                        <div class="language">
                         <form action="{{ route('change_language') }}" method="GET">
            <select class="olima_select  nice-select"name="lang_code" onchange="this.form.submit()">
              @foreach ($allLanguageInfos as $languageInfo)
                <option value="{{ $languageInfo->code }}" {{ $languageInfo->code == $currentLanguageInfo->code ? 'selected' : '' }}>
                  {{ $languageInfo->name }}
                </option>
              @endforeach
            </select>
          </form>
                            
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- Header End -->
