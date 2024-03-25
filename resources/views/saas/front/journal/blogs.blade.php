@extends('saas.front.layout.app')

@section('pageHeading')
@if (!empty($pageHeading))
{{ $pageHeading->blog_details_page_title ?? 'Blog Details' }}
@endif
@endsection

{{-- @section('metaKeywords')
  {{ $details->meta_keywords }}
@endsection

@section('metaDescription')
{{ $details->meta_description }}
@endsection --}}

@section('content')
@includeIf('saas.front.partials.breadcrumb', ['title' => $pageHeading->blog_details_page_title ?? 'Blog Details'])

<!--====== BLOG DETAILS PART START ======-->
<section class="blog-area pb-90 pt-120">
    <div class="container">

        <div class="row justify-content-center">
        @foreach ($blogs as  $blog)
            
       

            <div class="col-md-6 col-lg-4">
                <article class="card mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-image">
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="lazy-container aspect-ratio-16-9">
                            <img class="lazy-image lazyloaded" data-src="{{ asset('assets/saas/admin/img/blogs/' . $blog->image) }}" alt="Banner Image" src="https://coursemat.xyz/assets/front/img/blogs/1658244529.jpg">
                        </a>
                        <ul class="info-list">
                              <li><i class="fal fa-user"></i>{{ $blog->author }}</li>
                            <li><i class="fal fa-calendar"></i>{{ date_format($blog->created_at, 'M d, Y') }}</li>
                            <li><i class="fal fa-tag"></i>{{ $blog->categoryName }}</li>
                        </ul>
                    </div>
                    <div class="content">
                        <h3 class="card-title">
                            <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}">
                                                                {{ strlen($blog->title) > 30 ? mb_substr($blog->title, 0, 30, 'UTF-8') . '...' : $blog->title }}

                            </a>
                        </h3>
                        <p class="card-text">
                        {!! strlen(strip_tags($blog->content)) > 100 ? mb_substr(strip_tags($blog->content), 0, 100, 'UTF-8') . '...' : strip_tags($blog->content) !!}

                        </p>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="card-btn">Read More</a>
                    </div>
                </article>
            </div>
          @endforeach
        </div>
        <div class="pagination mb-30 justify-content-center">

        </div>
    </div>
    <!-- Bg Overlay -->
    <img class="bg-overlay" src="https://coursemat.xyz/assets/front/img/shadow-bg-2.png" alt="Bg">
    <img class="bg-overlay" src="https://coursemat.xyz/assets/front/img/shadow-bg-1.png" alt="Bg">
    <!-- Bg Shape -->
    <div class="shape">
        <img class="shape-1" src="https://coursemat.xyz/assets/front/img/shape/shape-10.png" alt="Shape">
        <img class="shape-2" src="https://coursemat.xyz/assets/front/img/shape/shape-6.png" alt="Shape">
        <img class="shape-3" src="https://coursemat.xyz/assets/front/img/shape/shape-7.png" alt="Shape">
        <img class="shape-4" src="https://coursemat.xyz/assets/front/img/shape/shape-4.png" alt="Shape">
        <img class="shape-5" src="https://coursemat.xyz/assets/front/img/shape/shape-3.png" alt="Shape">
        <img class="shape-6" src="https://coursemat.xyz/assets/front/img/shape/shape-8.png" alt="Shape">
    </div>
</section>
<!--====== BLOG DETAILS PART END ======-->
@endsection

