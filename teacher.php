<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Navdeep Singh</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="css/main.css">
    <style>
      footer{
       color: green;
      }
      </style>
      
  </head>
  <body>
    <header>
      <a href="index.html" id="logo">
        <h1>Victorian Digital Careers</h1>
        <h2>ICT Student Engagement</h2>
      </a>
      <nav>
      <ul>
        <li><a href="index.html" >Home</a></li>
        <li><a href="parent.php" >Parent</a></li>
        <li><a href="teacher.php" class="selected">Teacher</a></li>
        </ul>
      </nav>
    </header>
    <div id="wrapper">
    <section>
    
    <form action="parent.php" method="post" align = "center">


<input type="submit" name="programs" value="ICT programs" >

<br><br>
</form>


    <?php
    require 'controller.php';
    
    if(isset($_POST['programs']))
   {
     $query  = "select * from general_programs";
	 
	 $result = pg_query($query) or die("Query failed:".pg_last_error());

    echo  "<table border='1' align = 'center'>
	     <tr>
         <th>ICT Programs</th> 
          
     	</tr>\n";  

    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
     }
     echo "\t</tr>\n";
    }
    echo "</table>\n";
	
	// Free resultset
      pg_free_result($result);

// Closing connection
     }
	 
pg_close($con);
    
    
    ?>
    
    </section>
    <footer>
       <img src="img/twitter-wrap.png" alt="twitter logo" class="social-icon">
       <img src="img/facebook-wrap.png" alt="facebook logo" class="social-icon">
      <p>&copy; 2014</p>
    </footer>
      </div>
  </body>
</html>
