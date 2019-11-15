 <?php 
	 $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "khoaphamtraining";

    //create connection
    $conn = mysqli_connect($severname, $username, $password, $dbname);

    //check connection
    if(!$conn){
        die("Connetion faiiled: " . $conn_connect_erro);
    }
    //echo "Connection successfully";

     mysqli_set_charset($conn, "utf8");

    //Đóng kết nối
    $conn->close();

?>

<!-- kết nối đúng -->
 <?php
function myConnect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "khoaphamtraining";
    $conn = mysqli_connect($servername, $username, $password);
    mysqli_select_db($conn, $dbname);
    //mysqli_query($conn, "SET NAME 'utf8'");
    mysqli_set_charset($conn, "utf8");
    return $conn;
}
?>