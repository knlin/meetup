<table class="table table-striped">
    <thead>
        <tr>
            <th>College</th>
            <th>GPA</th>
            <th>SAT Critical Reading</th>
            <th>SAT Math</th>
            <th>SAT Writing</th>
            <th>ACT Composite</th>
            <th>Selection Index</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // iterate through each suggestion   
        foreach ($suggestions as $suggestion)
        {
            $suggestion["act_comp"] = number_format($suggestion["act_comp"]+0,1);
            $suggestion["selection_index"] = number_format($suggestion["selection_index"]+0,4);
            echo '<tr>';
            // iterate through each sql column
            foreach($suggestion as $column)
            {
                if (is_numeric($column) && $column < 1)
                {   
                    $column = "Not reported";
                }
                echo '<td>' . htmlspecialchars($column) . '</td>';
            }
            echo '</tr>' . "\n";
        }
        
        ?>
    </tbody>
</table>
