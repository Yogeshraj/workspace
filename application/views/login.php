<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require('header.php'); ?>
<div class="container-fluid">

  <div class="center-box">
<div class="error-box"> <?php echo validation_errors(); ?> <?php echo $this->session->flashdata('message'); echo $this->session->tempdata('success'); echo $this->session->flashdata('logout_msg'); ?></div>
  <form action="check_data" method="post">
      <input type="text" name="email" placeholder="Enter RR id/mail id" class="u_name" required></input>
      <input type="password" name="password" placeholder="Enter ur password" required></input>
      <button type="submit" name="submit" value="Login" class="submit">Login<i class="fa fa-arrow-right"></i></button>
  </form>
</div>
</div>
<?php require('footer.php'); ?>
