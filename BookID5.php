<?php 

global $bookISBN;
$bookISBN = 9781602706248;
global $imgPath;
$imgPath = 'BookCovers/fire trucks(1).jpg'

 ?>

<<!DOCTYPE html>
<html>
<head>


<!-- Local Style -->
<style> 

.flex-container {
    display: -webkit-flex;
    display: flex;  
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    text-align: left;
	padding-left: 9em;
}

.flex-container > * {
    padding: 15px;
    -webkit-flex: 1 100%;
    flex: 1 100%;
	padding-left: 4em;

}

.article {
    text-align: middle;
	padding-left: 4em;
}

.top
{
	
	background: MediumSeaGreen;color:blue;
	h1 { font-size: 4em }
}

headerT {background: MediumSeaGreen;color:blue;}
footer {background: #aaa;color:white;}

h1 { font-size: 4em }
h3 { font-size: 2em }
@media all and (min-width: 768px) {
   
    .article {-webkit-flex:5 0px;flex:5 0px;-webkit-order:2;order:2;}
    footer {-webkit-order:3;order:3;}
}
</style>
</head>
<body>

<div class="flex-container">


<article class="article">
<?php
	include_once 'header.php';
?>

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

<section class="main-container">
	<div class="main-wrapper">
		<H2> Book Info </H2>
			<img src="<?php echo $imgPath ?>" alt="<?php echo $imgPath ?>" style="width:128px;height:150px;" align="middle">
	</div>
</section>

<!-- Book Info -->
<?php
	include_once 'C:\xampp\htdocs\LoginSystemTest\Includes\dbh.inc.php';

	//Query book info
	//$sql = "SELECT books.authorID,author.authorID, author.afname, books.isbn, author.alname,books.title,books.quantity,books.bookID
	$sql = "SELECT books.authorID,author.authorID, author.afname, books.isbn, author.alname,books.title,books.quantity,books.bookID
FROM books
INNER JOIN author
ON books.authorID = author.authorID WHERE books.isbn = $bookISBN
GROUP BY author.alname";


	$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title = "Title: " .$row["title"];
		$isbn = "ISBN: ".$row["isbn"];
		$authorID = "Authord ID: ".$row["authorID"];
		$quantity = "Copies: ".$row["quantity"];
		$bookID = "Book ID: ".$row["bookID"];
	    $authorFname = "".$row["afname"];
		$authorLname = "".$row["alname"];
		
		// FROMAT OUTPUT
		echo "<b>$title</b><br>$isbn<br>Author: $authorLname,$authorFname<br>$authorID<br>$quantity<br>-------------------------------<br>";
    }
} else {
    echo "<h3 style=color:red;>No available copies</h3>";
}




?>

<H2> Copies Available </H2>
<?php
	include_once 'C:\xampp\htdocs\LoginSystemTest\Includes\dbh.inc.php';
	
/// Available copies query
$sql = "Select * from books where bookID NOT IN (Select bookID from borrowed)AND isbn = $bookISBN";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title = "" .$row["title"];
		$isbn = "ISBN: ".$row["isbn"];
		$authorID = "Authord ID: ".$row["authorID"];
		$quantity = "Copies: ".$row["quantity"];
		$bookID = "Book ID: ".$row["bookID"];
		
		echo "<b><U>$title</b></U><br>$isbn<br>$authorID<br>$quantity<br>$bookID<br>
		<form action=Library_borrow.php method=post>
		<input type=submit name=someAction value=Checkout>
		</form><br><br> ";
    }
} else {
    echo "<h3 style=color:red;>No available copies</h3>";
}

$conn->close();


?>

<?php
	include_once 'footer.php';
?>
<a href="Books.php"><img src="assets/back.png" align="LEFT";"></a>
</article>
<footer>Sp18 CSCI 2050-90 - Aaron, Lydia, Riley</footer>
</div>
</body>
</html>
