<html>
	<head>
		<title>Vacation Reviews</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
	</head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">Vacation Reviews</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>reviews">Reviews</a></li>
             <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>ratings">Sort by Rating</a></li>
          </ul>
          <ul class="navbar-nav right">
          <?php if(!$this->session->userdata('logged_in')) : ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a></li>
          <?php endif; ?>
          <?php if($this->session->userdata('logged_in')) : ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>reviews/create">Create Review</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a></li>
          <?php endif; ?>
          </ul>
        </div>
    </nav><br />


    <div class="container">
      <!-- Flash messages -->
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('review_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('review_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('review_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('review_updated').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('rating_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('rating_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('review_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('review_deleted').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('rating_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('rating_deleted').'</p>'; ?>
      <?php endif; ?>