<div class="sidebar sidebar-style-2" data-background-color="{{ $settings->admin_theme_version == 'light' ? 'white' : 'dark2' }}">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
           @if (Auth::guard('admin')->user()->image != null)
             <img src="{{ asset('assets/saas/admin/img/admins/' . Auth::guard('admin')->user()->image) }}" alt="Admin Image" class="avatar-img rounded-circle">
           @else
            <img src="{{ asset('assets/saas/admin/img/blank_user.jpg') }}" alt="" class="avatar-img rounded-circle">
          @endif 
        </div>

        <div class="info">
          <a data-toggle="collapse" href="#adminProfileMenu" aria-expanded="true">
            <span>
              {{ Auth::guard('admin')->user()->first_name }}

              @if (is_null($roleInfo))
                <span class="user-level">{{ __('Super Admin') }}</span>
              @else
                <span class="user-level">{{ $roleInfo->name }}</span>
              @endif

              <span class="caret"></span>
            </span>
          </a>

          <div class="clearfix"></div>

          <div class="collapse in" id="adminProfileMenu">
            <ul class="nav">
              <li>
                <a href="{{ route('admin.edit_profile') }}">
                  <span class="link-collapse">{{ __('Edit Profile') }}</span>
                </a>
              </li>

              <li>
                <a href="{{ route('admin.change_password') }}">
                  <span class="link-collapse">{{ __('Change Password') }}</span>
                </a>
              </li>

              <li>
                <a href="{{ route('admin.logout') }}">
                  <span class="link-collapse">{{ __('Logout') }}</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      {{-- @php
        if (!is_null($roleInfo)) {
          $rolePermissions = json_decode($roleInfo->permissions);
        }
      @endphp --}}

      <ul class="nav nav-primary">
        {{-- search --}}
        <div class="row mb-3">
          <div class="col-12">
            <form action="">
              <div class="form-group py-0">
                <input name="term" type="text" class="form-control sidebar-search ltr" placeholder="Search Menu Here...">
              </div>
            </form>
          </div>
        </div>

        {{-- dashboard --}}
        <li class="nav-item @if (request()->routeIs('admin.dashboard')) active @endif">
          <a href="{{ route('admin.dashboard') }}">
            <i class="la flaticon-paint-palette"></i>
            <p>{{ __('Dashboard') }}</p>
          </a>
        </li>

          {{-- blog --}}
          <li class="nav-item @if (request()->routeIs('admin.tenant.index')) active 
           @endif"
          >
            <a data-toggle="collapse" href="#tenant_menue">
              <i class="fas fa-desktop"></i>
              <p>{{ __('Tenant Management') }}</p>
              <span class="caret"></span>
            </a>

            <div id="tenant_menue" class="collapse 
              @if (request()->routeIs('admin.tenant.index')) show 
           @endif"
            >
              <ul class="nav nav-collapse">
                <li class="{{ request()->routeIs('admin.tenant.index') ? 'active' : '' }}">
                  <a href="{{ route('admin.tenant.index', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('All Tenant') }}</span>
                  </a>
                </li>

              
              </ul>
            </div>
          </li>
          {{-- Package Features --}}
          <li class="nav-item @if (request()->routeIs('admin.package-feature.index')) active 
           @endif"
          >
            <a data-toggle="collapse" href="#package_feature_menue">
              <i class="fas fa-desktop"></i>
              <p>{{ __('Package  Management') }}</p>
              <span class="caret"></span>
            </a>

            <div id="package_feature_menue" class="collapse 
              @if (request()->routeIs('admin.package-feature.index')) show 
           @endif"
            >
              <ul class="nav nav-collapse">
                <li class="{{ request()->routeIs('admin.package-feature.index') ? 'active' : '' }}">
                  <a href="{{ route('admin.package-feature.index') }}">
                    <span class="sub-item">{{ __('Package Features') }}</span>
                  </a>
                </li>
                <li class="{{ request()->routeIs('admin.package.index') ? 'active' : '' }}">
                  <a href="{{ route('admin.package.index') }}">
                    <span class="sub-item">{{ __('Packages') }}</span>
                  </a>
                </li>

              
              </ul>
            </div>
          </li>
              {{-- menu builder --}}
          <li class="nav-item @if (request()->routeIs('admin.menu_builder')) active @endif">
            <a href="{{ route('admin.menu_builder', ['language' => $defaultLang->code]) }}">
              <i class="fal fa-bars"></i>
              <p>{{ __('Menu Builder') }}</p>
            </a>
          </li>

    {{-- home page --}}
          <li class="nav-item @if (request()->routeIs('admin.home_page.hero_section')) active 
            @elseif (request()->routeIs('admin.home_page.section_titles')) active 
            @elseif (request()->routeIs('admin.home_page.action_section')) active 
            @elseif (request()->routeIs('admin.home_page.features_section')) active 
            @elseif (request()->routeIs('admin.home_page.video_section')) active 
            @elseif (request()->routeIs('admin.home_page.work_process')) active 
            @elseif (request()->routeIs('admin.home_page.testimonials_section')) active 
            @elseif (request()->routeIs('admin.home_page.newsletter_section')) active 
            @elseif (request()->routeIs('admin.home_page.about_us_section')) active 
            @elseif (request()->routeIs('admin.home_page.course_categories_section')) active 
            @elseif (request()->routeIs('admin.home_page.partner_section')) active 
            @elseif (request()->routeIs('admin.home_page.section_customization')) active @endif"
          >
            <a data-toggle="collapse" href="#home_page">
              <i class="fal fa-layer-group"></i>
              <p>{{ __('Home Page') }}</p>
              <span class="caret"></span>
            </a>

            <div id="home_page" class="collapse 
              @if (request()->routeIs('admin.home_page.hero_section')) show 
              @elseif (request()->routeIs('admin.home_page.section_titles')) show 
              @elseif (request()->routeIs('admin.home_page.action_section')) show 
              @elseif (request()->routeIs('admin.home_page.features_section')) show 
              @elseif (request()->routeIs('admin.home_page.video_section')) show 
              @elseif (request()->routeIs('admin.home_page.work_process')) show 
              @elseif (request()->routeIs('admin.home_page.testimonials_section')) show 
              @elseif (request()->routeIs('admin.home_page.newsletter_section')) show 
              @elseif (request()->routeIs('admin.home_page.about_us_section')) show 
              @elseif (request()->routeIs('admin.home_page.course_categories_section')) show 
              @elseif (request()->routeIs('admin.home_page.course_partner_section')) show 
              @elseif (request()->routeIs('admin.home_page.section_customization')) show @endif"
            >
              <ul class="nav nav-collapse">
                <li class="{{ request()->routeIs('admin.home_page.hero_section') ? 'active' : '' }}">
                  <a href="{{ route('admin.home_page.hero_section', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Hero Section') }}</span>
                  </a>
                </li>
           

                <li class="{{ request()->routeIs('admin.home_page.section_titles') ? 'active' : '' }}">
                  <a href="{{ route('admin.home_page.section_titles', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Section Titles') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.home_page.action_section') ? 'active' : '' }}">
                  <a href="{{ route('admin.home_page.action_section', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Call To Action Section') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.home_page.features_section') ? 'active' : '' }}">
                  <a href="{{ route('admin.home_page.features_section', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Features Section') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.home_page.video_section') ? 'active' : '' }}">
                  <a href="{{ route('admin.home_page.video_section', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Video Section') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.home_page.work_process') ? 'active' : '' }}">
                  <a href="{{ route('admin.home_page.work_process', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Work Process Section') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.home_page.testimonials_section') ? 'active' : '' }}">
                  <a href="{{ route('admin.home_page.testimonials_section', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Testimonials Section') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.home_page.newsletter_section') ? 'active' : '' }}">
                  <a href="{{ route('admin.home_page.newsletter_section', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Newsletter Section') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.home_page.about_us_section') ? 'active' : '' }}">
                  <a href="{{ route('admin.home_page.about_us_section', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('About Us Section') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.home_page.course_categories_section') ? 'active' : '' }}">
                  <a href="{{ route('admin.home_page.course_categories_section') }}">
                    <span class="sub-item">{{ __('Course Categories Section') }}</span>
                  </a>
                </li>
     <li class="{{ request()->routeIs('admin.home_page.partner_section') ? 'active' : '' }}">
                  <a href="{{ route('admin.home_page.partner_section', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Partners') }}</span>
                  </a>
                </li>
                <li class="{{ request()->routeIs('admin.home_page.section_customization') ? 'active' : '' }}">
                  <a href="{{ route('admin.home_page.section_customization') }}">
                    <span class="sub-item">{{ __('Section Customization') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
   
     
        {{-- footer --}}
          <li class="nav-item @if (request()->routeIs('admin.footer.content')) active 
            @elseif (request()->routeIs('admin.footer.quick_links')) active @endif"
          >
            <a data-toggle="collapse" href="#footer">
              <i class="fal fa-shoe-prints"></i>
              <p>{{ __('Footer') }}</p>
              <span class="caret"></span>
            </a>

            <div id="footer" class="collapse @if (request()->routeIs('admin.footer.content')) show 
              @elseif (request()->routeIs('admin.footer.quick_links')) show @endif"
            >
              <ul class="nav nav-collapse">
                <li class="{{ request()->routeIs('admin.footer.content') ? 'active' : '' }}">
                  <a href="{{ route('admin.footer.content', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Content & Color') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.footer.quick_links') ? 'active' : '' }}">
                  <a href="{{ route('admin.footer.quick_links', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Quick Links') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          
        {{-- advertise --}}
          <li class="nav-item @if (request()->routeIs('admin.advertise.settings')) active 
            @elseif (request()->routeIs('admin.advertise.advertisements')) active @endif"
          >
            <a data-toggle="collapse" href="#advertise">
              <i class="fab fa-buysellads"></i>
              <p>{{ __('Ads') }}</p>
              <span class="caret"></span>
            </a>

            <div id="advertise" class="collapse @if (request()->routeIs('admin.advertise.settings')) show 
              @elseif (request()->routeIs('admin.advertise.advertisements')) show @endif"
            >
              <ul class="nav nav-collapse">
                <li class="{{ request()->routeIs('admin.advertise.settings') ? 'active' : '' }}">
                  <a href="{{ route('admin.advertise.settings') }}">
                    <span class="sub-item">{{ __('Settings') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.advertise.advertisements') ? 'active' : '' }}">
                  <a href="{{ route('admin.advertise.advertisements') }}">
                    <span class="sub-item">{{ __('Advertisements') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
 
         {{-- announcement popup --}}
          <li class="nav-item @if (request()->routeIs('admin.announcement_popups')) active 
            @elseif (request()->routeIs('admin.announcement_popups.select_popup_type')) active 
            @elseif (request()->routeIs('admin.announcement_popups.create_popup')) active 
            @elseif (request()->routeIs('admin.announcement_popups.edit_popup')) active @endif"
          >
            <a href="{{ route('admin.announcement_popups', ['language' => $defaultLang->code]) }}">
              <i class="fal fa-bullhorn"></i>
              <p>{{ __('Announcement Popups') }}</p>
            </a>
          </li>
     

         {{-- payment gateway --}}
          <li class="nav-item @if (request()->routeIs('admin.payment_gateways.online_gateways')) active 
            @elseif (request()->routeIs('admin.payment_gateways.offline_gateways')) active @endif"
          >
            <a data-toggle="collapse" href="#payment_gateways">
              <i class="la flaticon-paypal"></i>
              <p>{{ __('Payment Gateways') }}</p>
              <span class="caret"></span>
            </a>

            <div id="payment_gateways" class="collapse 
              @if (request()->routeIs('admin.payment_gateways.online_gateways')) show 
              @elseif (request()->routeIs('admin.payment_gateways.offline_gateways')) show @endif"
            >
              <ul class="nav nav-collapse">
                <li class="{{ request()->routeIs('admin.payment_gateways.online_gateways') ? 'active' : '' }}">
                  <a href="{{ route('admin.payment_gateways.online_gateways') }}">
                    <span class="sub-item">{{ __('Online Gateways') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.payment_gateways.offline_gateways') ? 'active' : '' }}">
                  <a href="{{ route('admin.payment_gateways.offline_gateways') }}">
                    <span class="sub-item">{{ __('Offline Gateways') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>


   



        {{-- basic settings --}}
          <li class="nav-item @if (request()->routeIs('admin.basic_settings.favicon')) active
            @elseif (request()->routeIs('admin.basic_settings.logo')) active
            @elseif (request()->routeIs('admin.basic_settings.information')) active
            @elseif (request()->routeIs('admin.basic_settings.theme_and_home')) active
            @elseif (request()->routeIs('admin.basic_settings.currency')) active
            @elseif (request()->routeIs('admin.basic_settings.appearance')) active
            @elseif (request()->routeIs('admin.basic_settings.mail_from_admin')) active
            @elseif (request()->routeIs('admin.basic_settings.mail_to_admin')) active
            @elseif (request()->routeIs('admin.basic_settings.mail_templates')) active
            @elseif (request()->routeIs('admin.basic_settings.edit_mail_template')) active
            @elseif (request()->routeIs('admin.basic_settings.breadcrumb')) active
            @elseif (request()->routeIs('admin.basic_settings.plugins')) active
            @elseif (request()->routeIs('admin.basic_settings.seo')) active
            @elseif (request()->routeIs('admin.basic_settings.maintenance_mode')) active
            @elseif (request()->routeIs('admin.basic_settings.cookie_alert')) active
            @elseif (request()->routeIs('admin.basic_settings.footer_logo')) active 
            @elseif (request()->routeIs('admin.basic_settings.social_medias')) active @endif"
          >
            <a data-toggle="collapse" href="#basic_settings">
              <i class="la flaticon-settings"></i>
              <p>{{ __('Basic Settings') }}</p>
              <span class="caret"></span>
            </a>

            <div id="basic_settings" class="collapse 
              @if (request()->routeIs('admin.basic_settings.favicon')) show
              @elseif (request()->routeIs('admin.basic_settings.logo')) show
              @elseif (request()->routeIs('admin.basic_settings.information')) show
              @elseif (request()->routeIs('admin.basic_settings.theme_and_home')) show
              @elseif (request()->routeIs('admin.basic_settings.currency')) show
              @elseif (request()->routeIs('admin.basic_settings.appearance')) show
              @elseif (request()->routeIs('admin.basic_settings.mail_from_admin')) show
              @elseif (request()->routeIs('admin.basic_settings.mail_to_admin')) show
              @elseif (request()->routeIs('admin.basic_settings.mail_templates')) show
              @elseif (request()->routeIs('admin.basic_settings.edit_mail_template')) show
              @elseif (request()->routeIs('admin.basic_settings.breadcrumb')) show
              @elseif (request()->routeIs('admin.basic_settings.plugins')) show
              @elseif (request()->routeIs('admin.basic_settings.seo')) show
              @elseif (request()->routeIs('admin.basic_settings.maintenance_mode')) show
              @elseif (request()->routeIs('admin.basic_settings.cookie_alert')) show
              @elseif (request()->routeIs('admin.basic_settings.footer_logo')) show 
              @elseif (request()->routeIs('admin.basic_settings.social_medias')) show @endif"
            >
              <ul class="nav nav-collapse">
                <li class="{{ request()->routeIs('admin.basic_settings.favicon') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.favicon') }}">
                    <span class="sub-item">{{ __('Favicon') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.basic_settings.logo') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.logo') }}">
                    <span class="sub-item">{{ __('Logo') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.basic_settings.information') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.information') }}">
                    <span class="sub-item">{{ __('Information') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.basic_settings.theme_and_home') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.theme_and_home') }}">
                    <span class="sub-item">{{ __('Theme & Home') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.basic_settings.currency') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.currency') }}">
                    <span class="sub-item">{{ __('Currency') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.basic_settings.appearance') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.appearance') }}">
                    <span class="sub-item">{{ __('Website Appearance') }}</span>
                  </a>
                </li>

                <li class="submenu">
                  <a data-toggle="collapse" href="#mail_settings">
                    <span class="sub-item">{{ __('Email Settings') }}</span>
                    <span class="caret"></span>
                  </a>

                  <div id="mail_settings" class="collapse 
                    @if (request()->routeIs('admin.basic_settings.mail_from_admin')) show 
                    @elseif (request()->routeIs('admin.basic_settings.mail_to_admin')) show
                    @elseif (request()->routeIs('admin.basic_settings.mail_templates')) show
                    @elseif (request()->routeIs('admin.basic_settings.edit_mail_template')) show @endif"
                  >
                    <ul class="nav nav-collapse subnav">
                      <li class="{{ request()->routeIs('admin.basic_settings.mail_from_admin') ? 'active' : '' }}">
                        <a href="{{ route('admin.basic_settings.mail_from_admin') }}">
                          <span class="sub-item">{{ __('Mail From Admin') }}</span>
                        </a>
                      </li>

                      <li class="{{ request()->routeIs('admin.basic_settings.mail_to_admin') ? 'active' : '' }}">
                        <a href="{{ route('admin.basic_settings.mail_to_admin') }}">
                          <span class="sub-item">{{ __('Mail To Admin') }}</span>
                        </a>
                      </li>

                      <li class="@if (request()->routeIs('admin.basic_settings.mail_templates')) active 
                        @elseif (request()->routeIs('admin.basic_settings.edit_mail_template')) active @endif"
                      >
                        <a href="{{ route('admin.basic_settings.mail_templates') }}">
                          <span class="sub-item">{{ __('Mail Templates') }}</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="{{ request()->routeIs('admin.basic_settings.breadcrumb') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.breadcrumb') }}">
                    <span class="sub-item">{{ __('Breadcrumb') }}</span>
                  </a>
                </li>

            

                <li class="{{ request()->routeIs('admin.basic_settings.plugins') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.plugins') }}">
                    <span class="sub-item">{{ __('Plugins') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.basic_settings.seo') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.seo', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('SEO Informations') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.basic_settings.maintenance_mode') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.maintenance_mode') }}">
                    <span class="sub-item">{{ __('Maintenance Mode') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.basic_settings.cookie_alert') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.cookie_alert', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Cookie Alert') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.basic_settings.footer_logo') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.footer_logo') }}">
                    <span class="sub-item">{{ __('Footer Logo') }}</span>
                  </a>
                </li>

                <li class="{{ request()->routeIs('admin.basic_settings.social_medias') ? 'active' : '' }}">
                  <a href="{{ route('admin.basic_settings.social_medias') }}">
                    <span class="sub-item">{{ __('Social Medias') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          {{-- faq --}}
          <li class="nav-item {{ request()->routeIs('admin.faq_management') ? 'active' : '' }}">
            <a href="{{ route('admin.faq_management', ['language' => $defaultLang->code]) }}">
              <i class="la flaticon-round"></i>
              <p>{{ __('FAQ Management') }}</p>
            </a>
          </li>
  {{-- blog --}}
          <li class="nav-item @if (request()->routeIs('admin.blog_management.categories')) active 
            @elseif (request()->routeIs('admin.blog_management.blogs')) active 
            @elseif (request()->routeIs('admin.blog_management.create_blog')) active 
            @elseif (request()->routeIs('admin.blog_management.edit_blog')) active @endif"
          >
            <a data-toggle="collapse" href="#blog">
              <i class="fal fa-blog"></i>
              <p>{{ __('Blog Management') }}</p>
              <span class="caret"></span>
            </a>

            <div id="blog" class="collapse 
              @if (request()->routeIs('admin.blog_management.categories')) show 
              @elseif (request()->routeIs('admin.blog_management.blogs')) show 
              @elseif (request()->routeIs('admin.blog_management.create_blog')) show 
              @elseif (request()->routeIs('admin.blog_management.edit_blog')) show @endif"
            >
              <ul class="nav nav-collapse">
                <li class="{{ request()->routeIs('admin.blog_management.categories') ? 'active' : '' }}">
                  <a href="{{ route('admin.blog_management.categories', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Categories') }}</span>
                  </a>
                </li>

                <li class="@if (request()->routeIs('admin.blog_management.blogs')) active 
                  @elseif (request()->routeIs('admin.blog_management.create_blog')) active 
                  @elseif (request()->routeIs('admin.blog_management.edit_blog')) active @endif"
                >
                  <a href="{{ route('admin.blog_management.blogs', ['language' => $defaultLang->code]) }}">
                    <span class="sub-item">{{ __('Blog') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
     
       {{-- custom page --}}
          <li class="nav-item @if (request()->routeIs('admin.custom_pages')) active 
            @elseif (request()->routeIs('admin.custom_pages.create_page')) active 
            @elseif (request()->routeIs('admin.custom_pages.edit_page')) active @endif"
          >
            <a href="{{ route('admin.custom_pages', ['language' => $defaultLang->code]) }}">
              <i class="la flaticon-file"></i>
              <p>{{ __('Custom Pages') }}</p>
            </a>
          </li>
   
        {{-- language --}}
          <li class="nav-item @if (request()->routeIs('admin.language_management')) active 
            @elseif (request()->routeIs('admin.language_management.edit_keyword')) active @endif"
          >
            <a href="{{ route('admin.language_management') }}">
              <i class="fal fa-language"></i>
              <p>{{ __('Language Management') }}</p>
            </a>
          </li>


       

      </ul>
    </div>
  </div>
</div>
