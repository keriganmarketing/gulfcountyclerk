<!DOCTYPE html>
<html <?php echo e(language_attributes()); ?>>
<head>
  <meta charset="<?php echo e(bloginfo('charset')); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#008481">
  <?php echo e(wp_head()); ?>

</head>
<body <?php echo e(body_class()); ?>>
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'gulfclerk' ); ?></a>
    <div id="app">
        <wrapper>
            <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </wrapper>
    </div>
    <?php echo e(wp_footer()); ?>

    <?php echo $__env->yieldContent('footer-scripts'); ?>
</body>
</html>