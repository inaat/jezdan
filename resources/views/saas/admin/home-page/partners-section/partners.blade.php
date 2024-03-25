@extends('saas.admin.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('saas.admin.partials.rtl-style')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Partners') }}</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('admin.dashboard') }}">
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
                <a href="#">{{ __('Partners') }}</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block">{{ __('Partners')}}</div>
                        </div>
                        <div class="col-lg-3">
                            @includeIf('saas.admin.partials.languages')

                        </div>
                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a href="#" class="btn btn-primary float-lg-right float-left" data-toggle="modal"
                                data-target="#createModal"><i class="fas fa-plus"></i>{{__('Add Partner')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @if (count($partners) == 0)
                                    <h3 class="text-center mt-2">{{ __('NO PARTNER FOUND') . '!' }}</h3>
                                @else
                                    @foreach ($partners as $partner)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img class="w-100"
                                                        src="{{ asset('assets/saas/admin/img/partners/' . $partner->image) }}"
                                                        alt="">
                                                </div>
                                                <div class="card-footer text-center">

                                                    <a class="btn btn-secondary btn-sm mr-1 editBtn" href="#"
                                                        data-toggle="modal" data-target="#editModal"
                                                        data-id="{{ $partner->id }}"
                                                        data-image="{{ asset('assets/saas/admin/img/partners/' . $partner->image) }}"
                                                        data-url="{{ $partner->url }}"
                                                        data-serial_number="{{ $partner->serial_number }}">

                                                        <span class="btn-label">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                        Edit
                                                    </a>
                                                    <form class="deleteForm d-inline-block"
                                                        action="{{ route('admin.home_page.delete_partner', ['id' => $partner->id]) }}"
                                                        method="post">

                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm deleteBtn">
                                                            <span class="btn-label">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- create modal --}}
    @include('saas.admin.home-page.partners-section.create')
 {{-- edit modal --}}
  @include('saas.admin.home-page.partners-section.edit')
@endsection
