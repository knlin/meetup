            <?php
                // if user is not logged in provide a link for them to log in or register
                if (empty($_SESSION["id"]) && !preg_match("{(?:login)\.php$}", $_SERVER["PHP_SELF"]))
                {
                    echo '<a href="login.php">Log in</a> or <a href="register.php">register</a> for an account';
                }
            ?>
            </div>

            <div id="bottom">
                Copyright &#169; AnD Shi JSON Wang Albear Li
            </div>

        </div>

    </body>

</html>
