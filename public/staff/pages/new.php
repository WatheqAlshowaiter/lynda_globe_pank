<?php require_once('../../../private/initialize.php'); ?>
<?
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
<?php $page_title = "Create Page"; ?>
<?php include(SHARED_PATH . '/staff_header.php');  ?>

<div id="content" class="page new">
    <a href="<?php echo url_for('/staff/pages/index.php') ?>" class="back-link">&laquo; Back to List </a>
    <h1> Create Page </h1>
    <form action="" method="post">
        <dl>
            <dt>Menu Name </dt>
            <dd> <input type="text" name="menu_name" value="<? echo h($menu_name) ?>"> </dd>
        </dl>
        <dl>
            <dt>Position</dt>
            <dd>
                <select name="position" >
                    <option value="1" <? if ($position == "1") echo "selected"; ?>>1</option>
                </select>
            </dd>
        </dl>
        <dl>
            <dt>Visible</dt>
            <dd>
                <input type="hidden" name="visible" value="0">
                <input type="checkbox" name="visible" value="1" <? echo $visible == "1" ? " checked" : ""; ?>>
            </dd>
        </dl>
        <div id="operations">
            <input type="submit" value="Create Page">
        </div>
    </form>
</div>

<?php include(SHARED_PATH . '/staff_footer.php');
