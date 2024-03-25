<!DOCTYPE html>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Students Particulars</title>
<link href="{{ url('tenant/assets/css/rtl/rtl_paper.css') }}"rel="stylesheet" />

<script src="{{ url('tenant/assets/js/jquery.min.js') }}"></script>

</head>

@php
$question_count = 1;
$page_break_count=0;
$already_break=0;
@endphp


<body>
    <button class="print_data" onclick="printData()">Print me</button>

    <div class="page" size="A4" id="page">

    <div class="paper_top">
        <img src="{{ url('/uploads/invoice_logo/logo.jpeg') }}" width="100% " height="100px">
        <h3 style="text-align: center;margin:0px;padding:0px;"><b>Paper <strong>{{ $class_subject->name }}</strong> for Class {{ $class_subject->classes->title }} Second Term Examination August 2022  <b></h3>
        <span class="urduText" style="margin:0px;padding:0px;display: inline;float: left;"> وقت : {{ $input['paper_time'] }}</span>
        <span class="urduText" style=" margin:0px;padding:0px;display: inline;float: right;">کل نمبر:
            {{ $input['paper_total_marks'] }}</span>
    </div>

    @include('tenant.Curriculum.paper_maker.ltr_print_partials.mcq')
    @include('tenant.Curriculum.paper_maker.ltr_print_partials.fill_in_the_blank')
    @include('tenant.Curriculum.paper_maker.ltr_print_partials.true_and_false')
    @include('tenant.Curriculum.paper_maker.print_partials.column_matching')
    @include('tenant.Curriculum.paper_maker.print_partials.words_and_use')
    @include('tenant.Curriculum.paper_maker.print_partials.paraphrase')
    @include('tenant.Curriculum.paper_maker.print_partials.passage')
    @include('tenant.Curriculum.paper_maker.print_partials.stanza')
    @include('tenant.Curriculum.paper_maker.ltr_print_partials.short')
    @include('tenant.Curriculum.paper_maker.ltr_print_partials.long')
    @include('tenant.Curriculum.paper_maker.print_partials.translation_to_urdu')
    @include('tenant.Curriculum.paper_maker.print_partials.translation_to_english')
    @include('tenant.Curriculum.paper_maker.print_partials.grammar')
    @include('tenant.Curriculum.paper_maker.print_partials.contextual')
    @include('tenant.Curriculum.paper_maker.print_partials.singular_and_plural')
    @include('tenant.Curriculum.paper_maker.print_partials.masculine_and_feminine')
     

    </div>



    <script>
        function printData() {
            checkPto('mcq_pto');
            checkPto('fill_pto');
            checkPto('true_pto');
            checkPto('short_pto');
            checkPto('long_pto');


            window.print();
        }

        function checkPto(idpto) {
            var checkpto = $('#' + idpto);
            if (checkpto.text().length > 1 && checkpto) {
                checkpto.closest(".find").find(".custom_break").addClass("pagebreak");;
            }

        }

    </script>
</body>

</html>

