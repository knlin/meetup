<p>If you were accepted to one of the colleges on your portfolio, let us know so we can refine our algorithm! :D</p>
<form action="admit.php" method="post">
    <fieldset>
        <div class="control-group">
            <select name="name">
                <option value=""></option>
                <?php
                    // iterate over all the colleges in the user's portfolio
                    foreach ($colleges as $college)
                    {                       
                        foreach($college["query"][0] as $column)
                        {                                           
                            echo '<option value="' . htmlspecialchars($column) . '">' . htmlspecialchars($column) . '</option>' . "\n";          
                        }       
                    }  
                    ?>
            </select>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Admitted</button>
        </div>
    </fieldset>
</form>

