<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('reviews/create'); ?>
  <div class="form-group">
    <label>Vacation Destination</label>
    <input type="text" class="form-control" name="title" placeholder="Name/Location of Destination">
  </div>
  <div class="form-group">
    <label>Your Review</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
  </div>
  <div class="form-group">
	  <label>Your Rating</label>
	  <select name="rating_id" class="form-control">
		  <?php foreach($ratings as $rating): ?>
		  	<option value="<?php echo $rating['id']; ?>"><?php echo $rating['name']; ?></option>
		  <?php endforeach; ?>
	  </select>
  </div>
  <div class="form-group">
	  <label>Upload Image</label>
	  <input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>