<?php
    // configuration
    require("../includes/config.php");
    
   $rows = query("SELECT * FROM dates WHERE id_male = ? OR id_female = ?", $_SESSION["id"], $_SESSION["id"]);

    if(empty($rows))
    {
        render("thanks.php", ["title" => "Thank you"]);   
    }
    
    $date_id;
    //dump($rows);
    if ($rows[0]["id_male"] == $_SESSION["id"])
    {
        $temp_id = query("SELECT name FROM users WHERE id = ?", $rows[0]["id_female"]);
        $date_id = $temp_id[0];
    }
    else
    {
        $temp_id = query("SELECT name FROM users WHERE id = ?", $rows[0]["id_male"]);
        $date_id = $temp_id[0];
    }
    
    $movie = $rows[0]["movie"];
    render("date_list.php", ["title" => "Your date", "date_id" => $date_id, "movie" => $movie]);
 
?>
