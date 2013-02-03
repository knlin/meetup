<script>

    // onready 
    $(document).ready(function() {
        
    // onsubmit
    $('#change_info').submit(function() {
        // error checking
              
        // regex to check if the user entered nonnumbers for fields that require numbers
        var patt = /[^(\d)\.]+/i;
        
        if (($('#sat').val() == '') && ($('#act').val() == '') && ($('#gpa').val() == ''))
        {
            document.getElementById("error").innerHTML = "Nothing to submit!";
            return false;
        }
        
        if ($('#sat').val() != '')
        {
            if (($('#sat').val() > 2400) || ($('#sat').val() < 600) || (patt.test($('#sat').val())))
            {
                document.getElementById("error").innerHTML = "You did not enter a correct SAT score";
                return false;
            }
        }
        
        if (($('#act').val() != '') && ($('#act').val() > 36 || $('#act').val() < 1 || (patt.test($('#act').val()))))
        {
            document.getElementById("error").innerHTML = "You did not enter a correct ACT score";
            return false;
        }
        
        if ($('#gpa').val() != '')
        {
            if ($('#gpa').val() < 0 || (patt.test($('#gpa').val())))
            {
               document.getElementById("error").innerHTML = "You did not enter a correct GPA";
                return false; 
            }
            if ($('#gpa2').val() == '' || $('#gpa2').val() <= 0 || (patt.test($('#gpa2').val())))
            {
                document.getElementById("error").innerHTML = "You did not enter a correct maximum GPA";
                return false;
            }
        
            if ($('#gpa').val() > $('#gpa2').val())
            {
                document.getElementById("error").innerHTML = "Your GPA cannot be greater than the maximum GPA";
                return false; 
            }
        }
       
        return true;
        });
});
        
</script>
<h4>Your Stats</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th>SAT Score</th>
            <th>ACT Score</th>
            <th>GPA (4.0 scale)</th>
            <th>Selection Index</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($stats as $stat)
            {
                echo '<tr>';
                $stat["act"] = number_format($stat["act"],1);
                $stat["selection_index"] = number_format($stat["selection_index"],4);
                foreach ($stat as $column)
                {
                    if (is_numeric($column) && $column < 1)
                    {
                        $column = "Not Reported";
                    }
                    echo '<td>' . htmlspecialchars($column) . '</td>';
                }
                echo '</tr>';
            }
        ?>
    </tbody>
</table>
<p>Update your stats if something has changed:</p>
<form action="change_info.php" method="post" id="change_info">
    <fieldset>
        <div class="control-group">
            <input name="sat" id="sat" placeholder="SAT Score" type="text"/>
        </div>
        <div class="control-group">
            <input name="act" id="act" placeholder="ACT Score" type="text"/>
        </div>
        <div class="control-group">
            <input name="gpa" id="gpa" placeholder="GPA" type="text"/>
        </div>
        <div class="control-group">
            <input name="gpa2" id="gpa2" placeholder="Maximum GPA at your school" type="text"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Submit</button>
        </div>    
    </fieldset>   
</form>

<div>
    <p id="error">&nbsp;</p>
</div>
