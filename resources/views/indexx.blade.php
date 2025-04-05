@extends('layouts.app')
@section('content')
<main>

    <section class="swiper-container js-swiper-slider swiper-number-pagination slideshow" data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
              <img loading="lazy" src="{{ asset('assets/images/slide1.png')}}" width="542" height="4000"
                alt=""
                class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
              <div class="character_markup type2">
                <p
                  class="text-uppercase font-sofia mark-grey-color animate animate_fade animate_btt animate_delay-10 mb-0">
                  </p>
              </div>
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle" style="margin-top: 60px;">
              <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                New Arrivals</h6>
              <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Brand New</h2>
              <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Supplements</h2>
              <a href="{{route('shop.indexx')}}"
                class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                Now</a>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
              <img loading="lazy" src="{{ asset('assets/images/slide2.png')}}" width="400" height="1500"
                alt=""
                class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
              <div class="character_markup">
                <p class="text-uppercase font-sofia fw-bold animate animate_fade animate_rtl animate_delay-10">
                </p>
              </div>
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle" style="margin-top: 60px;">
              <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                New Arrivals</h6>
              <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Brand New</h2>
              <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Supplements</h2>
              <a href="#"
                class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                Now</a>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
              <img loading="lazy" src="{{ asset('assets/images/slide3.png')}}" width="400" height="690"
                alt=""
                class="slideshow-character__img animate animate_fade animate_rtl animate_delay-10 w-auto h-auto" />
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle" style="margin-top: 60px;">
              <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                New Arrivals</h6>
              <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Brand New</h2>
              <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Supplements</h2>
              <a href="#"
                class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                Now</a>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div
          class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5">
        </div>
      </div>
    </section>
    <div class="container mw-1620 bg-white border-radius-10">
      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

      <section class="category-carousel container">
        <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">You Might Like</h2>

        <div class="position-relative">
          <div class="swiper-container js-swiper-slider" data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 4,
              "centeredSlides": true,
              "centerInsufficientSlides": true,
              "spaceBetween": 30,
              "loop": true,
              "navigation": {
                "nextEl": ".products-carousel__next-1",
                "prevEl": ".products-carousel__prev-1"
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "centeredSlides": true,
                  "centerInsufficientSlides": true,
                  "slidesPerGroup": 2,
                  "spaceBetween": 15
                },
                "768": {
                  "slidesPerView": 3,
                  "centeredSlides": true,
                  "centerInsufficientSlides": true,
                  "slidesPerGroup": 3,
                  "spaceBetween": 30
                },
                "992": {
                  "slidesPerView": 4,
                  "centeredSlides": true,
                  "centerInsufficientSlides": true,
                  "slidesPerGroup": 1,
                  "spaceBetween": 45,
                  "pagination": false
                },
                "1200": {
                  "slidesPerView": 4,
                  "centeredSlides": true,
                  "centerInsufficientSlides": true,
                  "slidesPerGroup": 1,
                  "spaceBetween": 60,
                  "pagination": false
                }
              }
            }'>

            <style>
              .borderr {
                border-radius: 10%;
              }
              /* On définit une largeur minimale pour chaque slide */
              .swiper-slide {
                min-width: 250px;
              }
              .swiper-slide img {
                width: 100%;
                height: 200px; /* Hauteur ajustée */
                object-fit: cover;
              }
              /* Optionnel : marges pour le texte */
              .swiper-slide .menu-link {
                display: block;
                text-align: center;
                margin-top: 10px;
              }
            </style>

            <div class="swiper-wrapper">
              @foreach($categories as $categorie)
                <div class="swiper-slide">
                <a href="{{ url('/shop?page=1&size=12&order=-1&categories=' . $categorie->id . '&min=1&max=500') }}">
                  <img loading="lazy" class="mb-3 borderr" src="{{ asset('uploads/categories/' . $categorie->image) }}" alt="{{ $categorie->name }}" />
                  <div class="text-center">
                    <a href="{{ url('/shop?page=1&size=12&order=-1&categories=' . $categorie->id . '&min=1&max=500') }}" class="menu-link fw-medium">{{ $categorie->name }}</a>
                  </div>
                </div>
              @endforeach
            </div><!-- /.swiper-wrapper -->

            <div class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
              <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_prev_md" />
              </svg>
            </div><!-- /.products-carousel__prev -->

            <div class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
              <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_next_md" />
              </svg>
            </div><!-- /.products-carousel__next -->
          </div><!-- /.swiper-container -->
        </div><!-- /.position-relative -->
      </section>



      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

      <section class="hot-deals container">
        <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Hot Deals</h2>
        <div class="row">
          <div class="col-md-6 col-lg-4 col-xl-20per d-flex align-items-center flex-column justify-content-center py-4 align-items-md-start">
            <h2>Summer Sale</h2>
            <h2 class="fw-bold">Up to 60% Off</h2>

            <div class="position-relative d-flex align-items-center text-center pt-xxl-4 js-countdown mb-3"
              data-date="18-3-2024" data-time="06:50">
              <div class="day countdown-unit">
                <span class="countdown-num d-block"></span>
                <span class="countdown-word text-uppercase text-secondary">Days</span>
              </div>

              <div class="hour countdown-unit">
                <span class="countdown-num d-block"></span>
                <span class="countdown-word text-uppercase text-secondary">Hours</span>
              </div>

              <div class="min countdown-unit">
                <span class="countdown-num d-block"></span>
                <span class="countdown-word text-uppercase text-secondary">Mins</span>
              </div>

              <div class="sec countdown-unit">
                <span class="countdown-num d-block"></span>
                <span class="countdown-word text-uppercase text-secondary">Sec</span>
              </div>
            </div>

            <a href="{{route('shop.indexx')}}" class="btn-link default-underline text-uppercase fw-medium mt-3">View All</a>
          </div>
          <div class="col-md-6 col-lg-8 col-xl-80per">
            <div class="position-relative">
              <div class="swiper-container js-swiper-slider" data-settings='{
                  "autoplay": { "delay": 5000, "disableOnInteraction": false },
    "slidesPerView": 4,
    "slidesPerGroup": 4,
    "effect": "none",
    "loop": true,
    "breakpoints": {
      "320": { "slidesPerView": 2, "slidesPerGroup": 2, "spaceBetween": 14 },
      "768": { "slidesPerView": 2, "slidesPerGroup": 3, "spaceBetween": 24 },
      "992": { "slidesPerView": 3, "slidesPerGroup": 1, "spaceBetween": 30, "pagination": false },
      "1200": { "slidesPerView": 4, "slidesPerGroup": 1, "spaceBetween": 30, "pagination": false }
    }
  }'>
                <style>
                  .pc__img {
                    width: 300px !important;
                    height: 300px !important;
                    object-fit: cover;

                  }
                  /* Recadre l'image pour qu'elle remplisse le conteneur */
                  .box {
                  }
                </style>
                <div class="swiper-wrapper">
                  @foreach($products as $product)
                    <div class="swiper-slide product-card product-card_style3 box">
                      <div class="pc__img-wrapper ">
                        <a href="{{route('shop.products.details',['product_slug'=>$product->slug])}}">
                          <img loading="lazy" src="{{ asset('uploads/products/' . $product->image) }}" width="150" height="150" alt="{{ $product->name }}" class="pc__img">
                          <!-- Vous pouvez afficher une seconde image si disponible ou réutiliser la même -->
                          <img loading="lazy" src="{{ asset('uploads/products/' . $product->image) }}" width="150" height="150" alt="{{ $product->name }}" class="pc__img pc__img-second">
                        </a>
                      </div>
                      <div class="pc__info position-relative">
                        <h6 class="pc__title">
                          <a href="{{route('shop.products.details',['product_slug'=>$product->slug])}}">{{ $product->name }}</a>
                        </h6>
                        <div class="product-card__price d-flex">
                          <span class="money price text-secondary">${{ $product->sale_price }}</span>
                        </div>

                        <div class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                          <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                          <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-quick-view" data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
                            <span class="d-none d-xxl-block">Quick View</span>
                            <span class="d-block d-xxl-none">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_view" />
                              </svg>
                            </span>
                          </button>
                          <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <use href="#icon_heart" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div><!-- /.swiper-wrapper -->
              </div><!-- /.swiper-container js-swiper-slider -->
            </div><!-- /.position-relative -->
          </div>
        </div>
      </section>

      <style>
        .dt {
            width: 100% !important;
            height: 600px !important;
            object-fit: cover;
            border-radius: 4px;

        }
      </style>

      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>


      <section class="category-banner container">
        <div class="row">
          <div class="col-md-6">
            <div class="category-banner__item border-radius-10 mb-5">
              <img loading="lazy" class="h-auto dt" src="{{ asset('assets/images/banner1.jpg')}}" 
                alt="" />
              <div class="category-banner__item-mark">
                Starting at $19.99
              </div>
              <div class="category-banner__item-content">
                <h3 class="mb-0">NEW COLLECTION </h3>
                <a href="{{route('shop.indexx')}}" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="category-banner__item border-radius-10 mb-5">
              <img loading="lazy" class="h-auto dt" src="{{ asset('assets/images/banner4.jpg')}}"
                alt="" />
              <div class="category-banner__item-mark">
                Starting at $9.99
              </div>
              <div class="category-banner__item-content">
                <h3 class="mb-0">MULTIVITAMINS</h3>
                <a href="{{route('shop.indexx')}}" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

      <section class="products-grid container">
        <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Featured Products</h2>

        <div class="row">
            @foreach ($featureds as $f )

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
                  
                  <div class="pc__img-wrapper">
                    

                    <a href="{{route('shop.products.details',['product_slug'=>$f->slug])}}">
                      
                      <img loading="lazy" src="{{ asset('uploads/products/'.$f->image)}}" width="330" height="400"
                        alt="" class="pc__img">
                        @if(Cart::instance('cart')->content()->where('id',$f->id)->count()>0)
                        <a href="{{route('cart.index')}}" class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium btn-warning mb-3">Go to Cart</a>
                    @else

                      <form name="addtocart-form" method="post" action="{{route('cart.add')}}">
                       @csrf
                       <input type="hidden" name="id" value="{{$product->id}}">
              <input type="hidden" name="name" value="{{$product->name}}">
              <input type="hidden" name="sale_price" value="{{$product->sale_price}}">
              <input type="hidden" name="image" value="{{$product->image}}">
              <input type="hidden" name="quantity" value="1">
              
                       <button type="submit" class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                      </form>
                    @endif
                        
                    </a>
                    
                  </div>

                  <div class="pc__info position-relative">
                    <h6 class="pc__title"><a href="{{route('shop.products.details',['product_slug'=>$f->slug])}}">{{$f->name}}</a></h6>
                    <div class="product-card__price d-flex align-items-center">
                      <span class="money price text-secondary">${{$f->sale_price}}</span>
                    </div>

                    <div
                      class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                      <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-quick-view"
                        data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
                        <span class="d-none d-xxl-block">Quick View</span>
                        <span class="d-block d-xxl-none"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_view" />
                          </svg></span>
                      </button>
                      <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <use href="#icon_heart" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

            @endforeach


        </div><!-- /.row -->

        <div class="text-center mt-2">
          <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="#">Load More</a>
        </div>
      </section>
    </div>

    <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

  </main>

@endsection
