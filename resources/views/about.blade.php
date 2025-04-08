@extends('layouts.app')
@section('content')
<style>
    .imp{
        width: 600px !important;
        height: 500px !important;
    }
    .idp{
        width: 100% !important;
        height: 500px !important;
        align-items: center !important;
        align-self: center !important;
        align-content: center !important;
        border-radius: 10px;
    }
</style>
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">
      <div class="mw-930">
        <h2 class="page-title">About US</h2>
      </div>

      <div class="about-us__content pb-5 mb-5">
        <p class="mb-5">
          <img loading="lazy" class="w-100 h-auto d-block idp" src="{{asset('assets/images/products/b12.png')}}" 
           alt="" />
        </p>
        <div class="mw-930">
          <h3 class="mb-4">OUR STORY</h3>
          <p class="fs-6 fw-medium mb-4">Founded by sports enthusiasts,<strong>WY-SPORT</strong> began with a simple idea: to make premium sports equipment accessible to everyone. From humble beginnings in a small garage, we’ve grown into a trusted online destination for fitness lovers, athletes, and sports teams worldwide. Our journey is fueled by passion, dedication, and the belief that everyone deserves the right gear to perform at their best.</p>
    
          <div class="row mb-3">
            <div class="col-md-6">
              <h5 class="mb-3">Our Mission</h5>
              <p class="mb-3">At <strong>WY-SPORT</strong>, our mission is to empower athletes of all levels by providing high-quality, performance-driven sports gear and apparel. We are committed to helping individuals push their limits, achieve their goals, and live healthier, more active lives. Every product we offer is carefully selected to support your journey—on and off the field.</p>
            </div>
            <div class="col-md-6">
              <h5 class="mb-3">Our Vision</h5>
              <p class="mb-3">We envision a world where sport is not just an activity, but a way of life. Our goal is to become a global leader in sports e-commerce by offering innovative products, outstanding customer service, and a community-driven experience. We aim to inspire and support a generation that values health, discipline, and the spirit of competition.</p>
            </div>
          </div>
        </div>
        <div class="mw-930 d-lg-flex align-items-lg-center">
          <div class="image-wrapper col-lg-6">
            <img class="h-auto imp" loading="lazy" src="{{asset('assets/images/products/b13.png')}}"  alt="">
          </div>
          <div class="content-wrapper col-lg-6 px-lg-4">
            <h5 class="mb-3">The Company</h5>
            <p><STRong></STRong> is a dynamic sports e-commerce company built on integrity, innovation, and performance. Our team consists of athletes, trainers, and sports lovers who understand what it takes to succeed. We partner with top brands and emerging names to bring you a curated selection of gear that blends quality with affordability. Whether you're a beginner or a pro, we're here to help you perform at your peak.

</p>
          </div>
        </div>
      </div>
    </section>


  </main>

@endsection