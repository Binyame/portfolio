<?php
	function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$message = $_POST['message'];

	$email_from = 'binyam@binephi.com';

	$email_subject = "Visitors Greetings";

	$email_body = "User Name: $name.\n".
					"User Email: $visitor_email.\n".
						"User Message: $message.\n";

	$to = "binephrem@gmail.com";

	$headers = "From: $email_from\r\n";

	$headers .= "Reply-To: $visitor_email\r\n";

	mail($to, $email_subject,$email_body,$headers);

	header('Location: index.html');

	exit;
?>

