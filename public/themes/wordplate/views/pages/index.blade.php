@extends('layouts.main')
@section('content')

@if (have_posts())
    @while (have_posts())
        {{ the_post() }}
        @include('partials.mast')
        <main id="content" class="sizable">
            <div class="container">
                {{ yoast_breadcrumb( '<p class="breadcrumbs">','</p>' ) }}
                <div class="row d-flex align-items-start">
                    <div class="col-md-9 order-md-2">
                        <article class="support pb-5">
                            <header class="text-primary">
                                <h1>{{ $headline != '' ? $headline : the_title() }}</h1>
                            </header>
                            {{ the_content() }}
                        </article>
                    </div>
                    <div class="col-md-3 order-md-1 pb-4">
                        <div class="sidebar">
                            <p class="sidebar-header">In this section:</p>
                            <expandable-sidebar :post='{{ json_encode($post) }}' ></expandable-sidebar>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </main>
    @endwhile
@else
    @include('pages.404')
@endif

@endsection