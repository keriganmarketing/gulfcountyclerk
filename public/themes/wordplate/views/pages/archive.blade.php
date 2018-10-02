@extends('layouts.main')

@section('content')
<main id="content" class="sizable">
    <div class="container">
        <article class="support">
            <header class="text-primary">
                <h1>{{ $headline != '' ? $headline : the_title() }}</h1>
            </header>
            {{ the_content() }}
            {{ wp_reset_query() }}
            <pre>@php
                print_r($search)
            @endphp</pre>
        </article>
        @if (isset($search) && count($search->posts) > 0)
            @foreach ($search->posts as $post)
                
                @include('partials.result')

            @endforeach
        @else
            <article>
                <p>Nothing was found using the requested search criteria.</p>
            </article>
        @endif
    </div>
</main>
@endsection