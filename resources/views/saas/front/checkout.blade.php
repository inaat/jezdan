@extends('saas.front.layout.app')

@section('pageHeading')
{{ __('Checkout')}}
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
@php
$position = $currencyInfo->base_currency_symbol_position;
$symbol = $currencyInfo->base_currency_symbol;
@endphp
@section('content')
@includeIf('saas.front.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' =>__('Checkout')])
<section class="checkout-area ptb-90">
    <div class="container">
        <form onsubmit="document.getElementById('confirmBtn').innerHTML='Processing...';document.getElementById('confirmBtn').disabled=true;" action="{{ route('package.finalCheckout') }}" method="POST" enctype="multipart/form-data" id="my-checkout-form">
            <div class="row">
                <div class="col-lg-8 ">
                    <div class="billing_form form-block">
                        <div class="title mb-30">
                            <h3>Billing Details</h3>
                        </div>
                        @csrf <div class="row">
                            <input type="hidden" name="username" value="{{ $step1['username'] }}">
                            <input type="hidden" name="password" value="{{ $step1['password'] }}">
                            <input type="hidden" name="email" value="{{ $step1['email'] }}">
                            <input type="hidden" name="package_id" value="{{ $step1['id'] }}">
                            <input type="hidden" name="trial_days" id="trial_days" value="{{ $package->trial_days }}">
                            <input type="hidden" name="start_date" value="{{ $dates['start']  }}">
                            <input type="hidden" name="expire_date" value="{{ $dates['end']  }}">

                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="first_name">First Name*</label>
                                    <input id="first_name" type="text" class="form-control" name="first_name" placeholder="First Name" value="" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="last_name">Last Name*</label>
                                    <input id="last_name" type="text" class="form-control" name="last_name" placeholder="Last Name" value="" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="phone">Phone Number*</label>
                                    <input id="phone" type="text" class="form-control" name="phone" placeholder="Phone Number" value="" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="email">Email Address*</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $step1['email'] }}" disabled="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                    <label for="company_name">Company Name*</label>
                                    <input id="company_name" type="text" class="form-control" name="company_name" placeholder="Company Name" value="" required="">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                    <label for="address">Street Address</label>
                                    <input id="address" type="text" class="form-control" name="address" placeholder="Street Address" value="">
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="country">Country*</label>
                                    <br>

                                    <select class="form-group mb-30 form-control select2" id="country_id" name="country_id" required>
                                        <option value="">-- Select Country --</option>
                                        @foreach ($countries as $country )
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>

                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="district">State</label>
                                    <select class="form-group mb-30 form-control select2" id="state_id" name="state_id" required>


                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="city">City</label>
                                    <select class="form-group mb-30 form-control select2" id="city_id" name="city_id" required>


                                    </select>
                                </div>
                            </div>
    <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="zip_code">Zip Code</label>
                                    <input id="zip_code" type="text" class="form-control" name="zip_code" placeholder="Zip Code" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order_wrap_box mb-40">
                        <div id="couponReload">
                            <input type="hidden" name="price" value="{{ number_format($package->price, 0)  }}">
                            <div class="order-summery form-block mb-30 mt-30">

                                <div class="title">
                                    <h3>Package Summary</h3>
                                </div>
                                <div class="order-list-info">
                                    <ul class="summery-list">
                                        <li>Package <span> {{$package->interval_count}} {{__('lang.' . $package->interval)}}</span></li>
                                        <li>Start Date
                                            <span>{{ $dates['start']  }}</span>
                                        </li>
                                        <li>
                                            Expiry Date
                                            <span>
                                                {{ $dates['end'] }}
                                            </span>
                                        </li>
                                        <li class="border-0">
                                            <span>Total</span>
                                            <span class="price">
                                                {{ $currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : '' }}{{ number_format($package->price, 0) }}{{ $currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : '' }}

                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="order-payment form-block">
                                <div class="title">
                                    <h3>Payment Method</h3>
                                </div>
                                <div class="form-group mb-30">
                                    <select name="payment_method" id="payment-gateway" class="olima_select" style="display: none;">
                                        <option value="" selected="" disabled="">Choose an option</option>
                                        <option value="paytabs">
                                            Paytabs
                                        </option>

                                    </select>
                                    <div class="nice-select olima_select" tabindex="0"><span class="current">Choose an option</span>
                                        <ul class="list">
                                            <li data-value="" class="option selected disabled focus">Choose an option</li>
                                            <li data-value="paytabs" class="option">
                                                Paytabs
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div>


                            <div class="text-center mt-4">
                                <button form="my-checkout-form" id="confirmBtn" class="btn primary-btn w-100" type="submit">Confirm
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</section>

@endsection
