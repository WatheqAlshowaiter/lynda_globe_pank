<?php require_once('../../../private/initialize.php'); ?>

<?php
if (!isset($_GET['id'])) {
    redirect_to(url_for('staff/pages/index.php'));
}

// initial values 
$id = $_GET['id'];
$menu_name = "";
$position = "";
$visible = '';

if (is_post_request()) {
    $menu_name = $_POST['menu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    echo "Form parameters<br />";
    echo "Menu name: " . $menu_name . "<br />";
    echo "Position: " . $position . "<br />";
    echo "Visible: " . $visible . "<br />";
}
?>
<?php $page_title = "Edit Page"; ?>
<?php include(SHARED_PATH . '/staff_header.php');  ?>

<div id="content" class="page edit">
    <a href="<?php echo url_for('/staff/pages/index.php') ?>" class="back-link">&laquo; Back to List </a>
    <h1> Edit Page </h1>
    <form action="" method="post">
        <dl>
            <dt>Menu Name </dt>
            <dd> <input type="text" name="menu_name" value="<?php echo h($menu_name); ?> "> </dd>
        </dl>
        <dl>
            <dt>Position</dt>
            <dd>
                <select name="position">
                    <option value='1' <? echo $position == "1" ? "selected" : "" ?>>1</option>;
                    <option value='2' <? echo $position == "2" ? "selected" : "" ?>>2</option>;
                </select>
            </dd>
        </dl>
        <dl>
            <dt>Visible</dt>
            <dd>
                <input type="hidden" name="visible" value="0">
                <input type="checkbox" name="visible" value="1" <? echo $visible == "1" ? "checked" : ""; ?>>
            </dd>
        </dl>
        <div id="operations">
            <input type="submit" value="Edit Page">
        </div>
    </form>
</div>

<?php include(SHARED_PATH . '/staff_footer.php');
