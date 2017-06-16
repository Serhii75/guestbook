<div class="container">
	<form action="<?= baseUrl().'/comments/edit/'.$comment['id']; ?>" method="post" class="form-comment-edit">
		<h2 class="text-center mb-4">Редактирование комментария</h2>
		<div class="form-group row justify-content-center">
			<div class="col-12">
				<textarea name="comment" class="form-control"><?= $comment['comment'] ?></textarea>
			</div>
		</div>
		<button class="btn btn-primary btn-block text-center" type="submit">Сохранить</button>
	</form>
</div>