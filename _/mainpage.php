<?php
  require("volsys_methods.inc.php");
?>
<html>
<head>
    <title>VolSys - Add assignment </title>
    <link rel="stylesheet" type="text/css" href="volsys.css">
</head>
<body>

<div class="box">
<b>Add New Assignment</b>
</div>

<div class="box">
<form method="post" action="add_assign.php">  
    <table>
    <tr>
        <td colspan="6" align="left">
          <b>1. Select a volunteer</b><br>
          <select name="volunteer">
            <?php
              // connect to the db to retrieve volunteer

              // read in the connection settings
              require("volsys_settings.inc.php");
          
              // connect to the RDBMS
              $db = mysql_connect("$site","$user","$pass") 
                  or die_now("<h2>Could not connect to database server</h2><p>Check passwords and sockets</p>");
          
              // select the database
              mysql_select_db("$database",$db) 
                  or die_now("<h2>Could not select database $database</h2><p>Check database name</p>");
          
              // select all the volunteer in the database
              $result = mysql_query("select volunteer_id, volunteer_name
                  from $database_table_volunteer order by volunteer_name",$db) 
                  or die_now("<h2>Could not select volunteer</h2>");

              // echo volunteer out as options
              echo("\n");
              while($row = mysql_fetch_array($result)) {
                $the_id = $row["volunteer_id"];
                $the_name = $row["volunteer_name"];
                echo("\t\t<option value='$the_id'>" . "$the_id. $the_name " . "</a>\n");
              }
              echo("</select>");

              // print warning if there are no volunteer
              if(mysql_num_rows($result) < 1) {
                  echo(" You need to <a href='add_volunteer.php'>create</a> at least one volunteer");
              }

            ?>
        </td>
    </tr>
    <td colspan="6" align="left">
    	  <br><b>2. Enter details below:</b><br>
    <tr>
        <td>
          <?php $this_day = date("d"); ?>
          Day<br>
          <select name="day">
              <option value="01" <?php if($this_day == 1) {echo("selected");} ?> >01</option>
              <option value="02" <?php if($this_day == 2) {echo("selected");} ?> >02</option>
              <option value="03" <?php if($this_day == 3) {echo("selected");} ?> >03</option>
              <option value="04" <?php if($this_day == 4) {echo("selected");} ?> >04</option>
              <option value="05" <?php if($this_day == 5) {echo("selected");} ?> >05</option>
              <option value="06" <?php if($this_day == 6) {echo("selected");} ?> >06</option>
              <option value="07" <?php if($this_day == 7) {echo("selected");} ?> >07</option>
              <option value="08" <?php if($this_day == 8) {echo("selected");} ?> >08</option>
              <option value="09" <?php if($this_day == 9) {echo("selected");} ?> >09</option>
              <option value="10" <?php if($this_day == 10) {echo("selected");} ?> >10</option>
              <option value="11" <?php if($this_day == 11) {echo("selected");} ?> >11</option>
              <option value="12" <?php if($this_day == 12) {echo("selected");} ?> >12</option> 
              <option value="13" <?php if($this_day == 13) {echo("selected");} ?> >13</option>
              <option value="14" <?php if($this_day == 14) {echo("selected");} ?> >14</option>
              <option value="15" <?php if($this_day == 15) {echo("selected");} ?> >15</option>
              <option value="16" <?php if($this_day == 16) {echo("selected");} ?> >16</option>
              <option value="17" <?php if($this_day == 17) {echo("selected");} ?> >17</option>
              <option value="18" <?php if($this_day == 18) {echo("selected");} ?> >18</option>
              <option value="19" <?php if($this_day == 19) {echo("selected");} ?> >19</option>
              <option value="20" <?php if($this_day == 20) {echo("selected");} ?> >20</option>
              <option value="21" <?php if($this_day == 21) {echo("selected");} ?> >21</option>
              <option value="22" <?php if($this_day == 22) {echo("selected");} ?> >22</option>
              <option value="23" <?php if($this_day == 23) {echo("selected");} ?> >23</option>
              <option value="24" <?php if($this_day == 24) {echo("selected");} ?> >24</option>
              <option value="25" <?php if($this_day == 25) {echo("selected");} ?> >25</option>
              <option value="26" <?php if($this_day == 26) {echo("selected");} ?> >26</option>
              <option value="27" <?php if($this_day == 27) {echo("selected");} ?> >27</option>
              <option value="28" <?php if($this_day == 28) {echo("selected");} ?> >28</option>
              <option value="29" <?php if($this_day == 29) {echo("selected");} ?> >29</option>
              <option value="30" <?php if($this_day == 30) {echo("selected");} ?> >30</option>
              <option value="31" <?php if($this_day == 31) {echo("selected");} ?> >31</option>
          </select>
        </td>
        <td>
          <?php $this_month = date("m"); ?>
          Month<br>
          <select name="month">
              <option value="01" <?php if($this_month == 1) {echo("selected");} ?> >Jan</option>
              <option value="02" <?php if($this_month == 2) {echo("selected");} ?> >Feb</option>
              <option value="03" <?php if($this_month == 3) {echo("selected");} ?> >Mar</option>
              <option value="04" <?php if($this_month == 4) {echo("selected");} ?> >Apr</option>
              <option value="05" <?php if($this_month == 5) {echo("selected");} ?> >May</option>
              <option value="06" <?php if($this_month == 6) {echo("selected");} ?> >Jun</option>
              <option value="07" <?php if($this_month == 7) {echo("selected");} ?> >Jul</option>
              <option value="08" <?php if($this_month == 8) {echo("selected");} ?> >Aug</option>
              <option value="09" <?php if($this_month == 9) {echo("selected");} ?> >Sep</option>
              <option value="10" <?php if($this_month == 10) {echo("selected");} ?> >Oct</option>
              <option value="11" <?php if($this_month == 11) {echo("selected");} ?> >Nov</option>
              <option value="12" <?php if($this_month == 12) {echo("selected");} ?> >Dec</option>
          </select>
        </td>
        <td>
          <?php $this_year = date("Y"); ?>
          Year<br>
          <select name="year">
              <option value="2008" <?php if($this_year == 2008) {echo("selected");} ?> >2008</option>
              <option value="2009" <?php if($this_year == 2009) {echo("selected");} ?> >2009</option>
              <option value="2010" <?php if($this_year == 2010) {echo("selected");} ?> >2010</option>
          </select>
        </td>
        <td>
          VENUE<br>
          <input type="text" name="venue">
        </td>
        <td>
          LOCATION<br>
          <input type="text" name="location">
        </td>
        <td>
          DETAILS<br>
          <input type="text" size="60" name="details">
          <input type="submit" style='color: blue; font-size: 80%' value="Add">
        </td>
    </tr>

    </table>
</form>
</div>

<?php
  footer();
?>