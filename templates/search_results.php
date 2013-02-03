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
        <tr>
        <?php
            
        foreach ($results[0] as $column)
        {
            if (is_numeric($column))
            {
                if ($column < 1)
                {
                    $column = "Not reported";
                }
            }
            echo '<td>' . htmlspecialchars($column) . '</td>';
        }
        
        ?>
        </tr>
    </tbody>
</table>
