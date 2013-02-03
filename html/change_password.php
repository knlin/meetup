<?php
    /***********************************************************************
     * change_password.php
     *
     * Andy Shi
     * Computer Science 50
     * 
     * Change password of logged in users.
     **********************************************************************/
     
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
                
        // query database for user's old password
        $rows = query("SELECT hash FROM users WHERE id = ?", $_SESSION["id"]);

        // make sure query doesn't fail
        if(empty($rows))
        {
            apologize("We can't seem to find you in our database.");
            exit(1);
        }
        $old_password = $rows[0]["hash"];
    
        // check if old password matches actual old password
        if (crypt($_POST["old-password"], $old_password) != $old_password)
        {
            apologize("Your old password does not match the password stored in our database. Please try again.");
            exit(1);
        }
        
        
        // check if confirmation matches new password
        if ($_POST["confirmation"] != $_POST["new-password"])
        {
            apologize("Your new password and confirmation do not match.");
            exit(1);
        }
        // update database
        if (query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["new-password"]), $_SESSION["id"]) === false)
        {
            apologize("Unable to update your password.");
            exit(1);
        }
        

        // display success form
        render("change_info_result.php", ["title" => "Success!"]);
    }
    // else display the form
    else
    {
        render("change_password_form.php", ["title" => "Change Password"]);
    }
?>   
