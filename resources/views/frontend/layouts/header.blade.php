<!DOCTYPE html>
<html lang="en">
  <!-- Coffee Beans/about-2.html  16 Nov 2022 10:03:54 GMT -->
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Coffee Beans</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Coffee Beans - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ ('frontend/assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ ('frontend/assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ ('frontend/assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ ('frontend/assets/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ ('frontend/assets/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ ('frontend/assets/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Coffee Beans">
    <meta name="application-name" content="Coffee Beans">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ ('frontend/assets/images/icons/browserconfig.xml') }}">
    <link href="img/favicon.ico" rel="icon">
    <meta name="theme-color" content="#ffffff">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/nouislider/nouislider.css') }}">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/style.min.css') }}" rel="stylesheet">
  </head>

  <body>
    
            <!-- End .header-left -->

           
       
        <!-- End .header-top -->

        <div class="header-middle sticky-header">
          <div class="container">
            <div class="header-left">
              <button class="mobile-menu-toggler">
                <span class="sr-only">Toggle mobile menu</span>
                <i class="icon-bars"></i>
              </button>
              <a href="index.html" class="logo">
                <img
                  src="{{ ('frontend/assets/images/about/Untitled design.png') }}"
                  alt="Coffee Beans"
                  width="110"
                  height="12"
                />
              </a>

              <nav class="main-nav">
                <ul class="menu">
                  <li>
                    <a href="index.html">Home</a>
                  </li>
                  <li>
                    <a href="menu.html">Menu</a>
                  </li>
                  <li>
                    <a href="booking.html">Booking</a>
                  </li>

                  <li>
                    <a href="services.html">Services</a>
                  </li>
                  <li>
                    <a href="Aboutus.html">About</a>
                  </li>
                  <li>
                    <a href="contactus.html">Contact</a>
                  </li>
                 
                </ul>
                <!-- End .menu -->
              </nav>
              <!-- End .main-nav -->
            </div>
            <!-- End .header-left -->

            <div class="header-right">
              <div class="header-search">
                <a href="#" class="search-toggle" role="button" title="Search"
                  ><i class="icon-search"></i
                ></a>
                <form action="#" method="get">
                  <div class="header-search-wrapper">
                    <label for="q" class="sr-only">Search</label>
                    <input
                      type="search"
                      class="form-control"
                      name="q"
                      id="q"
                      placeholder="Search in..."
                      required
                    />
                  </div>
                  <!-- End .header-search-wrapper -->
                </form>
              </div>
              <!-- End .header-search -->
              <div class="dropdown cart-dropdown">
                <a
                  href="#"
                  class="dropdown-toggle"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  data-display="static"
                >
                  <i class="icon-shopping-cart"></i>
                  <span class="cart-count">2</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                  <div class="dropdown-cart-products">
                    <div class="product">
                      <div class="product-cart-details">
                        <h4 class="product-title">
                          <a href="product.html">Cold Icecream</a>
                        </h4>
                        <span class="cart-product-info">
                          <span class="cart-product-qty">1</span>
                          x $84.000
                        </span>
                      </div>
                      <!-- End .product-cart-details -->

                      <figure class="product-image-container">
                        <a href="product.html" class="product-image">
                          <img
                            src="assets/images/coffeeImages/a.jpg"
                            alt="product"
                          />
                        </a>
                      </figure>
                      <a href="#" class="btn-remove" title="Remove Product"
                        ><i class="icon-close"></i
                      ></a>
                    </div>
                    <!-- End .product -->

                    <div class="product">
                      <div class="product-cart-details">
                        <h4 class="product-title">
                          <a href="product.html">Icecream </a>
                        </h4>

                        <span class="cart-product-info">
                          <span class="cart-product-qty">1</span>
                          x $76.00
                        </span>
                      </div>
                      <!-- End .product-cart-details -->

                      <figure class="product-image-container">
                        <a href="product.html" class="product-image">
                          <img
                            src="assets/images/coffeeImages/b.jpg"
                            alt="product"
                          />
                        </a>
                      </figure>
                      <a href="#" class="btn-remove" title="Remove Product"
                        ><i class="icon-close"></i
                      ></a>
                    </div>
                    <!-- End .product -->
                  </div>
                  <!-- End .cart-product -->

                  <div class="dropdown-cart-total">
                    <span>Total</span>

                    <span class="cart-total-price">$160.00</span>
                  </div>
                  <!-- End .dropdown-cart-total -->

                  <div class="dropdown-cart-action">
                    <a href="cart.html" class="btn btn-primary">View Cart</a>
                    <a href="checkout.html" class="btn btn-outline-primary-2"
                      ><span>Checkout</span><i class="icon-long-arrow-right"></i
                    ></a>
                  </div>
                  <!-- End .dropdown-cart-total -->
                </div>
                <!-- End .dropdown-menu -->
              </div>
              <!-- End .cart-dropdown -->
            </div>
            <!-- End .header-right -->
          </div>
          <!-- End .container -->
        </div>
        <!-- End .header-middle -->
      </header>
      <!-- End .header -->