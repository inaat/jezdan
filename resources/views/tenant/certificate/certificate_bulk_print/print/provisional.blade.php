<!DOCTYPE html>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@lang('english.fee_card')</title>

<style>
    @media print {

    @font-face {
		font-family: 'certificate';
		font-style: normal;
		font-weight: 400;
        src: url({{  url('/fonts/Certificate.ttf')}}) format('embedded-opentype'),
              url({{  url('/fonts/Certificate.ttf')}}) format('opentype');

	  }

        html {
            height: 100%;
        }

        body {
            position: relative;
            height: 100%;

            font-family: 'Roboto Condensed', sans-serif;
            background-color: #fff;

        }

        body:before {
            font-family: 'certificate' !important;

   content: '{{ session()->get("system_details.org_short_name") }}';
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: -1;

            color: #0d745e;
            font-size: 100px;
            font-weight: 500px;

            display: grid;
            justify-content: center;
            align-content: center;
            opacity: 0.2;
            transform: rotate(-45deg);
        }

        .bold {
            font-weight: bold;
        }

        .cursive {
            font-family: "certificate";
        }

        .sans {
            font-family: "Open Sans", sans-serif;
        }

        @page {
            margin: 8px;
            padding: 3px;
        }



        .pace-progress {
            display: none;
        }

        * {
            margin: 0px;
            padding: 0px;
            page-break-inside: avoid;
            font-family: sans serif;

        }

        @page {

            size: letter;
            -webkit-print-color-adjust: exact;
            page-break-inside: avoid;

        }


      

        .header {
            margin: 0 auto;
            text-align: center;

        }

        h2 {
            margin: auto;
            text-align: center;
            padding: 20px;
            position: relative;
            display: inline-block;
        }

        h2:after {
            content: '';
            background: black;
            width: 100%;
            height: 2px;
            display: block;

        }




 
.topunderline:after {
    content: '';
    background: black;
    width: 100%;
    height: 2px;
    display: block;
 
}

	.container {
	  display: grid;
  grid-template-columns: 300px 300px 150px;	 
    margin:0;
    color:#000;
	  
	}
	.column {
	  margin: 10px;
      line-height:50px;
      
	}

        .info-container {
            display: grid;
            grid-template-columns: 50% 50%;
            margin: 0;
            color: #000;

        }

        .column,
        p {
            margin: 10px;


        }

        .text-align-center {
            text-align: center;
        }

        .text-align-left {
            padding: 5px;

            text-align: left;
        }

        .text-align-right {
            padding: 5px;

            text-align: right;
        }

        .photo {
            /* 70% of the parent*/
            border: 1px solid {{  config('constants.head_bg_color') }};
            margin:0 auto;
            /* background:rgb(4,101,49); */
            text-align: center;
            /* color: white; */
            padding: 3px;
            border-radius: 5px;

            text-align: center;
        }

        #student-header>h6 {
            width: 50%;
            margin: 0 auto;
            text-align: center;
            background: {{  config('constants.head_bg_color') }};
            text-align: center;
            color: #fff !important;
            padding: 5px;
            border-radius: 5px;


        }

        .student-info {
            width: 100%;
        }

        .roww {
            display: flex;
            padding: 5px;
            color: #000;
            font-weight: bold;
            {{-- border: 1px solid black; --}}
            margin: 10px;

        }

        .underline {
            flex-grow: 1;
            border-bottom: 1px solid black;
            text-align: center;
        }

        .mg-left {
            margin-left: 10px;
        }

        .check {
            border: 1px solid black;
            width: 20px;
            height: 20px;
        }

        .grid {
            display: flex;
            margin: 10px;
            color: #000;

        }

        .bottom-column {

            width: 300px;

            line-height: 2.1;

        }
    }

</style>
</head>

<body style="color:#000">
@foreach ( $certificate_issue as $issue )

     <div class="logo"  style="height: 150px;width: 100%;" >
    
        @include('tenant.common.logo')
    </div>
    <div class="header">
        <h2 class="cursive bold" id="head" style="text-transform: capitalize">Provisional Certificate</h2>
    </div>
   <div class="container ">
	   <div class="column">
	     <table width="100%" >
             <thead>
              <tr>
             <th><div class="underline text-align-center">@lang('english.certificate_no')</div></th>
             <td ><div class="underline text-align-center"><strong>{{ ucwords($issue->certificate_no) }}</strong> </div></td>
             </tr>
             <tr>
             <tr>
             <th><div class="underline text-align-center">@lang('english.student_id')</div></th>
             <td ><div class="underline text-align-center"><strong>{{ ucwords($issue->student->roll_no) }}</strong> </div></td>
             </tr>
             <tr>
          
            
             </thead>
         </table>
	   </div>
	   <div class="column">
       	     <table width="100%" >
             <thead>
             <tr>
             <th><div class="underline text-align-center">@lang('english.admission_no')</div></th>
             <td ><div class="underline text-align-center"><strong>{{ ucwords($issue->student->admission_no) }}</strong> </div></td>
             </tr>
             <tr>
             <th><div class="underline text-align-center">@lang('english.issue_date')</div></th>
             <td ><div class="underline text-align-center"><strong>{{ @format_date($issue->issue_date) }}</strong> </div></td>
             </tr>
             
             </thead>
         </table>
	   </div>
	   <div class="column photo">
	                             @if (file_exists($issue->student->student_image))
                        <img width="100%" height="130" src="{{ url($issue->student->student_image) }}" />
                        @else
                        <img width="100%" height="170" src="{{ url('tenant/uploads/student_image/default.png') }}" />
                      @endif

	   </div>
      
	</div>
    <div class="student-info">
    
        <div class='roww'>
            <div class='label'>@lang('english.name') <small>(@lang('english.in_capital_letters_as_per_certificate'))</small>:</div>
            <div class='underline'>{{ strtoupper($issue->student->first_name . ' '. $issue->student->last_name) }}</div>
        </div>
        <div class='roww'>
            <div class='label'>@lang('english.father_name') <small>(@lang('english.in_capital_letters_as_per_certificate'))</small></div>
            <div class='underline'>{{ strtoupper($issue->student->father_name) }}</div>
        </div>
        <div class='roww'>
            <div class='label'>@lang('english.date_of_birth')(@lang('english.in_figures')):</div>
            <div class='underline'>{{ @format_date($issue->student->birth_date) }}</div>
        </div>
        <div class='roww'>
            <div class='label'>@lang('english.date_of_birth')(@lang('english.in_words')):</div>
              @php
                 $new_birth_date = explode('-', $issue->student->birth_date);
                    $year = $new_birth_date[0];
                    $month = $new_birth_date[1];
                    $day  = $new_birth_date[2];
                    $birth_day=numToWord($day,'en','ORDINAL');
                    $birth_year=numToWord($year,'en','SPELLOUT');
                    $monthNum = $month;
                    $dateObj = \Carbon::createFromFormat('!m', $monthNum);//Convert the number into month name
                    $monthName = ucwords($dateObj->format('F'));
                    $birth_date=ucwords($birth_day).' '.$monthName.' '.ucwords($birth_year);
            @endphp
            <div class='underline'>{{ strtoupper($birth_date) }}</div>
        </div>
     

        <div class='roww'>
            <div class='label'>@lang('english.resident_of'):</div>
            <div class='underline'>{{ $issue->student->std_permanent_address}}</div>
        </div>
        <div class='roww'>
            <div class='label'>@lang('english.roll_no'):</div>
            <div class='underline'></div>
            <div class='label mg-left'>Board Regd No:</div>
            <div class='underline mg-left'></div>
            
        </div>
        <div class='roww'>
            <div class='underline'>Passed in the Secondary School Certificate Examination from Board of intermediate and Secondary Education Saidu Sharif Swat from this institution in the session.</div>
        </div>
        
       <div class='roww'>
            <div class='label'><u>Subject Passed</u></div>
            <div class='label' style='margin-left: 100px; line-height: 20px;'>1.Urdu <br>3.Maths<br> 5.Physics<br> 7.Biology</div>
            <div class='label' style='margin-left: 100px;'>2.English <br>4.Islamiat<br> 6.Chemistry<br> 8.Pak Study</div>
        </div>
        <div class='roww'>
            <div class='underline'>He/She obtained _____ out of ______ and has been placed in grade ___________.He/She is an intelligent and has a good moral character.</div>
        </div>
    </div>


    <div class="grid " style="border-bottom:1px solid #000;margin-top:5px;">
        <div class="bottom-column">
         <div class='roww'>
            <div class='label'>@lang('english.prepared_by'):</div>
            <div class='underline'>{{ Auth::User()->first_name}}  {{ Auth::User()->last_name }}</div>
        </div>
     
         <div class='roww'>
            <div class='label'>@lang('english.counter_sign'):</div>
            <div class='underline'></div>
        </div>
     
        

        </div>
        <div class="bottom-column">
            @php
             $school_name = session()->get('system_details.org_name');
                        $student_info=ucwords($issue->student->first_name . ' ' . $issue->student->last_name)."\r\n" . __('english.s/d_of')  . ucwords($issue->student->father_name) ."\r\n". 'Roll No: ' . $issue->student->roll_no."\r\n" . 'Birth Date: ' . $issue->student->birth_date."\r\n" ;
            $qr_code_details=[$school_name,$student_info];
            $qr_code_text = implode(' ', $qr_code_details);

            @endphp
            <img class="center-block " style="margin-left:70px;" src="data:image/png;base64,{{DNS2D::getBarcodePNG($qr_code_text, 'QRCODE')}}">

        </div>
        <div class="bottom-column ">


            <div style="text-align:center">
                {{-- <img src="{{ url('/uploads/invoice_logo/exam_controller.png') }}" style="height: 50px;width: 100%; margin-top:20px;"> --}}
                 <div style="height: 50px;width: 100%; margin-top:20px;">
                 </div>
                <strong> Principal<br>
                {{ strtoupper(session()->get('system_details.org_name'))}}<br>
                {{ session()->get('system_details.org_address',' ')}}<br>
                </strong>
            </div>
        </div>

    </div>
    
            <p style="page-break-after: always;"></p>

@endforeach
</body>

</html>

