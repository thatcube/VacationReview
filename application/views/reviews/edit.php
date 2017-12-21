<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('reviews/update'); ?>
	<input type="hidden" name="id" value="<?php echo $review['id']; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $review['title']; ?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $review['body']; ?></textarea>
  </div>
  <div class="form-group">
  <label>Rating</label>
  <select name="rating_id" class="form-control">
    <?php foreach($ratings as $rating): ?>
      <option value="<?php echo $rating['id']; ?>"><?php echo $rating['name']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>