<!DOCTYPE html>
<?php
	include_once 'header.php';
?>
<html>
<head>
<style> 
.flex-container {
    display: -webkit-flex;
    display: flex;  
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    text-align: center;
}

.flex-container > * {
    padding: 15px;
    -webkit-flex: 1 100%;
    flex: 1 100%;
}

.article {
    text-align: left;
}

header {background: MediumSeaGreen;color:white;}
footer {background: #aaa;color:white;}
.nav {background:#eee;}

.nav ul {
    list-style-type: none;
    padding: 0;
}
.nav ul a {
    text-decoration: none;
}

@media all and (min-width: 768px) {
    .nav {text-align:left;-webkit-flex: 1 auto;flex:1 auto;-webkit-order:1;order:1;}
    .article {-webkit-flex:5 0px;flex:5 0px;-webkit-order:2;order:2;}
    footer {-webkit-order:3;order:3;}
}
</style>
</head>
<body>

<div class="flex-container">
<header>
 
  <img src="/librarySite/HomePageIcon.png" align="left";">
  <img src="/librarySite/HomePageIcon.png" align="right";">
 <h1>Library</h1>

</header>

<nav class="nav">
<!-- Load the sidebar -->
<?php
	// Include connection to the DB
	include_once 'C:\xampp\htdocs\LoginSystemTest\Includes\dbh.inc.php';

	// Run SQL to find if the current user email has admin privileges.
	@$email = $_SESSION['u_email'];
	$sql = "SELECT * FROM patron WHERE email = '$email' AND isAdmin = 1";
	$results = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($results);
			
	if(isset($_SESSION['u_email']) AND $resultCheck > 0)
	{
		// If logged in as an admin, display admin sidebar.
		//include 'C:\Apache24\htdocs\Login System Test\sidebar_loggedin_admin.php';
		include 'C:\xampp\htdocs\LoginSystemTest\sidebar_loggedin_admin.php';
	}
	else if(isset($_SESSION['u_email']))
	{
		include 'C:\xampp\htdocs\LoginSystemTest\sidebar_loggedin.php';
	}
	else 
	{
		include 'C:\xampp\htdocs\LoginSystemTest\sidebar_notloggedin.php';
	};
?>
</nav>

<article class="article">
  <h1>Catalog</h1>
  <p>Enjoy the books</p>
  <p><strong>Don't forget to return your books!</strong></p>
 
 <h2>Popular Titles</h2>
 <a href="bookID1.php"> <img src="BookCovers/cats.jpg" alt="HTML5 Icon" style="width:128px;height:150px;"></a>
 <a href="bookID2.php"> <img src="BookCovers/fire trucks.jpg" alt="HTML5 Icon" style="width:128px;height:150px;"></a>
 <a href="bookID3.php"> <img src="BookCovers/The great alone.jpg" alt="HTML5 Icon" style="width:128px;height:150px;"></a>
 <a href="bookID4.php">  <img src="BookCovers/Still me.jpg" alt="HTML5 Icon" style="width:128px;height:150px;"></a>
 <a href="bookID5.php"><img src="BookCovers/fire trucks(1).jpg" alt="HTML5 Icon" style="width:128px;height:150px;"></a>
 <a href="bookID6.php"> <img src="BookCovers/look for me.jpg" alt="HTML5 Icon" style="width:128px;height:150px;"></a>
 <a href="bookID7.php"><img src="BookCovers/Pachinko.jpg" alt="HTML5 Icon" style="width:128px;height:150px;"></a>
 <a href="bookID8.php"> <img src="BookCovers/Seaside romance.jpg" alt="HTML5 Icon" style="width:128px;height:150px;"></a>
   
   <H3> Complete Catalog </h3>
   <?php
  try {
  	  
  $con= new PDO('mysql:host=localhost;dbname=real_deal_lib', "root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = "SELECT books.authorID,author.authorID, author.afname, books.isbn, author.alname,books.title,books.quantity,books.bookID
FROM books
INNER JOIN author
ON books.authorID = author.authorID
";
  //first pass just gets the column names
  print "<table> ";
  $result = $con->query($query);
  //return only the first row (we only need field names)
  $row = $result->fetch(PDO::FETCH_ASSOC);
  print " <tr> ";
  foreach ($row as $field => $value){
   print " <th>$field</th> ";
  } // end foreach
  print " </tr> ";
  //second query gets the data
  $data = $con->query($query);
  $data->setFetchMode(PDO::FETCH_ASSOC);
  foreach($data as $row){
   print " <tr> ";
   foreach ($row as $name=>$value){
   print " <td>$value</td> ";
   } // end field loop
   print " </tr> ";
  } // end record loop
  print "</table> ";
  } catch(PDOException $e) {
   echo 'ERROR: ' . $e->getMessage();
  } // end try
 ?>
</article>


<!-- TABLE STYLE -->
 <html lang = "en-US">
 <head>
 <meta charset = "UTF-8">
 <title>contact.php</title>
 <style type = "text/css">
  table, th, td {border: 1px solid black};
 </style>
 </head>

</html>


<footer>Sp18 CSCI 2050-90 - Aaron, Lydia, Riley</footer>
</div>

</body>
<!-- Load the sidebar -->


</html>


