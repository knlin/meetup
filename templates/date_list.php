<table class="table table-striped">
    <thead>
        <tr>
            <th>Your date</th>
            <th>Contact</th>
            <th>Movie</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    
    <?php
    //dump($email);
    if (empty($date_id))
    {
        echo '<p>Sorry, you do not have any matches at this time</p>';
    }
    else
    {
        echo '<tr><td>' . htmlspecialchars($date_id) . '</td>';
        echo '<td>' . htmlspecialchars($email) . '</td>';
        echo '<td><a href="http://www.amazon.com/s/ref=nb_sb_noss_2?url=search-alias%3Dmovies-tv&field-keywords=' . htmlspecialchars($movie) . '">' . $movie . '</a></td>';
        echo '<td>You have offered to pay</td>';
        echo '</tr>';
    } 
    ?>
    </tbody>
</table>
<div style="padding-left:300px">
<img src="../img/link.png" width="150" height="45"></img>
</div>
