<script>
    
    // onready
    $(document).ready(function() {
    
    // onsubmit
    $('#login').submit(function() {
    if ($('#username').val() == '')
    {
        document.getElementById("error").innerHTML = "Enter a username";
        return false;
    }
    if ($('#password').val() == '')
    {
        document.getElementById("error").innerHTML = "Enter a password";
        return false;
    }
    else 
        return true;
    });
});

</script>

<form action="login.php" method="post" id="login">
    <fieldset>
        <div class="control-group">
            <input autofocus name="username" id="username" placeholder="Username" type="text"/>
        </div>
        <div class="control-group">
            <input name="password" id="password" placeholder="Password" type="password"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Log In</button>
        </div>
    </fieldset>
</form>
<div>
    <p id="error"></p>
    or <a href="register.php">register</a> for an account
</div>
