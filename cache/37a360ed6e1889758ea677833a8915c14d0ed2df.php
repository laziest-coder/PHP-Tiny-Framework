<?php /* /var/www/html/mvc/views/index.blade.php */ ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12 el">
        <div class="col-md-6">
            <img src="uploads/">
        </div>
            <div class="col-md-2">
                <a href="/task/delete/id/">Delete</a>
            </div>
        <div class="col-md-4">
            <p>Email: </p>
            <p>Text: </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>