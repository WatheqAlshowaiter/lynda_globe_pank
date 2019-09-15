<?php require_once('../../../private/initialize.php'); ?>
<?php

// $id =  isset($_GET['id']) ? $_GET['id']: '1'; // before php 7.0
$id = $_GET['id'] ?? '1'; // like previous one but for > PHP 7.0  
?> 

<? $page_title = "Show Subject"; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>"> &laquo; Back to list</a>
    <div class="page show">
        Subject  ID: <?php echo h($id);?> 
    </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>

<!-- some links to encode -->
<!-- <a href="show.php?name=<?php //echo u('John Doe'); ?>">Link</a><br /> -->
<!-- <a href="show.php?company=<?php //echo u('Widgets&More'); ?>">Link</a><br /> -->
<!-- <a href="show.php?query=<?php //echo u('!#*?'); ?>">Link</a><br /> -->


