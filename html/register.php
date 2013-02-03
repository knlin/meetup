<?php
    
    /***********************************************************************
     *
     * register.php
     * Andy Shi, Zihao Wang, Kenny Lin, Angela Zhou
     *
     * Registers new users
     **********************************************************************/

    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
                     
        // insert new user into database
        
        // if the user did not enter an act score assume 0
        if (empty($_POST["act"]))
        {
            $_POST["act"] = 0;
        }
        
        // same for sat
        if (empty($_POST["sat"]))
        {
            $_POST["sat"] = 0;        
        }
        
        // scale GPA to 4.0 scale
        $gpa = $_POST["gpa"]*4.0/$_POST["gpa2"];
        
        // calculate selection index
        $index = calculate_index($_POST["sat"], $_POST["act"], $gpa);
        
        // make a new row for the user
        if (query("INSERT INTO users (username, hash, gpa, act, sat, selection_index) VALUES(?, ?, ?, ?, ?, ?)", $_POST["username"], crypt($_POST["password"]), $gpa, $_POST["act"], $_POST["sat"], $index) === false)
        {   
            apologize("Username was used.");
            exit(1);
        }
        else 
        {
            // read the last (most recent) user 
            $rows = query("SELECT LAST_INSERT_ID() AS id");
        
            // gets the identifier and stores it in a variable
            $id = $rows[0]["id"];
        
            // log in new user
            $_SESSION["id"] = $id;
            
            // stores stuff necessary for greeting message in session
            $info = query("SELECT username, selection_index FROM users WHERE id = ?", $id);
            $_SESSION["username"] = $info[0]["username"];
            $_SESSION["selection_index"] = $info[0]["selection_index"];
        
            // redirect to portfolio
            redirect("/");
        }  
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
?>
