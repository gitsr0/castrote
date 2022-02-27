<?php 

try {
    $db = new PDO("mysql:host=db-mysql-nyc3-68982-do-user-10638878-0.b.db.ondigitalocean.com;dbname=vtcast;charset=utf8;port=25060;", "doadmin", "XLo6zU9zeAFmnBkQ");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch ( PDOException $e ){
    print $e->getMessage();
}
$url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
