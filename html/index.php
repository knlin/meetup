<?php
/**
 * Our home page
 * Andy Shi, Zihao Wang, Albert Li
 * Displays a list of all the colleges a user has added to the portfolio
 */

    // configuration
    require("../includes/config.php");
    
    // get colleges from portfolio
    
    $colleges = query("SELECT college, accepted FROM portfolio WHERE id = ?", $_SESSION["id"]);
    
    // get information about the college from the table    
    foreach ($colleges as &$college)
    {
        $college["query"] = query("SELECT name, gpa, sat_cr, sat_math, sat_writing, act_comp, selection_index FROM colleges WHERE id = ?", $college["college"]);
    }
      
    render("portfolio_display.php", ["title" => "Portfolio", "colleges" => $colleges]);   
?>
