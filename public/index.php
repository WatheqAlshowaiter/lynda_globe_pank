<?php require_once('../private/initialize.php'); ?>

<?php
if (isset($_GET["id"])) {
  $page_id = $_GET['id'];
  $page = find_page_by_id($page_id);
  if (!$page) {
    redirect_to(url_for('/index.php'));
  }
  $subject_id = $page["subject_id"]; // to hilight subject id also 

} else if (isset($_GET["subject_id"])) {
  $subject_id = $_GET["subject_id"];
  $page_set = find_pages_by_subject_id($subject_id);
  $page = mysqli_fetch_assoc($page_set); // just the first result 
  mysqli_free_result($page_set);
  if (!$page) {
    redirect_to(url_for('/index.php'));
  }
  $page_id = $page["id"];
} else {
  // do nothing 
  // show the homepage 
}
?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <!-- the side navbar  -->
  <?php include(SHARED_PATH . '/public_navigation.php'); ?>

  <div id="page">
    <?php
    if (isset($page)) {
      // show the page from DB 
      // TODO add html escape back 
      echo ($page["content"]);
    } else {
      // Show the homepage
      // The homepage content could:
      // * be static content (here or in a shared file)
      // * show the first page from the nav
      // * be in the database but add code to hide in the nav
      include(SHARED_PATH . '/static_homepage.php');
    }
    ?>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>