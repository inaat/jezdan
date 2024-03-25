@extends('saas.front.layout.app')

@section('pageHeading')
{{ $package->name}}
@endsection


@section('metaKeywords')
@if (!empty($seoInfo))
{{ $seoInfo->meta_keyword_home }}
@endif
@endsection

@section('metaDescription')
@if (!empty($seoInfo))
{{ $seoInfo->meta_description_home }}
@endif
@endsection

@section('content')
@includeIf('saas.front.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' =>$package->name])
<div class="authentication-area pt-90 pb-120">
    <div class="container">
        <div class="main-form">
            <form id="#authForm" action="{{ url('/registration/final-step') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h3>Signup</h3>

                <div class="form-group mb-30">
                    <input type="text" class="form-control" name="username" placeholder="Username" value="">
                    <p class="mb-0">
                        Your subdomain based website URL will be:
                        <strong class="text-primary"><span id="username"></span>.jezdan.test</strong>
                        @error('username')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </p>
                    <p class="text-danger mb-0" id="usernameAvailable"></p>
                </div>
                <div class="form-group mb-30">
                    <input class="form-control" type="email" name="email" value="" placeholder="Email address">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-30">
                    <input class="form-control" type="password" name="password" value="" placeholder="Password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-30">
                    <input class="form-control" id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" autocomplete="new-password">
                    @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input type="hidden" name="id" value="{{ $package->id }}">
                </div>
                <button type="submit" class="btn primary-btn w-100"> Continue </button>
            </form>
        </div>
    </div>
</div>

@endsection
