<?php 
 if(!isset($_COOKIE["username"])){
  
     ("location:logout.php");
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="robots" content="index, follow" />
        <meta name="generator" content="Joomla! 1.7 - Open Source Content Management" />
               
        <title>Umuhuza Online</title>
        
        <link rel="stylesheet" href="../css/templates.css" type="text/css" />

        <style type="text/css">
            html { display:none }
        </style>
        <script src="../js/core.js" type="text/javascript"></script>
        <script src="../js/mootools-core.js" type="text/javascript"></script>
        <script type="text/javascript">
            function keepAlive() {	var myAjax = new Request({method: "get", url: "index.php"}).send();} window.addEvent("domready", function(){ keepAlive.periodical(840000); });
            window.addEvent('domready', function () {if (top == self) {document.documentElement.style.display = 'block'; } else {top.location = self.location; }});
        </script>


        <!--[if IE 7]>
        <link href="templates/bluestork/css/ie7.css" rel="stylesheet" type="text/css" />
        <![endif]-->

        <script type="text/javascript">
            window.addEvent('domready', function () {
                document.getElementById('form-login').username.select();
                document.getElementById('form-login').username.focus();
            });

        </script>
    </head>
<body>
        <div id="border-top" class="h_blue">
            <span class="title"><a href="index.php">Umuhuza Online 1.0</a></span>
        </div>
        <div id="content-box">
            <div id="element-box" class="login">
                <div class="m wbg">
                    <h1>System Login</h1>
                    <?php
                    session_start();
                    unset($_SESSION['user']);
                    if (isset($_SESSION['login_message'])) {
                        echo $_SESSION['login_message'];
                        unset($_SESSION['login_message']);
                    }
                    session_unset();
                    ?>
                    <div id="section-box">
                        <div class="m">
                            <form action="authenticate.php" method="post" id="form-login">
                                <fieldset class="loginform">

                                    <label id="mod-login-username-lbl" for="mod-login-username">User Name</label>
                                    <input name="username" id="mod-login-username" type="text" class="inputbox" size="15" />

                                    <label id="mod-login-password-lbl" for="mod-login-password">Password</label>
                                    <input name="password" id="mod-login-password" type="password" class="inputbox" size="15" />
                                    <div class="button-holder">
                                        <div class="button1">
                                            <div class="next">
                                                <a href="#" onclick="document.getElementById('form-login').submit();">
								Log in</a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="clr"></div>
                                    <input type="submit" class="hidebtn" value="Log in" />
                                    <input type="hidden" name="option" value="com_login" />
                                    <input type="hidden" name="task" value="login" />
                                    <input type="hidden" name="return" value="aW5kZXgucGhw" />
                                    <input type="hidden" name="9760ef6e072d54e73b9b41f512578ddb" value="1" />	</fieldset>
                            </form>

                            <div class="clr"></div>
                        </div>
                    </div>

                    <p>Please provide a Valid user name and password. If you don't remember, Please contact your system administrator</p>
                    <div id="lock"></div>
                </div>
            </div>

            <noscript>
				Warning! JavaScript must be enabled for proper operation of the Administrator backend.			</noscript>
        </div>
        <div id="footer">
            <p class="copyright"> <a href="">Umuhuza Online &#174;</a> All Right reserved.<span class="version">Umuhuza Online 1.0</span>		</p>
        </div>

</body>
</html>