<table class="table table-striped">
    <thead>
        <tr>
            <th>Your date</th>
            <th>Movie</th>
        </tr>
    </thead>
    <tbody>
    
    <?php
    //dump($date_id);
    if (empty($date_id))
    {
        echo '<p>Sorry, you do not have any matches at this time</p>';
    }
    else
    {
        echo '<tr><td>' . $date_id["name"] . '</td>';
        echo '<td>' . $movie . '</td></tr>';
    } 
    ?>
    </tbody>
</table>
