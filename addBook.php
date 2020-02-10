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



  <h1>Add Library Book</h1>
    <h2>Book Info</h2>
<form action = "addBook.php" method = "post">
ISBN: <input type = "integer" name = "isbn"><br />
title: <input type = "text" name = "title"><br />
authorID: <input type = "integer" name = "authorID"><br />
quantity: <input type = "integer" name = "quantity"><br />
Please choose a file: <input name="file" type="file" />
<input type = "submit" name = "submit">
<input type = "submit" name = "goBack" value = "Clear">
 
</form>

<?php
if(isset($_POST['submit']))
{
	$con = mysqli_connect('localhost', 'root', '', 'real_deal_lib');
	if(!$con)
	{	
		die("Cannot connect to the database");
	}

	$sql = "INSERT INTO books(isbn,title,authorID,quantity,img) 
		VALUES 
		('$_POST[isbn]', '$_POST[title]','$_POST[authorID]','$_POST[quantity]','$_POST[file]')";
		
	
	mysqli_query($con, $sql);
	
	echo "Successfully added '$_POST[title]'!"; 
}

	

?>

<br>
  <h2>Author Info</h2>
<form action = "addBook.php" method = "post">
Author First Name: <input type = "text" name = "afname"><br />
Author Last Name: <input type = "text" name = "alname"><br />
<input type = "submit" name = "submit">
<input type = "submit" name = "goBack" value = "Clear">
</form>

<?php
if(isset($_POST['submit']))
{
	$con = mysqli_connect('localhost', 'root', '', 'real_deal_lib');
	if(!$con)
	{	
		die("Cannot connect to the database");
	}

	$sql = "INSERT INTO author(alname,afname) 
		VALUES 
		('$_POST[alname]', '$_POST[afname]')";
		
	
	mysqli_query($con, $sql);
	
	echo "Successfully added '$_POST[afname]'!"; 
}

	

?>





</article>
<footer>Sp18 CSCI 2050-90 - Aaron, Lydia, Riley</footer>
</div>
</body>
</html>


