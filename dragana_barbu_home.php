<?php

 ob_start();

 session_start();

 require_once 'dragana_barbu_dbconnect.php';

// if session is not set this will redirect to login page

 if( !isset($_SESSION['users']) ) {

  header("Location: dragana_barbu_index.php");

  exit;

 }

 // select logged-in users detail

 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['users']);

 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<!DOCTYPE html>

<html>

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script>   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<title>Welcome - <?php echo $userRow['userName']; ?></title>

</head>

<body>

             <nav class="navbar navbar">
	    <div class="container">
	      <div class="navbar-header">
	        <a class="navbar-brand" href="#" id="brand">welcome <?php echo $userRow['userName']; ?>!</a>
	      </div>
	      <ul class="nav navbar-nav" id="navibar">
	        <li class="active"><a href="#">Library</a></li>
			<li><a href="#books">Your account</a></li>
			<li><a href="#biglist">Media</a></li>
			
		  </ul>

		  <div class="pull-right">
        <ul class="nav navbar-nav">
            <li><button type="submit" class="navbar-form navbar-right" name="logout" id="logoutbtn"><a href="dragana_barbu_logout.php?logout" id="signoutbtn">Sign Out</a></button></li>
        </ul>     
</div>
		  
		   
	   
	 </nav>

	 <!--main image -->

<div class="container" id="heroimg" >
  		<div class="row">
	  		<div class="col-md-12 col-xs-12">
		  	<p class="text-center" id="titlephrase">Library</p>

		  	</div>
		</div>
	  
</div>

	<!--container containing all media types -->

<div class="container" id="media">

	<div class="container">
		<h2><p class="text-center" id="biglist">
		All Media</p></h2>
		<div class="row"> 
			


		<?php

              $sql = "SELECT media.isbn_code ,media.title , media.type,media.image,media.short_description,media.publish_date FROM media 
                 ";
                
    
                $result = $conn->query($sql);//$result = mysqli_query($conn,$sql)
                if (!$result) {
                  echo "sql query failed";
              } 

              $rows=$result->fetch_all(MYSQLI_ASSOC);
              echo "<div class='container'><table class='table table-striped table table-hover'><thead><tr><th>ISBN code</th><th>title</th><th>media_type</th><th>image</th><th>short_description</th><th>publish date</th></tr></thead><tbody>";
            foreach($rows as $row){
              echo "<tr><td>";
                echo $row['isbn_code'];
                echo "</td><td>";
                echo $row['title'];
                echo "</td><td>";
                echo $row['type'];
                echo "</td><td>";
                echo "<img src='";
                echo $row['image'];
                echo "' width='75'></td>";
                echo "<td>";
                echo $row['short_description'];
                echo "</td><td>";
                echo $row['publish_date'];
                echo "</td><td>";
                echo $row['status'];
                echo "</td></tr>";

            }
              echo "</tbody></table></div>";

?>
	</div>	</div>		

	
</div>
   

</body>


</html>

<?php ob_end_flush(); ?>