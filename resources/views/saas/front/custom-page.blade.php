@extends('saas.front.layout.app')

@section('pageHeading')
  {{ $pageInfo->title }}
@endsection

@section('metaKeywords')
  {{ $pageInfo->meta_keywords }}
@endsection

@section('metaDescription')
  {{ $pageInfo->meta_description }}
@endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('assets/css/summernote-content.css') }}">
@endsection

@section('content')
@includeIf('saas.front.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageInfo->title])

  <!--====== PAGE CONTENT PART START ======-->


  <section class="terms-condition-area pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 m-auto">

                    <div class="item-single mb-30 aos-init aos-animate" data-aos="fade-up">
            {!! replaceBaseUrl($pageInfo->content, 'summernote') !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
  <!--====== PAGE CONTENT PART END ======-->
@endsection
