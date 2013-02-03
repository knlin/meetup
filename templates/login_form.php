<script>
    
    // onready
    $(document).ready(function() {
    
    // onsubmit
    $('#login').submit(function() {
    if ($('#email').val() == '')
    {
        document.getElementById("error").innerHTML = "Enter an email";
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
<div id="login" style="width:50%; float:right; padding-top:150px">
<form action="login.php" method="post" id="login">
    <fieldset>
        <div class="control-group">
            <input autofocus name="email" id="email" placeholder="Email" type="text"/>
        </div>
        <div class="control-group">
            <input name="password" id="password" placeholder="Password" type="password"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Log In</button>
        </div>
    </fieldset>
</form>

    <p id="error"></p>
    or <a href="register.php">register</a> for an account

</div>
<div id="description" style="width:50%; float:right">
    <p style="font-size:20px; line-height:1.5em">tickets for two is a service created for the movie lover in you. We'll match you with someone who has similar tastes in movies and leave you to enjoy each other's company over a good chop-dropping cop flick or your favorite rom com drom. Sound like a good time? We think so, too. Sign up for free to give us a spin!</p>
</div>
<div style="clear:both">
<br />	
<hr />
<p style="font-size:30px">How it works:</p>
    <img src="../img/illustration_expanded.jpg"></img>
</div>
