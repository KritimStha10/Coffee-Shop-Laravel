@include('frontend.layouts.header')

      <main class="main">
        @if($banners)
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" class="slider-all" style="height: 100vh;">
        
          @foreach($banners as $key=>$banner)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
              <img class="d-block w-100" src="{{ asset('uploads/banners/' . $banner->image) }}" alt="First slide">

            </div>
          @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        @endif
        <!-- End .page-header -->
        <class class="page-content pb-3" id="about">
          <div class="container mt-5">
                  <h2 class="title text-center mb-2">Who We Are</h2>
                  <div class="row mt-5">
                    <div class="col-lg-6" style="text-align: justify; padding: 20px; ">
                      <p>
                        Sed pretium, ligula sollicitudin laoreet viverra, tortor
                        libero sodales leo, eget blandit nunc tortor eu nibh.
                        Suspendisse potenti. Sed egestas, ante et vulputate
                        volutpat, uctus metus libero eu augue. Morbi purus libero,
                        faucibus adipiscing, commodo quis, gravida id, est. Sed
                        lectus. Praesent elementum hendrerit tortor. Sed semper
                        lorem at felis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque cumque dicta repudiandae commodi officiis cum architecto autem ab ad aperiam ut, rem sed, ea, praesentium minus voluptates quam beatae nam.
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <img src="{{ asset('frontend/assets/images/coffeeImages/j.jpg') }}" alt="image" style="border-radius: 10px;">
                    </div>
                  </div>

                    
                  
                  </div>
                  <!-- End .title text-center mb-2 -->
                  
                </div>
                <!-- End .about-text -->
              </div>
              <!-- End .col-lg-10 offset-1 -->
            </div>
            <!-- End .row -->
            <div class="row justify-content-center">
            @foreach($titles as $title)
              <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-sm text-center">
                  <span class="icon-box-icon">
                    <i class="icon-puzzle-piece"></i>
                  </span>
                  <div class="icon-box-content">
                    <h3 class="icon-box-title">{{$title->title}}</h3>
                    <!-- End .icon-box-title -->
                    <p>
                      {!! \Illuminate\Support\Str::limit($title->description,350) !!}
                    </p>
                  </div>
                  <!-- End .icon-box-content -->
                </div>
                <!-- End .icon-box -->
              </div>
            @endforeach
              <!-- End .col-lg-4 col-sm-6 -->

            </div>
            <!-- End .row -->
          </div>
          <!-- End .container -->

          <div class="mb-2"></div>
          <!-- End .mb-2 -->

          <div
            class="bg-image pt-7 pb-5 pt-md-12 pb-md-9"
            style="background-image: url(frontend/assets/images/backgrounds/bg-4.jpg)"
          >
            <div class="container">
              <div class="row">
              @foreach($counts as $count)
                <div class="col-6 col-md-3">
                  <div class="count-container text-center">
                    <div class="count-wrapper text-white">
                        {{$count->number}} +
                    </div>
                    <!-- End .count-wrapper -->
                    <h3 class="count-title text-white">{{$count->title}}</h3>
                    <!-- End .count-title -->
                  </div>
                  <!-- End .count-container -->
                </div>
                @endforeach
                <!-- End .col-6 col-md-3 -->

              </div>
              <!-- End .row -->
            </div>
            <!-- End .container -->
          </div>
          <!-- End .bg-image pt-8 pb-8 -->

          <!-- ****** our special product start ****** -->
       
          <div class="bg-lighter pt-6">
            <div class="container">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Our Special Taste</h2><!-- End .title -->
                    </div><!-- End .heading-left -->
                </div><!-- End .heading -->

                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                <div class="product product-7 text-center">
                  @foreach($products as $product)
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{ route('productdetails',$product->id)}}">
                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">coffee</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">{!! \Illuminate\Support\Str::limit($product->description,350) !!} <br>Lorem, ipsum.</a></h3><!-- End .product-title -->
                        <div class="product-price">
                           {{$product->price}}
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div><!-- End .rating-container -->

                       
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
               
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        <span class="product-label label-out">Most Sold</span>
                        <a href="product.html">
                            <img src="assets/images/coffeeImages/315830915_509376037883339_5802688951342876429_n.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->
                    @endforeach
                    

               

                   <!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .owl-carousel -->
            </div><!-- End .container -->
        </div>
        </class>
          <!-- End .bg-light-2 pt-6 pb-6 -->

          <!-- Testimonial Start -->
    <div class="container-fluid py-5">
      <div class="container">
          <div class="section-title">
              <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h4>
              <h1 class="display-4">Our Clients Say</h1>
          </div>
          <div class="owl-carousel testimonial-carousel">
          @foreach($testimonials as $testimonial)
              <div class="testimonial-item">
                  <div class="d-flex align-items-center mb-3">
                      <img class="img-fluid" src="{{ asset('uploads/testimonials/' . $testimonial->image) }}" alt="">
                      <div class="ml-3">
                          <h4>{{$testimonial->name}}</h4>
                          <i>{{$testimonial->designation}}</i>
                      </div>
                  </div>
                  <p class="m-0">{!! \Illuminate\Support\Str::limit($testimonial->description,350) !!}</p>
              </div>
          @endforeach
          </div>
      </div>
  </div>
  <!-- Testimonial End -->
  <!-- Back to Top -->
  

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/tempusdominus/js/moment.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

  <!-- Contact Javascript File -->
  <script src="{{ asset('frontend/mail/jqBootstrapValidation.min.js') }}"></script>
  <script src="{{ asset('frontend/mail/contact.js') }}"></script>

  <!-- Template Javascript -->
  <script src="{{ asset('frontend/js/main.js') }}"></script>
          <div class="container">
            <div class="row">
              <div class="col-lg-10 offset-lg-1">
                <div class="brands-text text-center mx-auto mb-6">
                  <h2 class="title">
                    The world's premium coffee brands in one destination.
                  </h2>
                  <!-- End .title -->
                  <p>
                    Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In
                    nisi neque, aliquet vel, dapibus id, mattis vel, nis
                  </p>
                </div>
                <!-- End .brands-text -->

              @foreach($brands as $brand) 
                <div class="brands-display">
                  <div class="row justify-content-center">
                    <div class="col-6 col-sm-4 col-md-3">
                      <a href="#" class="brand">
                        <img src="{{ asset('uploads/brands/' . $brand->image) }}"/>
                        <div class="ml-3">
                          <h4>{{$brand->title}}</h4>
                          <i>{{$brand->URL}}</i>
                        </div>
                      </a>
                    </div>
                    <!-- End .col-md-3 -->
              @endforeach
                   

                    

                   
                  
                    <!-- End .col-md-3 -->
                  </div>
                  <!-- End .row -->
                </div>
                <!-- End .brands-display -->
              </div>
              <!-- End .col-lg-10 offset-lg-1 -->
            </div>
            <!-- End .row -->
          </div>
          <!-- End .container -->
        </div>
        <!-- End .page-content -->
      </main>
      <!-- End .main -->

     @include('frontend.layouts.footer')