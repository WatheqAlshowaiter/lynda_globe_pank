<?php
require_once('../../../private/initialize.php');
?>


<?php
if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}

$id = $_GET['id'];


if (is_post_request()) {
    $result = delete_subject($id);
    redirect_to(url_for("staff/subjects/index.php"));
} else {
    $subject = find_subject_by_id($id);
}
?>

<?php $page_title = 'Delete Subject: ' . $subject["menu_name"]; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject edit">
        <h1>Delet Subject <?php echo $subject["menu_name"] ?> </h1>

        <form action="" method="post">
            <p>Are you sure you want to delete subject: [<?php echo $subject["menu_name"]; ?>]?</p>
            <div id="operations">
                <input type="submit" value="Delete Subject" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>