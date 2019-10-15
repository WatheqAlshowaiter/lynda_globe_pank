<?php

require_once('../../../private/initialize.php');



// Handle form values sent by new.php

if (is_post_request()) {

	$subject = [] ; // an array 
	$subject['menu_name'] = $_POST['menu_name'] ?? '';
	$subject['position'] = $_POST['position'] ?? '';
	$subject['visible'] = $_POST['visible'] ?? '';

	$result = insert_subject($subject); // in INSERT return true/false
	$new_id = mysqli_insert_id($db); // Returns the auto generated id used in the last query
	redirect_to(url_for("/staff/subjects/show.php?id=" . $new_id)); 

} else {
	redirect_to(url_for('staff/subjects/new.php'));
}
