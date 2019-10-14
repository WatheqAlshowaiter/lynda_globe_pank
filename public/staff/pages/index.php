<?php require_once('../../../private/initialize.php'); ?>

<?php
$page_set  = find_all_pages();
?>
<?php
// $pages = [
//   ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'Globe Bank'],
//   ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'History'],
//   ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Leadership'],
//   ['id' => '4', 'position' => '4', 'visible' => '0', 'menu_name' => 'Contact Us'],
// ];
?>
<? $page_title = "Pages Menu";  ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="pages listing">
    <h1>Pages</h1>
    <div class="actions">
      <a href="<? echo url_for('staff/pages/new.php') ?>" class="action">Create new page</a>
    </div>
    <table class="list">
      <tr>
        <th>ID</th>
        <th>Subject ID</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Name</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>

      </tr>
      <?php while ($page  = mysqli_fetch_assoc($page_set)) { ?>
        <tr>
          <td><?php echo h($page['id']); ?> </td>
          <td><?php echo h($page['subject_id']); ?> </td>
          <td><?php echo h($page['position']); ?> </td>
          <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?> </td>
          <td><?php echo h($page['menu_name']); ?> </td>
          <td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id']))); ?>">veiw</a></td>
          <td><a href="<? echo url_for('staff/pages/edit.php?id=' . h(u($page['id']))); ?>" class="action">Edit</a></td>
          <td><a href="" class="action">Delete</a></td>
        </tr>
      <? } ?>
    </table>
    <?php mysqli_free_result($page_set);  ?>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php') ?>