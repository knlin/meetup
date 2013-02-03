<?php
/**
 * explore.php
 * Andy Shi, Zihao Wang, Albert Li
 * Allows users to explore the entire database of selection indicies
 * Relies on URL manipulation and use of $_GET
 */
    // configuration
    require("../includes/config.php"); 
   
    // default case
    if(empty($_GET['start']))
    {
         $_GET['start'] = 0;
    }
    
    // get data to be displayed from database
    $rows = query('SELECT name, gpa, sat_cr, sat_math, sat_writing, act_comp, selection_index FROM colleges ORDER BY selection_index DESC LIMIT ?,20', $_GET['start']);
    
    render("explore_form.php", ["rows" => $rows, "start" => $_GET["start"]]);
?>
