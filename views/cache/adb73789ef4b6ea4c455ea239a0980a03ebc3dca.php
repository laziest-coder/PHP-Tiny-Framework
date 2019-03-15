<?php /* /var/www/html/mvc/views/login_view.blade.php */ ?>
<?php $__env->startSection('content'); ?>
       <center>
       <form action="/login/auth" method="post">
           <h3>Login page</h3>
           <br>
           <input type="text" name="username" placeholder="Username"><br><br>
           <input type="password" name="password" placeholder="Password"><br><br>
           <input type="submit" value="Login">
       </form>
       </center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>