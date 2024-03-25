@extends('saas.admin.layout')


@section('content')
  

    <div class="page-header">
    <h4 class="page-title">{{ __('Tenant Manage') }}</h4>
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
        <a href="#">{{ __('Tenant Management') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('Tenant Manage') }}</a>
      </li>
    </ul>
  </div>


  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <div class="card-title">{{ __('Tenant Manage') }}</div>
            </div>

      
            <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
              <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-primary btn-sm float-lg-right float-left"><i class="fas fa-plus"></i> {{ __('Add') }}</a>

          
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col">
               @if (count($all_users) == 0)
                <h3 class="text-center mt-2">{{ __('NO INFORMATION FOUND') . '!' }}</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                      
   <th>{{__('ID')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Email')}}</th>
                        <th>{{__('Action')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($all_users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}
                                    @if($user->email_verified === 0)
                                        <i class="text-danger mdi mdi-close-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Email Not Verified')}}"></i>
                                    @else
                                        <i class="text-success mdi mdi-check-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Email  Verified')}}"></i>
                                    @endif
                                </td>
                                <td>
                                {{-- {{ $user->tenant_info-> }} --}}
                                  @php
                                        $local_url = env('CENTRAL_DOMAIN');
                                        $url = tenant_url_with_protocol($local_url);
                                        $hash_token = hash_hmac('sha512',$user->username,$user->id);
                                    @endphp
                                                                        <a class="btn btn-info btn-sm mb-3 mr-1 " href="{{$url.'/token-wise-login/'.$hash_token.'?user_id='.$user->id.''}}" target="_blank" style="text-decoration: none">{{__('Login to User Account')}}</a>
                                    {{-- <form action="{{ route(route_prefix().'user.email.verify.enable.status') }}" method="post"> --}}
                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$user->id}}" name="user_id">
                                        <input type="hidden" value="{{$user->email_verified}}" name="email_verified">
                                        <button type="submit" class="btn btn-sm mb-2

                                        @if($user->email_verified == 1)
                                            btn-success
                                        @else
                                            btn-danger
                                        @endif
                                        ">

                                            @if($user->email_verified == 1)
                                                {{__('Make Enable Email Verify')}}

                                            @else
                                                {{__('Make Disable Email Verify')}}
                                            @endif
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
  @include('saas.admin.tenant.create')

  {{-- edit modal --}}
  {{-- @include('saas.admin.tenant.edit') --}}
@endsection
