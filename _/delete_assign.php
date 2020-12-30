<?php
    // include the methods
    include("volsys_methods.inc.php");
    // parse the $_POST vars into something useful 
    $the_id = $_POST['assign_id'];
?>
<html>
<head>
    <title>VolSys - Delete assignment</title>
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

    // delete the assignment in question
    $result = mysql_query("delete from $database_table 
        where assign_id = '$the_id'",$db) 
        or die_now("<h2>Could not delete assignment</h2>");

    // echo out a status report and assignment id
    echo("<div class='box'>\n\t<h3>VolSys - Delete assigment</h3>\n</div>\n");
    echo("<div class='box'>assignment#'$the_id' deleted</div>\n");
?> 
<?php
  footer();
?>