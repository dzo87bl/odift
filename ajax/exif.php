<?php

	/* headers */
	header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

	/* error reporting */
	error_reporting(E_ALL);
	//set_error_handler("var_dump");
	ini_set('display_errors', 0);
	//ini_set("log_errors", 0);
	//ini_set("error_log", $_SERVER ["DOCUMENT_ROOT"] . "/error_log.txt");

	/* config */
	set_time_limit(120);

	/* variables to return */
	$info = null;
	$error = 0;
	$msg = null;

	/* functions */
	function readExif($img) {
		$exif = exif_read_data($img, 0, true);
		echo $img . ":<br/>\n";
		echo $exif === false ? "No header data found.<br/>\n" : "Image contains headers<br/>\n";
		foreach ($exif as $key => $section) {
			foreach ($section as $name => $val) {
				echo "<tr><td>$key</td><td>$name</td><td><span class=\"label label-default\">$val</span><br/></td>\n</tr>";
			}
		}
	}

	function removeExif($old, $new){
		$f1 = fopen($old, 'rb');
		$f2 = fopen($new, 'wb');

		// Find EXIF marker
		while (($s = fread($f1, 2))) {
			$word = unpack('ni', $s)['i'];
			if ($word == 0xFFE1) {
				// Read length (includes the word used for the length)
				$s = fread($f1, 2);
				$len = unpack('ni', $s)['i'];
				// Skip the EXIF info
				fread($f1, $len - 2);
				break;
			} else {
				fwrite($f2, $s, 2);
			}
		}

		// Write the rest of the file
		while (($s = fread($f1, 4096))) {
			fwrite($f2, $s, strlen($s));
		}

		fclose($f1);
		fclose($f2);
	}

	/* get the request parameter */	
	if ( isset( $_REQUEST['file_path'] ) && !empty( $_REQUEST['file_path'] ) ) {
		$img = $_REQUEST['file_path'];
	}
	
	/* action */
	if ( $_REQUEST['exif'] == 0 ) {
	    $info = 1;
		$error = 0;
		$exif = exif_read_data($img, 0, true);
		$msg .= $img . ":<br/>\n";
		$msg .= $exif === false ? "No header data found.<br/>\n" : "Image contains headers<br/>\n";
		foreach ($exif as $key => $section) {
			foreach ($section as $name => $val) {
				$msg .= "
					<tr>
						<td>$key</td><td>$name</td><td><span class=\"label label-default\">$val</span><br/></td>\n
					</tr>
				";
			}
		}
	} else if ( $_REQUEST['exif'] == 1 ) {
		$info = 2;
		$error = 0;
		
		$f1 = fopen($img, 'rb');
		$ext = pathinfo($img, PATHINFO_EXTENSION);
		$file = time() . '.' . $ext;
		$f2 = fopen($file, 'wb');

		// Find EXIF marker
		while (($s = fread($f1, 2))) {
			$word = unpack('ni', $s)['i'];
			if ($word == 0xFFE1) {
				// Read length (includes the word used for the length)
				$s = fread($f1, 2);
				$len = unpack('ni', $s)['i'];
				// Skip the EXIF info
				fread($f1, $len - 2);
				break;
			} else {
				fwrite($f2, $s, 2);
			}
		}

		// Write the rest of the file
		while (($s = fread($f1, 4096))) {
			fwrite($f2, $s, strlen($s));
		}

		fclose($f1);
		fclose($f2);

		$msg .= $file;
	} else {
		
	}
	
	/* delete existing file */
	/* if ( is_file( $file ) ) {
		unlink( $file );
	} */
	
	/* debug */
	/*ob_start();
	echo print_r($_REQUEST);
	echo print_r($file);
	echo print_r($_SERVER['DOCUMENT_ROOT']);
	echo print_r($msg);
	$data = ob_get_clean();
	$fp = fopen("debug.txt", "w");
	fwrite($fp, $data);
	fclose($fp);*/
	
	/* return variables */
	$return = array(
		'info' => $info,
		'error' => $error,
		'msg' => $msg
	);
	echo json_encode( $return );
	
?>