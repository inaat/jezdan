<div class="page-title-area">
    <div class="container">
        <div class="content text-center aos-init aos-animate" data-aos="fade-up">
            <h1> {{ !empty($title) ? $title : '' }}
            </h1>
            <ul class="list-unstyled">
                <li class="d-inline"><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                <li class="d-inline">/</li>
                <li class="d-inline active"> {{ !empty($title) ? $title : '' }}
                </li>
            </ul>
        </div>
    </div>
</div>



