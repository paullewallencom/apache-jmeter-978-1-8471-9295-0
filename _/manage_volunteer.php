<?php
    // include the methods
    include("volsys_methods.inc.php");
?>
<html>
<head>
    <title>volsys :: manage volunteer</title>
    <link rel="stylesheet" type="text/css" href="volsys.css">
</head>
<body>

<?php
    // read in the connection settings
    require("volsys_settings.inc.php");

    // connect to the RDBMS
    $db = mysql_connect("$site","$user","$pass") 
        or die_now_now("<h2>Could not connect to database server</h2><p>Check passwords and sockets</p>");

    // select the database
    mysql_select_db("$database",$db) 
        or die_now_now("<h2>Could not select database $database</h2><p>Check database name</p>");

    // select all the volunteer in the database
    $result = mysql_query("select volunteer_id, volunteer_name, volunteer_email, volunteer_url, volunteer_phone 
        from $database_table_volunteer order by volunteer_name",$db) 
        or die_now_now("<h2>Could not select volunteer</h2>");

    // output the current volunteer        
    echo("<div class='box'>\n<h3>VolSys - Manage Volunteer</h3>\n</div>\n<div class='box'>\n");
    echo("<table border='1' width='80%'>\n");
    echo("\t<tr style='background-color: 660FF; color:white'>\n\t\t
    <td><b>ID</b></td>\n\t\t
    <td><b>Name</b></td>\n\t\t
    <td><b>Email</b></td>\n\t\t
    <td><b>URL</b></td>\n\t\t\n\t\t
    <td><b>Phone#</b></td>\n\t\t
    <td><b>Edit</b></td>\n\t\t
    <td><b>Delete</b></td>\n\t</tr>\n");
    while($row = mysql_fetch_array($result)) {
        $the_id = $row["volunteer_id"];
        $the_name = $row["volunteer_name"];
        $the_email = $row["volunteer_email"];
        $the_url = $row["volunteer_url"];
        $the_phone = $row["volunteer_phone"];

        // include the edit form
        echo("\n\t<form method='post' action='edit_volunteer.php'>\n");
        echo("\t<tr>\n\t\t<td id=\"ID\">$the_id</td>\n");
        echo("\t\t<td id=\"Name\">" . "$the_name" . "</td>\n");
        echo("\t\t<td id=\"Email\"><a href=\"mailto:$the_email\">" . "$the_email" . "</a></td>\n");
        echo("\t\t<td id=\"URL\"><a href=\"$the_url\">" . "$the_url" . "</a></td>\n");
        echo("\t\t<td id=\"Phone\">" . "$the_phone" . "</td>\n");
        echo("\t\t<td><input style='color: blue; font-size: 80%' type='submit' value='edit'></td>\n");
        echo("\t\t<input type='hidden' name='volunteer_id' value='$the_id'>\n");
        echo("\t</form>\n");
        // include the delete form
        echo("\t<form method='post' action='delete_volunteer.php'>\n");
        echo("\t\t<td><input  style='color: blue; font-size: 80%' type='submit' value='del'></td>\n");
        echo("\t\t<input type='hidden' name='volunteer_id' value='$the_id'>\n");
        echo("\t</form>\n");
        echo("\t</tr>\n");
    }
    echo("</table>\n</div>\n");
?>
<?php
  footer();
?>