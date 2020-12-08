@extends('layouts.main')

@section('content')
@if (have_posts())
    @while (have_posts())
        {{ the_post() }}
                
        <kma-slider class="slider-container"></kma-slider>
        @include('partials.buttongallery')
        <main id="content" class="sizable">
            <div class="container">

                <article class="front py-5 px-lg-5" tabindex="0">
                {{ the_content() }}
                </article>

            </div>
        </main>

    @endwhile
@else
    @include('pages.404')
@endif
@endsection