<?php
    //ini_set('display_errors', 'on');
    header('Content-Disposition: inline; filename="postdox.php"');
    session_start();
    
    $name = md5(mt_rand());
    $_SESSION["name"] = $name;
    
    $dox = md5(mt_rand());
    $_SESSION["dox"] = $dox;
    
    $hidden = md5(mt_rand());
    $_SESSION["hidden"] = $hidden;
    
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <title>DOXBIN - Post Dox</title>
        <link href="style/blue.css" rel="stylesheet" type="text/css" />
        <link rel="apple-touch-icon" sizes="57x57" href="/favico/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/favico/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/favico/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/favico/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/favico/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/favico/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/favico/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/favico/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/favico/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/favico/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favico/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favico/favicon-16x16.png">
        <link rel="manifest" href="/favico/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/favico/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body id="center" onload="document.getElementById('captcha-form').focus()">
        <a href="./index.php" style="text-decoration:none;">
        </a>
        <h1>Post DOX</h1>
        <form action="post.php" method="post">
            <p>
                <input type="text" id="name" name="<?php echo $_SESSION["name"]; ?>" />
                <br><br>
                <textarea id="dox" name="<?php echo $_SESSION["dox"]; ?>" rows="25" cols="80">
DOX go here. This is not your personal slam page, nor is it a page on which to brag about having 0wned someone, or to complain that they 0wned you. Post whatever info you have and SHUT UP.

If you want to submit a mirror to a Pastebin paste, simply type only the JavaScript embed code into this box.</textarea><br/>
            <p><strong>Type in the CAPTCHA</strong></p>
            <img src="captcha.php" id="captcha" /><br/>
            <a href="#" onclick="
                document.getElementById('captcha').src='captcha.php?'+Math.random();
                document.getElementById('captcha-form').focus();"
                id="change-image">Not readable? Change text.</a><br/><br/>
            <input type="text" name="captcha" id="captcha-form" autocomplete="off" /><br/>
            <input type="submit" value="Post" /><br />
            <input type="text" name="<?php echo $hidden; ?>" value="" style="visibility: hidden;" />
            </p>
            <?php
                /** Validate captcha */
                if (!empty($_REQUEST['captcha'])) {
                    if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
                        $captcha_message = "Invalid captcha";
                        $style = "background-color: #FF606C";
                    } else {
                        $captcha_message = "Valid captcha";
                        $style = "background-color: #CCFF99";
                    }
                
                    $request_captcha = htmlspecialchars($_REQUEST['captcha']);
                
                    echo <<<HTML
                        <div id="result" style="$style">
                        <h2>$captcha_message</h2>
                        <table>
                        <tr>
                            <td>Session CAPTCHA:</td>
                            <td>{$_SESSION['captcha']}</td>
                        </tr>
                        <tr>
                            <td>Form CAPTCHA:</td>
                            <td>$request_captcha</td>
                        </tr>
                        </table>
                        </div>
HTML;
                    unset($_SESSION['captcha']);
                }
                ?>
        </form>
        <h2><a href="index.php">DOX Archive</a></h2>
        <h2><a href="proscription.php">Proscription List</a></h2>
        <p>
            You can also browse the <a href="old/">old</a> and <a href="fail/">fail</a> dox folders.
        </p>
        <p class="contact">
            Complaints: (901) 747-4300<br>
            <a href="privacy.php">Privacy Policy</a> <a href="faq.php">FAQ</a>
        </p>
    </body>
</html>