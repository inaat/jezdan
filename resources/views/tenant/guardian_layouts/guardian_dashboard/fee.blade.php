 @extends("admin_layouts.app")
@section('title', __('english.fee_translations'))
 @section('wrapper')
     <div class="page-wrapper">
         <div class="page-content">
             <!--breadcrumb-->

  <!--breadcrumb-->

         <div class="card">
             <div class="card-body">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">{{ $student->first_name .'   '.  $student->last_name }}</div>
                <div class="ps-3">
                   <div class="row no-print mb10">
                            <div class="col-md-12 mDMb10">
                                <div class="float-rtl-right float-left">
                                <a href="{{ action('GuardianLayout\GuardianDashboardController@feePayWithPayTab',[$student->id,$total_dues->total_due]) }}" class="btn btn-sm btn-info" class="fa fa-print"></i>Pay With Pay Tabs ( @format_currency($total_dues->total_due))</a>
   </div>
                            </div>
                        </div>
                </div>
            </div>

             </div>
         </div>
         <div class="card">
             <div class="card-body">
                 <div class="accordion" id="transaction-filter">
                     <div class="accordion-item">
                         <h2 class="accordion-header" id="transaction-filter">
                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                 <h5 class="card-title text-primary">@lang('english.transaction_filter')</h5>
                             </button>
                         </h2>
                         <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="transaction-filter" data-bs-parent="#transaction-filter" style="">
                             <div class="accordion-body">
                                 <div class="row">
                                  
                      
                             <div class="col-md-3 p-2">
                             {!! Form::label('english.transaction_type', __('english.transaction_type') . ':*') !!}
                             {!! Form::select('type',__('english.transaction_types'),null, ['class' => 'form-select select2', 'required', 'style' => 'width:100%','placeholder' => __('english.all'),'id'=>'transaction_type']) !!}
                            </div> 
                                     <div class="col-md-4 p-1">
                                         {!! Form::label('status', __('english.payment_status') . ':*') !!}
                                         {!! Form::select('payment_status', ['paid' => __('english.paid'), 'due' => __('english.due'), 'partial' => __('english.partial'), 'overdue' => __('english.overdue')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id'=>'payment_status','placeholder' => __('english.all')]); !!}
                                     </div>
                                      <div class="col-md-4">
                                         {!! Form::label('transaction_date_range', __('english.date_range') . ':') !!}

                                         <div class="input-group flex-nowrap"> <span class="input-group-text" id="addon-wrapping"><i class="fa fa-calendar"></i></span>

                                             {!! Form::text('list_filter_date_range', null, ['class' => 'form-control', 'id'=>'list_filter_date_range','readonly', 'placeholder' => __('english.date_range')]) !!}

                                         </div>
                                     </div> 
                                     <div class="clearfix"></div>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
         </div>





             <div class="card">
                 <div class="card-body">
                     <h5 class="card-title text-primary">@lang('english.all_fee_transaction')</h5>

                

                     <hr>

                     <div class="table-responsive">
                         <table class="table mb-0" width="100%" id="fee_transaction_table">
                             <thead class="table-light" width="100%">
                                 <tr>
                                     {{-- <th>#</th> --}}
                                     <th>@lang('english.action')</th>
                                     {{-- <th>@lang('english.session')</th> --}}
                                     <th>@lang('english.transaction_month')</th>
                                     <th>@lang('english.transaction_date')</th>
                                     <th>@lang('english.fee_transaction_class')</th>
                                     <th>@lang('english.challan_no')</th>
                                     <th>@lang('english.roll_no')</th>
                                    <th>@lang('english.student_name')</th>
                                    <th>@lang('english.father_name')</th>
                                    <th>@lang('english.campus_name')</th>
                                     <th>@lang('english.current_class')</th>
                                     <th>@lang('english.payment_status')</th>
                                      <th>@lang('english.before_discount_total')</th>
                                     <th>@lang('english.discount_amount')</th>
                                     <th>@lang('english.final_total')</th>
                                     <th>@lang('english.total_paid')</th>
                                     <th>@lang('english.fee_due')</th>
                                     {{-- <th>@lang('english.status')</th> --}}

                                 </tr>
                             </thead>
                             <tfoot>
                                <tr class=" footer-total">
                                
                                    {{-- <td></td> --}}
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                   
                                    <td><strong>@lang('lang.total')</strong></td>
                                    <td class="footer_before_discount_total"></td>
                                    <td class="footer_discount_amount"></td>
                                    <td class="footer_final_total"></td>
                                    <td class="footer_total_paid"></td>
                                    <td class="footer_total_remaining"></td>
                                    {{-- <td ></td> --}}
   
                                </tr>
                            </tfoot>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="modal fade payment_modal contains_select2" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
     </div>
     <div class="modal fade pay_fee_due_modal contains_select2" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
     </div>
     <div class="modal fade edit_payment_modal contains_select2" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
     </div>
 @endsection

 @section('javascript')
{{-- <script src="{{url('tenant/js/guardian_fee.js') }}"></script> --}}
<script>

$(document).ready(function() {




    //fee_transaction_table
    var fee_transaction_table = $("#fee_transaction_table").DataTable({
        processing: true,
        serverSide: true,
        "ajax": {
            "url": "{{action('GuardianLayout\GuardianDashboardController@getTransaction',$student->id) }}",
            "data": function(d) {

                if ($('#campus_id').length) {
                    d.campus_id = $('#campus_id').val();
                }
                if ($('#payment_status').length) {
                    d.payment_status = $('#payment_status').val();
                }
                // if ($('#session_id').length) {
                //     d.session_id = $('#session_id').val();
                // }
                if ($('#transaction_type').length) {
                    d.transaction_type = $('#transaction_type').val();
                }
                var start = "";
                var end = "";
                if ($("#list_filter_date_range").val()) {
                    start = $("input#list_filter_date_range")
                        .data("daterangepicker")
                        .startDate.format("YYYY-MM-DD");
                    end = $("input#list_filter_date_range")
                        .data("daterangepicker")
                        .endDate.format("YYYY-MM-DD");
                }
                d.start_date = start;
                d.end_date = end;

            }
        },

        columns: [{
                data: "action",
                name: "action",
                orderable: false,
                "searchable": false
            }
            ,
            //  {
            //     data: "session_info",
            //     name: "session_info",
            //     orderable: false,
            //     "searchable": false
            // },

            {
                data: "month",
                name: "month",
                orderable: false,
                "searchable": false
            },
            {
                data: "transaction_date",
                name: "transaction_date",
                orderable: false,
                "searchable": false
            },
            {
                data: "transaction_class",
                name: "transaction_class",
                orderable: false,
                "searchable": false
            }, {
                data: "voucher_no",
                name: "voucher_no"
            },
            {
                data: "roll_no",
                name: "roll_no"

            },
            {
                data: "student_name",
                name: "student_name",

            },
            {
                data: "father_name",
                name: "father_name",

            },
            {
                data: "campus_name",
                name: "campus_name",
                orderable: false,
                "searchable": false
            },
            {
                data: "current_class",
                name: "current_class",
                orderable: false,
                "searchable": false
            },
            {
                data: "payment_status",
                name: "payment_status",
                orderable: false,
                "searchable": false
            }, {
                data: "before_discount_total",
                name: "before_discount_total",
                orderable: false,
                "searchable": false
            }, {
                data: "discount_amount",
                name: "discount_amount",
                orderable: false,
                "searchable": false
            }, {
                data: "final_total",
                name: "final_total",
                orderable: false,
                "searchable": false
            }, {
                data: "total_paid",
                name: "total_paid",
                orderable: false,
                "searchable": false
            }, {
                data: "total_remaining",
                name: "total_remaining",
                orderable: false,
                "searchable": false
            }, 
            // {
            //     data: "status",
            //     name: "status",
            //     orderable: false,
            //     "searchable": false
            // },
        ],
        fnDrawCallback: function(oSettings) {
            __currency_convert_recursively($("#fee_transaction_table"));
        },
        footerCallback: function(row, data, start, end, display) {
            var total_final_total = 0;
            var total_paid = 0;
            var total_remaining = 0;
            var before_discount_total= 0;
            var discount_amount= 0;
            
            for (var r in data) {
                total_final_total += $(
                        data[r].final_total
                    ).data("orig-value") ?
                    parseFloat(
                        $(data[r].final_total).data("orig-value")
                    ) :
                    0;
                total_paid += $(
                        data[r].total_paid
                    ).data("orig-value") ?
                    parseFloat(
                        $(data[r].total_paid).data("orig-value")
                    ) :
                    0;
                total_remaining += $(data[r].total_remaining).data("orig-value") ?
                    parseFloat($(data[r].total_remaining).data("orig-value")) :
                    0;
                before_discount_total += $(data[r].before_discount_total).data("orig-value") ?
                    parseFloat($(data[r].before_discount_total).data("orig-value")) :
                    0;
                discount_amount += $(data[r].discount_amount).data("orig-value") ?
                    parseFloat($(data[r].discount_amount).data("orig-value")) :
                    0;
                
            }
            $(".footer_final_total").html(
                __currency_trans_from_en(total_final_total)
            );
            $(".footer_before_discount_total").html(
                __currency_trans_from_en(before_discount_total)
            );
            $(".footer_discount_amount").html(
                __currency_trans_from_en(discount_amount)
            );
            $(".footer_total_paid").html(
                __currency_trans_from_en(total_paid)
            );
            $(".footer_total_remaining").html(__currency_trans_from_en(total_remaining));
        },
    });
    //Delete Sale
    $(document).on('click', '.delete-fee_transaction', function(e) {
        e.preventDefault();
        swal({
            title: LANG.sure,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willDelete => {
            if (willDelete) {
                var href = $(this).attr('href');
                $.ajax({
                    method: 'DELETE',
                    url: href,
                    dataType: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            toastr.success(result.msg);
                            fee_transaction_table.ajax.reload();

                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            }
        });
    });
    $(document).on('change', '#campus_id,#payment_status,#list_filter_date_range,#transaction_type', function() {
        fee_transaction_table.ajax.reload();
    });
    

});

</script>
 @endsection
