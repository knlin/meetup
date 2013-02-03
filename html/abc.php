<?php

    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $_POST["movie1"] = strtolower($_POST["movie1"]);
        $_POST["movie2"] = strtolower($_POST["movie2"]);
        $_POST["movie3"] = strtolower($_POST["movie3"]);

        // insert into database
        if (query("UPDATE users SET movie1 = ? movie2 = ? movie3 = ? location = ? pay = ? WHERE id = ?", $_POST["movie1"], $_POST["movie2"], $_POST["movie3"], $_POST["location"], $_POST["pay"], $_SESSION["id"] === false)
        {
            apologize("Unable to insert into database");
            exit(1);
        }
    }
    else
    {
        render("date_form.php", ["title" => "Go on a date"]);
    }
                     
       
?>
