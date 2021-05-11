@extends('layouts.main')

@section('content')
@if (have_posts())
    @while (have_posts())
        {{ the_post() }}
                
        <kma-slider class="slider-container"></kma-slider>
        <div class="notices" >
            <div class="container">
                <div class="bg-white p-4" >
                    <p>Gulf County Clerk of the Circuit Court and Comptroller is accepting Applications for two(2) Full-Time positions.</p>
                    <a class="font-weight-bold" style="text-decoration: underline" href="/about/employment-opportunities/" >View open positions.</a>
                </div>
            </div>
        </div>
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