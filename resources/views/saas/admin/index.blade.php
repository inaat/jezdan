@extends('saas.admin.layout')

@section('content')
  <div class="mt-2 mb-4">
    <h2 class="text-white pb-2">{{ __('Welcome back,') }} {{ '555' . ' ' . '5555' . '!' }}</h2>
  </div>

  {{-- dashboard information start --}}

  <div class="row dashboard-items">
    
      <div class="col-sm-6 col-md-4">
        <a href="">
          <div class="card card-stats card-success card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="fal fa-book"></i>
                  </div>
                </div>

                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category">{{ __('Courses') }}</p>
                    <h4 class="card-title">5</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-6 col-md-4">
        <a href="">
          <div class="card card-stats card-danger card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="fal fa-sitemap"></i>
                  </div>
                </div>

                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category">{{ __('Course Categories') }}</p>
                    <h4 class="card-title">5</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>


      <div class="col-sm-6 col-md-4">
        <a href="#">
          <div class="card card-stats card-primary card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="fal fa-users-class"></i>
                  </div>
                </div>

                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category">{{ __('Course Enrolments') }}</p>
                    <h4 class="card-title">5</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>


      <div class="col-sm-6 col-md-4">
        <a href="">
          <div class="card card-stats card-warning card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="fal fa-chalkboard-teacher"></i>
                  </div>
                </div>

                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category">{{ __('Instructors') }}</p>
                    <h4 class="card-title">6</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>


  
      <div class="col-sm-6 col-md-4">
        <a href="#">
          <div class="card card-stats card-info card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="fal fa-blog"></i>
                  </div>
                </div>

                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category">{{ __('Blog') }}</p>
                    <h4 class="card-title">5</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>


      <div class="col-sm-6 col-md-4">
        <a href=""
          <div class="card card-stats card-secondary card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="la flaticon-users"></i>
                  </div>
                </div>

                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category">{{ __('Registered Users') }}</p>
                    <h4 class="card-title">555</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ __('Monthly Income') }} ({{ date('Y') }})</div>
        </div>

        <div class="card-body">
          <div class="chart-container">
            <canvas id="incomeChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ __('Monthly Enrolments') }} ({{ date('Y') }})</div>
        </div>

        <div class="card-body">
          <div class="chart-container">
            <canvas id="enrolmentChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- dashboard information end --}}
@endsection

@section('script')

@endsection
