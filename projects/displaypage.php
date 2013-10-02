<?php
	/******************* Display ********************/
    //Create database connection.
	$dbc = mysqli_connect("webdesign4.georgianc.on.ca","xxxxxxx",
                    "xxxxxxxx","xxxxxxxx");
        
    //Obtain latest news entries.
    $getNews = "SELECT * FROM news ORDER BY time DESC LIMIT 0,3;";
    $news = mysqli_query($dbc, $getNews);
      
    //Echo the last 3 news items.
    while ($row = mysqli_fetch_array($news)) {
    	$title = $row['title'];
        $heading = $row['heading'];
        $body = $row['body'];
        $time = $row['time']; 
        echo "<article class='news'>
              <h1>$title</h1>
              <h2>$heading</h2>
              <p>$body</p> 
              <p>$time<p>
              </article>";
        }   
	mysqli_close($dbc);
?>
