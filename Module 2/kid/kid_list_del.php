<?php 
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>UMP-myKids</title>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<meta name="viewport" content="width=device-width initial-scale =1">
    <meta name="description" content="how to create a toggle for light and dark mode using html,css and javascript">
<meta name="description" content="toggle dark/light mode">
<meta name="tags" content="toggle,darkmode,web design,admin dashboard,glassmorphism,codepen">
<meta name="description" content="design a website">
<meta name="description" content="create a glassmorphism website">
    <meta name="keyword" content="dark mode, html,css,javascript, coding, programming, how to,learn">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><link rel="stylesheet" href="../css/index.css">

</head>
<style>
	th, td
{
	background-color:"white";
    padding: 20px;
	width: 10%;
	border:1px solid black;
  border-collapse:collapse;
	text-align: left;
}

.center {
  margin-left: auto;
  margin-right: auto;
}

.msg {
  margin: auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 30%;
    text-align: center;
}

.msg-danger {
  margin: 30px auto; 
  padding: 10px; 
  border-radius: 5px; 
  color: red; 
  background: #dff0d8; 
  border: 1px solid red;
  width: 50%;
  text-align: center;
}
.del_btn {
  text-decoration: none;
  padding: 4px 6px;
  color: white;
  border-radius: 3px;
  background: #808080;
}
</style>
<body>
	<!-- partial:index.partial.html -->
<input type="checkbox" id="nav-toggle"> 

<div class="sidebar">
 	<div class="sidebar-brand">
 		 	<h2><img src="../img/ump.png" alt="" height="40" width="25">&nbsp;<span id="kleenpulse" style="vertical-align: baseline;">UMP myKids</span></h2>
 	</div>
	 <div class="sidebar-menu">
	 	<ul>
	 		<li>
	 			<a href="adminDashboard.php" class="active"><span class="las la-igloo"></span>
	 				<span>Dashboard</span>
	 			</a>
	 		</li>
			<li>
	 			<a href="../parent_1/index.php"><span class="la la-user-circle"></span>
	 				<span>Parent</span>
	 			</a>
	 		</li>
             <li>
	 			<a href="index.php"><span class="la la-user-circle"></span>
	 				<span>Kid</span>
	 			</a>
	 		</li>
	 	</ul>
	 </div>
 </div>

 <div class="main-content">
	<header>
		<h2 class="heading" id="dashboard">
			<label for="nav-toggle">
				<span class="las la-bars"></span>
			</label>
			Delete Kid Profile
		</h2>
		
		<div class="user-wrapper">
			<img src="https://simg.nicepng.com/png/small/128-1280406_view-user-icon-png-user-circle-icon-png.png" alt="" height="40" width="40">
			<div>
				<h4>USER TYPE</h4>
				<small>Admin</small>
			</div>
            <div style="margin-left: 20px;">
                <h3><a style="color: black;" href="function.php?logout='1'">Log Out</a></h3>
            </div>
        </div>
	</header>

<main>
<?php if (isset($_SESSION['message'])): ?>
	<div class="<?php if(str_contains($_SESSION['message'], "Delete Failed")) { echo 'msg-danger';} else {echo 'msg';} ?>">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<div style="margin-left:10%;padding:1px 16px;height:1000px;">
<table class="center">
	<thead>
		<tr>
            <th>Kid ID</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Date Of Birth</th>
			<th>Race</th>
			<th>Allergy</th>
			<th>Action</th>
		</tr>
	</thead>
</div>
	

	<?php 
        $results = mysqli_query($db, "SELECT * FROM kid"); 
        while ($row = mysqli_fetch_array($results)) { 
    ?>
		<tr>
            <td>K<?php echo $row['kidId']; ?></td> 
			<td><?php echo $row['kidName']; ?></td>
			<td><?php echo $row['kidGender']; ?></td>
			<td><?php echo $row['kidDob']; ?></td>
			<td><?php echo $row['kidRace']; ?></td>
			<td><?php echo $row['kidAllergy']; ?></td>
				
			<td style="display:table-cell;"><a href="delete_kid_func.php?kid=<?php echo $row['kidId']; ?>" class="del_btn">Delete</a></td>
		</tr>
	<?php } ?>
</table>
		</main>
		<footer id="footer">
	<p>Copyright 2021, All Right Reserved</p>

</footer>
</div>
<!-- partial -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script><script  src="js/index.js"></script>
</body>
</html>