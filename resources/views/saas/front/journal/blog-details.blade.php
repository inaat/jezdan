@extends('saas.front.layout.app')

@section('pageHeading')
  @if (!empty($pageHeading))
    {{ $pageHeading->blog_details_page_title ?? 'Blog Details' }}
  @endif
@endsection

@section('metaKeywords')
  {{ $details->meta_keywords }}
@endsection

@section('metaDescription')
  {{ $details->meta_description }}
@endsection

@section('content')
<div class="page-title-area">
        <div class="container">
            <div class="content text-center aos-init aos-animate" data-aos="fade-up">
                <h1>     {{$details->title}}
</h1>
                <ul class="list-unstyled">
                    <li class="d-inline"><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active">  {{ __('Blog Details') }}
</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="blog-details-area pt-120 pb-90">
        <div class="container">
            <div class="row justify-content-center gx-xl-5">
                <div class="col-lg-8">
                    <div class="blog-description mb-50">
                        <article class="item-single">
                            <div class="image">
                                <div class="lazy-container aspect-ratio-16-9">
                                    <img class="lazy-image ls-is-cached lazyloaded" src="{{ asset('assets/saas/admin/img/blogs/' . $details->image) }}" data-src="{{ asset('assets/saas/admin/img/blogs/' . $details->image) }}" alt="Blog Image">
                                </div>
                            </div>
                            <div class="content">
                            
                                <ul class="info-list">
                            <li><i class="fal fa-user"></i>{{ $details->author }}</li>
                            <li><i class="fal fa-calendar"></i>{{ date_format($details->created_at, 'M d, Y') }}</li>
                            <li><i class="fal fa-tag"></i>{{ $details->categoryName }}</li>
                                </ul>
                                <h3 class="title">
                                   {{$details->title}}
                                </h3>
                                <div class="summernote-content">
                    {!! replaceBaseUrl($details->content, 'summernote') !!}
                                </div>
                            </div>
                            <div class="blog-social">
                                <div class="shop-social d-flex align-items-center">
                                    <span>{{ __('Share') }}</span>
                                    <ul>
                                                          <li class="p-1"><a href="//www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"><i class="fab fa-facebook-f"></i></a></li>
                      <li class="p-1"><a href="//twitter.com/intent/tweet?text=my share text&amp;url={{ urlencode(url()->current()) }}"><i class="fab fa-twitter"></i></a></li>
                      <li class="p-1"><a href="//www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}&amp;title={{ $details->title }}"><i class="fab fa-linkedin"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                        </article>


                    </div>
                    <div class="blog-details-comment mt-5">
                        <div class="comment-lists">
                            <div id="disqus_thread"></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-widget-area">


    <div class="widget widget-post mb-30">
        <h3 class="title">Recent Posts</h3>
  @if (count($relatedBlogs) == 0)
                    <div class="row text-center">
                      <div class="col">
                        <h5 class="mt-40">{{ __('No Related Blog Found') . '!' }}</h5>
                      </div>
                    </div>
                  @else
                   @foreach ($relatedBlogs as $relatedBlog)
                <article class="article-item mb-30">
            <div class="image">
                <a href="https://coursemat.xyz/blog-details/consectetur,-adipisci-velit,-sed-quia-non-numquam-eius/91" class="lazy-container aspect-ratio-1-1 d-block">
                    <img class="lazy-image ls-is-cached lazyloaded" src="{{ asset('assets/saas/admin/img/blogs/' . $relatedBlog->image) }}" data-src="{{ asset('assets/saas/admin/img/blogs/' . $relatedBlog->image) }}" alt="Blog Image">
              
                </a>
            </div>
            <div class="content">
                <h6>
                    <a href="https://coursemat.xyz/blog-details/consectetur,-adipisci-velit,-sed-quia-non-numquam-eius/91">
                       {{ strlen($relatedBlog->title) > 30 ? mb_substr($relatedBlog->title, 0, 30, 'UTF-8') . '...' : $relatedBlog->title }}
                    </a>
                </h6>
                <div class="time">
                  {{ date_format($relatedBlog->created_at, 'M d, Y') }}
                </div>
            </div>
        </article>
          @endforeach
                   
                  @endif
              
               
            </div>

    <div class="widget widget-categories mb-30">
        <h3 class="title">{{ __('Categories') }}</h3>
            @if (count($categories) == 0)
          <h5>{{ __('No Category Found') . '!' }}</h5>
        @else
        <ul class="list-unstyled m-0">
            @foreach ($categories as $category)
              <li @if ($category->slug == request()->input('category')) class="d-flex align-items-center justify-content-between  active" @endif>
                <a href="#" data-category_id="{{ $category->slug }}">{{ $category->name }} <span>{{ $category->blogCount }}</span></a>
              </li>
            @endforeach

                    </ul>
                       @endif
    </div>

</aside>


                </div>
            </div>
        </div>
    </div>
@endsection
