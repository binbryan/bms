<?php
const SITE_URL = 'http://localhost';

function uploadMedia(string $fileName, string $tmpFileName){
	// Store the target directory and target file.
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($fileName);

	// Store file type.
	$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	if ($fileType != 'jpeg' && $fileType != 'jpg' && $fileType != 'png' && $fileType != 'gif' && !empty($error_message)) {
		
		// Store an error message if the file could not be moved successfully.
		echo "Error try to upload this file ". $fileName;

	} elseif ($fileType != 'mp4' && $fileType != 'mp3' && $fileType != '3gpp' && $fileType != '3gp' && !empty($error_message)) {
		
		// Store an error message if the file could not be moved successfully.
		echo "Error try to upload this file ". $fileName;

	} else {
		if ($fileType = 'jpeg' && $fileType = 'jpg' && $fileType = 'png' && $fileType = 'gif' && $fileType != 'mp4' && $fileType != 'mp3' && $fileType != '3gpp' && $fileType != '3gp' && $fileType != 'wmv') {
			/*$target_dir .= "img/";*/

			$target_file = $target_dir . basename($_FILES['upload']['name']);


			// Check if the file exsits.
			if (file_exists($target_file)) {
				// Store an error message
				var_dump($fileName);
			} else {
				// New file's url.
				$fileLink = SITE_URL .'/'. $target_dir;
				echo "<br>";
				echo "<br>";
				var_dump($fileLink);
				echo "<br>";
				echo "<br>";

 				// Upload file if there are no errors.
				if (!move_uploaded_file($tmpFileName, $target_file)) {
					echo "Sorry, something went wrong try to upload " . $fileName;
				} else {
					/*$id = null;
					$link = $fileLink;
					$type = $splitLink['3'];
					$uploadedOn = null;

					// Inset into database
					$mediaFile = new Library($id, $link, $type, $uploadedOn);
					$mediaFile->insert();

					return true;*/
				}
			}
		} else {
			// Error message
			echo "Sorry, something went wrong tring to process the file.";
		}
	}
}


var_dump($_FILES);
echo "<br>";
echo "<br>";

// file to be uploaded.

if (isset($_FILES['upload'])) {
	if (empty($_FILES['upload']['name'])) {
		// Store an error message.
		$error = "You need to select a profile picture";
	} else {
		$target_dir = "uploads/";
		
		// file to be uploaded.
		$fileName = "BMS_IMG_". $_FILES['upload']['name']; // add a prefix to the file name.

		// tmp file path.
		$tmpFileName = $_FILES['upload']['tmp_name'];

		// Try uploading the file.
		if (uploadMedia($fileName, $tmpFileName) == true) {?>
			<script type="text/javascript">
				$(document).ready(function(){
					alert('Uploaded Successfully');
				});
			</script>
		<?php }

	}
}

echo "<br>";
echo "<br>";
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
	<div style="width: 50%; margin: 10px auto; padding: 15px; height: auto; border-radius: 10px; box-shadow: 0 1px 6px rgba(147, 147, 147, 0.7);">
		
		<?php if (isset($error)): ?>
			
			<p><?php echo $error; ?></p>

		<?php elseif (isset($message)): { ?>
			
			<p><?php echo $message; ?></p>
			
		<?php }

		endif ?>

		<input type="file" name="upload" value="<?php echo $_FILES['upload']['name'] ?>" />
		<br/>
		<input type="submit" value="Upload" />
	</div>	
</form>