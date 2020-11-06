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
                            
                            @if(count(getPageList(get_the_ID())) > 0)
                                <p class="sidebar-header">In this section:</p>
                                <a 
                                    class="sidebar-link d-block p-2 list-group-item border-white pl-3 active bg-primary text-white" 
                                    href="{{ get_permalink(get_the_ID()) }}" 
                                    >{{ get_the_title(get_the_ID()) }}
                                </a>
                                @foreach(getPageList(get_the_ID()) as $item)
                                    <a 
                                        class="sidebar-link text-dark d-block p-2 list-group-item border-white pl-3 {{ ($item['ID'] == get_the_ID() ? 'active bg-primary text-white' : '') }}" 
                                        href="{{ $item['link'] }}" 
                                        target="{{ $item['target'] }}"
                                        >{{ $item['title'] }}
                                    </a>
                                @endforeach
                            @else

                                <p class="sidebar-header">
                                    <a 
                                        href="{{ get_permalink(wp_get_post_parent_id(get_the_ID())) }}" 
                                        ><i class="fa fa-chevron-up" aria-hidden="true"></i> {{ get_the_title(wp_get_post_parent_id(get_the_ID())) }} 
                                    </a>
                                </p>

                                @foreach(getPageList(wp_get_post_parent_id(get_the_ID())) as $item)
                                    <a 
                                        class="sidebar-link text-dark d-block p-2 list-group-item border-white pl-3 {{ ($item['ID'] == get_the_ID() ? 'active bg-primary text-white' : '') }}" 
                                        href="{{ $item['link'] }}" 
                                        target="{{ $item['target'] }}"
                                        >{{ $item['title'] }}
                                    </a>
                                @endforeach

                                

                            @endif

                            {{-- <p class="sidebar-header">In this section:</p>
                            <expandable-sidebar :post='{{ json_encode($post) }}' ></expandable-sidebar> --}}
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