@extends('layouts.main')
@section('content')

@if (have_posts())
    @while (have_posts())
        {{ the_post() }}
        @include('partials.mast')
        <main id="content" class="sizable">
            <div class="container">
                @if(function_exists('yoast_breadcrumb'))
                {{ yoast_breadcrumb( '<p class="breadcrumbs">','</p>' ) }}
                @endif

                <article class="support" tabindex="0">
                    <header class="text-primary">
                        <h1>{{ $headline != '' ? $headline : the_title() }}</h1>
                    </header>
                    {{ the_content() }}
                </article>

            </div>
        </main>
    @endwhile
@else
    @include('pages.404')
@endif

@endsection