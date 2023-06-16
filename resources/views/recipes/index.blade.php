<!DOCTYPE html>
<head>
    @include('partials.style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fyvp7b4pQaeV0i0q7hD4I7B+M8gul/DXnM7zGzJs2iKwMr8YYtyY2qH4aU0j4Mjk9JxjNYO/Kg9yJYwomX7e/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <img src="{{ asset('images/planetLOGO.png') }}" alt="WTW logo" style="width: 250px;">

            <div>
                <a href="{{url('/')}}" class="spc">Home</a>
                <a href="{{ route('guest.product.index') }}" class="spc">Store</a>
                <a href="/client/recipes" class="spc">Recepies</a>
                <a href="" class="spc">About Us</a>
                <a href="" class="spc">Contact Us</a>
                <a href="#" style="display: inline-block; margin-right: 10px;">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="padding_10">Cart</span></a>
                {{-- <p style="display: inline-block; margin-left: 10px; margin-right: 10px;">  {{ Auth::user()->name }}</p> --}}
                <form method="POST" action="{{ route('logout') }}" style='display: inline-block; margin-left: 10px; cursor: pointer;'>
                    @csrf
                    <p :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" >
                        {{ __('Log Out') }}
                    </p>
                </form>
            </div>
        </div>
    </header>
       <a href="{{ route('recipes.create') }}" class="button-88">Add Recipe</a>
    <div class="container mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">
            @foreach ($recipes as $recipe)
            <div class="col-md-6">
                <div class="card">
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
                            <a class="dropdown-item" href="{{ route('recipes.edit', $recipe->id) }}">Update</a>
                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?')">
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
                                <form action="{{ route('recipes.like', $recipe->id) }}" method="post">
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
                                <form action="{{ route('comments.store') }}" method="post">
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
</body>



</html>




