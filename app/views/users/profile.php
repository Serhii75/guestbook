<div class="container">
	<form action="<?= baseUrl().'/users/profile'; ?>" class="form-register" method="post" enctype="multipart/form-data">
		<h2 class="text-center">Пользователь: </h2>
		<div class="form-group row">
			<label for="username" class="col-3 col-form-label text-right">Имя пользователя</label>
			<div class="col-9">
				<input type="text" class="form-control" name="username" id="username" placeholder="Имя пользователя" value="" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-3 col-form-label text-right">Email</label>
			<div class="col-9">
				<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="role_id" class="col-3 text-right">Роль</label>
			<div class="col-9">
				<select name="role_id" id="role_id" class="form-control">
					<option value="1">Администратор</option>
					<option value="2" selected>Зарегистрированный</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="new_pswd" class="col-3 col-form-label text-right">Аватар</label>
			<div class="col-9">
				<input type="file" class="form-control" name="avatar" id="avatar" value="">
			</div>
		</div>
		<div class="form-group row">
			<label for="new_pswd" class="col-3 col-form-label text-right">Новый пароль</label>
			<div class="col-9">
				<input type="text" class="form-control" name="new_pswd" id="new_pswd" placeholder="Новый пароль" value="">
			</div>
		</div>
		<div class="form-group row">
			<label for="pswd_confirm" class="col-3 col-form-label text-right">Подтверждение пароля</label>
			<div class="col-9">
				<input type="password" class="form-control" name="pswd_confirm" id="pswd_confirm" placeholder="Подтверждение пароля" value="">
			</div>
		</div>
	</form>
</div>