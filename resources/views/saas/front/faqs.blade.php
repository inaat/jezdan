@extends('saas.front.layout.app')

@section('pageHeading')
@if (!empty($pageHeading))
{{ $pageHeading->contact_page_title ?? 'FAQs' }}
@endif
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

@section('content')



@section('content')
@includeIf('saas.front.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->faq_page_title ?? 'FAQs'])



<div id="faq" class="faq-area pt-120 pb-90">
    <div class="container">
        <div class="accordion" id="faqAccordion">
            <div class="row justify-content-center">
                <div class="col-lg-8 has-time-line aos-init aos-animate" data-aos="fade-right">
                    <div class="row">
                        @if (count($faqs) == 0)
                        <h3 class="text-center">{{ __('No FAQ Found') . '!' }}</h3>
                        @else
                        @foreach ($faqs as $faq)
                        <div class="col-12">
                            <div class="accordion-item">
                                <h6 class="accordion-header" id="{{ 'heading' . $faq->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ 'collapse' . $faq->id }}" aria-expanded="false" aria-controls="{{ 'collapse' . $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h6>
                                <div id="{{ 'collapse' . $faq->id }}" class="accordion-collapse collapse  {{ $loop->first ? 'show' : '' }}" aria-labelledby="{{ 'heading' . $faq->id }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>{{ $faq->answer }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!--====== FAQ PART END ======-->
@endsection




