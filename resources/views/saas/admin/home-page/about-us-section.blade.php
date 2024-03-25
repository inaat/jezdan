@extends('saas.admin.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('saas.admin.partials.rtl-style')

@section('content')
  <div class="page-header">
    <h4 class="page-title">{{ __('About Us Section') }}</h4>
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
        <a href="#">{{ __('About Us Section') }}</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-10">
              <div class="card-title">{{ __('Update About Us Section') }}</div>
            </div>

            <div class="col-lg-2">
              @includeIf('saas.admin.partials.languages')
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <form id="aboutUsForm" action="{{ route('admin.home_page.update_about_us_section', ['language' => request()->input('language')]) }}" method="POST" enctype="multipart/form-data">
                @csrf
            

                <div class="form-group">
                  <label for="">{{ __('Title') }}</label>
                  <input type="text" class="form-control" name="title" value="{{ empty($data->title) ? '' : $data->title }}" placeholder="Enter About Us Section Title">
                </div>

                <div class="form-group">
                  <label for="">{{ __('Subtitle') }}</label>
                  <input type="text" class="form-control" name="subtitle" value="{{ empty($data->subtitle) ? '' : $data->subtitle }}" placeholder="Enter About Us Section Subtitle">
                </div>

                <div class="form-group">
                  <label for="">{{ __('Text') }}</label>
                  <textarea class="form-control" name="text" placeholder="Enter About Us Section Text" rows="5">{{ empty($data->text) ? '' : $data->text }}</textarea>
                </div>
                
                <div class="form-group">
                  <label for="">{{ __('Button Text') }}</label>
                  <input type="text" class="form-control" name="button_text" value="{{ empty($data->button_text) ? '' : $data->button_text }}" placeholder="Enter Button Text">
                </div>
                
                <div class="form-group">
                  <label for="">{{ __('Button Url') }}</label>
                  <input type="text" class="form-control" name="button_url" value="{{ empty($data->button_url) ? '' : $data->button_url }}" placeholder="Enter Button Url">
                </div>
                <div class="form-group">
                  <label for="">{{ __('Video Url') }}</label>
                  <input type="text" class="form-control" name="video_url" value="{{ empty($data->video_url) ? '' : $data->video_url }}" placeholder="Enter Video Url">
                </div>
              
                
              </form>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-12 text-center">
              <button type="submit" form="aboutUsForm" class="btn btn-success">
                {{ __('Update') }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
