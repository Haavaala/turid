<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turids Neglsalong</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <header>
        <nav>
            <a href="/"> <img class="navbar-logo" src="/turidsNeglsalong.png" alt="Navbar logo"></a>
            <!-- Display buttons based on of the user is logged in or not  -->
            @if(Auth::check())
            <div class="button-container">

                <a href="/publish"><button class="publish-button">+ Ny Bloggpost</button></a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="login-button">Logg ut</button>
                </form>
                @else
                <a href="/login"><button class="login-button"><img src="/login.png" alt="login"> Logg inn</button></a>
            </div>
            @endif
        </nav>
    </header>

    <main>
        <section>
            <div class="card-container">
                @if($posts->isEmpty())
                <p>No posts available.</p>
                @else
                @foreach($posts as $post)
                <div class="card">
                    <!-- If post contains image, display it  -->
                    @if($post->image)
                    <img class="blog-image" src="{{ $post->image }}" alt="Post Image">
                    @endif
                    <h2 class="blog-title">{{ $post->title }}</h2>
                    <p class="blog-text">{{ $post->text }}</p>
                    <div class="bottom-card">
                        <div class="author-container">
                            <p class="written-by">skrevet av</p>
                            <p class="author">{{ $post->user_name ?? 'Unknown Author' }}</p>
                        </div>
                        <!-- check if the logged in user is the same as the one that wrote the post  -->
                        @if(Auth::check() && Auth::user()->id == $post->user_id)
                        <div class="editButton">
                            <a href="{{ url('edit-post/' . $post->post_id) }}"><img class="editPost" src="/edit.png" alt=""> </a>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
                @endif
            </div>

        </section>
    </main>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <footer>
    </footer>
</body>

</html>