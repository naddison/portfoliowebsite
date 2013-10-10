<!DOCTYPE html>
<html class="gradient" lang="en">
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width">
	<title>Home - Nikolas Addison Harris</title>
    <link rel="stylesheet" media="screen and (max-width: 641px)" href="small.css" type="text/css" /> <!-- Capture small screen sizes -->
	<link rel="stylesheet" href="default.css" media="screen and (min-width: 642px)"" type="text/css" /> <!-- Default desktop/tablet sheet -->
</head>
<body>   
    <header>
        <h1 id="top">Nikolas Addison Harris</h1> 
        <nav>
            <ul>
                <li><a class="nav" title="Home" href="index.html">Home</a></li>		 
                <li><a class="nav" title="Resume" href="resume.html">Resume</a></li>	
                <li><a class="nav" title="Projects" href="projects.html">Projects</a></li>
                <li><a class="nav" title="Github" href="https://github.com/naddison">Github</a></li>		
                <li><a class="nav" title="Contact" href="contact.php">Contact</a></li>
            </ul>
         </nav>
   </header>
            <!-- BEGIN CONTENT -->
                <article id="main">
                	<h1>Send me an e-mail!</h1>
                  <form name="contactme" method="post" action="scripts/ContactForm.php">
                  <fieldset>
                  <legend>Contact Information</legend>
                  	<label for="name">Full Name</label>
                  	<input id="name" name="name" type="text" required="required"> 
                 	<label for="email">E-mail</label>
                   	<input id="email" name="email" type="text" required="required">
                   </fieldset>
                   <fieldset>
                   <legend>Message</legend>
                   	<label for="topic">Subject</label>
                  	<input id="topic" type="text" name="topic" required="required">  
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="20" cols="40"></textarea>
                   </fieldset>
                  <?php 
                  require_once('recaptcha/recaptchalib.php');
                  $publickey = "6Lfk59cSAAAAAFqwF06BeLBhBQH6PzSptCYTklZw";
                  echo recaptcha_get_html($publickey);
                   ?>
                  <input type="submit"><input type="reset"> 
                  </form> 
              	<footer>    
			<a href="contact.php"><img src="images/email.png" title="E-mail Icon"></a>
			<a href="http://www.reddit.com/user/NAddison/" title="Nikolas on Reddit"><img src="images/Reddit-2.png" title="Reddit Icon"></a>
			<a href="https://twitter.com/NikolasAddison" title="Nikolas on Twitter"><img src="images/twitter-1.png" title="Twitter Icon"></a>
        		<p>This website and its content is copyright of Nikolas Addison Harris - © Nikolas Addison Harris 2013.</p>
		</footer>
           </article>
            <!-- END CONTENT -->   
</body>
</html>
