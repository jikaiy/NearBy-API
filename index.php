<?php
if(isset($_POST['tag'])&& $_POST['tag']!=''){
	$tag = $_POST['tag'];
	
	require_once 'include/DB_Functions.php';
	$db = new DB_Functions();
	
	$response = array("tag"=>$tag, "success"=>0, "error"=>0);
        
	
	if($tag == 'load'){
		$name = $_POST['name'];
		$locationX = $_POST['locationX'];
		$locationY = $_POST['locationY'];
		
		if($db->isNameExisted($name)){
			$result = $db->updateLocation($name, $locationX, $locationY);
			
		}else{
			$result = $db->loadLocation($name, $locationX, $locationY);
			
		}
		
		
		if($result!=false){
			$response["success"]=1;
			$response["uid"]=$result["uid"];
			$response["user"]["name"] = $result["name"];
			$response["user"]["locationX"]= $result["locationX"];
			$response["user"]["locationY"]= $result["locationY"];
			$response["user"]["created_at"]= $result["created_at"];
			$response["user"]["updated_at"]=$result["updated_at"];
			
			echo json_encode($response);
		}else {
			$response["error"]=1;
			$response["error_msg"]="load location unsuccessfully";
			echo json_encode($response);
		}
	} else if($tag == 'query'){
		
		$name = $_POST['name'];
		
		if($db->isNameExisted($name)==false){
			
			$response["error"]=2;
			$response["error_msg"]="name not found 404 :(";
			echo json_encode($response);
			
		}else{
			
			$result = $db->queryLocation($name);
			
			if($result){
				$response["success"]=1;
				$response["uid"]=$result["uid"];
				$response["user"]["name"] = $result["name"];
				$response["user"]["locationX"]= $result["locationX"];
				$response["user"]["locationY"]= $result["locationY"];
				$response["user"]["created_at"]= $result["created_at"];
				$response["user"]["updated_at"]=$result["updated_at"];
				
				echo json_encode($response);
			}
		}
	}
}else{
	echo "No Post Input";
}
?>
