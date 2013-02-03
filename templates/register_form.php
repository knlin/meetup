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
            <input autofocus name="username" id="username" placeholder="Username" type="text"/>
        </div>
        <div class="control-group">
            <input name="password" id="password" placeholder="Password" type="password"/>
        </div>
        <div class="control-group">
            <input name="confirmation" id="confirmation" placeholder="Confirmation" type="password"/>
        </div>
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
            <button type="submit" class="btn">Register</button>
        </div>    
    </fieldset>   
</form>

<div>
    <p id="error">&nbsp;</p>
    <a href="login.php">log in</a>
</div>
