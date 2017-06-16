<div class="container">
	<form action="<?= baseUrl().'/users/profile/'.$user['id']; ?>" class="form-register" method="post" enctype="multipart/form-data">
		<h2 class="text-center mb-4">Профиль пользователя</h2>

		<?php if ( isset($_SESSION['error']) ) : ?>
		<div class="alert alert-error alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
		</div>
        <?php endif; ?>

        <?php if ( isset($_SESSION['message']) ) : ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
		</div>
        <?php endif; ?>

		<div class="form-group row">
			<label for="username" class="col-3 col-form-label text-right">Имя пользователя</label>
			<div class="col-9">
				<input type="text" class="form-control" name="username" id="username" placeholder="Имя пользователя" value="<?= setValue('username', $user['username']) ?>" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-3 col-form-label text-right">Email</label>
			<div class="col-9">
				<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= setValue('email', $user['email']) ?>" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="role_id" class="col-3 text-right">Роль</label>
			<div class="col-9">
				<select name="role_id" id="role_id" class="form-control" <?php if ($user['role_id'] != ADMIN) echo 'disabled'; ?>>
					<?php foreach ( $roles as $role ) : ?>
						<option value="<?= $role['id'] ?>" <?php if ($role['id'] == $user['role_id']) echo 'selected'; ?>><?= $role['name'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="avatar" class="col-3 col-form-label text-right">Аватар</label>
			<div class="col-9">
				<div class="upload">
					<input type="file" class="inputfile" name="avatar" id="avatar" value="<?= $user['avatar']; ?>">
					<label for="avatar">
						<span id="filename"></span>
						<span id="filelabel">Выберите файл</span>
					</label>
					<div class="thumbnail">
						<img src="<?= baseUrl().'/images/avatars/'.$user['avatar'] ?>" alt="">
					</div>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label for="new_pswd" class="col-3 col-form-label text-right">Новый пароль</label>
			<div class="col-9">
				<input type="password" class="form-control" name="new_pswd" id="new_pswd" placeholder="Новый пароль">
			</div>
		</div>
		<div class="form-group row">
			<label for="pswd_confirm" class="col-3 col-form-label text-right">Подтверждение пароля</label>
			<div class="col-9">
				<input type="password" class="form-control" name="pswd_confirm" id="pswd_confirm" placeholder="Подтверждение пароля">
			</div>
		</div>
		<button class="btn btn-primary btn-block" type="submit">Сохранить</button>
	</form>
</div>