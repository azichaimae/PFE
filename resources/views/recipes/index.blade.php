@extends('layouts.dashboard.client.dashboard')
@section('content')
<header>
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
        color: rgb(0, 0, 58);
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
</header>
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark" style="font-family: 'Montserrat', sans-serif; ">
        All recipes
    </h3>
    <br>
    <a href="{{ route('client.recipes.create') }}"
        class="mr-4 text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="font-family: 'Montserrat', sans-serif; ">
        Add new recipe
    </a>
    <br>
    <div class="mt-6 flex flex-wrap justify-around gap-4" style="font-family: 'Montserrat', sans-serif; ">
        <div class="row d-flex align-items-center justify-content-center" >
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
</body>
@endsection




