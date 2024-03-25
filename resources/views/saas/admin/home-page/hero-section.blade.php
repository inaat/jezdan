@extends('saas.admin.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('saas.admin.partials.rtl-style')

@section('content')
  <div class="page-header">
    <h4 class="page-title">{{ __('Hero Section') }}</h4>
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
        <a href="#">{{ __('Hero Section') }}</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-10">
              <div class="card-title">{{ __('Update Hero Section') }}</div>
            </div>

            <div class="col-lg-2">
              @includeIf('saas.admin.partials.languages')
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <form id="heroForm" action="{{ route('admin.home_page.update_hero_section', ['language' => request()->input('language')]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="">{{ __('Image') }}</label>
                    <br>
                    <div class="thumb-preview">
                      @if (!empty($data->image))
                        <img src="{{ asset('assets/saas/admin/img/hero-section/' . $data->image) }}" alt="image" class="uploaded-img">
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

                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">{{ __('First Title') }}</label>
                      <input type="text" class="form-control" name="first_title" value="{{ empty($data->first_title) ? '' : $data->first_title }}" placeholder="Enter First Title">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">{{ __('Second Title') }}</label>
                      <input type="text" class="form-control" name="second_title" value="{{ empty($data->second_title) ? '' : $data->second_title }}" placeholder="Enter Second Title">
                    </div>
                  </div>
                </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="">{{ __('Text') }}</label>
                        <input type="text" class="form-control" name="text" value="{{ empty($data->text) ? '' : $data->text }}" placeholder="Enter Text">
                      </div>
                    </div>

                  
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">{{ __('Button') }}</label>
                        <input type="text" class="form-control" name="button" value="{{ empty($data->button) ? '' : $data->button }}" placeholder="Enter  Button Name">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">{{ __('Button URL') }}</label>
                        <input type="url" class="form-control ltr" name="button_url" value="{{ empty($data->button_url) ? '' : $data->button_url }}" placeholder="Enter Button URL">
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">{{ __('Video URL') }}</label>
                        <input type="url" class="form-control ltr" name="video_url" value="{{ empty($data->video_url) ? '' : $data->video_url }}" placeholder="Enter Video URL">
                      </div>
                    </div>
                  </div>
             

             
          
              </form>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-12 text-center">
              <button type="submit" form="heroForm" class="btn btn-success">
                {{ __('Update') }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
