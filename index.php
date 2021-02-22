<?php session_start();
require_once 'box_form_class.php';
 ?>
<html>
<head>
<link rel="stylesheet" href="./css/bootstrap.min.css" >
<script src="./js/bootstrap.min.js" > </script> 
<script>
function redirecttoAddnew()
 {

  document.location.href = 'add_new_box.php';
  return false;
 } 
 </script>


</head>
<body>
<div id="mainDivlist" class="mainDivListCls mt-5 ml-5" >
<p class="h1 mb-5">Box Management</p>


<div class = "addNew mb-5">
		<input class="btn btn-primary" onclick="redirecttoAddnew();" type="button" value="Add New Box" id="addNew" />
</div>

<?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
		<div class="mb-3 alert alert-success" >
			<?php echo $_SESSION['success_message']; ?>
		</div>
			<?php unset($_SESSION['success_message']);
	}
   ?>

<?php 
	// Get all box saved data from Db
	$boxData = new boxDataClass();
	//Store data in array 
	$dataArr = $boxData->fetchData();
	if($dataArr){
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Width</th>
      <th scope="col">Lenght</th>
	  <th scope="col">Height</th>
	  <th scope="col">Volume</th>
	  <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  // loop through above array to show data in table
  foreach ($dataArr as $dataRow) { ?>
	
		<tr>
      <th scope="row"><?php echo $dataRow['id'] ?></th>
      <td><?php echo $dataRow['name'] ?></td>
      <td><?php echo $dataRow['width'] ?></td>
      <td><?php echo $dataRow['lenght'] ?></td>
	  <td><?php echo $dataRow['height'] ?></td>
      <td><?php echo $dataRow['volume'] ?></td>
      <td><a href ="add_new_box.php?id=<?php echo $dataRow['id'] ?>" > Edit </a> </td>
    </tr>
   <?php } ?>
  </tbody>
</table>
	<?php } else { ?>
	
	<p> No record(s) found.</p>
	
	<?php } ?>
</div>

</body>
</html>