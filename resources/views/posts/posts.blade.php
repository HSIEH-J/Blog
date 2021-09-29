<!doctype html>

<title>index</title>

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
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a style="margin-right:3%;color:DarkOrange" href="/create">Create Post</a>
                    <a class="btn btn-sm btn-outline-secondary" href="/logout">Logout</a>
                </div>
            </div>
        </header>

        <main class="container">
            <?php foreach ($posts as $post) : ?>
                <article>
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0"><?= $post->title; ?></h5>
                                <a href="/edit/<?= $post->id; ?>" style="margin-top:2%;color:DarkGray;text-decoration:underline;">Modify Content</a>
                            </div>
                            <div class="mb-1 text-muted" style="margin-top:1%">
                                <?= $post->excerpt; ?>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="/posts/<?= $post->id; ?>">Continue reading</a>
                                <a href="{{ url('/delete/'.$post->id) }}" class="btn btn-primary" style="background:lightgray;color:SlateGrey">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </main>
    </div>
    
</body>