<?php /* /var/www/html/mvc/views/task_create.blade.php */ ?>
<?php $__env->startSection('content'); ?>
    <center>
        <h3>Create a task</h3>
    <form action="/task/create" method="post" enctype="multipart/form-data">
        <input type="text" name="email" placeholder="E-mail"><br><br>
        <input type="text" name="username" placeholder="Username"><br><br>
        <textarea placeholder="Description of the task" name="text" rows="10"></textarea><br><br>
        <input type="file" name="image"><br><br>
        <input type="submit" value="Create">
    </form>
    </center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>