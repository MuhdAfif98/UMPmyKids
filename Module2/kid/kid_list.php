<?php 
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Kid Profile</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
	<style>
        table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	
  }
	</style>
<body>
<ul>
  <li><img src="logo.png" width="150px"></li>
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="../parent_1/Dashboard.php">Parent</a></li>
  <li><a href="kid_list.php">Kid List</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<h2>Update Kid Profile</h2>
<table style= "width : 100%">
	<thead>
		<tr>
            <th>Kid ID</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Date Of Birth</th>
			<th>Race</th>
			<th>Allergy</th>
			<th colspan="2">Action</th>
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
			<td>
				<a href="edit_kid.php?id=<?php echo $row['kidId']; ?>" class="edit_btn" >Update</a></td>
                <td>
                <a href="delete_kid_func.php?kid=<?php echo $row['kidId']; ?>" class="del_btn">Delete</a>
			</td>
			
		</tr>
	<?php } ?>
</table>

</body>
</html>