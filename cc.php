<html>
 <head>
  <meta name="author" content="pravj"/>
 </head>
 <body bgcolor="#005353";>
   <div id="pic">
	
	 <img src="pictures/1.png" style="position:relative;top:-80px;"/>
	 <img src="pictures/2.png" style="position:relative;left:670px;top:-10px;"/>
	 <img src="pictures/3.png" style="position:absolute;top:395px;left:835px;"/>
     <img src="pictures/4c.png" style="position:absolute;top:135px;left:-10px;"/>
	</div>
	<div id="tag">
	 <p><a href="bb.htm">DayboX</a></p>
	</div>
	
	
   
	<div id="date">
   
     <?php
   $host = 'localhost';
   $user = 'root';
   // password and database name are not written
   $pass = '*******';
   $db = '***';
  
   
   $connect = mysql_connect($host, $user, $pass) or die ("unable to connect");
   mysql_select_db($db) or die ("unselected");

   $d = $_POST["i"];
   $v = $_POST["j"];
   
   if($d == "dob")
  {
   $query = "SELECT * FROM a WHERE day='$v' ";
   $result = mysql_query($query) or die ("wrong way!");
   if(mysql_num_rows($result) > 0)
   {  echo"<table>";
      while($row = mysql_fetch_row($result))
      {echo "<tr>";
       echo"<td>".$row[3]." |</td>";
	   echo "<td>".$row[2]."</td>";
	   $cap = ucfirst($row[1]);
	   echo"<td> | ".$cap."</td>";
       echo "</tr>";}
       echo"</table>";
     }
	else
	{$error = "not found..make sure input format is right";
	 echo"<table>";
	 echo"<tr>";
	 echo"<td>".$error."</td>";
	 echo"</tr>";
	 echo"</table>";}
	  
   }
   else if($d = "name")
{
 $query = "SELECT * FROM a WHERE name='$v' ";
   $result = mysql_query($query) or die ("wrong way!");
   if(mysql_num_rows($result) > 0)
   {  echo"<table>";
      while($row = mysql_fetch_row($result))
      {echo "<tr>";
	   $r = ucfirst($row[1]);
	   echo "<td>".$r." |</td>";
       echo "<td>".$row[2]." </td>"; // here with $row[3] $row[5] was also for month varriable.
      // picture from here $row[2] is removed to check another position for this
	   echo "<td> | ".$row[3]."</td>";
       echo "</tr>";
       // $g = $row[3]."-".$row[5]; it was first one...changed down to make date and month at same
	   $g = $row[3];
	   
       $h = getdate();
       $c = $h["mday"];
       $b = $h["mon"];
       $m = $c."-".$b;
       if($g==$m)
       {echo "today";}
}
       echo"</table>";
     }
	 else
	 {$error = "not found..make sure input is right!";
	  echo"<table>";
	  echo"<tr>";
	  echo"<td>".$error."</td>";
	  echo"</tr>";
	  echo"</table>";}
 }

   
     
mysql_free_result($result); 

// close connection

mysql_close($connect);

?>
  
   </div>
   <!--now for arranging :(-->
   <div id="for?=dob">
    <!--<?php
	  $host = "localhost";
	  $user = "root";
	  $pass = "letmedo";
	  $db = "scl";
	  $connect = mysql_connect($host, $user, $pass) or die ("Unable to connect!");
	  mysql_select_db($db) or die ("unselected");
	  $a = $_POST["i"];
	  $b = $_POST["j"];
	  
	  if($a == "dob")
	  { $query = " SELECT * FROM a WHERE day='$b' ";
	    $result = mysql_query($query) or die ("wrong way!");
		if(mysql_num_rows($result) > 0)
		{ echo "<table>";
		  while($row = mysql_fetch_row($result))
		  {echo "<tr>";
		   echo "<td>".$row[1]."</td>";
		   echo "</tr>";}
		   echo "</table>";}
		}
		mysql_free_result($result);
		mysql_close($connect);
	?>-->
   </div>
 </body>
</html>
