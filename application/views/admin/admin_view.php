<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Admin - CS WEB Dashboard</title>
		<link rel="stylesheet" href="<?php echo base_url();?>/assests/css/demo.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url();?>/assests/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="<?php echo base_url();?>/assests/css/admin/admin_style.css" type="text/css" />
	</head>
	<body>
    <div class="nav">
      <div class="nav-left">
        CS WEB Team
      </div>
      <div class="nav-right">
        <?php echo $this->session->userdata('s_role'); ?>
      </div>
    </div>
    <div class="content">
      <aside class="content-left">

      </aside>
			<aside class="content-right">

      </aside>
    </div>








  <script  src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script  type="text/javascript" src="<?php echo base_url();?>/assests/js/script.js"></script>
  </body>
  </html>
