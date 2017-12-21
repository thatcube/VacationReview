<h2><?= $title; ?></h2>
<ul class="list-group">
<?php foreach($ratings as $rating) : ?>
	<li class="list-group-item"><a href="<?php echo site_url('/ratings/reviews/'.$rating['id']); ?>"><?php echo $rating['name']; ?></a>
		<?php if($this->session->userdata('user_id') == $rating['user_id']): ?>
			<form class="cat-delete" action="ratings/delete/<?php echo $rating['id']; ?>" method="POST">
				<input type="submit" class="btn-link text-danger" value="[X]">
			</form>
		<?php endif; ?>
	</li>
<?php endforeach; ?>
</ul>