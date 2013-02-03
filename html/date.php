<?php
    // configuration
    require("../includes/config.php");

    // on form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $movie1 = strtolower($_POST["movie1"]);
        $movie2 = strtolower($_POST["movie2"]);
        $movie3 = strtolower($_POST["movie3"]);

        // insert into database
        query("UPDATE users SET movie1 = ? WHERE id = ?", $movie1, $_SESSION["id"]); 
        query("UPDATE users SET movie2 = ? WHERE id = ?", $movie2, $_SESSION["id"]);
        query("UPDATE users SET movie3 = ? WHERE id = ?", $movie3, $_SESSION["id"]);
        query("UPDATE users SET location = ? WHERE id = ?", $_POST["location"], $_SESSION["id"]);
        query("UPDATE users SET pay = ? WHERE id = ?", $_POST["pay"], $_SESSION["id"]);
        //query("UPDATE users SET movie1 = ? WHERE id = ?", $movie1, $_SESSION["id"]);
        //movie2 = ? movie3 = ? location = ? pay = ? WHERE id = ?", $movie1, $movie2, $movie3, , , $_SESSION["id"]) === false)
        /*{
            apologize("Unable to insert into database");
            exit(1);
        }*/
        redirect("/");
    }
    else
    {
        render("date_form.php", ["title" => "Go on a date"]);
    }
?>
