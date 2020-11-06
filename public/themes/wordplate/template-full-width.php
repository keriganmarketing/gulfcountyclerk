<?php /* Template Name: Full Width */
$headerImageData = get_field('header_image');

bladerunner('views.pages.full',[
    'headerImage' => (isset($headerImageData['url']) ? $headerImageData['url'] : ''),
    'headline'    => get_field('headline'),
    'post'        => $post
]);