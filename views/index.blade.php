{{ $name }}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->
	</head>
	<body>
        <nav>
            <div class="media">
                <a href="/task/create">Create task</a>
                <?php if($_SESSION['auth'] == 1){ ?>
                    <a href="/user/logout">Logout</a>
                <?php }else{ ?>
                    <a href="/user/login">Login</a>
                <?php } ?>
            </div>
        </nav>
		<div class="container">
            <?php foreach($this->tasks as $task){ ?>
                <div class="col-md-12 el">
                    <div class="col-md-6">
                        <img src="uploads/<?= $task[3]; ?>">
                    </div>
                    <?php if($_SESSION['auth'] == 1){ ?>
                        <div class="col-md-2">
                            <a href="/task/delete/id/<?= $task[0]; ?>">Delete</a>
                        </div>
                    <?php } ?>
                    <div class="col-md-4">
                        <p>Email: <?= $task[2]; ?></p>
                        <p>Text: <?= $task[1]; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
	</body>
</html>
