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

</nav>

<article class="article">
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
  <h1>Return a book</h1>
<form action = "bookReturn.php" method = "post">
BookID: <input type = "number" name = "bookID"><br />
<input type = "submit" name = "submit">
<input type = "submit" name = "goBack" value = "Return to Main Menu">
</form>

<?php



if(isset($_POST['submit']))
{
	// Include connection to the DB
	include_once 'C:\xampp\htdocs\LoginSystemTest\Includes\dbh.inc.php';
	$bookID = '$_POST[bookID]';

	// Query Delete entry from borrowed table
	//$sql = "Delete from borrowed where bookID='$_POST[bookID]'";

	// New Query
	$sql="INSERT INTO returned (bookID,cardNumber,checkOutDate,dueDate)
	SELECT bookID,cardNumber,checkOutDate,dueDate
	FROM borrowed
	WHERE '$_POST[bookID]' = borrowed.bookID;";

	
	
	$sql2 = "DELETE FROM borrowed WHERE bookID='$_POST[bookID]';";
	
	
		date_default_timezone_set('America/Chicago');
	$date = date('Y-m-d', time());
//	echo $date;
	
	$sql3 = "UPDATE returned
				SET ReturnDate = '$date'
				WHERE bookID = '$_POST[bookID]';";
	
	echo $sql3;	
	

// Check for late books
	$sql4 = "UPDATE returned
				SET late = true
				WHERE dueDate < ReturnDate";
	
	mysqli_query($conn, $sql);
	mysqli_query($conn, $sql2);
	mysqli_query($conn, $sql3);
	mysqli_query($conn, $sql4);
	
	//echo "Successfully returned book: '$_POST[bookID]'"; 

	// Over due books
	//SELECT * FROM `returned` WHERE dueDate < ReturnDate;
}

	


?>
<br>


</article>





<footer>Sp18 CSCI 2050-90 - Aaron, Lydia, Riley</footer>
</div>
</body>
</html>


