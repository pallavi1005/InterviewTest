<?php session_start();
require_once 'box_form_class.php';
 ?>
<html>
<head>
<link rel="stylesheet" href="./css/bootstrap.min.css" >
<script src="./js/bootstrap.min.js" > </script> 
<script>
function calculateVolume()
 {
	 let volume;
	 let widthVal = document.getElementById('box_width_id').value;
	 let lengthVal = document.getElementById('box_length_id').value;
	 let heightVal = document.getElementById('box_height_id').value;
	 
	 if(widthVal && lengthVal && heightVal){
		 volume = widthVal*lengthVal*heightVal;
		 volume = volume.toFixed(2);
		 document.getElementById('box_volume_id').value = volume;
	 }
		
	  
  return false;
 } 
 function redirecttoIndex()
 {

  document.location.href = 'index.php';
  return false;
 } 
 
 
 
 </script>


</head>
<body>

<div id="mainDiv" class="mainDivCls mt-5 ml-5" style="width:50%">
<p class="h1">Add new box</p>

	
   
   <?php if (isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])) { ?>
		<div class="mb-3 alert alert-danger" >
			<?php echo $_SESSION['error_message']; ?>
		</div>
			<?php unset($_SESSION['error_message']);
	}
   ?>
   
   <?php 
   $dataArr = [];
   if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		if($id){
			$boxData = new boxDataClass();
			$dataArr = $boxData->fetchData($id);
		}
   }

   ?>
					
	<form action="box_form.php" method="post" id="boxId" class="row g-3 needs-validation"  >

		<input type = "hidden" name="rowId" value = "<?php if(isset($dataArr['id'])) echo $dataArr['id'] ?>">
		<div class="input-group mb-3">
			<input type="text" class="form-control"   name="box_name" placeholder="Name" aria-label="Name" value = "<?php if(isset($dataArr['name'])) echo $dataArr['name'] ?>" required>
		</div>
		<div class="input-group mb-3">
			<input type="number" class="form-control" id="box_width_id" name="box_width" placeholder="Width" value = "<?php if(isset($dataArr['width'])) echo $dataArr['width'] ?>" aria-label="Width" onkeyup="calculateVolume();" required >
		</div>
		<div class="input-group mb-3">
			<input type="number" class="form-control" id="box_length_id" name="box_length" placeholder="Length" value = "<?php if(isset($dataArr['lenght'])) echo $dataArr['lenght'] ?>"  aria-label="Lenght" onkeyup="calculateVolume();" required>
		</div>
		<div class="input-group mb-3">
			<input type="number" class="form-control" id="box_height_id" name="box_height" placeholder="Height" value = "<?php if(isset($dataArr['height'])) echo $dataArr['height'] ?>" aria-label="Height" onkeyup="calculateVolume();" required>
		</div>
		<div class="input-group mb-3">
			<input type="number" class="form-control" id="box_volume_id" name="box_volume" value = "<?php if(isset($dataArr['volume'])) echo $dataArr['volume'] ?>" placeholder="Volume" aria-label="Volume" readonly="true" >
		</div>
		
		
	
		<div id="submitBtn" class="submitBtn  mt-3" >
			<input class="btn btn-primary " type="submit" value="Save" id="save" />
			<input class="btn btn-light  " type="button" value="Back" id="back" onclick="redirecttoIndex();" />
		</div>

		
	</form>
</div>
</body>
</html>