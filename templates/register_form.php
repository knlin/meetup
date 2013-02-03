<script>

    // onready 
    $(document).ready(function() {
        
    // onsubmit
    $('#registration').submit(function() {
        // error checking
        if ($('#name').val() == '')
        {
            document.getElementById("error").innerHTML = "You must enter your name";
            return false;
        }

        if ($('email').val() == '')
        {
            document.getElementById("error").innerHTML = "You must enter an email";
            return false;
        }

        var emailpatt = /@[.]+.edu/i;

        if (emailpatt.test($('email').val()) == '')
        {
            document.getElementById("error").innerHTML = "Your email must end in .edu";
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
                 
        return true;
        });
});
        
</script>

<form action="register.php" method="post" id="registration">
    <fieldset>
        <div class="control-group">
            <input name="name" id="name" placeholder="Your name, please" type="text"/>
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
            <select name="class">
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
            </select>
        </div>
        <div class="control-group">
            <p>I am a</p>
            <select name="gender">
                <option value="0">Female</option>
                <option value="1">Male</option>
            </select>
            <p>Searching for a</p>
            <select name="looking">
                <option value="1">Male</option>
                <option value="0">Female</option>
            </select>
        </div>
        
        <div class="control-group">
            <button type="submit" class="btn">Register</button>
        </div>    
    </fieldset>   
</form>

<div>
    <p id="error">&nbsp;</p>
</div>
