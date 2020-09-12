<?php

function Connection()
{
    $con=mysqli_connect("localhost","id8335755_akshu","Akshu@123","id8335755_akshu");
    
    //$con=mysqli_connect("localhost","root","","akshu");
    return $con;
	

}

function SendContactUs($Name,$Email,$Phone,$Message)
{
    $con=Connection();

    $insert="insert into akshutable(Name,Email,Phone,Message) values('$Name','$Email','$Phone','$Message')";
	$run=mysqli_query($con,$insert);

   if(!$run){
	    echo "<script>alert('not inserted into database')</script>";
   }
   
   
       
   
    
    //echo mysqli_error($con);
	$Name=$_POST['Name'];
	$Email=$_POST['Email'];
	$Phone=$_POST['Phone'];
	$Message=$_POST['Message'];
	
	

    $to='akshuaggarwal25@gmail.com';

    $from = "$Email";
    $subject = "Mail from my Site";
    $message='
<table width="90%" border="2">
<tr ><td>Name</td><td>'.$Name.'</td></tr>
<tr ><td>Email</td><td>'.$Email.'</td></tr>
<tr ><td>Mobile</td><td>'.$Phone.'</td></tr>
<tr ><td>Message</td><td>'.$Message.'</td></tr>
</table>';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$from."\r\n".
      'Reply-To: '.$from."\r\n" .
      'X-Mailer: PHP/' . phpversion();

    $ok = mail($to, $subject, $message, $headers);
	
	if($ok)
	{
		echo "<script>alert('Send Successfully Massage')</script>";
	}
	else
	{
		echo "<script>alert('Something went to wrong. Please, Try Again...')</script>";
	}

}
if(isset($_POST['Button']))
{
    SendContactUs($_POST['Name'],$_POST['Email'],$_POST['Phone'],$_POST['Message']);
}?>