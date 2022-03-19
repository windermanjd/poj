<?php
if(isset($_GET["api"])){


}else{
echo json_encode(array("statusCode"=>400,"Message"=>"Error Param"));
}

?>