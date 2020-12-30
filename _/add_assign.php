<?php


    // include the methods
    include("volsys_methods.inc.php");

    // parse the $_POST vars into something useful 
    // and check for nulls on required fields

    // if they try adding a assign w/o first adding an volunteer, assignment is 
    // assigned to volunteer id zero.  Use @ to suppress the notice
    if (@$_POST['volunteer']) {
        $volunteer = $_POST['volunteer'];
    } else {
        die_now("Error:  you need to <a href='add_volunteer.php'>create</a> at least one volunteer");
    }
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
?>
<html>
<head>
    <title>VolSys - Add Assignment [2]</title>
    <link rel="stylesheet" type="text/css" href="volsys.css">
</head>
<body>

<!-- testing -->
<?php echo("volunteer = " . $volunteer . "<br />"); ?>

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
    $result = mysql_query("insert into $database_table (assign_id, month, day, year, location, details, venue, volunteer_id) 
        values(null,'$month','$day','$year','$location','$details','$venue','$volunteer')",$db) 
        or die_now("<h2>Could not add assign to database table</h2><p>Check database structure</p>");

    // get the assign_id for the previous insert query.  We'll need it 
    // so we can drag the entry back out    
    $last_assign_id = mysql_insert_id();

    // echo out the most recent addition, for error checking
    $result = mysql_query("select assign_id, month, day, year, location, details, venue, volunteer_id 
        from $database_table where assign_id = $last_assign_id",$db)
        or die_now("<h2>Could not echo most recent assignment</h2>");

    while($row = mysql_fetch_array($result)) {
        $the_month = $row["month"];
        $the_day = $row["day"];
        $the_year = $row["year"];
        $the_location = $row["location"];
        $the_details = $row["details"];
        $the_venue = $row["venue"];
        $the_volunteer_id = $row["volunteer_id"];
        echo("<div class='box'><h3>volsys - Most Recent Assignment</h3></div>
            <div class='box'>
            <table border='1' width='80%'>
                <tr>
                    <td>Volunteer ID</td>
                    <td>Date</td>
                    <td>Venue</td>
                    <td>Location</td>   
                    <td>Details</td>
                </tr>
                <tr>
                    <td>$the_volunteer_id</td>
                    <td>$the_month/$the_day/$the_year</td>
                    <td>$the_venue</td>
                    <td>$the_location</td>
                    <td>$the_details</td>
                </tr>
            </table>
            </div>");
        // echo("$the_month" . "/" . "$the_day" . "/" . "$the_year " . "$the_venue $the_location $the_details");
    }
?>

<?php
  footer();
?>