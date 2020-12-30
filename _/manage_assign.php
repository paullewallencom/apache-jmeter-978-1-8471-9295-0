<?php
    // include the methods
    include("volsys_methods.inc.php");
?>
<html>
<head>
    <title>VolSys - Manage Assignments</title>
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

// select all the assignment in the database

    $result = mysql_query("select $database_table.assign_id, $database_table.month, $database_table.day, $database_table.year, $database_table.location, $database_table.details, $database_table.venue, $database_table.volunteer_id, $database_table_volunteer.volunteer_id, $database_table_volunteer.volunteer_name 
        from $database_table, $database_table_volunteer 
        where $database_table.volunteer_id = $database_table_volunteer.volunteer_id
        order by volunteer_name, year, month, day",$db) 
        or die_now("<h2>Could not select Assignment</h2>");

    // output the current assignment        
    echo("<div class='box'>\n<h3>VolSys - Manage Assignments</h3>\n</div>\n<div class='box'>\n");
    echo("<table id=tbl_mngassign border='1' width='95%'>\n");
    echo("\t<tr style='background-color: 660FF; color:white'>\n\t\t
    <td><b>Assignment ID</b></td>\n\t\t
    <td><b>Volunteer ID</b></td>\n\t\t
    <td><b>Volunteer Name</b></td>\n\t\t
    <td><b>Date</b></t\n\t\t
    <td><b>Venue</b></td>\n\t\t
    <td><b>Location</b></td>\n\t\t
    <td><b>Details</b></td>\n\t\t
    <td><b>Edit</b></td>\n\t\t
    <td><b>Delete</b></td>\n\t</tr>\n");
    while($row = mysql_fetch_array($result)) {
        $the_id = $row["assign_id"];
        $the_month = $row["month"];
        $the_day = $row["day"];
        $the_year = $row["year"]; 
        $the_location = $row["location"];
        $the_details = $row["details"];
        $the_venue = $row["venue"];
        $the_volunteer_id = $row["volunteer_id"];
        $the_volunteer_name = $row["volunteer_name"];

        // include the edit form
        echo("\n\t<form method='post' action='edit_assign.php'>\n");
        echo("\t<tr>\n");
        echo("\t\t<td>$the_id</td>");
        echo("\n\t\t<td>$the_volunteer_id</td>\n");
        echo("\t\t<td>" . "$the_volunteer_name" . "</td>\n");
        echo("\t\t<td>" . "$the_day" . "/" . "$the_month" . "/" . "$the_year" . "</td>\n");
        echo("\t\t<td>" . "$the_venue" . "</td>\n");
        echo("\t\t<td>" . "$the_location" . "</td>\n");
        echo("\t\t<td>" . "$the_details" . "</td>\n");
        echo("\t\t<td><input style='color: blue; font-size: 80%' type='submit' value='edit'></td>\n");
        echo("\t\t<input type='hidden' name='assign_id' value='$the_id'>\n");
        echo("\t</form>\n");
        // include the delete form
        echo("\t<form method='post' action='delete_assign.php'>\n");
        echo("\t\t<td><input style='color: blue; font-size: 80%' type='submit' value='del'></td>\n");
        echo("\t\t<input type='hidden' name='assign_id' value='$the_id'>\n");
        echo("\t</form>\n");
        echo("\t</tr>\n");
    }
    echo("</table>\n</div>\n");
?>
<?php
  footer();
?>