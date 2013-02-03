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
        <div class="container-fluid">

            <div id="top">
                <a href="/"><img alt="CollegeMatch" src="img/collegematchlogo.gif"/></a>
            </div>
            
           

            <div id="middle">
                <ul class="nav nav-pills">
                    <li><a href="/">Home</a></li>
                    <li><a href="date.php">Go on a date!</a></li>
                    <li><a href="logout.php">Log out</a></li>
                </ul>
                

