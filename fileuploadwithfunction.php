<?php $target_dir = "upload/";


if(isset($_POST["submit"])) {
    if ($_FILES['fileToUpload']['error'] === 0) {
    	$status = fileupload($target_dir, $_FILES['fileToUpload']['name'], $_FILES['fileToUpload']['tmp_name']);

    	if($status==1)
    	{
    		echo "file is uploaded";


    	}
    	else
    	{
    		echo "file is not uploaded";
    	}
    	}
   }

 function fileupload($target_dir, $basename, $temp_name)
{
	$target_file = "";
	$image_ext = array("jpg","png","gif","jpeg");
	$doc_ext = array("docx","doc","txt","pdf");
	$file_ext = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));


	 if(in_array($file_ext,$image_ext)){

	   $target_dir .= "img/";  
	   $target_file .= $target_dir.basename($_FILES["fileToUpload"]["name"]);
	   $target_file = $target_dir . basename($basename);
		    if (move_uploaded_file($temp_name, $target_file)) {
		        return 1;
		    } else {
		        return 0;
		    }  
     }else{
     	   	echo "Sorry, only JPG, JPEG, PNG & GIF OR doc, txt, pdf files are allowed files are allowed.<br>"; 
     	   	return 0;	


     }
}
?>