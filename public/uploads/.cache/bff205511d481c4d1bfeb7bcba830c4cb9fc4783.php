<?php $__env->startSection('content'); ?>
<?php if(have_posts()): ?>
    <?php while(have_posts()): ?>
        <?php echo e(the_post()); ?>

                
        <kma-slider class="slider-container"></kma-slider>
        <?php echo $__env->make('partials.buttongallery', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <main id="content" class="sizable">
            <div class="container">

                <div class="row align-items-center justify-content-center py-5">
                    <div class="col-md-3 col-lg-2 text-center">
                        <img src="<?php echo e($clerkPhoto['url']); ?>" alt="<?php echo e($clerkPhoto['alt']); ?>" >
                    </div>
                    <div class="col-md-9">
                        <article class="front">
                            <div class="content-area pl-md-4">
                                <?php echo e(the_content()); ?>

                            </div>
                        </article>
                    </div>
                </div>

            </div>
        </main>

    <?php endwhile; ?>
<?php else: ?>
    <?php echo $__env->make('pages.404', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>