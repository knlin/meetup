<?php
    // configuration
    require("../includes/config.php");
    
    $rows = query("SELECT * FROM dates WHERE id_male = ? OR id_female = ?", $_SESSION["id"], $_SESSION["id"]);

    if(empty($rows))
    {
        render("thanks.php", ["title" => "Thank you"]);   
    }
    
    $date_id;
    $temp_id = NULL;
    if ($rows[0]["id_male"] == $_SESSION["id"])
    {
        $temp_id = query("SELECT name, email FROM users WHERE id = ?", $rows[0]["id_female"]);
        //dump($temp_id);
        $date_id = $temp_id[0]["name"];
    }
    else
    {
        $temp_id = query("SELECT name, email FROM users WHERE id = ?", $rows[0]["id_male"]);
        $date_id = $temp_id[0]["name"];
    }
    
    $movie = $rows[0]["movie"];
    $email = $temp_id[0]["email"];

    render("date_list.php", ["title" => "Your date", "date_id" => $date_id, "movie" => $movie, "email" => $email]);
 
?>
