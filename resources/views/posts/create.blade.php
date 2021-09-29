<!doctype html>

<title>Create Post</title>

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

        <form method="POST" action="/create">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <input id="excerpt" type="text" class="form-control" name="excerpt">
            </div>

            <div class="form-group">
                <label for="body">Content</label>
                <textarea id="body" class="form-control" name="body"></textarea>
            </div>

            <div class="form-group" style="text-align:right">
                <button type="submit" class="btn btn-primary">
                    Publish
                </button>
            </div>

        </form>
               

    </div>
    
</body>