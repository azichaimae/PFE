<!DOCTYPE html>
<head>
    @include('partials.style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fyvp7b4pQaeV0i0q7hD4I7B+M8gul/DXnM7zGzJs2iKwMr8YYtyY2qH4aU0j4Mjk9JxjNYO/Kg9yJYwomX7e/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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


.btn-like i {
  transition: color 0.3s;
}

.btn-like.liked i {
  color: red;
}
.btn-menu {
    background-color: transparent;
    border: none;
    color: #6c757d;
    font-size: 1.25rem;
    padding: 0.25rem;
    cursor: pointer;
}

.dropdown-menu {
    min-width: 130px;
}


.button-88 {
  display: flex;
  align-items: center;
  font-family: inherit;
  font-weight: 500;
  font-size: 16px;
  padding: 0.7em 1.4em 0.7em 1.1em;
  color: white;
  background: #ad5389;
  background: linear-gradient(0deg, rgba(20,167,62,1) 0%, rgba(102,247,113,1) 100%);
  border: none;
  box-shadow: 0 0.7em 1.5em -0.5em #14a73e98;
  letter-spacing: 0.05em;
  border-radius: 20em;
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 200px;
}

.button-88:hover {
  box-shadow: 0 0.5em 1.5em -0.5em #14a73e98;
}

.button-88:active {
  box-shadow: 0 0.3em 1em -0.5em #14a73e98;
}
.card{
    background-image: url(https://image.freepik.com/vecteurs-libre/fast-food-drole-mignon-modele-sans-couture_71374-1259.jpg);
    font-size: 20px;
    font-weight: bold;
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
              <li><a href="{{ route('client.recipes.create')}}">Add Recepie</a></li>
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

       <br><br><br><br><br><br><br><br>
       <div class="mt-6">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($recipes as $recipe)
            <div class="col">
                <div class="card h-100">
                    <div class="d-flex justify-content-between p-2 px-3">
                        <div class="d-flex flex-row align-items-center">
                            <img src="https://picsum.photos/500/300"  width="40" class="rounded-image">
                            <div class="d-flex flex-column ml-2">
                                <span class="font-weight-bold">{{ $recipe->user->name }}</span>

                            </div>
                        </div>
                    @if (auth()->check() && $recipe->user_id === auth()->user()->id)
                    <div class="dropdown">
                        <button class="btn btn-menu" type="button" id="menuButton">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu" id="menuDropdown">
                            <a class="dropdown-item" href="{{ route('client.recipes.edit', $recipe->id) }}">Update</a>
                            <form action="{{ route('client.recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endif
                    </div>

                    <div class="p-2">
                        <p class="text-justify">{{ $recipe->description }}</p>
                        <img src="{{ asset('recipes/' . $recipe->picture) }}" class="img-fluid">
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row icons d-flex align-items-center">
                                <form action="{{ route('client.recipes.like', $recipe->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-like" id="likeButton" onclick="toggleLike(this)">
                                        <i class="fas fa-heart"></i> Like
                                        <span class="like-count">{{ $recipe->likesCount() }}</span>
                                    </button>

                                </form>
                            </div>
                            <div class="d-flex flex-row muted-color">
                                <span>{{ $recipe->comments->count() }} comments</span>
                                <span class="ml-2">Share</span>
                            </div>
                        </div>
                        <hr>
                        <div class="comments">
                            @foreach ($recipe->comments as $comment)
                            <div class="d-flex flex-row mb-2">

                                <div class="d-flex flex-column ml-2">
                                    <span class="name">{{ $comment->user->name }}</span>
                                    <small class="comment-text">{{ $comment->text_comment }}</small>
                                    <div class="d-flex flex-row align-items-center status">
                                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="comment-input">
                                <form action="{{ route('client.recipes.addComment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                    <input type="text" class="form-control" name="comment" placeholder="Write a comment..." required >
                                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        function toggleLike(button) {
          button.classList.toggle("liked");
          if (button.classList.contains("liked")) {
            button.style.color = "red";
          } else {
            button.style.color = "";
          }
        }
        document.getElementById('menuButton').addEventListener('click', function() {
        var menuDropdown = document.getElementById('menuDropdown');
        if (menuDropdown.style.display === 'block') {
            menuDropdown.style.display = 'none';
        } else {
            menuDropdown.style.display = 'block';
        }
    });
        </script>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
          <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
          <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
          <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
          <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
          <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
          <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
          <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
          <script src="{{asset('assets/js/main.js')}}"></script>
</body>



</html>
