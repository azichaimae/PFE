<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <style>
.signupSection {
    background-image: url("{{ asset('assets/wastedWantedImg/How Hot Sauce is made.gif') }}");
    background-size: cover;
    background-position: center;
  }
.signupSection {
  position: relative;
  left: 21%;
  transform: translate(-50%, -50%);
  width: 800px;
  height: 450px;
  text-align: center;
  display: flex;
  color: rgb(0, 0, 0);
  box-shadow: 3px 10px 20px 5px rgb(255, 69, 69);
}

.info {
  width: 45%;
  background: rgba(255, 110, 110, 0.8);
  padding: 30px 0;
  border-right: 5px solid rgba(30, 30, 30, .8);
  h2 {
    padding-top: 30px;
    font-weight: 300;
  }
  p {
    font-size: 18px;
  }
  .icon {
    font-size: 8em;
    padding: 20px 0;
    color: rgba(10, 180, 180, 1);
  }
}
.signupForm {
    background-image: url("{{ asset('assets/wastedWantedImg/How Hot Sauce is made.gif') }}");
    background-size: cover;
    background-position: center;
  width: 70%;
  padding: 30px 0;
  background: rgb(0, 162, 255);
  transition: .2s;
  h2 {
    font-weight: 300;
  }
}

.inputFields {
  margin: 15px 0;
  font-size: 16px;
  padding: 10px;
  border: 1px solid rgba(10, 180, 180, 1);
  width: 200px;
  border-top: none;
  border-left: none;
  border-right: none;
  background: rgba(255, 255, 255, 0.2);
  color: rgb(0, 0, 0);
  outline: none;
}

.noBullet {
  list-style-type: none;
  padding: 0;
}

#join-btn {
  border: 1px solid rgba(10, 180, 180, 1);
  background: rgba(159, 245, 0, 0.6);
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;}

  #join-btn:hover {
    background: rgba(0, 245, 61, 0.6);
    padding: 10px 80px;
  }
  .splash-container {
   position: relative;
   display: inline-block;
}

.splash-overlay {
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background: rgba(255, 110, 110, 0.8); /* Adjust the color and opacity as desired */
   pointer-events: none; /* This allows the image to be clickable if needed */
}
.container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.post {
    display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin-bottom: 20px;
        border: 1px solid #ccc;
        padding: 10px;

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
        .form-group {
            display: flex;
            align-items: center;
}

.form-group label {
    width: 200px; /* Adjust the width as needed */

}
.form-group textarea {

}








    </style>
</head>
<body>

    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container-fluid d-flex align-items-center justify-content-between">

          <a href="" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1>Wasted to Wanted</h1>
            <span>.</span>
          </a>

          <!-- Nav Menu -->
          <nav id="navmenu" class="navmenu">
            <ul>
              <li><a href="{{route('client.index')}}" class="active">Home</a></li>
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
      </header>

    <br><br>
      <section>


      <div class="signupSection" data-aos="fade-up" >
        <div class="info">
          <h2>Create New Recipe</h2>
          <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
          <p>Keep sharing you recipes</p>
          <div class="splash-container">
            <img src="{{asset('assets/wastedWantedImg/How Hot Sauce is made.gif')}}" alt="" height="200px" width="200px">
            <div class="splash-overlay"></div>
         </div>
        </div>
        <form action="{{ route('client.recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data" class="signupForm" name="signupform">
            @csrf
            @method('PUT')
            <h2>Recipe</h2>
            <ul class="noBullet">
              <li>
                <label for="username">Recipe Name</label>
                <input type="text" class="inputFields" id="username" name="name" placeholder="Recipe Name" value="{{ old('name', $recipe->name) }}" required/>
              </li>
              <li>
                <div class="form-group">
                  <label for="description">Recipe's steps</label>
                  <textarea class="inputFields" name="description" placeholder="write here" required>{{ old('description', $recipe->description) }}</textarea>
                </div>
              </li>
              <li>
                <label for="picture">Image</label>
                <input type="file" class="inputFields" id="picture" name="picture" placeholder="Image" required/>
              </li>
              <li id="center-btn">
                <input type="submit" id="join-btn" name="join" alt="Join" value="Add">
              </li>
            </ul>
          </form>
        </div>

      <br><br><br><br>
      <div class="section-title" data-aos="fade-down">
        <h2>Similair Recepies</h2>
      </div>

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
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</body>

<script>
var alertRedInput = "#8C1010";
var defaultInput = "rgba(10, 180, 180, 1)";

</script>
</html>





