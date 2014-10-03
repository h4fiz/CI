<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class image_upload 
{
	public function upld_img($img_tmp,$img_type,$img_size,$img_name)
	{
		############ Edit settings ##############
		$thumb_square_size 			= 200; //Thumbnail will be 200x200
		$big_image_max_size 		= 500; //Image Maximum height or width
		$thumb_prefix				= "thumb_"; //Normal thumb Prefix
		$dest_directory				= './uploads/'; //specify upload directory ends with / (slash)
		$quality 					= 90; //jpeg quality
		##########################################

		//check if this is an ajax request
		if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']))
		{
			die();
		}

		// check $_FILES['ImageFile'] not empty
		if(!is_uploaded_file($file_tmp))
		{
			die('Something wrong with uploaded file, something missing!'); // output error when above checks fail.
		}
		// Random number will be added after image name
		$rnd_number 	= rand(0, 9999999999);

		$img_name 		= str_replace(' ','-',strtolower($img_name)); //get image name

		//Let's check allowed $ImageType, we use PHP SWITCH statement here
		switch(strtolower($img_type))
		{
			case 'image/png':
				//Create a new image from file 
				$CreatedImage =  imagecreatefrompng($img_tmp);
				break;
			case 'image/gif':
				$CreatedImage =  imagecreatefromgif($img_tmp);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				$CreatedImage = imagecreatefromjpeg($img_tmp);
				break;
			default:
				die('Unsupported File!'); //output error and exit
		} 
	}

	public function proses_upld($image_name_org,$image_size,$tmp_src,$image_type,$image_error,$file_move,$image_name) 
	{
		$allowed_exts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $image_name_org);
		$extension = end($temp);

		if ((($image_type == "image/gif")
		|| ($image_type == "image/jpeg")
		|| ($image_type == "image/jpg")
		|| ($image_type == "image/pjpeg")
		|| ($image_type == "image/x-png")
		|| ($image_type == "image/png"))
		&& ($image_type < 200000)
		&& in_array($extension, $allowed_exts)) 
		{
			if ($image_error  > 0) 
			{
				$hasil_upload =  "0#"."Return Code: " .$image_error. "<br>";
			} 
			else 
			{
				// $hasil_upload = "1#"."Upload: ".$image_name."<br>".
				// 				"Type: " .$image_type. "<br>".
				// 				"Size: " .($image_size / 1024)." kB<br>".
				// 				"Temp file: " .$tmp_src."<br>";
				$hasil_upload = "1#$image_name";

				
				if (file_exists($file_move.$image_name)) 
				{

		  			$hasil_upload =  $hasil_upload.$image_name. " already exists. ";
				} 
				else 
				{
		  			move_uploaded_file($tmp_src,$file_move.$image_name);
		  			$hasil_upload =  $hasil_upload."Stored in: ".$file_move.$image_name;
				}
			}
		} 
		else 
		{
			$hasil_upload = "2#"."Invalid file";
		}

		return $hasil_upload;
	}

	public function proses_upld2($image_name_org,$image_size,$tmp_src,$image_type,$image_error,$file_move,$image_name) 
	{
		$allowed_exts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $image_name_org);
		$extension = end($temp);

		if ((($image_type == "image/gif")
		|| ($image_type == "image/jpeg")
		|| ($image_type == "image/jpg")
		|| ($image_type == "image/pjpeg")
		|| ($image_type == "image/x-png")
		|| ($image_type == "image/png"))
		&& ($image_type < 200000)
		&& in_array($extension, $allowed_exts)) 
		{
			if ($image_error  > 0) 
			{
				$hasil_upload =  "0#"."Return Code: " .$image_error. "<br>";
			} 
			else 
			{
				// $hasil_upload = "1#"."Upload: ".$image_name."<br>".
				// 				"Type: " .$image_type. "<br>".
				// 				"Size: " .($image_size / 1024)." kB<br>".
				// 				"Temp file: " .$tmp_src."<br>";
				$hasil_upload = "1#$image_name";

				
				// if (file_exists($file_move.$image_name)) 
				// {
		  // 			$hasil_upload =  $hasil_upload.$image_name. " already exists. ";
				// } 
				// else 
				// {
		  			move_uploaded_file($tmp_src,$file_move.$image_name);
		  			$hasil_upload =  $hasil_upload."Stored in: ".$file_move.$image_name;
				//}
			}
		} 
		else 
		{
			$hasil_upload = "2#"."Invalid file";
		}

		return $hasil_upload;
	}

	// This function will proportionally resize image 
	function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
	{
		//Check Image size is not 0
		if($CurWidth <= 0 || $CurHeight <= 0) 
		{
			return false;
		}
		
		//Construct a proportional size of new image
		$ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 
		$NewWidth  			= ceil($ImageScale*$CurWidth);
		$NewHeight 			= ceil($ImageScale*$CurHeight);
		$NewCanves 			= imagecreatetruecolor($NewWidth, $NewHeight);
		
		// Resize Image
		if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
		{
			switch(strtolower($ImageType))
			{
				case 'image/png':
					imagepng($NewCanves,$DestFolder);
					break;
				case 'image/gif':
					imagegif($NewCanves,$DestFolder);
					break;			
				case 'image/jpeg':
				case 'image/pjpeg':
					imagejpeg($NewCanves,$DestFolder,$Quality);
					break;
				default:
					return false;
			}
		//Destroy image, frees memory	
		if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
		return true;
		}

	}

	//This function corps image to create exact square images, no matter what its original size!
	function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType)
	{	 
		//Check Image size is not 0
		if($CurWidth <= 0 || $CurHeight <= 0) 
		{
			return false;
		}
		
		//abeautifulsite.net has excellent article about "Cropping an Image to Make Square bit.ly/1gTwXW9
		if($CurWidth>$CurHeight)
		{
			$y_offset = 0;
			$x_offset = ($CurWidth - $CurHeight) / 2;
			$square_size 	= $CurWidth - ($x_offset * 2);
		}else{
			$x_offset = 0;
			$y_offset = ($CurHeight - $CurWidth) / 2;
			$square_size = $CurHeight - ($y_offset * 2);
		}
		
		$NewCanves 	= imagecreatetruecolor($iSize, $iSize);	
		if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size))
		{
			switch(strtolower($ImageType))
			{
				case 'image/png':
					imagepng($NewCanves,$DestFolder);
					break;
				case 'image/gif':
					imagegif($NewCanves,$DestFolder);
					break;			
				case 'image/jpeg':
				case 'image/pjpeg':
					imagejpeg($NewCanves,$DestFolder,$Quality);
					break;
				default:
					return false;
			}
		//Destroy image, frees memory	
		if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
		return true;

		}
		  
	}
}