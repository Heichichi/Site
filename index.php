
<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php require('meta_information.php'); ?>
  </head>

  <body>
  
  <?php require('navigation.php'); ?>
	
	<div class="container-fluid">
      <div class="row">
        <?php require('sidebar.php'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <h2 class="sub-header">Add Members</h2>
          <?php require('submit_form.php') ?>

          <h2 class="sub-header">List Members</h2>

          <?php require('list_members.php') ?>
		 </div>
      </div>
    </div>

    <?php require('js.php'); ?>
  </body>
</html>
