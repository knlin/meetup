<h3>Your Profile</h3>
<div>
    <a href="portfolio.php">Add a College</a>
</div>

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
    foreach ($colleges as $college)
    {
        echo '<tr>';
        $college["query"][0]["act_comp"] = number_format($college["query"][0]["act_comp"],1);
        $college["query"][0]["selection_index"] = number_format($college["query"][0]["selection_index"],4);
        
        foreach($college["query"][0] as $column)
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
