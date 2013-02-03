<div>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>College</th>
            <th>GPA</th>
            <th>SAT CR</th>
            <th>SAT Math</th>
            <th>SAT Writing</th>
            <th>ACT</th>
            <th>Selection Index</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($rows as $row) 
        {
            echo '<tr>';
            $row["act_comp"] = number_format($row["act_comp"],1);
            $row["selection_index"] = number_format($row["selection_index"],4);
            foreach($row as $column)
            {
                if (is_numeric($column) && $column < 1)
                {
                    $column = "Not reported";
                }
                echo '<td>' . htmlspecialchars($column) . '</td>'; 
            }
            echo '</tr>';
        }
    ?>  
    </tbody>
    </table>
</div>
<?php
    if ($start < 3510) // maximum number of entries on table
    {
        echo '<div text-align:right><a href="explore.php?start='. urlencode($start+20). '">Next</a></div>';
    }
?>
<?php
    if ($start >= 20)
    {
        echo '<div text-align:left><a href="explore.php?start='. urlencode($start-20). '">Previous</a></div>';
    }
?>
