@extends('saas.admin.layout')

@section('content')
<div class="page-header">
    <h4 class="page-title">{{ __('Packages') }}</h4>
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
            <a href="#">{{ __('Packages') }}</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>

    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-title d-inline-block">{{ __('Packages') }}</div>
                    </div>



                    <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                        <a href="{{ route('admin.package.create') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> {{ __('Add Package') }}</a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row mb-5 justify-content-center">
                            @if (count($packages) == 0)
                            <h3 class="text-center mt-2">{{ __('NO PACKAGE FOUND') . '!' }}</h3>
                            @else
                            @foreach ($packages as $package)
                            <div class="col-md-3 pr-md-0 mb-5">
                                <div class="card-pricing2  card-primary ">
                                    <div class="pricing-header">
                                        <h3 class="fw-bold d-inline-block">
                                            {{ $package->name }}
                                        </h3>

                                        <span class="sub-title">{{ $package->description }}</span>
                                    </div>

                                    <div class="price-value">
                                        <div class="value">
                                            <span class="amount">{{ number_format($package->price, 0) }}</span>
                                            <span class="month">/monthly</span>
                                        </div>
                                    </div>
                                    <ul class="pricing-content">

                                        <li>
                                            @if ($package->campuses_count == 0)
                                            Unlimited
                                            @else
                                            {{ $package->campuses_count }}
                                            @endif

                                            Campuses
                                            <br />
                                        </li>
                                        <li>
                                            @if ($package->student_count == 0)
                                            Unlimited
                                            @else
                                            {{ $package->student_count }}
                                            @endif

                                            Students
                                            <br />
                                        </li>
                                        @if($package->trial_days != 0)
                                        <li>
                                            {{$package->trial_days}} Trial Days
                                        </li>
                                        @endif
                                        <li>

                                            @if($package->price != 0)

                                            {{$package->interval_count}} {{__('lang.' . $package->interval)}}

                                            @else
                                            @lang('lang.free_for_duration', ['duration' => $package->interval_count . ' ' . __('lang.' . $package->interval)])
                                            @endif
                                        </li>
                                        @if(!empty($package->features))
                                        
                                            @foreach($package->features as  $value)
                                      <li>
                                            {{$packageFeatures[$value]}}
                                               </li>
                                            @endforeach
                                     
                                        @endif

                                   
                                    </ul>

                                    <div class="px-4">
                                        <div class="d-inline-block">

                                            @if ($package->status == 1)
                                            <h2 class="d-inline-block"><span class="badge badge-success">{{ __('Active') }}</span>
                                            </h2>
                                            @else
                                            <h2 class="d-inline-block"><span class="badge badge-danger">{{ __('Deactive') }}</span>
                                            </h2>
                                            @endif

                                            <a href="{{ route('admin.package.edit', ['id' => $package->id]) }}" class="btn btn-secondary btn-sm mr-1" title="edit"><i class="fa fa-edit"></i></a>
                                          
 <form class="deleteForm d-inline-block" action="{{ route('admin.package.delete', ['id' => $package->id]) }}" method="post">
                              
                              @csrf
                              <button type="submit" class="btn btn-danger btn-sm deleteBtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
                              </button>
                            </form>
                                        </div>

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
@endsection
