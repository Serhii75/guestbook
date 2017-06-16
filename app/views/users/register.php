<div class="container">
	<form class="form-register" action="<?= baseUrl().'/users/register'; ?>" method="post" enctype="multipart/form-data">
		<h2 class="text-center">Регистрация</h2>
		<?php if ( isset($_SESSION['error']) ) : ?>
        <div class="alert alert-danger">
           <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
        <?php endif; ?>
		<div class="form-group row">
			<label for="username" class="col-3 col-form-label text-right">Имя пользователя</label>
			<div class="col-9">
				<input type="text" class="form-control" name="username" id="username" placeholder="Имя пользователя" value="<?= isset($_POST['username']) ? $_POST['username'] : ''; ?>" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-3 col-form-label text-right">Email</label>
			<div class="col-9">
				<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="pswd" class="col-3 col-form-label text-right">Пароль</label>
			<div class="col-9">
				<input type="password" class="form-control" name="password" id="password" placeholder="Пароль" value="" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="pswd_confirm" class="col-3 col-form-label text-right">Подтверждение пароля</label>
			<div class="col-9">
				<input type="password" class="form-control" name="pswd_confirm" id="pswd_confirm" placeholder="Подтверждение пароля" value="" required>
			</div>
		</div>
		<button class="btn btn-primary btn-block" type="submit">Зарегистрироваться</button>
	</form>
</div>