<?php if(!isset($page_title)){ $page_title = "Staff Area"; } ?>

<!doctype html>

<html lang="en">
  <head>
    <title>GBI - <?php echo h($page_title);?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css');?>" />
  </head>

  <body>
    <header>
      <h1>GBI Staff Area</h1> 
    </header>

    <navigation>
      <ul>
        <li>User: <?= $_SESSION['username'] ?? ''; // php 7.0 ?></li>
        <li><a href="<? echo url_for('/staff/index.php');?>">Menu</a></li>
        <li><a href="<? echo url_for('/staff/logout.php');?>">Logout</a></li>
      </ul>
    </navigation>
    <?php echo display_session_message(); ?> 