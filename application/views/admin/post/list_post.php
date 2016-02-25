<!DOCTYPE html>
<html>
<head>
  <title>f8news-Admin</title>
  <?php $this->load->view('include/css_common'); ?>
</head>
<body>
  <?php $this->load->view('include/header'); ?>
  <div class="f8-admin-container container">
    <section class="f8-sec-admin-sidebar  col-lg-3 col-md-3 col-sm-4 col-xs-12">
      <?php $this->load->view('admin/inc/sidebar_menu'); ?>
    </section>
    <section class="f8-sec-admin-body  col-lg-9 col-md-9 col-sm-8 col-xs-12">
      <div class="f8-sec-inner-block">
        <div class="f8-sec-heading">
          Manage News Articles
        </div>
        <?php if(isset($message)) { echo $message; } ?>
        <?php foreach ($posts as $post): ?>
          <div class="list-post">
            <p class="list-post-title"><b><?php echo $post->title; ?></b></p>
            <p class="authoring-info"><?php echo "Created on &mdash; <span class='date'>" . $post->created ."</span> by <span class='author'>".$this->ion_auth->getUserName($post->author)."</span>"; ?></p>
            <p>
              <a href="#">Delete</a>
              <span>|</span>
              <a href="#">Edit</a>
              <span>|</span>
              <a href="#">Unpublish</a>
            </p>
          </div>
        <?php endforeach; ?>
        <!-- <p><a class="btn btn-primary" href="<?php echo base_url('article/create_category');?>">Add More News Category</a></p> -->
      </div>
    </section>
  </div>
  <?php $this->load->view('include/footer'); ?>
  <?php $this->load->view('include/templates'); ?>
  <?php $this->load->view('include/js_common'); ?>
</body>
</html>
