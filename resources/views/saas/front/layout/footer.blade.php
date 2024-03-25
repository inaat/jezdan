  <!-- Footer Area -->
  <footer class="footer-area">
      <div class="footer-top pt-120 pb-90">
          <div class="container">
              <div class="row">
                  <div class="col-lg-3 col-md-12">
                      <div class="footer-widget" data-aos="fade-up" data-aos-delay="100">
                          <div class="navbar-brand">
                              <a href="{{ route('index') }}">
                                  <img src="{{ asset('assets/saas/admin/img/' . $websiteInfo->logo) }}" alt="logo">

                              </a>
                          </div>
                            @if (!is_null($footerInfo))
         
                <p>{{ $footerInfo->about_company }}</p>
           
            @endif
                          <div class="social-link">


                          </div>
                      </div>
                  </div>
                  <div class="col-lg-1 col-md-1"></div>
                  <div class="col-lg-2 col-md-3 col-sm-6">
                      <div class="footer-widget" data-aos="fade-up" data-aos-delay="200">
                          <h3>{{ __('Useful Links') }}</h3>
                             

                                  @if (count($quickLinkInfos) == 0)
                                  <h6 class="text-light">{{ __('No Link Found') . '!' }}</h6>
                                  @else
                                  <ul class="footer-links">
                                      @foreach ($quickLinkInfos as $quickLinkInfo)
                                      <li><a href="{{ $quickLinkInfo->url }}"><i class="fal fa-angle-right"></i> {{ $quickLinkInfo->title }}</a></li>
                                      @endforeach
                                  </ul>
                                  @endif
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="footer-widget" data-aos="fade-up" data-aos-delay="400">
                          <h3> Contact Info</h3>

                          <ul class="info-list">
                              <li>
                                  <i class="fal fa-map-marker-alt"></i>
                                  <span>{{ !empty($basicInfo->address) ? $basicInfo->address : '' }}</span>
                              </li>
                              <li>
                                  <i class="fal fa-phone"></i>
                                  <a href="tel:+8434197502">{{ !empty($basicInfo->contact_number) ? $basicInfo->contact_number : '' }}</a>
                                  
                              </li>
                              <li>
                                  <i class="fal fa-envelope"></i>
                                  <a href="{{ !empty($basicInfo->email_address) ? $basicInfo->email_address : '' }}">{{ !empty($basicInfo->email_address) ? $basicInfo->email_address : '' }}</a>
                                  
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="footer-widget" data-aos="fade-up" data-aos-delay="500">
  @if (!empty($newsletterTitle))
                <h3 >{{ $newsletterTitle }}</h3>
              @endif                          <p>Get latest updates first</p>
              <form class="subscribeForm" id="footerSubscriber"  action="{{ route('store_subscriber') }}" method="POST">
                @csrf
                              <div class="input-group">
                                  <input name="email" class="form-control" placeholder="{{ __('Enter Your Email Address') }}" type="email"  autocomplete="off">
                                  <button class="btn btn-sm primary-btn" type="submit">{{ __('Subscribe') }}</button>

                              </div>
                              <p id="err-email" class="text-danger mb-0 err-email"></p>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="copy-right-area">
          <div class="container">
              <div class="copy-right-content">
                  <span>
                      {!! !empty($footerInfo->copyright_text) ? $footerInfo->copyright_text : '' !!} </span>
              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Area -->
