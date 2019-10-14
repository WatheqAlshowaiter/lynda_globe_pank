<?php require_once('../../../private/initialize.php'); ?>
<?php

// $id =  isset($_GET['id']) ? $_GET['id']: '1'; // before php 7.0
$id = $_GET['id'] ?? '1'; // like previous one but for > PHP 7.0  

$subject = find_subject_by_id($id);


?>

<? $page_title = "Show Subject"; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>"> &laquo; Back to list</a>
    <div class="page show">
        <h1>Subject: <?php echo h($subject['menu_name']); ?></h1>

        <div class="attributes">
            <dl>
                <dt>Menu Name</dt>
                <dd><?php echo h($subject['menu_name']); ?></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($subject['position']); ?></dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd><?php echo $subject['visible'] == '1' ? 'true' : 'false'; ?></dd>
            </dl>
        </div>

    </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>

<!-- some links to encode -->
<!-- <a href="show.php?name=<?php //echo u('John Doe'); 
                            ?>">Link</a><br /> -->
<!-- <a href="show.php?company=<?php //echo u('Widgets&More'); 
                                ?>">Link</a><br /> -->
<!-- <a href="show.php?query=<?php //echo u('!#*?'); 
                                ?>">Link</a><br /> -->