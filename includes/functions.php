<?php
function sanitizeInput($input) {
    // Remove HTML tags and encode special characters
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

    // Strip any slashes (in case magic quotes are on)
    $input = stripslashes($input);

    // Remove any SQL comments or commands
    $input = preg_replace('/(--|#|;)/', '', $input);

    return $input;
}


//image filter
function imgF($file, $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'], $maxSize = 2 * 1024 * 1024) {
    // Check if file was uploaded without errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Error during file upload.');
    }

    // Get the file extension
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // Validate file type
    if (!in_array($fileExtension, $allowedTypes)) {
        throw new Exception('Invalid file type. Allowed types: ' . implode(', ', $allowedTypes));
    }

    // Validate file size
    if ($file['size'] > $maxSize) {
        throw new Exception('File is too large. Maximum size allowed: ' . ($maxSize / 1024 / 1024) . ' MB.');
    }

    // Optionally validate image dimensions
    $imageInfo = getimagesize($file['tmp_name']);
    if ($imageInfo === false) {
        throw new Exception('File is not a valid image.');
    }

    // Optional: validate image dimensions (e.g., max width/height)
    $maxWidth = 2000;
    $maxHeight = 2000;
    if ($imageInfo[0] > $maxWidth || $imageInfo[1] > $maxHeight) {
        throw new Exception('Image dimensions are too large. Maximum allowed dimensions: ' . $maxWidth . 'x' . $maxHeight);
    }

    return $file;
}


/*
try {
    // Validate and process image file
    $image = validateImage($_FILES['image']);

    // Validate and process address
    $address = validateAddress($_POST['address']);

    // Proceed with further processing (e.g., database storage, file upload)
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

// Example usage
try {
    $email = validateEmail($_POST['email']);
    $username = validateUsername($_POST['username']);
    $password = validatePassword($_POST['password']);

    // Proceed with further processing (e.g., database storage)
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}*/


//number filter
function numF($val){
    $num = sanitizeInput($val);
    if (!preg_match('/^[0-9]+$/', $num)) {
        throw new Exception('Invalid number: Only numbers are allowed.');
    }
    return $num;
}

//text filter
function textF($val){
    // Sanitize and validate username (only letters, numbers, and underscores)
    $username = sanitizeInput($val);
    if (!preg_match('/^[a-zA-Z0-9\s,-._+]+$/', $username)) {
        throw new Exception('Invalid username: Only letters, numbers, and underscores are allowed.');
    }
    return $username;
}

//email filter
function emailF($val){
    $email = sanitizeInput($val);
     // Sanitize and validate email
     $email = filter_var($email, FILTER_SANITIZE_EMAIL);
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         throw new Exception('Invalid email address');
     }
     return $email;
}

//address filter
function addressF($val){
    // Sanitize the address input
    $address = sanitizeInput($val);

    // Basic validation: ensure address contains only valid characters
    if (!preg_match('/^[a-zA-Z0-9\s,_+.-]+$/', $address)) {
        throw new Exception('Invalid address: Only letters, numbers, spaces, commas, periods, and dashes are allowed.');
    }

    // Optional: additional checks (e.g., length, specific formatting requirements)
    /*if (strlen($address) < 5 || strlen($address) > 255) {
        throw new Exception('Invalid address: Length must be between 5 and 255 characters.');
    }*/

    return $address;
}


function passF($val){
     // Sanitize password (assuming the password will be hashed)
     $password = sanitizeInput($val);

     // Optionally, enforce strong password rules (e.g., minimum length, complexity)
     /*if (strlen($password) < 8) {
         throw new Exception('Password must be at least 8 characters long.');
     }
     if (!preg_match('/[A-Z]/', $password)) {
         throw new Exception('Password must contain at least one uppercase letter.');
     }
     if (!preg_match('/[a-z]/', $password)) {
         throw new Exception('Password must contain at least one lowercase letter.');
     }
     if (!preg_match('/\d/', $password)) {
         throw new Exception('Password must contain at least one number.');
     }*/
     if (preg_match('/(--|#|;)/', $password)) {
         throw new Exception('Password must not contain these special character #,|,-,;,).');
     }
 
     return $password;
}



function redirect($doj) {
	header('location: ' . $doj);
	exit;
}
function mysql_prep($value) {

		//$magic_quotes_active = get_magic_quotes_gpc();
		//$new_enough_php = function_exists("mysql_real_escape_string"); //php >= v4.3.0
		//if ($new_enough_php) {
			//undo magic quote effects
		//	if ($magic_quotes_active) {
		//		$value = stripslashes($value);}
		//		$value = mysql_real_escape_string($value);
		//} else { // < php v4.3.0
		//	if (!magic_quotes_active) {
		//		$value = addslashes($value);}}
return $value;
	}
	function ucsecond($dis) {

	}

function ucthird($dis) {
		
	}
	function uclast($dis) {
		
	}

	
	function Get_User_Ip()
{
    $IP = false;
    if (getenv('HTTP_CLIENT_IP'))
    {
        $IP = getenv('HTTP_CLIENT_IP');
    }
    else if(getenv('HTTP_X_FORWARDED_FOR'))
    {
        $IP = getenv('HTTP_X_FORWARDED_FOR');
    }
    else if(getenv('HTTP_X_FORWARDED'))
    {
        $IP = getenv('HTTP_X_FORWARDED');
    }
    else if(getenv('HTTP_FORWARDED_FOR'))
    {
        $IP = getenv('HTTP_FORWARDED_FOR');
    }
    else if(getenv('HTTP_FORWARDED'))
    {
        $IP = getenv('HTTP_FORWARDED');
    }
    else if(getenv('REMOTE_ADDR'))
    {
        $IP = getenv('REMOTE_ADDR');
    }

    //If HTTP_X_FORWARDED_FOR == server ip
    if((($IP) && ($IP == getenv('SERVER_ADDR')) && (getenv('REMOTE_ADDR')) || (!filter_var($IP, FILTER_VALIDATE_IP))))
    {
        $IP = getenv('REMOTE_ADDR');
    }

    if($IP)
    {
        if(!filter_var($IP, FILTER_VALIDATE_IP))
        {
            $IP = false;
        }
    }
    else
    {
        $IP = false;
    }
    return $IP;
}


function com($value)
{
    $ff = [];
    $ff = $value;
    $amouui3 = strlen($value);
    /*$s = 0;
    while($s <= $amouui3){
        $cut = 0;
        if($ff[$s] == '.') {$cut = 1;}
        if($cut == 1){$ff[$s] = NULL;}
        $s += 1;
    }*/

 $am = $ff;

    if(($amouui3 > 3) && ($amouui3 < 7)){
    $owp = 0;
    $owp2 = 3;
    $amouui = [];
    $amouui = $am;
    $odbsyy = $amouui3;
    //echo '<em>&#8358;';

while ($odbsyy > $owp2) {
echo $amouui[$owp];
$owp++;
$owp2++;
}
echo ',' . $amouui[$odbsyy - 3] . $amouui[$odbsyy - 2] . $amouui[$odbsyy - 1];
}else if($amouui3 > 6){
  $owp = 0;
    $owp2 = 6;
    $amouui = [];
    $amouui = $am;
    $odbsyy = $amouui3;
    //echo '<em>&#8358;';

while ($odbsyy > $owp2) {
echo $amouui[$owp];
$owp++;
$owp2++;
}
echo ',' . $amouui[$odbsyy - 6] . $amouui[$odbsyy - 5] . $amouui[$odbsyy - 4] . ',' . $amouui[$odbsyy - 3] . $amouui[$odbsyy - 2] . $amouui[$odbsyy - 1];

}else{
 echo $value;
}

}




function alpl($value)
{
    if ($value == 1) {$alps = 'a';} elseif ($value == 2) {$alps = 'r';} elseif ($value == 3) {$alps = 'e';} elseif ($value == 4) {$alps = 'd';} elseif ($value == 5) {$alps = 'b';} elseif ($value == 6) {$alps = 'q';} elseif ($value == 7) {$alps = 'h';} elseif ($value == 8) {$alps = 'j';} elseif ($value == 9) {$alps = 'f';} elseif ($value == 10) {$alps = 'x';} elseif ($value == 11) {$alps = 'y';} elseif ($value == 12) {$alps = 'z';} elseif ($value == 13) {$alps = 'l';} elseif ($value == 14) {$alps = 'k';} elseif ($value == 15) {$alps = 'g';}
    return $alps;
}




?>