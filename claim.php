<?php
$room = $_POST['room'];

if(strlen($room)>20 or strlen($room)<2)
{
	$message  = 'please choose name between 2 to 20 characters';
	echo '<script language="javascript">';
	echo  'alert("' . $message . '");';
	echo  'window.location="http://localhost/mychatroom";';
	echo  '</script>';
}
else if(!ctype_alnum($room)) 

{

	$message  = 'please choose a alphanumaric room name';
	echo '<script language="javascript">';
	echo  'alert(" ' . $message . '");';
	echo  'window.location="http://localhost/mychatroom";';
	echo  '</script>';
}

else
{
include 'db_connect.php';
}


$sql = "SELECT * FROM `rooms` WHERE roomname = '$room'";
$result = mysqli_query($conn, $sql);
if($result)
{
    if(mysqli_num_rows($result)>0){
    		$message  = 'please choose another name this name is already exist plase try again!';
			echo '<script language="javascript">';
			echo  'alert(" ' . $message . '");';
			echo  'window.location="http://localhost/mychatroom";';
			echo  '</script>';
    }
    else{
    	$sql = "INSERT INTO `rooms` (`roomname`, `stime`) VALUES ('$room', current_timestamp())";
    	if(mysqli_query($conn, $sql))
    	{

    		$message  = 'Your room is now create go to your chatroom';
			echo '<script language="javascript">';
			echo  'alert(" ' . $message . '");';
			echo  'window.location="http://localhost/mychatroom/rooms.php?roomname='. $room .'";';
			echo  '</script>';
    	}
    }
}


?>