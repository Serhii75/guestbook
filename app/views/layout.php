<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GuestBook</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= configItem('base_url') . '/css/style.css'; ?>" type="text/css">
</head>
<body>
    
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Guest Book</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= baseUrl() ?>">Главная <span class="sr-only">(current)</span></a>
          </li>
		  <?php if ( !isset($_SESSION['user']) ) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= baseUrl().'/users/register' ?>">Регистрация</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= baseUrl().'/users/login' ?>">Вход</a>
          </li>
      	  <?php else : ?>
      	  <li class="nav-item">
            <a class="nav-link" href="<?= baseUrl().'/users/profile' ?>">Профиль</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= baseUrl().'/users/logout' ?>">Выйти</a>
          </li>
		  <?php endif; ?>
        </ul>
      </div>
    </nav>	
    
	<?php include $subview; ?>
  

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>