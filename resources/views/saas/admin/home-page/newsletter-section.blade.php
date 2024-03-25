@extends('saas.admin.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('saas.admin.partials.rtl-style')

@section('content')
  <div class="page-header">
    <h4 class="page-title">{{ __('Newsletter Section') }}</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('admin.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('Home Page') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('Newsletter Section') }}</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-10">
              <div class="card-title">{{ __('Update Newsletter Section') }}</div>
            </div>

            <div class="col-lg-2">
              @includeIf('saas.admin.partials.languages')
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <form id="newsletterForm" action="{{ route('admin.home_page.update_newsletter_section', ['language' => request()->input('language')]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($themeInfo->theme_version == 1 || $themeInfo->theme_version == 3)
                  <div class="form-group">
                    <label for="">{{ __('Background Image') . '*' }}</label>
                    <br>
                    <div class="thumb-preview">
                      @if (!empty($data->background_image))
                        <img src="{{ asset('assets/saas/admin/img/newsletter-section/' . $data->background_image) }}" alt="background image" class="uploaded-background-img">
                      @else
                        <img src="{{ asset('assets/saas/admin/img/noimage.jpg') }}" alt="..." class="uploaded-background-img">
                      @endif
                    </div>

                    <div class="mt-3">
                      <div role="button" class="btn btn-primary btn-sm upload-btn">
                        {{ __('Choose Image') }}
                        <input type="file" class="background-img-input" name="background_image">
                      </div>
                    </div>
                    @error('background_image')
                      <p class="mt-2 mb-0 text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                @endif

                @if ($themeInfo->theme_version == 1)
                  <div class="form-group">
                    <label for="">{{ __('Image') . '*' }}</label>
                    <br>
                    <div class="thumb-preview">
                      @if (!empty($data->image))
                        <img src="{{ asset('assets/saas/admin/img/newsletter-section/' . $data->image) }}" alt="image" class="uploaded-img">
                      @else
                        <img src="{{ asset('assets/saas/admin/img/noimage.jpg') }}" alt="..." class="uploaded-img">
                      @endif
                    </div>

                    <div class="mt-3">
                      <div role="button" class="btn btn-primary btn-sm upload-btn">
                        {{ __('Choose Image') }}
                        <input type="file" class="img-input" name="image">
                      </div>
                    </div>
                    @error('image')
                      <p class="mt-2 mb-0 text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                @endif

                <div class="form-group">
                  <label for="">{{ __('Title') }}</label>
                  <input type="text" class="form-control" name="title" value="{{ empty($data->title) ? '' : $data->title }}" placeholder="Enter Newsletter Section Title">
                </div>

                @if ($themeInfo->theme_version == 1)
                  <div class="form-group">
                    <label for="">{{ __('Text') }}</label>
                    <textarea class="form-control" name="text" placeholder="Enter Newsletter Section Text" rows="5">{{ empty($data->text) ? '' : $data->text }}</textarea>
                  </div>
                @endif
              </form>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-12 text-center">
              <button type="submit" form="newsletterForm" class="btn btn-success">
                {{ __('Update') }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
