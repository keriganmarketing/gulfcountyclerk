<?php $__env->startSection('content'); ?>

<?php if(have_posts()): ?>
    <?php while(have_posts()): ?>
        <?php echo e(the_post()); ?>

        <?php echo $__env->make('partials.mast', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <main id="content" class="sizable">
            <div class="container">
                <?php echo e(yoast_breadcrumb( '<p class="breadcrumbs">','</p>' )); ?>

                <div class="row d-flex align-items-start">
                    <div class="col-md-9 order-md-2">
                        <article class="support pb-5">
                            <header class="text-primary">
                                <h1><?php echo e($headline != '' ? $headline : the_title()); ?></h1>
                            </header>
                            <?php echo e(the_content()); ?>

                        </article>
                    </div>
                    <div class="col-md-3 order-md-1 pb-4">
                        <div class="sidebar">
                            <p class="sidebar-header">In this section:</p>
                            <expandable-sidebar :post='<?php echo e(json_encode($post)); ?>' ></expandable-sidebar>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </main>
    <?php endwhile; ?>
<?php else: ?>
    <?php echo $__env->make('pages.404', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>