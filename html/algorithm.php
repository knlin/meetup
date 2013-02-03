<?php
/*********************************************************************
 * CS50 
 * Andy Shi, Zihao Wang, Albert Li
 * A dynamic algorithm that estimates a college's academic selectivity 
 * index based on SAT, ACT scores and GPA of admitted students
 *********************************************************************/
require("../includes/gaussian.php");

function average($score_index, $students)
{
    $sum = 0;
    for ($i = 0; $i < $students; $i++)
    {
        $sum = $sum + $score_index["$i"];
    }
    return $average = $sum / $students;
}
//iterate through algorithm once 
//global variable for number of students currently in database (pass in from MySQL table)
$students = 2;
//default weights
$SAT1_weight = 1;
$ACT_weight = 50;
$GPA_weight = 600;

//query("SELECT "
function default_algorithm($student1, $student2, $college, $SAT1_weight, $ACT_weight, $GPA_weight)
{
    if (empty($student1) || empty($student2))
        exit;
    //declare an array matching each student to corresponding score index
    //$student1 = array(1700, 1100, 0.95);
    //$student2 = array(1800, 1200, 0.85);
    //$college = array(1650, 34, 1100, 0.975);
    $weight = array($SAT1_weight, $ACT_weight, $GPA_weight);
    $score_index = array($weight[0]*$student1[0]+$weight[1]*$student1[1]+$weight[2]*$student1[2],$weight[0]*$student2[0]+$weight[1]*$student2[1]+$weight[2]*$student2[2] );
    echo average($score_index, 2)."\n";
    //approximate college selectivity index with average function
    $score_col_index = average($score_index, 2);
    //solve for parameters using gaussian elimination package
    $a = array( 
         array($student1[0],$student1[1],$student1[2]), 
         array($student2[0],$student2[1],$student2[2]), 
         array($college[0],$college[1],$college[2])
         );
    $b = array($score_index[0], $score_index[1], $score_col_index);
    $x = new GaussianElimination;
    $result = $x->solve($a, $b);
    //identify weight parameters with elements result matrix
    $SAT_weight = $result[0];
    $ACT_weight = $result[1];
    $GPA_weight = $result[2];
    echo $SAT_weight."\n";
    echo $ACT_weight."\n";
    echo $GPA_weight."\n";
}

function first_time_algorithm($college, $SAT1_weight, $ACT_weight, $GPA_weight))
{
    //adjust if missing SAT
    if ($college[0] == 0)
    {
        $college[0] = 50 * $college[1];
    }
    //adjust if missing ACT
    else if ($college[1] == 0)
    { 
        $college[1] = $college[0] / 50.0;
    }
    //adjust if missing GPA
    else if (
    {
        $college[2] = $college[1] / 9.0 ;
    }
    //define weight array
    $weight = array($SAT1_weight, $ACT_weight, $GPA_weight);
    return $index = $SAT1_weight*$college[0] + $ACT_weight*$college[1] + $GPA_weight*$college[2];
}    


?>
