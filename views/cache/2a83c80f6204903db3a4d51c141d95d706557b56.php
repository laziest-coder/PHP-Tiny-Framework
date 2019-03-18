<?php /* /var/www/html/mvc/views/layout.blade.php */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="description" content="" />
      <meta name="keywords" content="" />
      <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
      <link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
      <script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->
   </head>
   <body>
      <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
      <script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
      <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
      <link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
      <script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <a class="navbar-brand" href="/">Task</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item active">
               <?php if($session == 1): ?>
               <a class="nav-link" href="/login/logout">Logout<span class="sr-only">(current)</span></a>
               <?php else: ?>
                  <a class="nav-link" href="/login">Login<span class="sr-only">(current)</span></a>
               <?php endif; ?>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="task/create">Create task</a>
               </li>
           </ul>
        </div>
     </nav>
     <div class="container">
     <?php echo $__env->yieldContent('content'); ?>
      </div>
   </body>
</html>

        