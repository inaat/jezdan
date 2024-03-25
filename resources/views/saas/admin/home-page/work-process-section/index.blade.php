@extends('saas.admin.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('saas.admin.partials.rtl-style')

@section('content')
  

    <div class="page-header">
    <h4 class="page-title">{{ __('Work Process') }}</h4>
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
        <a href="#">{{ __('Work Process') }}</a>
      </li>
    </ul>
  </div>


  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <div class="card-title">{{ __('Work Process') }}</div>
            </div>

            <div class="col-lg-3">
              @includeIf('saas.admin.partials.languages')
            </div>

            <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
              <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-primary btn-sm float-lg-right float-left"><i class="fas fa-plus"></i> {{ __('Add') }}</a>

          
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col">
              @if (count($workProcessInfos) == 0)
                <h3 class="text-center mt-2">{{ __('NO INFORMATION FOUND') . '!' }}</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                      

                          <th scope="col">{{ __('Icon') }}</th>
                    

                        <th scope="col">{{ __('Title') }}</th>
                        <th scope="col">{{ __('Text') }}</th>
                        <th scope="col">{{ __('Serial Number') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($workProcessInfos as $workProcessInfo)
                        <tr>
                         

                            <td>
                              @if (is_null($workProcessInfo->icon))
                                -
                              @else
                                <i class="{{ $workProcessInfo->icon }}"></i>
                              @endif
                            </td>
                     

                          <td>
                            {{ strlen($workProcessInfo->title) > 30 ? mb_substr($workProcessInfo->title, 0, 30, 'UTF-8') . '...' : $workProcessInfo->title }}
                          </td>
                          <td>{{ $workProcessInfo->text }}</td>
                          <td>{{ $workProcessInfo->serial_number }}</td>
                          <td>
                            <a class="btn btn-secondary btn-sm mr-1 editBtn" href="#" data-toggle="modal" data-target="#editModal" data-id="{{ $workProcessInfo->id }}" data-icon="{{ $workProcessInfo->icon }}" data-color="{{ $workProcessInfo->color }}" data-title="{{ $workProcessInfo->title }}" data-text="{{ $workProcessInfo->text}}" data-serial_number="{{ $workProcessInfo->serial_number }}">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              {{ __('Edit') }}
                            </a>

                            <form class="deleteForm d-inline-block" action="{{ route('admin.home_page.delete_work_process', ['id' => $workProcessInfo->id]) }}" method="post">
                              
                              @csrf
                              <button type="submit" class="btn btn-danger btn-sm deleteBtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
                                {{ __('Delete') }}
                              </button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>

        <div class="card-footer"></div>
      </div>
    </div>
  </div>

  {{-- create modal --}}
  @include('saas.admin.home-page.work-process-section.create')

  {{-- edit modal --}}
  @include('saas.admin.home-page.work-process-section.edit')
@endsection
