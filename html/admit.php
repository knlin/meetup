<?php
    /***********************************************************************
     * admit.php
     * Computer Science 50
     * Andy Shi, Zihao Wang, Albert Li
     * 
     * Lets a user check off a college on his/her portfolio as "admitted"
     * Then updates the constants in the colleges table
     * Does not work yet because we have not implemented the updating of the constants
     **********************************************************************/
     
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    { 
        // get id of college
        $id = query("SELECT id FROM colleges WHERE name = ?", $_POST["name"]);
        
        // update portfolio table
        if(query("UPDATE portfolio SET accepted = 1 WHERE id = ? AND college = ?", $_SESSION["id"], $id[0]["id"]) === false)
        {
            apologize("Unable to write to college portfolio database");
            exit(1);
        }

        // go back to to the portfolio
        redirect("/");
    }
    
    // render admit form if not submitted
    else
    {
        // get colleges from user's portfolio
        $colleges = query("SELECT college FROM portfolio WHERE id = ?", $_SESSION["id"]);
        
        // get information about the college from the table    
        foreach ($colleges as &$college)
        {
            $college["query"] = query("SELECT name FROM colleges WHERE id = ?", $college["college"]);
        }
        
        // render the form
        render("admit_form.php", ["title" => "Sell", "colleges" => $colleges]);
    }
?>
