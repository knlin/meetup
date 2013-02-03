<script>

    // onready 
    $(document).ready(function() {
        
    // onsubmit
    $('#change_password').submit(function() {
        // error checking
        
        if ($('#old-password').val() == '')
        {
            document.getElementById("error").innerHTML = "You must enter your old password";
            return false;
        }
        if ($('#new-password').val() == '' || $('#confirmation').val() == '')
        {
            document.getElementById("error").innerHTML = "You must enter a new password and confirmation";
            return false;
        }
        
        if ($('#new-password').val() != $('#confirmation').val())
        {
            document.getElementById("error").innerHTML = "New password and confirmation do not match";
            return false;
        }
        
        return true;
    });
});
        
</script>

<form action="change_password.php" method="post" id="change_password">
    <fieldset>
        <div class="control-group">
            <input name="old-password" id="old-password" placeholder="Old Password" type="password"/>
        </div>
        <div class="control-group">
            <input name="new-password" id="new-password" placeholder="Password" type="password"/>
        </div>
        <div class="control-group">
            <input name="confirmation" id="confirmation" placeholder="Confirmation" type="password"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Submit</button>
        </div>    
    </fieldset>   
</form>

<div>
    <p id="error">&nbsp;</p>
</div>
