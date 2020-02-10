<?php
	include_once 'header.php';
?>

<section class="main-container">

<html>
<head>
<!-- Local Style -->
<style> 

.flex-container {
    display: -webkit-flex;
    display: flex;  
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    text-align: center;
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

header {background: MediumSeaGreen;color:white;}
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

 <!-- Top Banner -->
<header>
 
  <img src="assets/HomePageIcon.png" align="left";">
  <img src="assets/HomePageIcon.png" align="right";">
   <h1>Library</h1>
  
</header>

 <!-- Main Conent of the webpage -->
<article class="article">
 
<H2>Welcome</H2>
  <p>This is the library database. View books, pay fines, and more!!!!!</p><br>
<H3> Popular Titles </H3>
  <br><img src="BookCovers/fire trucks.jpg" alt="" style="width:128px;height:150px;">
  <img src="BookCovers/Pachinko.jpg" alt="" style="width:128px;height:150px;">
  <img src="BookCovers/The great alone.jpg" alt="the great alone" style="width:128px;height:150px;">
  <img src="BookCovers/Still me.jpg" alt="still me" style="width:128px;height:150px;">
  <br>
  <H3> News </H3>
  <P> Author James Petterson will be visiting the library for a book reading / signing on April 30th 2018 at 9am. </p>
  <br>
<a class="weatherwidget-io" href="https://forecast7.com/en/45d09n93d01/55110/?unit=us" data-label_1="SAINT PAUL" data-label_2="WEATHER" data-icons="Climacons Animated" data-theme="original" data-basecolor="#1e7b46" >SAINT PAUL WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
</article>



<!-- Bottom of the webpage -->
<footer>Sp18 CSCI 2050-90 - Aaron, Lydia, Riley <br> Hours <br> Monday: 8-5 Tuesday: 8-5 Wednesday: 8-5 Thursday: 8-9 Friday: Closed Saturday-Sunday: 11-4</footer>
</div>

</body>
</html>


	<div class="main-wrapper">

		<?php
			// Include connection to the DB
			include_once 'C:\xampp\htdocs\LoginSystemTest\Includes\dbh.inc.php';
			
			// Run SQL to find if the current user email has admin privileges.
			@$email = $_SESSION['u_email'];
			$sql = "SELECT * FROM patron WHERE email = '$email' AND isAdmin = 1";
			$results = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($results);
			
			// Display for all users
			if(isset($_SESSION['u_email']) AND $resultCheck > 0)
			{
				// If logged in as an admin, display admin sidebar.
				include 'C:\xampp\htdocs\LoginSystemTest\sidebar_loggedin_admin.php';
			}
			else if(isset($_SESSION['u_email']))
			{
				// If logged in, display loggedin sidebar
				include 'sidebar_loggedin.php';
			}
			else 
			{
				// Else display notloggedin sidebar
				include 'C:\xammp\htdocs\LoginSystemTest\sidebar_notloggedin.php';
			};
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>

