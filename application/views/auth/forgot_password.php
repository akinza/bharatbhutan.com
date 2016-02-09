<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity);?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'));?></p>

<?php echo form_close();?>


<!DOCTYPE html>
<html>
<head>
  <title>f8news :: Login</title>
  <?php $this->load->view('include/css_common'); ?>
</head>
<body class="drawer drawer--left drawer--navbarTopGutter">
  <?php $this->load->view('include/header'); ?>
  <div class="container f8-sec-main">
    <section class="f8-sec-login-main Absolute-Center">
      <div class="f8-login-header">
        Login
      </div>
      <div class="f8-login-container">
        <?php
        if(!empty($message)){
          echo '<div class="" role="alert">'.$message.'</div>';
        }
        ?>
        <?php echo form_open("auth/forgot_password");?>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <?php
          $attributes_1 = array('id' => 'inputEmail', 'class' => 'form-control', 'placeholder' => 'Email ID', 'type' => 'email');
          echo form_input($identity,'', $attributes_1);
          ?>
        </div>
        <div class="form-group">
          <label for="inputPassword">Password</label>
          <?php
          $attributes_2 = array('id' => 'inputPassword', 'class' => 'form-control', 'placeholder' => 'Password');
          echo form_input($password,'', $attributes_2);
          ?>
        </div>
        <div class="checkbox">
          <label>
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember
          </label>
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign In ...</button>
        <hr style="margin-top:15px; margin-bottom:5px;">
        <div class="form-group">
          <p>Don't have account?<a class="btn btn-link" href="<?php echo base_url("auth/register"); ?>">Register</a></p>
          <p><a class="" href="forgot_password">Forgot Password?</a></p>
        </div>
        <?php echo form_close();?>
      </div>
    </section>
  </div>
  <?php $this->load->view('include/footer'); ?>
  <?php $this->load->view('include/templates'); ?>
  <?php $this->load->view('include/js_common'); ?>
</body>
</html>
