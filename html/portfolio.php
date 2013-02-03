<?php
     /***********************************************************************
     * portfolio.php
     * Andy Shi, Zihao Wang, Albert Li
     * Computer Science 50
     *
     * Add a college to portfolio
     **********************************************************************/
     
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // make sure college exists
        $college = query("SELECT id FROM colleges WHERE name = ?", $_POST["symbol"]);
        
        // user did not enter a valid college
        if (empty($college))
        {
            apologize("Unable to find requested college " . $_POST["symbol"] . "in our database. Make sure you are using the autocomplete");
            // we need the autocomplete to actually query colleges. this is a bug/problem we didn't have time to fix
            exit(1);
        }
                
        // update the profile table
        if (query("INSERT INTO portfolio (id, college) VALUES (?, ?)", $_SESSION["id"], $college[0]["id"])=== false)
        {
            apologize("Unable to update profile. Make sure you don't already have this college there.");
            exit(1);
        }

        // when done, go back to the portfolio
        redirect("/");
    }

    // else display the form
    else
    {
        render("portfolio_form.php", ["title" => "Add to Portfolio"]);
    }
?>
