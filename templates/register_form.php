<script>

    // onready 
    $(document).ready(function() {
        
    // onsubmit
    $('#registration').submit(function() {
        // error checking
        if ($('#username').val() == '')
        {
            document.getElementById("error").innerHTML = "You must enter a username";
            return false;
        }
        
        if ($('#password').val() == '' || $('#confirmation').val() == '')
        {
            document.getElementById("error").innerHTML = "You must enter a password and confirmation";
            return false;
        }
        
        if ($('#password').val() != $('#confirmation').val())
        {
            document.getElementById("error").innerHTML = "Password and confirmation do not match";
            return false;
        }
        
        // require at least one test score
        if ($('#sat').val() == '' && $('#act').val() == '')
        {
            document.getElementById("error").innerHTML = "You did not enter a correct SAT score";
            return false;
        }
        
        // regex to check if the user entered nonnumbers for fields that require numbers
        var patt = /[^(\d)\.]+/i;;
        
        if (($('#sat').val() != '') && ($('#sat').val() > 2400 || $('#sat').val() < 600 || (patt.test($('#sat').val()))))
        {
            document.getElementById("error").innerHTML = "You did not enter a correct SAT score";
            return false;
        }
        
        if (($('#act').val() != '') && ($('#act').val() > 36 || $('#act').val() < 1 || (patt.test($('#act').val()))))
        {
            document.getElementById("error").innerHTML = "You did not enter a correct ACT score";
            return false;
        }
        
        if ($('#gpa').val() == ''|| $('#gpa').val() < 0 || (patt.test($('#gpa').val())))
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
        
        return true;
        });
});
        
</script>

<form action="register.php" method="post" id="registration">
    <fieldset>
        <div class="control-group">
            <input name="firstname" id="firstname" placeholder="Your first name, please" type="text"/>
        </div> 
        <div class="control-group">
            <input name="email" id="email" placeholder="Email" type="text"/>
       </div>
        <div class="control-group">
            <input name="password" id="password" placeholder="Password" type="password"/>
        </div>  
        <div class="control-group">
            <input name="confirmation" id="confirmation" placeholder="Confirmation" type="password"/>
        </div> 
        <div class="control-group">
            <p>Class year</p>
            <select>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
            </select>
        </div>
        <div class="control-group">
            <p>I am a</p>
            <select>
                <option value="F">Female</option>
                <option value="M">Male</option>
            </select>
            <p>Searching for a</p>
            <select>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        
        <div class="control-group">
            <button type="submit" class="btn">Register</button>
        </div>    
    </fieldset>   
</form>

<div>
    <p id="error">&nbsp;</p>
    <a href="login.php">log in</a>
</div>
