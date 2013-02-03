<?php
/**
 * search.php
 * Andy Shi, Zihao Wang, Albert Li 
 * Computer Science 50
 * Allows user to search for a college
 */
 
    // configuration
    require("../includes/config.php");
    
    // on form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // query database for college stats 
        $results = query("SELECT name, gpa, sat_cr, sat_math, sat_writing, act_comp, selection_index FROM colleges WHERE name = ?", $_POST["symbol"]);
        if ($results == false)
        {
            apologize("Unable to find college requested");
            exit(1);
        }
        
        // format some results
        $results[0]["act_comp"] = number_format($results[0]["act_comp"], 1);
        $results[0]["selection_index"] = number_format($results[0]["selection_index"], 4);
        
        // render search result
        render("search_results.php", ["title" => "Results", "results" => $results]);
        
    } 
    
    else
    {
        // render homepage
        render("search_form.php", ["title" => "Search"]);
    }
?>
