<?php /* /var/www/html/mvc/views/index.blade.php */ ?>
<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-12 el">
           <div class="col-md-6">
              <img src="uploads/<?php echo e($task->getImage()); ?>">
         </div>
             <div class="col-md-2">
             <?php if( $_SESSION['auth'] == 1 ): ?>
                 <a href="/task/delete/<?php echo e($task->getId()); ?>">Delete</a>
             <?php endif; ?>
             </div>
         <div class="col-md-4">
             <p>Email: <?php echo e($task->getEmail()); ?></p>
             <p>Username: <?php echo e($task->getUsername()); ?></p>
             <p>Text: <?php echo e($task->getBody()); ?></p>
         </div>
     </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo $paginator; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
