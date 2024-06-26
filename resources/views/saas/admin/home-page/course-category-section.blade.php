@extends('saas.admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">{{ __('Course Categories Section') }}</h4>
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
        <a href="#">{{ __('Course Categories Section') }}</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <div class="card-title">{{ __('Course Categories Section Image') }}</div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <form id="courseCategoryForm" action="{{ route('admin.home_page.update_course_category_section_image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="">{{ __('Image') . '*' }}</label>
                  <br>
                  <div class="thumb-preview">
                    @if (!empty($data->course_categories_section_image))
                      <img src="{{ asset('assets/saas/admin/img/' . $data->course_categories_section_image) }}" alt="image" class="uploaded-img">
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
              </form>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-12 text-center">
              <button type="submit" form="courseCategoryForm" class="btn btn-success">
                {{ __('Update') }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
