<h2><?= $title ?></h2>
<?php foreach($reviews as $review) : ?>
	<h3><?php echo $review['title']; ?></h3>
	<div class="row">
		<div class="col-md-3">
			<img class="review-thumb" src="<?php echo site_url(); ?>assets/images/reviews/<?php echo $review['review_image']; ?>">
		</div>
		<div class="col-md-9">
			<h4><?php echo $review['name']; ?></h4>
			<small class="review-date">Reviewed posted on: <?php echo $review['created_at']; ?></small><br>
		Review: <?php echo word_limiter($review['body'], 60); ?>
		<p><a class="btn btn-outline-secondary" href="<?php echo site_url('/reviews/'.$review['slug']); ?>">View Review</a></p><br><br>
		</div>
	</div>
<?php endforeach; ?>
<div class="pagination-links">
		<?php echo $this->pagination->create_links(); ?>
</div>