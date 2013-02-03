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
        
        
        // make a new row for the user
        if (query("INSERT INTO users (name, email, password, gender, looking, class) VALUES(?, ?, ?, ?, ?, ?)", $_POST["name"], $_POST["email"], crypt($_POST["password"]), $_POST["gender"], $_POST["looking"], $_POST["class"]) === false)
        {   
            apologize("Email was used.");
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
