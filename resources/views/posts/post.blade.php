<!doctype html>

<title>article</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body>

    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a href="/" style="text-decoration:none;">Laravel Blog</a>
                </div>
            </div>
        </header>
        
        <article class="blog-post">

            <h2 class="blog-post-title">{{$post->title}}</h2>
            
            <div>
                <p>{!! $post->body !!}</p>
            </div>

        </article>

        <a href="/">Go Back</a>
    </div>
    
</body>
