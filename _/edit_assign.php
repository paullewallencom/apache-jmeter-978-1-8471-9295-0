<?php
    // include the methods
    include("volsys_methods.inc.php");
    // parse the $_POST vars into something useful 
    $the_id = $_POST['assign_id'];
?>
<html>
<head>
    <title>VolSys - Edit Assignment</title>
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

    // query for the assignment selected for editing in manage_assign.php
    $result = mysql_query("select assign_id, month, day, year, location, details, venue, volunteer_id 
        from $database_table where assign_id = '$the_id'",$db)
        or die_now("<h2>Could not echo assignment to be edited</h2>");

	echo("<div class=\"box\"><h3>VolSys - Edit Assignment</h3></div>");

    // echo the assignment into an editing form
    while($row = mysql_fetch_array($result)) {
        $the_month = $row["month"];
        $the_day = $row["day"];
        $the_year = $row["year"];
        $the_location = $row["location"];
        $the_details = $row["details"];
        $the_venue = $row["venue"];
        $the_volunteer_id = $row["volunteer_id"];
        echo(" <div class=\"box\">
            <form method=\"post\" action=\"edit_assign_02.php\">
            <table border=\"1\" width=\"80%\">
                <tr style='background-color: 660FF; color:white'>
                    <td><b>Assignmt ID</b></td>
                    <td><b>Volunteer ID</b></td>
                    <td><b>Day</b></td>
                    <td><b>Month</b></td>
                    <td><b>Year</b></td>
                    <td><b>Venue</b></td>
                    <td><b>Location</b></td>   
                    <td><b>Details</b></td>
                </tr>
                <tr>
                    <td><b>$the_id</b></td>
                    <td><input type=\"text\" readonly=\"true\" name=\"volunteer\" value=\"$the_volunteer_id\" size=\"2\"></input></td>                    

                    <td><input type=\"text\" name=\"day\" value=\"$the_day\" size=\"2\"></input></td>                    
                    <td><input type=\"text\" name=\"month\" value=\"$the_month\" size=\"2\"></input></td>
                    <td><input type=\"text\" name=\"year\" value=\"$the_year\" size=\"4\"></input></td>
                            
                    <td><input type=\"text\" name=\"venue\" value=\"$the_venue\" size=\"12\"></input></td>
                    <td><input type=\"text\" name=\"location\" value=\"$the_location\"></input></td>
                    <td><input type=\"text\" name=\"details\" value=\"$the_details\"></input></td>
                </tr>
            </table><br>
            <input type=\"hidden\" name=\"assign_id\" value=\"$the_id\">
            <input style='color: blue; font-size: 80%' type=\"submit\" value=\"Update\">
            </form>
            </div>");
    }
    // for now, list table of volunteer ids + volunteer names
    // later, we'll echo it into a select box

    // connect to the RDBMS
    $db = mysql_connect("$site","$user","$pass") 
        or die_now("<h2>Could not connect to database server</h2><p>Check passwords and sockets</p>");

    // select the database
    mysql_select_db("$database",$db) 
        or die_now("<h2>Could not select database $database</h2><p>Check database name</p>");

    // query for the volunteer ids and anems
    $result = mysql_query("select volunteer_id, volunteer_name 
        from $database_table_volunteer
        order by volunteer_name",$db)
        or die_now("<h2>Could not echo volunteer table</h2>");

    // echo the results
    echo("<div class='box'><b>Volunteer IDs and Names</b><br>");
    while($row = mysql_fetch_array($result)) {
        $the_volunteer_id = $row["volunteer_id"];
        $the_volunteer_name = $row["volunteer_name"];
    echo("$the_volunteer_id" . " = " . "$the_volunteer_name" . "<br>\n");
    }
    echo("</div>");
?>

<?php
  footer();
?>