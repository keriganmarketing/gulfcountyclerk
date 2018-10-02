<article>
    <header>
        <h2>{{ $post->post_title }}</h2>
    </header>
    <p>{{ wp_trim_words((get_the_excerpt($post) ? get_the_excerpt($post) : get_the_content($post)), 55, '...') }}</p>
    <p><a href="{{ get_permalink($post) }}" >Read more</a></p>
    <hr>
</article>