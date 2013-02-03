<!DOCTYPE html>

<html>

    <head>

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>
        <link rel="shortcut icon" href="img/graduation-hat.ico"/>

        <?php if (isset($title)): ?>
            <title>CollegeMatch | <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>CollegeMatch</title>
        <?php endif ?>

        <script src="js/jquery-1.8.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>

    </head>

    <body>
         <?php 
            if(!(empty($_SESSION["username"])))
            {
                echo '<div id="greeting";><p>O hai, <strong>' . htmlspecialchars($_SESSION["username"]) . "</strong>! Your selection index is <strong>" . htmlspecialchars($_SESSION["selection_index"]) . '</strong>.</p></div>';
            } 
            ?>
        <div class="container-fluid">

            <div id="top">
                <a href="/"><img alt="CollegeMatch" src="img/collegematchlogo.gif"/></a>
            </div>
            
           

            <div id="middle">
                <ul class="nav nav-pills">
                    <li><a href="/">Home</a></li>
                    <li><a href="search.php">College Search</a></li>
                    <li><a href="explore.php">Explore</a></li>
                    <?php 
                        if(!(empty($_SESSION["id"])))
                        {
                            echo '<li><a href="suggest_colleges.php">Suggest Colleges</a></li>';
                            echo '<li><a href="change_info.php">My Stats</a></li>';
                            echo '<li><a href="change_password.php">Change Password</a></li>';
                            echo '<li><a href="logout.php">Log Out</a></li>';
                        }
                    ?>
                </ul>
                

