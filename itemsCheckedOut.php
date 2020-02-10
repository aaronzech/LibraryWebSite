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


<h2>Items Checked Out Log </h2>

<?php


include 'C:\xampp\htdocs\LoginSystemTest\sidebar_loggedin_admin.php';

//$sql = "SELECT * FROM books WHERE isbn = 9781536609509";
$sql = "Select *
from books
where bookID IN (Select bookID from borrowed);";
//Select * from books where bookID IN (Select bookID from borrowed)AND isbn = 9781536609509 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th>title</th><th>isbn</th><th>authorID</th><th>bookID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title = "" .$row["title"];
		$isbn = "".$row["isbn"];
		$authorID = "".$row["authorID"];
		$quantity = "".$row["quantity"];
		$bookID = "".$row["bookID"];
		
		echo "<tr><td>$title</td><td>$isbn</td><td>$authorID</td><td>$bookID<td></tr>";
		
		
	
    }
	echo "</table>";
} else {
    echo "No copies available";
}




?>

</article>


<br>


<footer>Sp18 CSCI 2050-90 - Aaron, Lydia, Riley</footer>
</div>
</body>
</html>


