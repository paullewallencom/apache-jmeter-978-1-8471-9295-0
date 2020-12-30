<?php
    // include the methods
    include("volsys_methods.inc.php");
    // parse the $_POST vars into something useful 
    $the_id = $_POST['volunteer_id'];
?>
<html>
<head>
    <title>VolSys - Edit Volunteer</title>
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

    // query for the assign selected for editing in manage_assign.php
    $result = mysql_query("select volunteer_id, volunteer_name, volunteer_email, volunteer_url, volunteer_phone  
        from $database_table_volunteer where volunteer_id = '$the_id'",$db)
        or die_now("<h2>Could not select volunteer to be edited</h2>");

    // echo the assignment into an editing form
    while($row = mysql_fetch_array($result)) {
        $the_volunteer_id = $row["volunteer_id"];
        $the_volunteer_name = $row["volunteer_name"];
        $the_volunteer_email = $row["volunteer_email"];
        $the_volunteer_url = $row["volunteer_url"];
        $the_volunteer_phone = $row["volunteer_phone"];
        echo("<div class='box'><h3>VolSys - Edit Volunteer</h3></div>
            <div class='box'>
            <form method='post' action='edit_volunteer_02.php'>
            <table border='1' width='80%'>
                <tr style='background-color: 660FF; color:white'>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>URL</td>
                    <td>Phone</td>
                    <td>Update</td>
                </tr>
                <tr>
                    <td><b>$the_id</b></td>
                    <td><input type='text' name='name' value='$the_volunteer_name'></input></td> 
                    <td><input type='text' name='email' value='$the_volunteer_email'></input></td>
                    <td><input type='text' name='url' value='$the_volunteer_url'></input></td>
                    <td><input type='text' name='phone' value='$the_volunteer_phone'></input></td>
                    <td><input type='hidden' name='volunteer_id' value='$the_id'>
                    <input style='color: blue; font-size: 80%' type='submit' value='Update'></td>
                </tr>
            </table>

            
            </form>
            </div>");
    }

?>

<?php
  footer();
?>