<?php
    // include the methods
    include("volsys_methods.inc.php");
    // parse the $_POST vars into something useful 
    // also check for nulls
    $the_id = $_POST['volunteer_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $phone = $_POST['phone'];
?>
<html>
<head>
    <title>VolSys - Edit Volunteer (Confirm)</title>
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
    $result = mysql_query("update $database_table_volunteer
        set volunteer_name='$name', volunteer_email='$email', volunteer_url='$url', volunteer_phone='$phone'   
        where volunteer_id = '$the_id'",$db) 
        or die_now("<h2>Could not change volunteer</h2>");

    // echo out a status report and assignment id
    echo("<div class='box'>\n\t<h3>VolSys - Edit Volunteer</h3>\n</div>\n");
    echo("<div class='box'>volunteer (id='$the_id') updated</div>\n");
?>
<?php
  footer();
?>