<?php 
require_once('dbConnect.php');

/** boxDataClass
 *  @author: Pallavi
 *  @date: 22/02/2021
 *  @description: Action process class to implement box model
 *  @variables:
 *  @version: 1.0
 */
class boxDataClass {
	
	/** saveBoxRecords
	 * @author Pallavi
	 * @description This function call on form submit action while adding or updating box data.
	 * @param None
	 */
	public function saveBoxRecords(){
			session_start();
		
		if(!empty($_POST['box_name']) && !empty($_POST['box_width']) && !empty($_POST['box_length'])&& !empty($_POST['box_height'])) { // Check if value exist for mandatory fields 
			try {  
				// Check if row Id exist then update record
				if(!empty($_POST['rowId'])){
					$this->updateData($_POST);
					$_SESSION['success_message'] = "Box data updated successfully.";
				}
				else // insert new record
				{
					$this->insertData($_POST);
					$_SESSION['success_message'] = "Box data saved successfully.";
				}
				
				
			}  
			catch(Throwable  $e) {
			  $_SESSION['error_message'] = "Something went wrong please try again. ".$e->getMessage();
			}
		
		}
		else {
			$_SESSION['error_message'] = "Something went wrong please try again.";
		}
		header("Location: index.php");	

		
	}
	
	
	/** insertData
	 * @author Pallavi
	 * @description This function is used to insert data in required format
	 * @param Form post data array
	 */	
	public function insertData($formData) {
		
		$connectObj = new dbConnectClass();
		$name = $connectObj->connect->real_escape_string($formData['box_name']);
		$width = $connectObj->connect->real_escape_string($formData['box_width']);
		$length = $connectObj->connect->real_escape_string($formData['box_length']);
		$height = $connectObj->connect->real_escape_string($formData['box_height']);
		$volume = $connectObj->connect->real_escape_string($formData['box_volume']);

		$query = $connectObj->connect->prepare("INSERT INTO box_config (name,width,lenght,height,volume) VALUES (?,?,?,?,?)");
		$query->bind_param("siiii", $name,$width, $length, $height, $volume);
		$query->execute(); 	   

	}
	
	/** updateData
	 * @author Pallavi
	 * @description This function is used to update data in required format
	 * @param Form post data array
	 */
	
	public function updateData($formData) {

		$connectObj = new dbConnectClass();
		$name = $connectObj->connect->real_escape_string($formData['box_name']);
		$width = $connectObj->connect->real_escape_string($formData['box_width']);
		$length = $connectObj->connect->real_escape_string($formData['box_length']);
		$height = $connectObj->connect->real_escape_string($formData['box_height']);
		$volume = $connectObj->connect->real_escape_string($formData['box_volume']);
		$id = $connectObj->connect->real_escape_string($formData['rowId']);
	
		$query = $connectObj->connect->prepare("UPDATE box_config SET name=?, width=?,lenght=?, height=?,volume=? WHERE id=?");
		$query->bind_param("siiiii", $name,$width, $length, $height, $volume,$id);
		$query->execute(); 	   

	}
	/** fetchData
	 * @author Pallavi
	 * @description This function is used to fetch records from DB either single record or all records
	 * @param id of record (optional)
	 * return ASSOC array of records
	 */
	public function fetchData($id = false) {
		$connectObj = new dbConnectClass();
		if($id){
			$sql = 'SELECT * FROM box_config where id ='.$id.' limit 1';
			$result  = $connectObj->connect->query($sql);
			$allRows = $result->fetch_array(MYSQLI_ASSOC);
		}
		else
		{
			$sql = 'SELECT * FROM box_config';
			$result  = $connectObj->connect->query($sql);
			$allRows = $result->fetch_all(MYSQLI_ASSOC);
		}
		
		return 	$allRows;
	}
	
	
}

		