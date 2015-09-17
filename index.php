<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">-->
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>DOXBIN</title>
		<link href="style/blue.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<a href="./index.php" style="text-decoration:none;">
    	</a>
		<a href="postdox.php">Post Dox</a> <a href="index.php">Back to the archive</a> <a href="proscription.php">Proscription List</a><br />
		<?php
			/* This page does a lot of the heavy lifting. It displays the dox and calls archive.php
			when a variable isn't given for "dox." It's mostly boring stuff, so the comments will 
			be minimal. */
			
			header('Content-Disposition: inline; filename="index.php"');
			
			if (!isset($_GET['dox'])) {
			    $_GET['dox'] = "undefine";
			}
			
			/* Some built-in defense against skids attempting directory traversal. 
			Feel free to replace the ED link with goatse, The Last Measure, or even
			your own drive-by download page. No legitimate user is going to trigger 
			these ifs, so feel comfortable in being as evil as you want. */
			
			$filename = $_GET['dox'];
			if($filename == "") { include("archive.php"); die(); }
			
			// Just some HTML rendering and adding the dox icon text.
			
			if(file_exists('dox/'.$filename.'.txt')) {
			    echo '<div class="doxheader">';
			
			    if(file_exists('img/verification/'.$filename.'.txt')) {
			       $ver = file_get_contents('img/verification/'.$filename.'.txt');
			        echo '<div class="verified">'.$ver.'</div>';
			    }
			    if(file_exists('img/ssn/'.$filename.'.txt')) {
			       $ver = file_get_contents('img/ssn/'.$filename.'.txt');
			        echo '<div class="ssn">'.$ver.'</div>';
			    }
			    if(file_exists('img/rip/'.$filename.'.txt')) {
			       $ver = file_get_contents('img/rip/'.$filename.'.txt');
			        echo '<div class="rip">'.$ver.'</div>';
			    }
			
			    if(file_exists('img/mail/'.$filename.'.txt')) {
			       $ver = file_get_contents('img/mail/'.$filename.'.txt');
			        echo '<div class="mail">'.$ver.'</div>';
			    }
			
			/* The reason the textarea has rows and cols set is because it helps work
			around a corner case in which the rest of the page loads before the style
			sheet. If rows and cols were left undeclared, the dox would be temporarily 
			unreadable, and that just won't do. */
			
			    $dox = file_get_contents('dox/'.$filename.'.txt');
			
			    if (strpos($dox, "<script") !== False) {
			    	$text = $dox;
					include('scrape.php');

					//output a special message if the mirror has been removed from Pastebin
			    	if ($text == '') {
			    		$dox = "Unfortunately Pastebin has removed this dox so now this mirror doesn't work. The staff will probably get to work on fixing this soon. Thanks for your patience.";
			    		echo '</div><p><textarea name="doxviewer" readonly="readonly" rows="25" cols="80">';
			        	echo $dox;
			        	echo '</textarea></p></body></html>';
			    	} else {
			    		if (strpos($text, "Error, this is a private paste. If this is your private paste, please login to Pastebin first.") !== False) {
				    		$dox = "Unfortunately this paste has been set to private. This may be because the staff don't want you to see it right now, or because somebody fucked up. Please wait until it is fixed. Thanks for your patience.";
				    		echo '</div><p><textarea name="doxviewer" readonly="readonly" rows="25" cols="80">';
				        	echo $dox;
				        	echo '</textarea></p></body></html>';
			        	} else {
				    		echo '</div><p><textarea name="doxviewer" readonly="readonly" rows="25" cols="80">';

				    		//use scraped text as dox
				        	echo $text;
				        	echo '</textarea></p></body></html>';
			        	}
			    	}
			    } else {
			        echo '</div><p><textarea name="doxviewer" readonly="readonly" rows="25" cols="80">';
			        echo $dox;
			        echo '</textarea></p></body></html>';
			    }
			}
			else {
			include('archive.php'); // Just breaking the spaghetti into easier to manage chunks.
			}
		?>
		<p class="contact">
            Complaints: (901) 747-4300<br>
            <a href="privacy.php">Privacy Policy</a> <a href="faq.php">FAQ</a>
        </p>
    </body>
</html>