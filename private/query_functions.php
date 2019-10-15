<?php

function find_all_subjects()
{
    global $db;

    $sql = "SELECT * FROM subjects "; // important to leave the last space
    $sql .= "ORDER BY position ASC";
    // echo $sql; // just for troubleshooting 
    $result = mysqli_query($db, $sql);
    confirm_result_set($result); // make sure sql command is correct

    return $result;
}



/**
 * Find subject information from its id
 *
 * @param int $id
 * @return assoc array 
 */
function find_subject_by_id($id)
{

    global $db;

    $sql  = "SELECT * FROM subjects ";
    $sql .= "where id = '" . $id  . "'"; // containing 'id' with single quotes is for seacurity 

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result); // we can free results here because it is one array not a loop $sql  = "SELECT * FROM subjects ";

    return $subject; // returns assoc array not a result set  
}

/**
 * function to insert to subjects table the return true or echo error msg
 * 
 *
 * @param [type] $menu_name
 * @param [type] $position
 * @param [type] $visible
 * @return void
 */
function insert_subject($subject)
{
    global $db;

    $sql = "INSERT INTO subjects ";
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES ( ";
    $sql .= "'" . $subject['menu_name'] . "', "; // single quote is required  
    $sql .= "'" . $subject['position'] . "', "; // single quote is not required but is the the best practise 
    $sql .= "'" . $subject['visible'] . "' "; // single quote is not required but is the the best practise 
    $sql .= ")";

    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

/**
 * funciont to edit subject info
 *
 * @param array $subject
 * @return boolean
 */
function update_subject($subject)
{ // make the subject[] array as the paramater
    global $db;

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name = '" . $subject['menu_name'] . "', ";
    $sql .= "position = '" . $subject['position'] . "', ";
    $sql .= "visible = '" . $subject['visible'] . "' ";
    $sql .= "WHERE id = '" . $subject['id'] . "' ";
    $sql .= "LIMIT 1";


    $result = mysqli_query($db, $sql);
    // return will be true/false 
    if ($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
/**
 * return all pages from pages database table 
 *
 * @return mixed $result
 * 
 */
function find_all_pages()
{
    global $db;

    $sql = "SELECT  * FROM pages "; // important to leave the last space 
    $sql .= "ORDER BY subject_id, position ASC";
    // echo $sql; // just for troubleshooting 
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    return $result;
}
