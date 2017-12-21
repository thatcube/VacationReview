<h1><?php echo $review['title']; ?></h1>
<div class="review-date">Review posted on: <?php echo $review['created_at']; ?></div><br>
<div class="row">
	<img class="img-responsive" src="<?php echo site_url(); ?>assets/images/reviews/<?php echo $review['review_image']; ?>">
</div><br>
<h3>Review</h3>
<div style="font-size: 16px;">
	<?php echo $review['body']; ?>
</div>

<?php if($this->session->userdata('user_id') == $review['user_id']): ?>
	<hr>
	<a class="btn btn-outline-secondary pull-left" href="<?php echo base_url(); ?>reviews/edit/<?php echo $review['slug']; ?>">Edit</a><br />
	<br />
	<?php echo form_open('/reviews/delete/'.$review['id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger">
	</form>
<?php endif; ?>
<hr>
<h3>Comments</h3>
<?php if($comments) : ?>
	<?php foreach($comments as $comment) : ?>
		<div class="card bg-secondary mb-3">
			<div class="card-body">
				<?php echo $comment['body']; ?>
			</div>
			<div class="card-footer text-muted">
				by <?php echo $comment['name']; ?>
			</div>
		</div><br />
	<?php endforeach; ?>
<?php else : ?>
	<p>No Comments To Display :(</p>
<?php endif; ?>
<hr>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$review['id']); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea name="body" class="form-control"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $review['slug']; ?>">
	<button class="btn btn-primary" type="submit">Submit</button>
</form>
