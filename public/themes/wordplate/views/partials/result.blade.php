<article>
    <header>
        <h2>{{ $post->post_title }}</h2>
    </header>
    {{ get_the_excerpt($post) }}
    <p><a href="{{ get_permalink($post) }}" >Read more</a></p>
    <hr>
</article>