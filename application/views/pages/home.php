<?php if($this->session->userdata('logged_in')) : ?>
   <h3>Welcome Back, <?php echo $this->session->userdata('username'); ?></h3><br />
   <h3>Write a New Review:</h3><a href="<?php echo base_url(); ?>reviews/create" class="btn btn-primary" role="button">Create Review</a><br /><br /><br />
   <?php endif; ?><br />

<h3>Browse Reviews:</h3>
<a href="<?php echo base_url(); ?>reviews" class="btn btn-primary" role="button">View Reviews</a><br /><br /><br />

<?php if(!$this->session->userdata('logged_in')) : ?>
    <h3>Login or register:</h3>
    <a href="<?php echo base_url(); ?>users/login" class="btn btn-primary" role="button">Login</a><br /><br />
    <a href="<?php echo base_url(); ?>users/register" class="btn btn-primary" role="button">Register</a>
<?php endif; ?>