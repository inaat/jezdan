@extends('saas.admin.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Add Package') }}</h4>
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
                <a href="#">{{ __('Package Management') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Package') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Add Package') }}</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">{{ __('Add Package') }}</div>
                    <a class="btn btn-info btn-sm float-right d-inline-block" href="{{ route('admin.package.index') }}">
                        <span class="btn-label">
                            <i class="fas fa-backward"></i>
                        </span>
                        {{ __('Back') }}
                    </a>
                </div>
                <form id="blogForm" action="{{ route('admin.package.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3 justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Package name*</label>
                                <input id="name" type="text" class="form-control" name="name"
                                    placeholder="Enter Package name" value="">
                                @if ($errors->has('name'))
                                    <p class="mt-2 mb-0 text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="title">Package description</label>
                                <input id="description" type="text" class="form-control" name="description"
                                    placeholder="Enter Package description" value="">
                                @if ($errors->has('description'))
                                    <p class="mt-2 mb-0 text-danger">{{ $errors->first('description') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="price">Price (USD)*</label>
                                <input id="price" type="number" class="form-control" name="price"
                                    placeholder="Enter Package price" value="">
                                @if ($errors->has('price'))
                                    <p class="mt-2 mb-0 text-danger">{{ $errors->first('price') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="campuses_count">Campus Count</label>
                                <input id="campuses_count" type="number" class="form-control" name="campuses_count"
                                    placeholder="Enter Campus Count" value="">
                                @if ($errors->has('campuses_count'))
                                    <p class="mt-2 mb-0 text-danger">{{ $errors->first('campuses_count') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="student_count">Student Count</label>
                                <input id="student_count" type="number" class="form-control" name="student_count"
                                    placeholder="Enter Student Count" value="">
                                @if ($errors->has('student_count'))
                                    <p class="mt-2 mb-0 text-danger">{{ $errors->first('student_count') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="trial_days">Trial Days</label>
                                <input id="trial_days" type="number" class="form-control" name="trial_days"
                                    placeholder="Enter Student Count" value="">
                                @if ($errors->has('trial_days'))
                                    <p class="mt-2 mb-0 text-danger">{{ $errors->first('trial_days') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">{{ __('Package Serial Number') . '*' }}</label>
                                <input type="number" class="form-control" name="serial_number"
                                    placeholder="Enter Serial Number">
                                @if ($errors->has('serial_number'))
                                    <p class="mt-2 mb-0 text-danger">{{ $errors->first('serial_number') }}</p>
                                @endif
                                <p class="text-warning mt-2 mb-0">
                                    <small>{{ __('The higher the serial number is, the later the Package will be shown.') }}</small>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">{{ __('Package interval count') . '*' }}</label>
                                <input type="number" class="form-control" name="interval_count"
                                    placeholder="Enter interval count">
                                @if ($errors->has('interval_count'))
                                    <p class="mt-2 mb-0 text-danger">{{ $errors->first('interval_count') }}</p>
                                @endif
                                <p class="text-warning mt-2 mb-0">
                                    <small>{{ __('The higher the serial number is, the later the Package will be shown.') }}</small>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="interval">Package interval*</label>

                                <select id="interval" name="interval" class="form-control" required="">
                                    <option value="" selected="" disabled="">Choose a Package interval</option>
                                    <option value="months">months</option>
                                    <option value="years">years</option>
                                    <option value="life_time">lifetime</option>
                                </select>
                                @if ($errors->has('interval'))
                                    <p class="mt-2 mb-0 text-danger">{{ $errors->first('interval') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <div class="form-group">
                                <label class="form-label">Package Features</label>

                                  @if ($errors->has('features'))
                                  <br>
                                    <p class="mt-2 mb-0 text-danger">{{ $errors->first('features') }}</p>
                                @endif
                                <br>
                                <div class="selectgroup selectgroup-pills">
                                    @foreach ($packageFeatures as $packageFeature)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" class="selectgroup-input" name="features[]"
                                                value="{{ $packageFeature->id }}">
                                            <span class="selectgroup-button">{{ $packageFeature->name }}</span>
                                        </label>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">PackageStatus*</label>
                                <select name="status" class="form-control">
                                    <option selected="" disabled="">Select a Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                                @if ($errors->has('status'))
                                    <p class="mt-2 mb-0 text-danger">{{ $errors->first('status') }}</p>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" form="blogForm" class="btn btn-success">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
