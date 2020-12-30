<?php
    // include the methods
    include("volsys_methods.inc.php");

    // parse the $_POST vars into something useful 
    // and check for nulls on required fields
    if ($_POST['volunteer_name']) {
        $name = $_POST['volunteer_name'];
    } else {
        die_now("<h3>Sorry</h3><p>Volunteer name is a required field. Click 'back' button to fix this.</a></p>");       
    }
    $email = $_POST['volunteer_email'];
    $url = $_POST['volunteer_url'];
    $phone = $_POST['volunteer_phone'];
?>
<html>
<head>
    <title>VolSys - Add Volunteer</title>
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

    // add new assignment to the database
    $result = mysql_query("insert into $database_table_volunteer (volunteer_id, volunteer_name, volunteer_email, volunteer_url, volunteer_phone)
        values(null,'$name','$email','$url','$phone')",$db) 
        or die_now("<h2>Could not add volunteer to database table</h2><p>Check database structure</p>");

    // get the assign_id for the previous insert query.  We'll need it 
    // so we can drag the entry back out    
    $last_volunteer_id = mysql_insert_id();

    // echo out the most recent addition, for error checking
    $result = mysql_query("select volunteer_id, volunteer_name, volunteer_email, volunteer_url, volunteer_phone 
        from $database_table_volunteer where volunteer_id = $last_volunteer_id",$db)
        or die_now("<h2>Could not echo most recent volunteer</h2>");
    
//    while($i = mysql_fetch_row($result)) {
//        echo($i[1] . "/"); // month
//        echo($i[2] . "/"); // day
//        echo($i[3] . " "); // year
//    }

    while($row = mysql_fetch_array($result)) {
        $the_volunteer_id = $row["volunteer_id"];
        $the_volunteer_name = $row["volunteer_name"];
        $the_volunteer_email = $row["volunteer_email"];
        $the_volunteer_url = $row["volunteer_url"];
        $the_volunteer_phone = $row["volunteer_phone"];
        echo("<div class='box'><h3>VolSys - Most Recent Volunteer</h3></div>
            <div class='box'>
              <table width='100%'> 
                <tr>
                  <td><b>ID</td>
                  <td><b>Name</b></td>
                  <td><b>Email</b></td>
                  <td><b>URL</b></td>
                  <td><b>Contact No.</b></td>
                </tr>
                <tr>
                  <td id=\"ID\">$the_volunteer_id</td>
                  <td id=\"Name\">$the_volunteer_name</td>
                  <td id=\"Email\">$the_volunteer_email</td>
                  <td id=\"URL\">$the_volunteer_url</td>
                  <td id=\"Phone\">$the_volunteer_phone</td>
                </tr>
              </table>
            </div>");
        // echo("$the_month" . "/" . "$the_day" . "/" . "$the_year " . "$the_venue $the_location $the_details");
    }
?>

<?php
  footer();
?>