<?php
/**
 * algorithm_firsttime.php
 * Albert Li and Andy Shi
 * A script to calculate selection indicies for colleges for the first time
 * Written to be executed from the command line
 */
// configuration
require("../includes/functions.php");
require("../includes/algorithm.php");

// the highest id of a college is 3560
for ($id = 1; $id <= 3560; $id++)
{ 
    // for diagnostic purposes
    echo $id . "\n";
    
    // query data for college information
    $college_query = query("SELECT sat_cr, sat_math, sat_writing, act_comp, gpa FROM colleges WHERE id = ?", $id);
    
    // some colleges do not have data on certain fields, so we attempt to provide estimates based on existing fields
    
    // if no sat writing scores
    if ($college_query[0]["sat_writing"] == 0)
    {
        // extrapolate from sat cr and sat math scores
        $college_query[0]["sat_writing"] = ($college_query[0]["sat_cr"] + $college_query[0]["sat_math"])/2.0;
    }
    
    // if college does not have SAT, does not have ACT, and does not have GPA
    $sat = $college_query[0]["sat_cr"] + $college_query[0]["sat_math"] + $college_query[0]["sat_writing"];
    
    if (($sat < 1) && ($college_query[0]["act_comp"] < 1) && ($college_query[0]["gpa"]) < 0)
    {
        // go on to the next college (cannot estimate values of missing fields)
        echo "Not enough data to calculate index\n";
        continue;
    }
    
    // calculate selection index using function in ../includes/algorithm.php
    $index = calculate_index($sat, $college_query[0]["act_comp"], $college_query[0]["gpa"]);
    
    // update colleges table with the new selection index
    if(query("UPDATE colleges SET selection_index = ? WHERE id = ?", $index, $id))
    {
        // for diagnostic purposes
        echo "Success\n";
    } 
}
?>
