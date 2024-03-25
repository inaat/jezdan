<div class="card">
    <div class="card-body">
        <h5 class="card-title text-primary">@lang('english.sms_settings')
            <small class="text-info font-13">@lang('english.setting_help_text')</small>
        </h5>
        <hr>

        @php
        $sms_service = isset($sms_settings['sms_service']) ? $sms_settings['sms_service'] : 'other';
        @endphp
        <div class="row">
            <div class="col-sm-3">

                {!! Form::label('sms_service', __('english.sms_service') . ':') !!}
                {!! Form::select('sms_settings[sms_service]', ['nexmo' => 'Nexmo', 'twilio' => 'Twilio', 'other' => __('english.other')], $sms_service, ['class' => 'form-select mb-3', 'id' => 'sms_service']) !!}
            </div>

        </div>
        <div class="row sms_service_settings @if ($sms_service != 'nexmo') d-none @endif" data-service="nexmo">
            <div class="col-sm-3">

                {!! Form::label('nexmo_key', __('english.nexmo_key') . ':') !!}
                {!! Form::text('sms_settings[nexmo_key]', !empty($sms_settings['nexmo_key']) ? $sms_settings['nexmo_key'] : null, ['class' => 'form-control', 'placeholder' => __('english.nexmo_key'), 'id' => 'nexmo_key']) !!}
            </div>
            <div class="col-sm-3">

                {!! Form::label('nexmo_secret', __('english.nexmo_secret') . ':') !!}
                {!! Form::text('sms_settings[nexmo_secret]', !empty($sms_settings['nexmo_secret']) ? $sms_settings['nexmo_secret'] : null, ['class' => 'form-control', 'placeholder' => __('english.nexmo_secret'), 'id' => 'nexmo_secret']) !!}
            </div>
            <div class="col-sm-3">

                {!! Form::label('nexmo_from', __('english.from') . ':') !!}
                {!! Form::text('sms_settings[nexmo_from]', !empty($sms_settings['nexmo_from']) ? $sms_settings['nexmo_from'] : null, ['class' => 'form-control', 'placeholder' => __('english.from'), 'id' => 'nexmo_from']) !!}
            </div>
        </div>
        <div class="row sms_service_settings @if ($sms_service != 'twilio') d-none  @endif" data-service="twilio">
            <div class="col-sm-3">

                {!! Form::label('twilio_sid', __('english.twilio_sid') . ':') !!}
                {!! Form::text('sms_settings[twilio_sid]', !empty($sms_settings['twilio_sid']) ? $sms_settings['twilio_sid'] : null, ['class' => 'form-control', 'placeholder' => __('english.twilio_sid'), 'id' => 'twilio_sid']) !!}
            </div>
            <div class="col-sm-3">

                {!! Form::label('twilio_token', __('english.twilio_token') . ':') !!}
                {!! Form::text('sms_settings[twilio_token]', !empty($sms_settings['twilio_token']) ? $sms_settings['twilio_token'] : null, ['class' => 'form-control', 'placeholder' => __('english.twilio_token'), 'id' => 'twilio_token']) !!}
            </div>
            <div class="col-sm-3">

                {!! Form::label('twilio_from', __('english.from') . ':') !!}
                {!! Form::text('sms_settings[twilio_from]', !empty($sms_settings['twilio_from']) ? $sms_settings['twilio_from'] : null, ['class' => 'form-control', 'placeholder' => __('english.from'), 'id' => 'twilio_from']) !!}
            </div>
        </div>
        <div class="row sms_service_settings @if ($sms_service != 'other') d-none @endif" data-service="other">
            <div class="col-sm-3">

                {!! Form::label('sms_settings_url', 'URL:') !!}
                {!! Form::text('sms_settings[url]', $sms_settings['url'], ['class' => 'form-control', 'placeholder' => 'URL', 'id' => 'sms_settings_url']) !!}
            </div>
            <div class="col-sm-3">

                {!! Form::label('send_to_param_name', __('english.send_to_param_name') . ':') !!}
                {!! Form::text('sms_settings[send_to_param_name]', $sms_settings['send_to_param_name'], ['class' => 'form-control', 'placeholder' => __('english.send_to_param_name'), 'id' => 'send_to_param_name']) !!}
            </div>

            <div class="col-sm-3">

                {!! Form::label('msg_param_name', __('english.msg_param_name') . ':') !!}
                {!! Form::text('sms_settings[msg_param_name]', $sms_settings['msg_param_name'], ['class' => 'form-control', 'placeholder' => __('english.msg_param_name'), 'id' => 'msg_param_name']) !!}

            </div>
            <div class="col-sm-3">

                {!! Form::label('request_method', __('english.request_method') . ':') !!}
                {!! Form::select('sms_settings[request_method]', ['get' => 'GET', 'post' => 'POST'], $sms_settings['request_method'], ['class' => 'form-select mb-3', 'id' => 'request_method']) !!}

            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_header_key1', __('english.sms_settings_header_key', ['number' => 1]) . ':') !!}
                {!! Form::text('sms_settings[header_1]', $sms_settings['header_1'] ?? null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_header_key', ['number' => 1]), 'id' => 'sms_settings_header_key1']) !!}
            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_header_val1', __('english.sms_settings_header_val', ['number' => 1]) . ':') !!}
                {!! Form::text('sms_settings[header_val_1]', $sms_settings['header_val_1'] ?? null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_header_val', ['number' => 1]), 'id' => 'sms_settings_header_val1']) !!}

            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_header_key2', __('english.sms_settings_header_key', ['number' => 2]) . ':') !!}
                {!! Form::text('sms_settings[header_2]', $sms_settings['header_2'] ?? null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_header_key', ['number' => 2]), 'id' => 'sms_settings_header_key2']) !!}

            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_header_val2', __('english.sms_settings_header_val', ['number' => 2]) . ':') !!}
                {!! Form::text('sms_settings[header_val_2]', $sms_settings['header_val_2'] ?? null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_header_val', ['number' => 2]), 'id' => 'sms_settings_header_val2']) !!}
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_header_key3', __('english.sms_settings_header_key', ['number' => 3]) . ':') !!}
                {!! Form::text('sms_settings[header_3]', $sms_settings['header_3'] ?? null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_header_key', ['number' => 3]), 'id' => 'sms_settings_header_key3']) !!}

            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_header_val3', __('english.sms_settings_header_val', ['number' => 3]) . ':') !!}
                {!! Form::text('sms_settings[header_val_3]', $sms_settings['header_val_3'] ?? null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_header_val', ['number' => 3]), 'id' => 'sms_settings_header_val3']) !!}

            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_key1', __('english.sms_settings_param_key', ['number' => 1]) . ':') !!}
                {!! Form::text('sms_settings[param_1]', $sms_settings['param_1'], ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 1]), 'id' => 'sms_settings_param_key1']) !!}
            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_val1', __('english.sms_settings_param_val', ['number' => 1]) . ':') !!}
                {!! Form::text('sms_settings[param_val_1]', $sms_settings['param_val_1'], ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 1]), 'id' => 'sms_settings_param_val1']) !!}
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_key2', __('english.sms_settings_param_key', ['number' => 2]) . ':') !!}
                {!! Form::text('sms_settings[param_2]', $sms_settings['param_2'], ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 2]), 'id' => 'sms_settings_param_key2']) !!}
            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_val2', __('english.sms_settings_param_val', ['number' => 2]) . ':') !!}
                {!! Form::text('sms_settings[param_val_2]', $sms_settings['param_val_2'], ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 2]), 'id' => 'sms_settings_param_val2']) !!}
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_key3', __('english.sms_settings_param_key', ['number' => 3]) . ':') !!}
                {!! Form::text('sms_settings[param_3]', $sms_settings['param_3'], ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 3]), 'id' => 'sms_settings_param_key3']) !!}
            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_val3', __('english.sms_settings_param_val', ['number' => 3]) . ':') !!}
                {!! Form::text('sms_settings[param_val_3]', $sms_settings['param_val_3'], ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 3]), 'id' => 'sms_settings_param_val3']) !!}
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_key4', __('english.sms_settings_param_key', ['number' => 4]) . ':') !!}
                {!! Form::text('sms_settings[param_4]', $sms_settings['param_4'], ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 4]), 'id' => 'sms_settings_param_key4']) !!}
            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_val4', __('english.sms_settings_param_val', ['number' => 4]) . ':') !!}
                {!! Form::text('sms_settings[param_val_4]', $sms_settings['param_val_4'], ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 4]), 'id' => 'sms_settings_param_val4']) !!}
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_key5', __('english.sms_settings_param_key', ['number' => 5]) . ':') !!}
                {!! Form::text('sms_settings[param_5]', $sms_settings['param_5'], ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 5]), 'id' => 'sms_settings_param_key5']) !!}
            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_val5', __('english.sms_settings_param_val', ['number' => 5]) . ':') !!}
                {!! Form::text('sms_settings[param_val_5]', $sms_settings['param_val_5'], ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 5]), 'id' => 'sms_settings_param_val5']) !!}
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_key6', __('english.sms_settings_param_key', ['number' => 6]) . ':') !!}
                {!! Form::text('sms_settings[param_6]', !empty($sms_settings['param_6']) ? $sms_settings['param_6'] : null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 6]), 'id' => 'sms_settings_param_key6']) !!}
            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_val6', __('english.sms_settings_param_val', ['number' => 6]) . ':') !!}
                {!! Form::text('sms_settings[param_val_6]', !empty($sms_settings['param_val_6']) ? $sms_settings['param_val_6'] : null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 6]), 'id' => 'sms_settings_param_val6']) !!}
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_key7', __('english.sms_settings_param_key', ['number' => 7]) . ':') !!}
                {!! Form::text('sms_settings[param_7]', !empty($sms_settings['param_7']) ? $sms_settings['param_7'] : null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 7]), 'id' => 'sms_settings_param_key7']) !!}
            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_val7', __('english.sms_settings_param_val', ['number' => 7]) . ':') !!}
                {!! Form::text('sms_settings[param_val_7]', !empty($sms_settings['param_val_7']) ? $sms_settings['param_val_7'] : null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 7]), 'id' => 'sms_settings_param_val7']) !!}
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_key8', __('english.sms_settings_param_key', ['number' => 8]) . ':') !!}
                {!! Form::text('sms_settings[param_8]', !empty($sms_settings['param_8']) ? $sms_settings['param_8'] : null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 8]), 'id' => 'sms_settings_param_key8']) !!}
            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_val8', __('english.sms_settings_param_val', ['number' => 8]) . ':') !!}
                {!! Form::text('sms_settings[param_val_8]', !empty($sms_settings['param_val_8']) ? $sms_settings['param_val_8'] : null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 8]), 'id' => 'sms_settings_param_val8']) !!}
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_key9', __('english.sms_settings_param_key', ['number' => 9]) . ':') !!}
                {!! Form::text('sms_settings[param_9]', !empty($sms_settings['param_9']) ? $sms_settings['param_9'] : null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 9]), 'id' => 'sms_settings_param_key9']) !!}
            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_val9', __('english.sms_settings_param_val', ['number' => 9]) . ':') !!}
                {!! Form::text('sms_settings[param_val_9]', !empty($sms_settings['param_val_9']) ? $sms_settings['param_val_9'] : null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 9]), 'id' => 'sms_settings_param_val9']) !!}
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_key10', __('english.sms_settings_param_key', ['number' => 10]) . ':') !!}
                {!! Form::text('sms_settings[param_10]', !empty($sms_settings['param_10']) ? $sms_settings['param_10'] : null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 10]), 'id' => 'sms_settings_param_key10']) !!}
            </div>
            <div class="col-sm-4">

                {!! Form::label('sms_settings_param_val10', __('english.sms_settings_param_val', ['number' => 10]) . ':') !!}
                {!! Form::text('sms_settings[param_val_10]', !empty($sms_settings['param_val_10']) ? $sms_settings['param_val_10'] : null, ['class' => 'form-control', 'placeholder' => __('english.sms_settings_param_val', ['number' => 10]), 'id' => 'sms_settings_param_val10']) !!}
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="col-md-8 col-sm-12">

                <div class="input-group">
                    {!! Form::text('test_number', null, ['class' => 'form-control', 'placeholder' => __('english.test_number'), 'id' => 'test_number']) !!}
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-success pull-right" id="test_sms_btn">@lang('english.test_sms_configuration')</button>
                    </span>
                </div>

            </div>
        </div>
    </div>

</div>
