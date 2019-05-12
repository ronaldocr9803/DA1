<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include('../inc/myconnect1.php');
		if (($_SERVER['REQUEST_METHOD'] === 'POST') &&
		    (isset($_FILES['files']))) 
		{

		    $files = $_FILES['files'];
		    $names      = $files['name'];
		    $types      = $files['type'];
		    $tmp_names  = $files['tmp_name'];
		    $errors     = $files['error'];
		    $sizes      = $files['size'];


		    $numitems = count($names);
		    $numfiles = 0;
		        for ($i = 0; $i < $numitems; $i ++) 
		        {
		            //Kiểm tra file thứ $i trong mảng file, up thành công không
		            if ($errors[$i] == 0)
		            {        
		                //echo "Bạn upload file thứ $numfiles:<br>";
		                //echo "Tên file: $names[$i] <br>";
		               // echo "Lưu tại: $tmp_names[$i] <br>";
		                //echo "Cỡ file: $sizes[$i] <br><hr>";
		                $x=$names[$i];
		                if(NotExist($x))
		                {
		                	$numfiles++;  
		                	$query ="INSERT INTO picture(idSubcat,pic) VALUES (1,'{$x}')";

				             $result=mysqli_query($dbc,$query);
				                //Code xử lý di chuyển file đến thư mục cần thiết ở đây
				            move_uploaded_file($tmp_names[$i], "../subcatimg/".".$names[$i]");	
				            
		                }
		                else
		                {
		                	echo "file ".$x." đã tồn tại<br>";
		                }		
		                             
		               /* $query ="INSERT INTO picture(idSubcat,pic) VALUES (1,'{$x}')";

		                $result=mysqli_query($dbc,$query);
		                //Code xử lý di chuyển file đến thư mục cần thiết ở đây
		                move_uploaded_file($tmp_names[$i], "../subcatimg/".".$names[$i]");*/
		            }
		        }
		        echo "Tổng số file upload: " .$numfiles;    
		}
	?>
	<form method="POST" enctype="multipart/form-data">
	<td class="lefttxt">Upload Pic  </td><td><input type="file" name="files[]" multiple /></td>
	<input type="submit" value="Tải lên" name="submit"/>
	</form>

	
</body>
</html>

<?php 
	function NotExist($x)
 {
 	include('../inc/myconnect1.php');
 	$check="SELECT pic from picture";
	$checkresult=mysqli_query($dbc,$check);
	while ($data=mysqli_fetch_array($checkresult,MYSQLI_ASSOC)) 
	{
		if($x==$data['pic'])
		{
			return false;
		}	
	}
	return true;
 }
 ?>


<?php 

	/*	include('../inc/myconnect1.php');
		if(isset($_POST['submit']))
		{
			$targetDir = "../subcatimg/";
    		$allowTypes = array('jpg','png','jpeg','gif');
    		$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    		if(!empty(array_filter($_FILES['files']['name'])))
    		{
	        	foreach($_FILES['files']['name'] as $key=>$val)
	        	{
	            // File upload path
	            	$fileName = basename($_FILES['files']['name'][$key]);
	           		 $targetFilePath = $targetDir . $fileName;
	            
	            // Check whether file type is valid
	            	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		            if(in_array($fileType, $allowTypes))
		            {
		                // Upload file to server
		                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath))
		                {
		                    // Image db insert sql
		                    //$insertValuesSQL .= "('".$fileName."', NOW()),"; //Concatenation 
		                    $insertValuesSQL .= "('".$fileName."'),";
		                    echo $insertValuesSQL;
		                }
		                else
		                {
		                    $errorUpload .= $_FILES['files']['name'][$key].', ';
		                }
		            }
		            else
		            {
		                $errorUploadType .= $_FILES['files']['name'][$key].', ';
		            }
	        	}
        
		        if(!empty($insertValuesSQL))
		        {
		            $insertValuesSQL = trim($insertValuesSQL,',');
		            echo $insertValuesSQL;
		            // Insert image file name into database
		            $insert = $db->query("INSERT INTO picture (idSubcat, pic) VALUES $insertValuesSQL");
		            if($insert){
		                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
		                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
		                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
		                $statusMsg = "Files are uploaded successfully.".$errorMsg;
		            }else{
		                $statusMsg = "Sorry, there was an error uploading your file.";
		            }
		        }
    		}
		    else
		    {
		        $statusMsg = 'Please select a file to upload.';
		    }
    
    // Display status message
    echo $statusMsg;
		}*/
	 ?> 