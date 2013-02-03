<?php
/** 
 * scraper.php
 * Screen scrapes college name and mean SAT score data from collegeboard
 * Written as a script to be executed from the command line
 */
 
// configuration
require("../includes/config.php"); 

$counter = 1;

do
{
    // get html file from collegeboard
    $url = file_get_contents('https://bigfuture.collegeboard.org/college-university-search/print-college-profile?id=' . urlencode($counter));
    
    // if the webpage did not exist continue doing the loop
    if($url === false)
    {
        $counter++;
        continue;
    }
    
    // regular expression to match the college's name on the page
    $regex_name = '@<td class="col2 alignRight">\s*<h1>(.+)</h1>@';
    if(!preg_match($regex_name, $url, $match_name))
    {
        // if no match, go on to the next college
        $counter++;
        continue;
    }
    
    // for diagnostics
    echo "$counter: $match_name[1]\n";
    
    // screen scrape 25th percentile - 75th percentile SAT scores from collegeboard
    
    // regular expression to match SAT scores on collegeboard page
    $regex_sat = '@<p>\s*(\d+)\s*-\s*(\d+)\s*</p>@';
    preg_match_all($regex_sat, $url, $match_sat);
    
    // in $scores 0 corresponds to sat_cr score, 1 to sat_math, 2 to sat_writing, 3 to act_comp
    
    // initialize an array of scores with default value -1
    for($i = 0; $i < 4; $i++)
    {
        $scores[$i] = -1; 
    }
    
    // take SAT scores from the match and dump them into the $scores array
    // assumes that the matches are in the order of sat_cr, sat_math, sat_writing, act_comp (if they all exist)
    for($i = 0, $n = count($match_sat[1]); $i < $n; $i++)
    {
        // this means the score is an SAT score
        if (($match_sat[1][$i] + 0) >= 200) // need +0 to force it to convert to an int
        {
            // store midpoint of the 25th and 75th percentile scores
            $scores[$i] = ($match_sat[1][$i] + $match_sat[2][$i]) / 2;
        }
        // otherwise check if it's an ACT score
        else if (($match_sat[1][$i] + 0) > 0)
        {
            // store midpoint of 25th and 75th percentile scores
            $scores[3] = ($match_sat[1][$i] + $match_sat[2][$i]) / 2;
            break;
        }
        // otherwise the college does not report any scores
        else
        {
            break;
        }
    } 
        
    // screen scrape GPA
    $regex_gpa = '@<p>(\d\.\d+)(?:\+|\s*-\s*(\d\.\d+))\s*:\s*(\d+\.\d+)%</p>@';
    preg_match_all($regex_gpa, $url, $match_gpa);
    
    // create initial GPA
    $gpa = 0;
    
    // count the number of GPA ranges returned 
    $n = count($match_gpa[1]);
    
    // iterate through the GPA ranges and add values together (midpoint of the span * percentage)
    for ($i = 0; $i < $n; $i++)
    {
        if (empty($match_gpa[2][$i]))
        {
           // this means the GPA is in the form of 3.75+ or something similar. add on midpoint of 4 and 3.75+ * how many people have it
           $gpa += ((4+$match_gpa[1][$i])/2) * ($match_gpa[3][$i]/100.0);
        }
        else
        {
            // gpa range has both endpoints. add on midpoint * how many people have that gpa
            $gpa += (($match_gpa[2][$i]+$match_gpa[1][$i])/2) * ($match_gpa[3][$i]/100.0);
        }
    }
    
    // if the college did not report GPA (the above for loop would not execute) store -1 as sentiel value
    if ($n == 0)
    {
        $gpa = -1;
    }
    
    // insert into data table
    if(query("INSERT INTO colleges (name, gpa, sat_cr, sat_math, sat_writing, act_comp, sat1_weight, sat2_weight, gpa_weight) VALUES(?, ?, ?, ?, ?, ?, 1, 50, 600)", $match_name[1], $gpa, $scores[0], $scores[1], $scores[2], $scores[3]) === true)
    {
        // diagnostics
        echo "College successfully inserted\n";
    }
    
    // move on to the next college
    $counter++;
}
// we do not know how many total colleges there are at first so keep looping until file_get_contents returns a ton of errors consecutively
while(true);
?>        
