<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Wasted to wanted</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="{{asset('favicon.ico')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <style>
        .post {
        border: 1px solid #ccc;
        padding: 10px;
        margin: 0 auto 10px;
        max-width: 500px;
        text-align: center;
        }

        .post img {
        display: block;
        margin: 0 auto;
        max-width: 200px;
        height: auto;
        }

        .post-content {
        margin-top: 10px;
        }

        .post-content h2 {
        font-size: 20px;
        margin: 0;
        }

        .post-content p {
        margin: 5px 0;
        }

        .post-details {
        margin-top: 10px;
        }

        .post-details div {
        display: inline-block;
        margin-right: 10px;
        }

        .heart-icon::before {
        content: "\2665";
        }

        .comment-icon::before {
        content: "\2709";
        }

        .share-icon::before {
        content: "\f1e0";
        font-family: "FontAwesome";
        }

        .post-icons {
        margin-top: 10px;
        }

        .post-icons i {
        font-size: 18px;
        margin-right: 5px;
        }

        .post-comments {
        margin-top: 10px;
        }

        .comment {
        margin-bottom: 5px;
        }
        .btn {
        display: inline-block;
        padding: 10px 20px;
        margin-left: 460px;
        background-color: green;
        color: white;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        }
    </style>
</head>

<body class="index-page">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="" class="logo d-flex align-items-center me-auto me-xl-0">
        <h1>Wasted to Wanted</h1>
        <span>.</span>
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="{{route('client.recipes.index')}}">Recepies</a></li>
          <li><a href="{{ route('guest.product.index') }}">Store</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

      <div class="dropdown has-dropdown">
        <a href="#" class="btn-getstarted dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); this.closest('form').submit();">
                Log Out
              </a>
            </form>
          </div>
      </div>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

        <img src="{{asset('assets\wastedWantedImg\_3582481f-dc0a-48b1-baf4-9bcb879fea25.jpg')}}" alt="" data-aos="fade-in">
        <div class="container">
          <div class="row">
            <div class="col-lg-10">
              <h2 data-aos="fade-up" data-aos-delay="100">Welcome to our website!</h2>
              <p data-aos="fade-up" data-aos-delay="200">Reducing waste, empowering change</p>
            </div>
          </div>
        </div>

      </section><!-- End Hero Section -->

      <!-- Clients Section - Home Page -->
      <section id="clients" class="clients">

        <div class="container-fluid" data-aos="fade-up">

          <div class="row gy-4">

            <div class="col-xl-2 col-md-3 col-6 client-logo">
              <img src="{{asset('assets/img/clients/client-1.png')}}" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
              <img src="{{asset('assets/img/clients/client-2.png')}}" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
              <img src="{{asset('assets/img/clients/client-3.png')}}" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
              <img src="{{asset('assets/img/clients/client-4.png')}}" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
              <img src="{{asset('assets/img/clients/client-5.png')}}" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
              <img src="{{asset('assets/img/clients/client-6.png')}}" class="img-fluid" alt="">
            </div><!-- End Client Item -->

          </div>

        </div>

      </section><!-- End Clients Section -->

      <!-- About Section - Home Page -->
      <section id="about" class="about">

          <div class="container" data-aos="fade-up" data-aos-delay="100" >
          <div class="row align-items-xl-center gy-5">

            <div class="col-xl-5 content">
              <h3>About Us</h3>
              <h2>What is Wasted to Wanted?</h2>
              <p>Welcome to our website! We are dedicated to making a positive impact by transforming wasted food into valuable resources. </p>
              <p>At our organization, we believe in reducing food waste and finding innovative solutions to utilize it effectively. We collect wasted food from various sources and repurpose it into nutritious animal feed or convert it into organic fertilizer, ensuring that no food goes to waste.</p>
              <p>But that's not all. We also provide you with creative recipes to help you make delicious meals at home using leftover or unused ingredients. Our goal is to empower you to minimize food waste in your own kitchen while enjoying tasty and sustainable meals. Together, we can make a difference in reducing food waste and building a more sustainable future.
              Join us in our mission to turn food waste into something valuable, while discovering new culinary possibilities along the way.</p>
              <p> Explore our website for valuable resources, recipes, and insights into how you can contribute to this important cause. Let's work together to make a positive impact on our environment and create a more sustainable food system.</p>
              <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>

            <div class="col-xl-7">
              <div class="row gy-4 icon-boxes d-flex flex-wrap align-items-center">

                  <div class="col-md-6 col-xl-6" data-aos="fade-up" data-aos-delay="500">
                     <div class="icon-box">
                        <video src="{{asset('assets/wastedWantedImg/WhatsApp Video 2023-06-18 at 16.20.01.mp4')}}" autoplay loop muted controls="false" style="width: 200px; height: 100px;"></video>
                        <h3>Transforming Wasted Food</h3>
                        <p>Converting wasted food into valuable resources for animals and agriculture.</p>
                     </div>
                  </div> <!-- End Icon Box -->

                  <div class="col-md-6 col-xl-6" data-aos="fade-up" data-aos-delay="200">
                     <div class="icon-box">
                        <video src="{{asset('assets/wastedWantedImg/WhatsApp Video 2023-06-18 at 16.02.49.mp4')}}" autoplay loop muted controls="false" style="width: 200px; height: 100px;"></video>
                        <h3>Sustainability and Impact</h3>
                        <p>Working towards a more sustainable future by reducing food waste and making a positive impact.</p>
                     </div>
                  </div> <!-- End Icon Box -->

                  <div class="col-md-6 col-xl-6" data-aos="fade-up" data-aos-delay="300">
                     <div class="icon-box">
                        <video src="{{asset('assets/wastedWantedImg/WhatsApp Video 2023-06-17 at 19.08.25.mp4')}}" autoplay loop muted controls="false" style="width: 200px; height: 100px;"></video>
                        <h3>Creative Recipes</h3>
                        <p>Discovering new culinary possibilities with recipes using leftover or unused ingredients.</p>
                     </div>
                  </div> <!-- End Icon Box -->

                  <div class="col-md-6 col-xl-6" data-aos="fade-up" data-aos-delay="400">
                     <div class="icon-box">
                        <img src="{{asset('assets/wastedWantedImg/1751424142food-party-animated-gif.gif')}}" alt="" data-aos="fade-in" style="width: 200px; height: 100px;">
                        <h3>Join Our Mission</h3>
                        <p>Become a part of our community and contribute to minimizing food waste and building a better future.</p>
                     </div>
                  </div> <!-- End Icon Box -->

               </div>
            </div>


      </section><!-- End About Section -->

      <!-- Stats Section - Home Page -->
      <section id="stats" class="stats">

        <img src="{{asset('assets\wastedWantedImg\_339d82af-ed96-42dd-b95c-d96fb2d19775.jpg')}}" alt="" data-aos="fade-in">

        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">

            <div class="col-lg-3 col-md-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="23200" data-purecounter-duration="1" class="purecounter"></span>
                <p>Clients</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="1198" data-purecounter-duration="1" class="purecounter"></span>
                <p>Products</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="10000" data-purecounter-duration="1" class="purecounter"></span>
                <p>Recipes</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                <p>Workers</p>
              </div>
            </div><!-- End Stats Item -->

          </div>

        </div>

      </section><!-- End Stats Section -->

      <!-- Services Section - Home Page -->
      <section id="services" class="services">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>At our organization, we offer a range of comprehensive services to address the pressing issues of food waste and sustainability. Our dedicated team works tirelessly to tackle these challenges head-on, making a positive impact every step of the way. </p>
        </div><!-- End Section Title -->

        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
              <div class="service-item d-flex">
                <img src="{{asset('assets\wastedWantedImg\R.gif')}}" alt="" data-aos="fade-in" style="width: 100px; height: 150px;">
                <div>
                  <h4 class="title"><a href="#" class="stretched-link">Natural products</a></h4>
                  <p class="description">Our commitment to sustainability and your well-being is reflected in our natural product range. We carefully source and curate products that are made from high-quality, natural ingredients. From skincare to food items, you can trust that our products are free from harmful chemicals and additives. Embrace the goodness of nature with our carefully selected natural products.</p>
                </div>
              </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="200">
              <div class="service-item d-flex">
                <img src="{{asset('assets\wastedWantedImg\The Lyft Direct debit card for drivers.gif')}}" alt="" data-aos="fade-in" style="width: 100px; height: 150px;">
                <div>
                  <h4 class="title"><a href="#" class="stretched-link"></a>Pay with many features</h4>
                  <p class="description">We understand the importance of flexibility when it comes to payment options. That's why we offer a variety of convenient features to make your shopping experience seamless. Whether you prefer traditional methods or modern digital payments, we've got you covered. Choose from multiple payment options, including credit/debit cards, mobile wallets, and more. Shopping has never been easier!</p>
                </div>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="300">
              <div class="service-item d-flex">
                  <img src="{{asset('assets\wastedWantedImg\Motorcycle Animation.gif')}}" alt="" data-aos="fade-in" style="width: 100px; height: 150px;">
                <div>
                  <h4 class="title"><a href="#" class="stretched-link">Free shipping</a></h4>
                  <p class="description">Enjoy the convenience of free shipping on all orders! We believe that getting your favorite products should be hassle-free, which is why we provide complimentary shipping to your doorstep. Shop with us and experience the joy of receiving your items without any extra cost.</p>
                </div>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="400">
              <div class="service-item d-flex">
                  <img src="{{asset('assets\wastedWantedImg\Order Tracking - Food is Preparing_!.gif')}}" alt="" data-aos="fade-in" style="width: 100px; height: 150px;">
                <div>
                  <h4 class="title"><a href="#" class="stretched-link">Share your recepies</a></h4>
                  <p class="description">We believe in the power of community and sharing culinary inspiration. Join our platform to discover a vibrant community of food enthusiasts. Share your favorite recipes, get inspired by others, and contribute to a rich collection of culinary delights. Let's unite through our love for cooking and create a community that celebrates the joy of sharing delicious recipes.</p>
                </div>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="500">
              <div class="service-item d-flex">
                  <img src="{{asset('assets\wastedWantedImg\Pick up the phone!.gif')}}" alt="" data-aos="fade-in" style="width: 100px; height: 100px;">
                <div>

                  <h4 class="title"><a href="#" class="stretched-link">Track your command</a></h4>
                  <p class="description">We value transparency and want you to stay informed about your orders every step of the way. With our easy-to-use tracking system, you can effortlessly monitor the progress of your command. From the moment you place your order until it arrives at your doorstep, you'll have real-time updates to ensure a smooth and worry-free shopping experience.</p>
                </div>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="600">
              <div class="service-item d-flex">
                  <img src="{{asset('assets\wastedWantedImg\Customer care service 2_2.gif')}}" alt="" data-aos="fade-in" style="width: 100px; height: 100px;">
                <div>
                  <h4 class="title"><a href="#" class="stretched-link">Support</a></h4>
                  <p class="description">Our dedicated support team is here to assist you every step of the way. We understand that questions or concerns may arise during your journey with us, and we are committed to providing prompt and reliable support. Whether you need assistance with product selection, have inquiries about your order, or require guidance on using our services, our knowledgeable support representatives are just a message or call away. We value your satisfaction and strive to ensure that your experience with our support team is friendly, helpful, and efficient. Trust us to address your needs and provide the support you deserve.</p>
                </div>
              </div>
            </div><!-- End Service Item -->

          </div>

        </div>

      </section><!-- End Services Section -->


      <!-- Portfolio Section - Home Page -->
      <section id="portfolio" class="portfolio">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Recepies</h2>
          <p>Discover a world of culinary inspiration with our wide range of delicious recipes. Whether you're a seasoned chef or a novice in the kitchen, our collection of recipes is designed to cater to all skill levels and tastes. From quick and easy meals for busy weekdays to impressive dishes for special occasions, our recipes are carefully curated to bring out the best flavors using simple and accessible ingredients.</p>
        </div><!-- End Section Title -->

          <div class="container">
              <div class="post">
                  <img src="{{asset('images/resp2.jpg')}}" alt="Post Image">
                  <div class="post-content">
                    <h2>Watermelon slices</h2>
                    <p>Post description</p>
                  </div>
                  <div class="post-details">
                    <div class="likes"><i class="fas fa-heart"></i> 100 Likes</div>
                    <div class="comments"><i class="fas fa-comment"></i> 50 Comments</div>
                    <div class="share"><i class="fas fa-share"></i> Share</div>
                  </div>
                  <div class="post-comments">
                    <div class="comment">User 1: This is amazing!</div>
                    <div class="comment">User 2: Nice Recepie!</div>
                  </div>
              </div>
              <br>
              <div class="post">
                  <img src="{{asset('images/resp3.jpg')}}" alt="Post Image">
                  <div class="post-content">
                    <h2>Pickled Vegetable Peels</h2>
                    <p>Post description</p>
                  </div>
                  <div class="post-details">
                    <div class="likes"><i class="fas fa-heart"></i> 100 Likes</div>
                    <div class="comments"><i class="fas fa-comment"></i> 50 Comments</div>
                    <div class="share"><i class="fas fa-share"></i> Share</div>
                  </div>
                  <div class="post-comments">
                    <div class="comment">User 1: This is amazing!</div>
                    <div class="comment">User 2: Nice Recepie!</div>
                  </div>
              </div>
              <br>
              <div class="post">
                  <img src="{{asset('images/resp1.jpg')}}" alt="Post Image">
                  <div class="post-content">
                    <h2>Cucumber Chips</h2>
                    <p>Post description</p>
                  </div>
                  <div class="post-details">
                    <div class="likes"><i class="fas fa-heart"></i> 100 Likes</div>
                    <div class="comments"><i class="fas fa-comment"></i> 50 Comments</div>
                    <div class="share"><i class="fas fa-share"></i> Share</div>
                  </div>
                  <div class="post-comments">
                    <div class="comment">User 1: This is amazing!</div>
                    <div class="comment">User 2: Nice Recepie!</div>
                  </div>
              </div>
              <div class="button-container">
                  <a href="{{ route('login') }}" class="btn" >See more of recipes!</a>
              </div>
          </div>
      </section><!-- End Portfolio Section -->


      <!-- Faq Section - Home Page -->
      <section id="faq" class="faq">

        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="content px-xl-5">
                <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
              </div>
            </div>

            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

              <div class="faq-container">
                <div class="faq-item faq-active">
                  <h3><span class="num">1.</span> <span>What is the mission of our company?</span></h3>
                  <div class="faq-content">
                    <p>Our mission is to reduce food waste and promote sustainability by transforming wasted food into valuable resources and providing innovative solutions to address environmental challenges.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->

                <div class="faq-item">
                  <h3><span class="num">2.</span> <span>How do we turn wasted food into useful products?</span></h3>
                  <div class="faq-content">
                    <p>We utilize advanced technologies and processes to convert wasted food into animal feed, organic fertilizers, and other beneficial products. Our innovative approach ensures that the maximum value is extracted from the wasted food, reducing its environmental impact.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->

                <div class="faq-item">
                  <h3><span class="num">3.</span> <span>Do we offer recipes using the transformed food?</span></h3>
                  <div class="faq-content">
                    <p>Yes, we provide a variety of creative recipes that can be made using the transformed food. Our goal is to inspire individuals to make delicious and sustainable meals at home while minimizing food waste.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->

                <div class="faq-item">
                  <h3><span class="num">4.</span> <span>How can customers contribute to our mission?</span></h3>
                  <div class="faq-content">
                    <p>Customers can contribute by supporting our initiatives, spreading awareness about food waste reduction, and choosing sustainable practices in their daily lives. Additionally, sharing feedback, suggestions, and participating in community events are valuable ways to engage with our mission.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->

                <div class="faq-item">
                  <h3><span class="num">5.</span> <span>What is our commitment to sustainability?</span></h3>
                  <div class="faq-content">
                    <p>We are deeply committed to sustainability and operate with a focus on minimizing our environmental footprint. From our production processes to packaging choices, we prioritize eco-friendly practices and strive to create a positive impact on the planet.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->

              </div>

            </div>
          </div>

        </div>

      </section><!-- End Faq Section -->



      <!-- Call-to-action Section - Home Page -->
      <section id="call-to-action" class="call-to-action">

        <img src="{{asset('assets\wastedWantedImg\_eaf16583-1736-4dfb-a503-a95acc86ab57.jpg')}}" alt="">

        <div class="container">
          <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
              <div class="text-center">
                <h3>Still not registered?</h3>
                <p>What are you waiting for? Go a head we are waiting for you!.</p>
                <a class="cta-btn" href="#">Register</a>
              </div>
            </div>
          </div>
        </div>

      </section><!-- End Call-to-action Section -->

      <!-- Contact Section - Home Page -->
      <section id="contact" class="contact">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>For any inquiries, questions, or feedback, please don't hesitate to get in touch with us. Our dedicated team is here to assist you and provide the support you need. Feel free to reach out to us through the provided contact information, and we'll be delighted to hear from you.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">

            <div class="col-lg-6">

              <div class="row gy-4">
                <div class="col-md-6">
                  <div class="info-item" data-aos="fade" data-aos-delay="200">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Address</h3>
                    <p>A108 Adam Street</p>
                    <p>New York, NY 535022</p>
                  </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                  <div class="info-item" data-aos="fade" data-aos-delay="300">
                    <i class="bi bi-telephone"></i>
                    <h3>Call Us</h3>
                    <p>+06 95 54 88 55</p>
                    <p>+06 95 54 88 55</p>
                  </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                  <div class="info-item" data-aos="fade" data-aos-delay="400">
                    <i class="bi bi-envelope"></i>
                    <h3>Email Us</h3>
                    <p>WTW@gmail.com</p>
                    <p>Wastedwanted@gmail.com</p>
                  </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                  <div class="info-item" data-aos="fade" data-aos-delay="500">
                    <i class="bi bi-clock"></i>
                    <h3>Open Hours</h3>
                    <p>Monday - Friday</p>
                    <p>9:00AM - 06:00PM</p>
                  </div>
                </div><!-- End Info Item -->

              </div>

            </div>

            <div class="col-lg-6">
              <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                <div class="row gy-4">

                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                  </div>

                  <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                  </div>

                  <div class="col-md-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                  </div>

                  <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                  </div>

                  <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>

                    <button type="submit">Send Message</button>
                  </div>

                </div>
              </form>
            </div><!-- End Contact Form -->

          </div>

        </div>

      </section><!-- End Contact Section -->

    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

      <div class="container footer-top">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
              <span>Append</span>
            </a>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links d-flex mt-4">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Free shipping</a></li>
              <li><a href="#">Recepies</a></li>
              <li><a href="#">wasted food</a></li>
              <li><a href="#">support</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p>United States</p>
            <p class="mt-4"><strong>Phone:</strong> <span>+06 95 54 88 55</span></p>
            <p><strong>Email:</strong> <span>Wasted_to_wanted@example.com</span></p>
          </div>

        </div>
      </div>

      <div class="container copyright text-center mt-4">
        <p>&copy; <span>Copyright</span> <strong class="px-1">wtw</strong> <span>All Rights Reserved</span></p>
      </div>

    </footer><!-- End Footer -->

    <!-- Scroll Top Button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

  </body>

  </html> 
