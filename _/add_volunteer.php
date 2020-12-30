<?php
  require("volsys_methods.inc.php");
?>
<html>
<head>
    <title>VolSys - Add Volunteer</title>
    <link rel="stylesheet" type="text/css" href="volsys.css">
</head>
<body>

<div class="box">
<h3>VolSys - Add Volunteer</h3>
</div>

<div class="box">
  <form method="post" action="add_volunteer_02.php">
    <table>
      <tr>
        <td>
          <b>Full Name</b><br />
          <input type="text" size="45" name="volunteer_name">
        </td>
        <td>
          <b>Contact email</b><br />
          <input type="text" size="30" name="volunteer_email">
        </td>
        <td>
          <b>Website</b><br />
          <input type="text" size="30" name="volunteer_url">
        </td>
        <td>
          <b>Phone</b><br />
          <input type="text" name="volunteer_phone">
          <input type="submit" style='color: blue; font-size: 80%' value="Add">
        </td>
      </tr>

    </table>
  </form>
</div>

<?php
  footer();
?>