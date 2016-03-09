<?php
	$destination_path = getcwd().DIRECTORY_SEPARATOR; //Set path to upload the file

	$result = 0;
	$counter = 0;

	//Function to rearrange in an array the keys from $_FILES
	function reArrayFiles($file_post){ 
		$arrFile = array(); 
		$file_count = count($file_post['name']); 
		$file_keys = array_keys($file_post); 
		for ($i=0; $i<$file_count; $i++){ 
			foreach ($file_keys as $key){
				$arrFile[$i][$key] = $file_post[$key][$i];
			} 
		} 
		return $arrFile; 
	}

	$arrFile = reArrayFiles($_FILES['file']);

	foreach ($arrFile as $file) {
		//print 'File Name: ' . $file['name'];
		//print 'File Type: ' . $file['type'];
		//print 'File Size: ' . $file['size'];

		$counter++;

		/* Here we can validate the type or max/min size of the file*/

		$target_path = $destination_path . basename($file['name']);

		if(@move_uploaded_file($file['tmp_name'], $target_path)) { //Set the file in the specified path
		  $result = 1;
		  echo "File ".$counter." uploaded!<br>";
		}
	}	
	sleep(1);
?>