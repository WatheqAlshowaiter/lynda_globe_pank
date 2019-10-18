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
 * delete subject by givig id 
 *
 * @param int $id
 * @return bool 
 */
function delete_subject($id)
{
    global $db;

    $sql  = "DELETE FROM subjects ";
    $sql .= "WHERE id = '" . $id . "'";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if ($result) {
        return true;
    } else {
        mysqli_error($db);
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

/**
 * get all rows of certaint page 
 *
 * @param  int $id
 * @return array
 */
function find_page_by_id($id)
{
    global $db;

    $sql  = "SELECT * FROM pages ";
    $sql .= "where id = '" . $id  . "'"; // containing 'id' with single quotes is for seacurity 

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result); // we can free results here because it is one array not a loop $sql  = "SELECT * FROM pages ";

    return $page; // returns assoc array not a result set  
}

function insert_page($page)
{
    global $db;

    $sql = "INSERT INTO pages ";
    $sql .= "(subject_id, menu_name, position, visible, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . $page['subject_id'] . "',";
    $sql .= "'" . $page['menu_name'] . "',";
    $sql .= "'" . $page['position'] . "',";
    $sql .= "'" . $page['visible'] . "',";
    $sql .= "'" . $page['content'] . "'";
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
function update_page($page)
{
    global $db;

    $sql = "UPDATE pages SET ";
    $sql .= "subject_id='" . $page['subject_id'] . "', ";
    $sql .= "menu_name='" . $page['menu_name'] . "', ";
    $sql .= "position='" . $page['position'] . "', ";
    $sql .= "visible='" . $page['visible'] . "', ";
    $sql .= "content='" . $page['content'] . "' ";
    $sql .= "WHERE id='" . $page['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
function delete_page($id)
{
    global $db;

    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
