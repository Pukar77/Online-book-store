

<?php
include "dbput.php";
if(isset($_POST["id"])){
    $id = $_POST["id"];
$sql = "select * from books where id  =". $id.";";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();


if (mysqli_num_rows($result) > 0) {
$result1 = $result->fetch_assoc();
    $name = $result1["name"];
    $author = $result1["author"];
    $price = $result1["price"];
    $photo = $result1["photo"];
    $id = $result1["id"];
    $description = $result1["Description"];

    $book = [$name,$author,$price,$photo,$description];

    echo json_encode($book);
}
}
 ?>