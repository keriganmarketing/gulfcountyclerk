<?php
$headerImageData = get_field('header_image');

bladerunner('views.pages.index',[
    'headerImage' => (isset($headerImageData['url']) ? $headerImageData['url'] : ''),
    'headline'    => get_field('headline'),
    'post'        => $post
]);