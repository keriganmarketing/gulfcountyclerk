<!DOCTYPE html>
<html {{ language_attributes() }}>
<head>
  <meta charset="{{ bloginfo('charset') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#008481">
  {{ wp_head() }}
</head>
<body {{ body_class() }}>
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'gulfclerk' ); ?></a>
    <div id="app">
        <wrapper>
            @include('partials.header')
            @yield('content')
            @include('partials.footer')
        </wrapper>
    </div>
    {{ wp_footer() }}
    @yield('footer-scripts')
</body>
</html>