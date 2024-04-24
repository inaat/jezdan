$(document).ready(function() {




    //fee_transaction_table
    var fee_transaction_table = $("#fee_transaction_table").DataTable({
        processing: true,
        serverSide: true,
        "ajax": {
            "url": "/guardian/student/get-transaction/1",
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