<?php
    /***********************************************************************
     * change_info.php
     *
     * Andy Shi
     * Computer Science 50
     * 
     * Change SAT/ACT scores and/or GPAs of logged in users.
     **********************************************************************/
     
    // configuration
    require("../includes/config.php");
    require("../includes/algorithm.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // check if user wants to change SAT scores
        if ($_POST["sat"] != NULL)
        {
            // update database
            if (query("UPDATE users SET sat = ? WHERE id = ?", $_POST["sat"], $_SESSION["id"]) === false)
            {
                apologize("Unable to update your SAT score.");
                exit(1);
            } 
        }
        
        // check if user wants to change ACT scores
        if ($_POST["act"] != NULL)
        {
            // update database
            if (query("UPDATE users SET act = ? WHERE id = ?", $_POST["act"], $_SESSION["id"]) === false)
            {
                apologize("Unable to update your ACT score.");
                exit(1);
            } 
        }
        
        // check if user wants to change GPA
        if ($_POST["gpa"] != NULL)
        {
            // update database (GPA is normalized and re-scaled on a 4.0 scale)
            if (query("UPDATE users SET gpa = ? WHERE id = ?", ($_POST["gpa"] * 4 / $_POST["gpa2"]), $_SESSION["id"]) === false)
            {
                apologize("Unable to update your GPA.");
                exit(1);
            } 
        }
        
        // recalculate selection index
        $user = query("SELECT sat, act, gpa FROM users WHERE id = ?", $_SESSION["id"]);
        $selection_index = calculate_index($user[0]["sat"], $user[0]["act"], $user[0]["gpa"]);
        
        // put selection index into table
        if (query("UPDATE users SET selection_index = ? WHERE id = ?", $selection_index, $_SESSION["id"]) === false)
        {
            apologize("Unable to update your selection index.");
            exit(1);
        } 
        
        // update session
        $selection_index_new = query("SELECT selection_index FROM users WHERE id = ?", $_SESSION["id"]);
        $_SESSION["selection_index"] = $selection_index_new[0]["selection_index"];
        
        // display password success form
        render("change_info_result.php", ["title" => "Success!"]);
    }
    // else display the form
    else
    {
        // get user's current stats from table
        
        $rows = query("SELECT sat, act, gpa, selection_index FROM users WHERE id = ?", $_SESSION["id"]); 
        
        render("change_info_form.php", ["title" => "Change Password", "stats" => $rows]);
    }
?>  
