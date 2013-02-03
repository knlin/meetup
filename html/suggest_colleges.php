<?php
    
    // configuration
    require("../includes/config.php"); 
 
    // select the user's selectionindex 
    $index = query("SELECT selection_index FROM users WHERE id = ?", $_SESSION["id"]);
    $index = $index[0]["selection_index"];
    
    if($index >= 93)
    {
        // find colleges where the users will be matched based on SAT scores
        // the range changes depending on the selection index of the user
        $suggestions = query("SELECT name, gpa, sat_cr, sat_math, sat_writing, act_comp, selection_index FROM colleges WHERE selection_index > 90 ORDER BY selection_index DESC");
    }
    
    else if(15 <= $index && $index < 93)
    {
        $suggestions = query("SELECT name, gpa, sat_cr, sat_math, sat_writing, act_comp, selection_index FROM colleges WHERE selection_index > $index - 5 AND selection_index < $index + 5 ORDER BY selection_index DESC");
    }
    else
    {
        $suggestions = query("SELECT name, gpa, sat_cr, sat_math, sat_writing, act_comp, selection_index FROM colleges WHERE selection_index < 15 ORDER BY selection_index DESC");
    }
    
    render("suggest_display.php", ["suggestions" => $suggestions, "title" => "Suggestions"]);
?>
