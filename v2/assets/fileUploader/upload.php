<?php
// A dummy php that stores/overwrites whatever images it gets under uploads/
// !Important. Please assign unique names or files with same names may be overwritten!
$allowed = array('png', 'jpg', 'gif', 'bmp');

if(isset($_FILES['upl'])){
	if ($_FILES['upl']['error'] == 0) {

		$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
		if(!in_array(strtolower($extension), $allowed)){
			echo '{"status":"error", "errorMsg":"File extension not accepted."}';
			exit;
		}
		
		if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$_FILES['upl']['name'])){
			echo '{"status":"success", "name":"'.$_FILES['upl']['name'].'", "size":"'.$_FILES['upl']['size'].'"}'; 
			exit; // Server stored the file successfully
		} else {
			echo '{"status":"error", "errorMsg":"Server could not store file."}';
			exit;
		}

	} else if ($_FILES['upl']['error'] <= 2) {
		echo '{"status":"error", "errorMsg":"File is too large."}';
		exit; // Refer to php.ini or html form
	}
}

echo '{"status":"error", "errorMsg":"File upload unsuccessful."}';
exit;

?>