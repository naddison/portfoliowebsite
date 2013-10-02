<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>PHP Form to E-mail Script - Nikolas Addison Harris</title>
	<link rel="stylesheet" href="../default.css" media="screen" type="text/css" />
</head>

<body>   
	<header>
        <h1 id="top">Nikolas Addison Harris</h1>
	    <h2>Discovering solutions through learning and experience.</h2> 
        <nav>
            <ul>
                <li><a class="nav" title="Home" href="index.html">Home</a></li>		 
                <li><a class="nav" title="Resume" href="resume.html">Resume</a></li>	
                <li><a class="nav" title="Projects" href="../projects.html">Projects</a></li>
                <li><a class="nav" title="Github" href="https://github.com/naddison">Github</a></li>		
                <li><a class="nav" title="Contact" href="contact.php">Contact</a></li>
            </ul>
         </nav>
   </header>
	<article title="code">
		<h1>PHP Form to E-mail Script</h1>
		<p>This is a simple self-submitting form to e-mail script. It has basic validation to ensure no empty fields. If a field is missing it will keep the data already entered and supply a message to the user saying which field was empty.</p>
		<code>
			<?php
				highlight_file("emailform.php");
			?>
		</code>
		<p> This is the early version of the script I use for this site, I added a more complex message building function that formats the e-mail I recieve so that it is more user-friendly to read, as well as re-captcha support.</p>
	</article>
</body>
</html>
