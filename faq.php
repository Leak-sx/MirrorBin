<?php
	// Counts the number of files in each dir and stores them in variables
	$doxCount = count(glob("/var/www/dx/dox/*.*"));
	$verCount = count(glob("/var/www/dx/img/verification/*.*"));
	$ssnCount = count(glob("/var/www/dx/img/ssn/*.*"));
	$ripCount = count(glob("/var/www/dx/img/rip/*.*"));
	$mailCount = count(glob("/var/www/dx/img/mail/*.*"));
	// Some math, to get percentages out of the above numbers
	
	$verPercent = ($verCount / $doxCount) * 100;
	$ssnPercent = ($ssnCount / $doxCount) * 100;
	$ripPercent = ($ripCount / $doxCount) * 100;
	$mailPercent = ($mailCount / $doxCount) * 100;
	
	// Let's round it off, because there are about 10 more digits than we need
	
	$verRound = round($verPercent, 2);
	$ssnRound = round($ssnPercent, 2);
	$ripRound = round($ripPercent, 2);
	$mailRound = round($mailPercent, 2);
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>DOXBIN - FAQ</title>
		<link href="style/blue.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<a href="./index.php" style="text-decoration:none;">
    	</a>
		<h1>FAQ</h1>
		<p class="left">
			Q: How did doxbin get started?<br />
			A: Originally, fuckface (of 808chan.org fame) had a site called 10littleniggers, which had a paste section called "DOX BIN." The site's founder decided to expand on the idea by making it more suited to actual dox than just pastes. He and another guy worked on it (The founder did all the backend stuff + half the HTML, while the other guy did the other half of the HTML + all the CSS) over the course of several weeks of on and off work. Toward the end of May (All of the earliest dox have creation dates of 5/30/11) DOXBIN was born. All the initial dox (15-20 entries) were taken from multiplayernotepad.net's dox section.
		</p>
		<p class="left">
			Q: Who was the founder?<br />
			A: He doesn't like being named. Don't waste your time guessing. I won't confirm or deny. 
		</p>
		<p class="left">
			Q: Will you take my dox down?<br />
			A: No. Complaining loudly enough will just lead to all of your communications related to your dox removal request being tacked to the end of your entry.
		</p>
		<p class="left">
			Q: I can't find a post I made. Why did you delete it?<br />
			A: It was either 1. Failure or outright spam/some form of advertisement (Everything from energy crystals to uncut Colombian cocaine), or 2. Renamed because the title contained characters that made the post unviewable (This should only apply to older posts, and those should all be fixed by now) or because you added tl;dr bullshit to the title (Adding ".txt" by hand, adding "dox" to the end of a title, etc are good ways to trigger this).
		</p>
		<p class="left">
			Q: I'm having trouble submitting dox. Help!<br />
			A: You probably tripped one of the site's anti-spam countermeasures. Hitting your back button and trying to repost will just make things worse. Visit the index page again (Most error messages will throw up a link to it) and re-paste the dox.
		</p>
		<p class="left">
			Q: Is the site down?<br />
			A: Possible reasons for downtime include: <br />
			1. The host is having problems. (Upstream; out of my control. Try again in an hour or so)<br />
			2. I've made a config change or two and broken something horribly. (It happens, especially if I decide to "fix" something at 3 AM. Try again in a couple of minutes).<br />
		</p>
		<p class="left">
			Q: What's with the icons next to dox?<br />
			A: Hovering over the icons will show metadata about that particular entry. Clicking on the entry will show that hover text at the top, in a different color. The icons indicate the quality of the dox. Here's a rundown of the different icons, their corresponding text colors, and explanations:<br /><br />
			<img src="img/green-checkbox.png" alt="Green Check Box" /> The original green checkbox. This means that the dox have been verified at some point. Green text. <?php echo $verRound."%"; ?>
			of all posts currently on the site bear this icon.<br />
			<img src="img/ssn.png" alt="Red Jolly Roger"/> The infamous Red Jolly Roger. These entries contain SSNs or other illegal info. Red text. Currently, <?php echo $ssnRound."%"; ?> of all the site's entries have this icon.
			<br />
			<img src="img/rip.png" alt="Tomb stone" /> Someone in the entry is dead. Silver text. In use on <?php echo $ripRound."%"; ?> of all entries currently on the site.
			<br />
			<img src="img/mail.png" alt="Mail" /> The person has e-mailed the staff, usually to make threats or demand a removal. Orange text. <?php echo $mailRound."%"; ?> of the entries bear this icon.
			<br /><br />
			<!-- In addition to the icons, group releases and dox that are archived from other websites have colored text positioned at the top of their entries.<br />
			CabinCr3w, doxcak3, NCF, and UGNazi releases are all marked with yellow text.<br />
			Official doxbin releases are marked with sky blue text.<br />
			pinkmeth.com (Where your ex-girlfriend's nudes go to die) text scrapes are highlighted with pink text.<br />
			Practically everything from r4pe.me is on the site and is marked with light green text. -->
		</p>
		<p class="contact">
            Complaints: (901) 747-4300<br>
            <a href="privacy.php">Privacy Policy</a> <a href="faq.php">FAQ</a>
        </p>
	</body>
</html>