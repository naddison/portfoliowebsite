<?php
/******************* Intitializing and Detection ********************/
$dbc = mysqli_connect('webdesign4.georgianc.on.ca','xxxxxxx', 'xxxxxxx','xxxxxxx');//Connection credentials.
date_default_timezone_set('America/Toronto'); 

$editing = false; //Editing starts false.
$isValid = false; //Data input initially fails validation.

if (!empty($_GET['idEdit'])) { //Detect if an ID has been passed to edit.
    $editing = true;    
    drawEditEntry($_GET['idEdit']); //Draw form with data to edit if <a> is hit.
}
else if (!empty($_POST['idEdit'])) {
    $editing = true;                //Editing is true when user submits updated data.
}
else {
    $editing = false;
}

if (!empty($_GET['idDelete'])) {   //Detect if an ID has been passed to delete.
    deleteEntry($dbc, $_GET['idDelete']);
}

/******************* Control of Form Logic ********************/
if (isset($_POST['submit'])) {   //Process the form with editing and validation conditions.  
    $time = mysqli_escape_string($dbc,date(YmdHis)); //MYSQL DATE format YYYY-MM-DD HH:MM:SS.. Date the news entry.
    $missedFields = array();
    if (!$editing && validateNotEmpty($missedFields, 'title') && validateNotEmpty($missedFields, 'heading') && validateNotEmpty($missedFields, 'body')) { //Proceed if all validation is true on all fields.
        $isValid = true;
        addEntry($dbc, $time); //Insert into table and display acknowledgement.
        drawEditNews ($dbc);
        }
    else if ($editing && validateNotEmpty($missedFields, 'title') && validateNotEmpty($missedFields, 'heading') && validateNotEmpty($missedFields, 'body')) {
        $isValid = true;
        editEntry($dbc, $time, $_POST['idEdit']);  //Form passes validation, edit entry.
    }
    else {                     
        
        $isValid = false;
    }
}

if (!$editing && !$isValid) {
    for($i=0; $i<count($missedFields); $i++) {     //Display errors if validation fails.
    echo "<h1>$missedFields[$i].</h1>";
    }
    drawNews($_POST['title'], $_POST['heading'], $_POST['body']);
    drawEditNews ($dbc);
}

/******************* CRUD Operation Functions ********************/
function deleteEntry ($dbc, $newsID) {   //SQL query to delete specified record with ID. 
        $deleteNews = "DELETE FROM news WHERE newsID = $newsID;";
        $runDelete = mysqli_query($dbc, $deleteNews);
        echo "<h3>Entry $newsID has been deleted.</h3>";
    }

function editEntry ($dbc, $time, $id) {
        $editTitle = getForm($dbc, 'title');        
        $editHeading = getForm($dbc, 'heading');    // Get safe variables for query.
        $editBody = getForm($dbc, 'body');
        displayProofread($editTitle, $editHeading, $editBody);
        $editNews = "UPDATE news SET title = '$editTitle', heading = '$editHeading', body = '$editBody', time = '$time' WHERE newsID = $id;";
        $execute = mysqli_query($dbc, $editNews);
        echo "<h1 id='success'>News entry $id updated.</h1>
              <p><a href='' title='Add New Entry'>Add new entry</a></p>";
}
function addEntry ($dbc, $time) { 
        $addTitle = getForm($dbc, 'title');        
        $addHeading = getForm($dbc, 'heading');    // Get safe variables for query.
        $addBody = getForm($dbc, 'body');  
        displayProofread($addTitle, $addHeading, $addBody);
        $addNews = "INSERT INTO news (title, heading, body, time) VALUES ('$addTitle', '$addHeading', '$addBody', '$time');";
        $execute = mysqli_query($dbc, $addNews);
        echo "<h1 id='success'>News entry saved.</h1>
              <p><a href='' title='Add New Entry'>Add new entry</a></p>"; 
}

/******************* Form Functions ********************/
function drawNews ($title, $heading, $body) {
        $idToEdit = $_GET['idEdit'];
        echo "<form name='taskinput' method='POST' action='TaskUI2.php'>";
        echo '<label for="title">Title</label>';
        echo "<input type='text' name='title' maxlength='30' value='$title'>";
        echo "<label for='heading'>Heading</label>";
        echo "<input type='text' name='heading' maxlength='30' value='$heading'>";
        echo "<label for='body'>Body</label>";
        echo "<textarea name='body'>$body</textarea>";
        echo "<input type='submit' name='submit'>";
        echo "<input type='hidden' name ='idEdit' value='$idToEdit'>";
        echo '</form>'; 
    }

function drawEditNews ($dbc) {
        //Obtain latest news entries.
        $getNews = "SELECT * FROM news ORDER BY time DESC;"; //Grab all news entries.
        $news = mysqli_query($dbc, $getNews);
        //Echo the articles.
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
             </article>
             <a href = \"".$_SERVER['PHP_SELF']."?idDelete=".$row['newsID']."\"> Delete</a>
             <a href = \"".$_SERVER['PHP_SELF']."?idEdit=".$row['newsID']."&title=".$row['title']."&heading=".$row['heading']."&body=".$row['body']."\"> Edit</a>"; 
        }
    }

function drawEditEntry ($newsID) {
        $editTitle = $_GET['title'];
        $editBody = $_GET['body'];
        $editHeading = $_GET['heading'];
        drawNews($editTitle, $editHeading, $editBody);
}

/******************* Validation Functions ********************/
function getForm ($dbc, $newsfield) { 
        return mysqli_escape_string($dbc,$_POST["$newsfield"]); //Retrieve and escape SQL injection.
       }
    
    
function validateNotEmpty (&$missedFields, $newsfield) { //Checks for empty field and tracks errors with array.
        if (empty($_POST["$newsfield"])) {
            array_push($missedFields, "Please input a $newsfield");
            return false; //Empty field.
        }
        else { 
            return true; //Field is filled out.
        }
    }
    
function displayProofread () {
        $title = $_POST['title'];
        $heading = $_POST['heading'];
        $body = $_POST['body'];
        echo '<h2>This is the information you provided.</h2>';
        echo "<p><em>Title: </em>$title</p>";
        echo "<p><em>Heading: </em>$heading</p>";
        echo "<p><em>Body: </em>$body</p>";        
    }

mysqli_close($dbc);

?>
