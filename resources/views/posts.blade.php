<!doctype html>

<title>My Blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    <?php foreach ($posts as $post) : ?>
        <article>
            <h1>
                <a href="/posts/<?= $post->id; ?>">
                    <?= $post->title; ?>
                </a>
            </h1>

            <p>
                <a href="#">{{$post->category->name}}</a>
            </p>

            <div>
                <?= $post->excerpt; ?>
            </div>
        </article>
    <?php endforeach; ?>
</body>