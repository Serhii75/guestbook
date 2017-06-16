<div class="container">
	<h2 class="text-center mb-4">Гостевая книга</h2>
	<?php if ( isset($_SESSION['message']) ) : ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
	</div>	
	<?php endif; ?>	
	<section>
	<?php if ( count($comments) > 0 ) : ?>
		<?php foreach ( $comments as $comment ) : ?>
		<div class="comment-item mb-3">
			<div class="row">
				<div class="col-sm-3">
					<div class="comment-data">
						<img class="img-fluid rounded float-left float-sm-none" src="<?= baseUrl().'/images/avatars/'.$comment['avatar'] ?>" alt="">
						<p><?= $comment['author'] ?></p>
						<p class="comment-date">Последний визит: <?= date('Y-m-d H:i', strtotime($comment['last_visit'])) ?></p>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="comment-body">
						<p class="comment-date">
							<?= date('Y-m-d H:i', strtotime($comment['created_at'])) ?>
							<?php if ( isset($user) && ($comment['user_id'] == $user['id'] || $user['role_id'] == ADMIN) ) : ?>
								<a href="<?= baseUrl().'/comments/edit/'.$comment['id'] ?>" class="btn btn-sm btn-primary float-right ml-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span class="hidden-sm-down">Редактировать</span></a>
								<a href="<?= baseUrl().'/comments/remove/'.$comment['id'] ?>" class="btn btn-sm btn-danger float-right" onclick="return confirm('Комментарий будет безвозвратно удалён. Вы уверены?')"><i class="fa fa-trash-o" aria-hidden="true"></i> <span class="hidden-sm-down">Удалить</span></a>
							<?php endif; ?>
						</p>
						<p><?= $comment['comment'] ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>	
	<?php endif; ?>
	</section>

	<hr>

	<section class="pb-4">
		<?php if ( isset($user) ) : ?>
		<div class="row justify-content-center">
			<div class="col-sm-8">
				<form action="<?= baseUrl().'/comments/add'; ?>" method="post" class="form-comment">
					<h4 class="text-center mb-4">Добавить комментарий</h4>
					<input type="hidden" name="user_id" value="<?= $user['id'] ?>">
					<div class="form-group">
						<input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" disabled>
					</div>
					<div class="form-group">
						<textarea name="comment" id="comment" class="form-control" row="10" required></textarea>
					</div>
					<button class="btn btn-primary btn-block" type="submit">Сохранить</button>
				</form>
			</div>
		</div>
		<?php else : ?>
		<div class="alert alert-info text-center">
			Чтобы оставить комментарий <a href="<?= baseUrl().'/users/login' ?>">авторизуйтесь</a> или 
			<a href="<?= baseUrl().'/users/register' ?>">зарегистрируйтесь</a>
		</div>
		<?php endif; ?>
	</section>
</div>