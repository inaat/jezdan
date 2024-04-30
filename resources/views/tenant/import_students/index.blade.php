 @extends("admin_layouts.app")
 @section('title', __('english.import_students'))
 @section('wrapper')
 <div class="page-wrapper">
     <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
             <div class="breadcrumb-title pe-3">@lang('english.student_file_to_import')</div>
             <div class="ps-3">
                 <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                         <li class="breadcrumb-item"><a href="{{ url('/home') }} "><i class="bx bx-home-alt"></i></a>
                         </li>
                     </ol>
                 </nav>
             </div>
         </div>
         <!--end breadcrumb-->
         @if (session('notification') || !empty($notification))
      <div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close btn-primary" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            @if(!empty($notification['msg']))
            {{$notification['msg']}}
            @elseif(session('notification.msg'))
            {{ session('notification.msg') }}
            @endif
        </div>
    </div>
</div>
         @endif
         <div class="row">
             <div class="card">
                 <div class="card-body">
                     <div class="col-sm-12">
                         {!! Form::open(['url' => action('ImportStudentsController@store'), 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}
                         {{-- {!! Form::open(['url' => action('ImportStudentsController@StudentImage'), 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!} --}}
                         {{-- {!! Form::open(['url' => action('ImportStudentsController@employeeImport'), 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!} --}}
                         <div class="row">
                             <div class="col-sm-8">
                                 <div class="form-group">
                                     {!! Form::label('name', __( 'english.student_file_to_import' ) . ':') !!}
                                     {!! Form::file('products_csv', ['class' => 'form-control','accept'=> '.xls, .xlsx, .csv', 'required' => 'required']); !!}

                                 </div>
                             </div>
                             <div class="col-sm-4">

                                 <button type="submit" class="btn btn-primary mt-4">@lang('english.submit')</button>
                             </div>

                         </div>

                         {!! Form::close() !!}
                         <br><br>
                         <div class="row">
                             <div class="col-sm-4">
                                 <a href="{{ url('/tenant/files/import_students_template.xlsx') }}" class="btn btn-success" download><i class="fa fa-download"></i> @lang('english.download_template_file')</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
          <div class="row">
        <div class="col-sm-12">
            @component('tenant.components.widget', ['class' => ' card border-top border-0 border-4 border-info', 'title' => __('english.instructions')])
              @slot('icon')
                        <i class="fa fa-exclamation-triangle  me-1 font-22 text-warning" aria-hidden="true"></i>
                      @endslot
                      @slot('title')
                        {{ __('english.instructions') }}
                      @endslot
                {{-- @icon
                  <div><i class="fas fa-address-card me-1 font-22 text-info"></i>
                                            </div> --}}
                <strong>@lang('english.instruction_line1')</strong><br>
                    @lang('english.instruction_line2')
                    <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>@lang('english.col_no')</th>
                        <th>@lang('english.col_name')</th>
                        <th>@lang('english.instruction')</th>
                    </tr>
                    @php

    $fields = [
            "campus_name" => [
                'required'=>true,
                'ins'=>'name_of_the_campus'
            ],
            "session" => [
                'required'=>true,
                'ins'=>'session_instruction'
            ],
            "first_name" =>  [
                'required'=>true,
                'ins'=>'first_name'
            ],
            "last_name" =>  [
                'required'=>false,
                'ins'=>'last_name'
            ],
            "admission_date" =>  [
                'required'=>true,
                'ins'=>'admission_date'
            ],
            "admission_class" =>  [
                'required'=>true,
                'ins'=>'admission_class'
            ],
            "admission_class_section" =>  [
                'required'=>true,
                'ins'=>'admission_class_section'
            ],
            "current_class" =>  [
                'required'=>true,
                'ins'=>'current_class'
            ],
            "current_class_section" =>  [
                'required'=>true,
                'ins'=>'current_class_section'
            ],
            "gender" => [
                'required'=>true,
                'ins'=>'gender'
            ],
            "date_of_birth" =>  [
                'required'=>false,
                'ins'=>'date_of_birth'
            ],
            "student_category" =>  [
                'required'=>false,
                'ins'=>'student_category'
            ],
            "religion" =>  [
                'required'=>false,
                'ins'=>'religion'
            ],
            "mobile_no" =>  [
                'required'=>false,
                'ins'=>'mobile_instruction'
            ],
            "cnic_no" =>  [
                'required'=>false,
                'ins'=>'cnic_no'
            ],
            "blood_group" =>  [
                'required'=>false,
                'ins'=>'blood_group_instruction'
            ],
            "nationality" =>  [
                'required'=>false,
                'ins'=>'nationality'
            ],
            "mother_tongue" =>  [
                'required'=>false,
                'ins'=>'mother_tongue'
            ],
            "medical_history" =>  [
                'required'=>false,
                'ins'=>'medical_history'
            ],
            "father_name" =>  [
                'required'=>true,
                'ins'=>'father_name'
            ],
            "father_phone" =>  [
                'required'=>true,
                'ins'=>'mobile_instruction'
            ],
            "father_occupation" =>  [
                'required'=>false,
                'ins'=>'father_occupation'
            ],
            "father_cnic_no" =>  [
                'required'=>false,
                'ins'=>'father_cnic_no'
            ],
            "mother_name" =>  [
                'required'=>false,
                'ins'=>'mother_name'
            ],
            "mother_phone" =>  [
                'required'=>false,
                'ins'=>'mother_phone'
            ],
            "mother_occupation" =>  [
                'required'=>false,
                'ins'=>'mother_occupation'
            ],
            "mother_cnic_no" =>  [
                'required'=>true,
                'ins'=>'mother_cnic_no'
            ],
            "if_guardian_is" =>  [
                'required'=>true,
                'ins'=>'if_guardian_is_instruction'
            ],
            "guardian_name" =>  [
                'required'=>true,
                'ins'=>'guardian_name'
            ],
            "guardian_relation" =>  [
                'required'=>true,
                'ins'=>'guardian_relation'
            ],
            "guardian_occupation" =>  [
                'required'=>false,
                'ins'=>'guardian_occupation'
            ],
            "guardian_cnic_no" =>  [
                'required'=>false,
                'ins'=>'guardian_cnic_no'
            ],
            "guardian_phone" =>  [
                'required'=>true,
                'ins'=>'mobile_instruction'
            ],
            "guardian_email" =>  [
                'required'=>true,
                'ins'=>'guardian_email'
            ],
            "country_name" =>  [
                'required'=>false,
                'ins'=>'country_name'
            ],
            "provinces_name" =>  [
                'required'=>false,
                'ins'=>'provinces_name'
            ],
            "district_name" =>  [
                'required'=>false,
                'ins'=>'district_name'
            ],
            "city_name" =>  [
                'required'=>false,
                'ins'=>'city_name'
            ],
            "region_name" =>  [
                'required'=>false,
                'ins'=>'region_name'
            ],
            "current_address" =>  [
                'required'=>true,
                'ins'=>'current_address'
            ],
            "permanent_address" =>  [
                'required'=>true,
                'ins'=>'permanent_address'
            ],
            "student_tuition_fee" =>  [
                'required'=>false,
                'ins'=>'student_tuition_fee'
            ],
            "student_transport_fee" =>  [
                'required'=>false,
                'ins'=>'student_tuition_fee'
            ],
            "opening_balance" =>  [
                'required'=>false,
                'ins'=>'opening_balance'
            ],
            "previous_school_name" =>  [
                'required'=>true,
                'ins'=>'previous_school_name'
            ],
            "last_grade" =>  [
                'required'=>false,
                'ins'=>'last_grade'
            ],
            "remark" =>  [
                'required'=>false,
                'ins'=>'remark'
            ],
            "student_status" =>  [
                'required'=>true,
                'ins'=>'student_status_instruction'
            ]
        ];
                        @endphp
                        @foreach($fields as $key => $value)
                     
                       
                 <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>@lang('english.'.$key) 
                        @if($value['required'])
                        <small class="text-muted">(@lang('english.required'))</small>
                        @else
                        <small class="text-muted">(@lang('english.optional'))</small>
                        @endif
                        </td>
                        <td>@lang('english.'.$value['ins'])</td>
                    </tr>
                    @endforeach
                </table>
            @endcomponent
        </div>
    </div>
     </div>
 </div>

 @endsection

 @section('javascript')

 <script type="text/javascript">
  $(document).ready(function(){
        $(".close").click(function(){
            $(".alert-dismissible").hide();
        });
    });


 </script>
 @endsection
