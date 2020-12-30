<?php
    // include the methods
    include("volsys_methods.inc.php");
    // parse the $_POST vars into something useful 
    // also check for nulls
    $the_id = $_POST['assign_id'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    if ($_POST['venue']) {
        $venue = $_POST['venue'];
    } else {
        die_now("<h3>Sorry</h3><p>Venue is a required field. Use your browser 'back' button to fix this.</a></p>");
    }
    if ($_POST['location']) {
        $location = $_POST['location'];
    } else {
        die_now("<h3>Sorry</h3><p>Location is a required field. Use your browser 'back' button to fix this.</a></p>");       
    }
    $details = $_POST['details'];
    $the_volunteer_id = $_POST['volunteer'];
    // echo("the_volunteer_id: $the_volunteer_id");
?>
<html>
<head>
    <title>VolSys - Assignment edit confirmation</title>
    <link rel="stylesheet" type="text/css" href="volsys.css">
</head>
<body>

<?php
    // read in the connection settings
    require("volsys_settings.inc.php");

    // connect to the RDBMS
    $db = mysql_connect("$site","$user","$pass") 
        or die_now("<h2>Could not connect to database server</h2><p>Check passwords and sockets</p>");

    // select the database
    mysql_select_db("$database",$db) 
        or die_now("<h2>Could not select database $database</h2><p>Check database name</p>");

    // update the database record
    $result = mysql_query("update $database_table
        set month='$month', day='$day', year='$year', venue='$venue', location='$location', details='$details', volunteer_id='$the_volunteer_id'  
        where assign_id = '$the_id'",$db) 
        or die_now("<h2>Could not change assignment</h2>");

    // echo out a status report and assignment id
    echo("<div class='box'>\n\t<h3>VolSys - Edit Assignment</h3>\n</div>\n");
    echo("<div class='box'>Assignment#: (id='$the_id') successfully updated.</div>\n");
?>
<?php
  footer(); 
?>