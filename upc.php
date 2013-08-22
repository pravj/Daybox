<html>
 <head>
  <title>UPcoming</title>
  <meta name="author" content="pravj"/>
  <link rel="stylesheet" href="ustyle.css" type="text/css"/>
 </head>
 <body bgcolor="#005353">
    <div id="pic">
     <img src="pictures/1.png" style="position:relative;top:-80px;"/>
     <img src="pictures/2.png" style="position:relative;left:670px;"/>
     <img src="pictures/3.png" style="position:absolute;top:395px;left:835px;"/>
     <img src="pictures/4c.png" style="position:absolute;top:135px;left:-10px;"/>
	 
	 <div id="tag">
      <p><a href="bb.htm">DayboX</a></p>
     </div>
    </div>
	
	<div id="inside">
	  <?php
   $host = 'localhost';
   $user = 'root';
   // password and databse name are not written
   $pass = '*******';
   $db = '***';
  
   
   $connect = mysql_connect($host, $user, $pass) or die ("unable to connect");
   mysql_select_db($db) or die ("unselected");
   
   for($i = 1; $i <= 48; $i++) 
   {
        $query = " SELECT * FROM a WHERE id='$i' ";
		$result = mysql_query($query) or die ("something went wrong");
		if(mysql_num_rows($result) > 0)
		{ 
		  while($row = mysql_fetch_row($result))
		  {
		    
			//////////////////\\\\\\\\\\\\\\\\\\\\
			$a = getdate();
			$b = $a["year"];
			$c = $a["mon"];
			$d = $a["mday"];
			$e = $a["hours"];
			$f = $a["minutes"];
			$g = $a["seconds"];
			$h = $b."-".$c."-".$d." ".$e.":".$f.":".$g;
			$k = strtotime($h);
			$var = $row[3];
			$ab = substr($var, 0, -3);
			$bc = substr($var, 3);
			$new = $b."-".$ab."-".$bc;
			$w = strtotime($new);
			$v = $w-$k;
			
			if($v < 864000 && $v > 0)
			{
			    /*echo $row[1],$row[2];  
                echo "</br>";	*/
				echo"<table>";
                echo"<tr>";
                echo"<td>".ucfirst($row[1])."</td>";
                echo"<td>".$row[2]."</td>";	
                /******************************/
				$dateone = $b."-".$c."-".$d." ".$e.":".$f.":".$g;
                $datetwo = $b."-".$row[3];
				$ab = (strtotime($datetwo)-strtotime($dateone));
				$db = $ab/86400;
			    $days = floor($db);
			    $eb = ($db-$days)*86400;
		        $fb = $eb/3600;
			    $hours = (floor($fb)-5);
				$ans = "$days day $hours hour";
				echo"<td>".$ans."</td>";
                /*******************************/				
			    echo"</tr>";
				echo"</table>";
				echo"</br>";
			}
			
		  }
		  
        }
	}
   mysql_free_result($result);
   mysql_close($connect);
?>
	</div>
 </body>
</html>
