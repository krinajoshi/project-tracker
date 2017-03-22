<?php
include "dbconnect.php";
include "header.php";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.<BR>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.<BR>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf") {
    echo "Sorry, only JPG, JPEG, PNG,DOCX,DOC,PDF & GIF files are allowed.<BR>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<BR>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.<BR>";
    }
}

$file_location=basename( $_FILES["fileToUpload"]["name"]);
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
//echo	 $mypassword=$_SESSION['mypassword'];

$_SESSION['project_id']=$_POST['project_id'];
$_SESSION['priority']=$_POST['priority'];
$_SESSION['task_type']=$_POST['task_type'];

$_SESSION['assigned_to']=$_POST['assigned_to'];
$_SESSION['status']=$_POST['status'];

$_SESSION['description']=$_POST['description'];

$_SESSION['start_date']=$_POST['start_date'];

$_SESSION['end_date']=$_POST['end_date'];

$_SESSION['assigned_by']=$_POST['assigned_by'];
$assigned_to=$_POST['assigned_to'];
 $project_id=$_POST['project_id'];
//$assigned_to=$_POST['assigned_to'];
$description1=$_POST['description'];
$description = str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($description1 ) );
 
$priority=$_POST['priority'];
$task_type=$_POST['task_type'];
$status=$_POST['status'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$assigned_by=$_POST['assigned_by'];
}
	
$query=mysql_query("INSERT INTO `tasks`(`project_id`, `assigned_to`, `priority`, `task_type`, `status`, `description`, `start_date`, `end_date`, `file_location`,`created_by`,`assigned_by`) VALUES('$project_id','$assigned_to','$priority','$task_type','$status','$description','$start_date','$end_date','$file_location','$myusername','$assigned_by')");

if($query)
{
echo "<b>TASK ADDED SUCCESSFULLY<BR></b>";
error_reporting(E_ALL);

$to      = 'kris@ccbst.ca,krinajoshi@rocketmail.com';
//$to      = 'krinajoshi@rocketmail.com';

$subject = 'Task Assigned to ';
$subject .= $myusername;

$message="Hi kris,
";
$message .= "\r\n";
$message .= " New task added in PM tool ";

$message .= ".\r\n";
$message .= ".\r\n";
$message .= "=============================================";
$message .= ".\r\n";
$message .= "Task assigned to : ";
$message .= " ";

$message .= $myusername;
$message .= "\r\n";

$message .= "Task assigned: ";
$message .= $description;
$message .= "\r\n";
$message .= "Task type: ";
$message .= $task_type;
$message .= ".\r\n";

$message .= "Status: ";
$message .= $status;
$message .= ".\r\n";

$message .= "Start Date: ";
$message .= $start_date;
$message .= ".\r\n";

$message .= "End Date: ";
$message .= $end_date;
$message .= ".\r\n";

$message .= "Task Priority: ";
$message .= $priority;
$message .= ".\r\n";


$message .= "Task Assigned By: ";
$message .= $assigned_by;
$message .= ".\r\n";

date_default_timezone_set("America/New_York");
$message .= "Task added on: ";

$message .=  date("Y-m-d") ;
//$message .= echo '&nbsp;';
$message .= "  ";

$message .= date("h:i:sa");

$message .= ".\r\n";
$message .= "=============================================";




$message .= "\r\n";
$message .= "\r\n";

$message .= "Please open following link to view more details:";
$message .= "\r\n";

$message .= "http://projecttracker.ccbst.info/";

$headers = 'From: pmtool@ccbst.info' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

$ret = mail($to, $subject, $message, $headers);
}

else
{
	echo "Something went wrong.Please try again later";
}
include "footer.php";
?>