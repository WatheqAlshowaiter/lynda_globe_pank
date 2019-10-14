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
