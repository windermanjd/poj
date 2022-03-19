<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

if(isset($_GET["api"])){
if($_GET["api"]=="detail"){
$txt="";
if(file_exists("log.txt")){
$myfile = fopen("log.txt", "r") or die("Unable to open file!");
$txt =  fread($myfile,filesize("log.txt"));
fclose($myfile);
}
echo json_encode(array("statusCode"=>200,"Data"=>$txt));
}else if($_GET["api"]=="update"){
$myfile = fopen("log.txt", "w") or die("Unable to open file!");
fwrite($myfile, md5(date("Y-m-d h:i:s")));
fclose($myfile);
echo json_encode(array("statusCode"=>200));
}else if($_GET["api"]=="reset"){
 if(file_exists("log.txt")){
  unlink("log.txt"); 
 }
}
}else{
echo json_encode(array("statusCode"=>400,"Message"=>"Error Param Function"));
}

}else{
echo json_encode(array("statusCode"=>400,"Message"=>"Error Param"));
}

?>
