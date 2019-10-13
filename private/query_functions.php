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
