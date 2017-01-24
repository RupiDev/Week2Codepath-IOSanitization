<?php

  function h($string="") {
    return htmlspecialchars($string);
  }

  function u($string="") {
    return urlencode($string);
  }

  function raw_u($string="") {
    return rawurlencode($string);
  }

  function redirect_to($location) {
    header("Location: " . $location);
    exit;
  }
  
  function isValidUsername($username)
  {
  	return preg_match('/\A[0-9A-Za-z\_]+\Z/', $username);
  }
  
  function isValidPhoneNumber($phone)
  {
  	return preg_match('/\A[0-9\s\(\)\-]+\Z/', $phone);
  }
  
  function isValidEmail($email)
  {
  	return preg_match('/\A[0-9A-Za-z\@\.\_\-]+\Z/', $email);
  }
  
  function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }
  
  // Custom Validation
  // making it so that the firstname only contains characters, -, ., and space
  function isFirstNameValid($firstName)
  {
  	return preg_match('/\A[A-Za-z\-\.\s]+\Z/', $firstName);
  }
  
  // Custom Validation
  // making it so that the lastname only contains characters, -, ., and space
  function isLastNameValid($lastName)
  {
  	return preg_match('/\A[A-Za-z\-\.\s]+\Z/', $lastName);
  }
  
  // Custom Validation
  // making it so that the telephone only contains digits, -, (, )
  function isTelephone($phone)
  {
  	return preg_match('/\A[0-9\(\)\-]+\Z/', $phone);
  }
  
  // Custom Validation
  // making it so that the telephone only contains characters and a space
  function isStateNameValid($stateName)
  {
  	return preg_match('/\A[A-Za-z\s]+\Z/', $stateName);
  }
  
  // Custom Validation
  // making it so that the code only contains characters and a space
  function isCode($code)
  {
  	return preg_match('/\A[A-Za-z\s]+\Z/', $code);
  }	
  
  // Custom Validation
  // making it so that the position should be a number
  function isPostion($position)
  {
  	return preg_match('/\A[0-9]+\Z/', $position);
  }
  
  // Custom Validation
  // making it so that the territory only contains characters and a space
  function isTerritory($territory)
  {
  	return preg_match('/\A[A-Za-z\s]+\Z/', $territory);
  }
  
  // Custom Validation
  // making it so that the username isn't duplicate
  function checkDuplicateUsername($userName, $db)
  {
  	  $sql = "SELECT * FROM users where username = '$userName'";
  	  $result = db_query($db, $sql);
  	  $get_rows = mysqli_num_rows($result);
  	  
  	  // if true then there is a duplicate value
  	  return $get_rows >= 1;
  	    	  
  }
  
  // Custom Validation
  // making it so that the email isn't duplicate for the salespeople
  function checkSalespersonEmail($email, $db)
  {
  	  $sql = "SELECT * FROM salespeople where email = '$email'";
  	  $result = db_query($db, $sql);
  	  $get_rows = mysqli_num_rows($result);
  	  
  	  // if true then there is a duplicate value
  	  return $get_rows >= 1;
  }
  

  function display_errors($errors=array()) {
    $output = '';
    if (!empty($errors)) {
      $output .= "<div class=\"errors\">";
      $output .= "Please fix the following errors:";
      $output .= "<ul>";
      foreach ($errors as $error) {
        $output .= "<li>{$error}</li>";
      }
      $output .= "</ul>";
      $output .= "</div>";
    }
    return $output;
  }

?>
