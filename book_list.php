<?php
include "dbput.php";
$sql = "select * from books";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();


if (mysqli_num_rows($result) > 0) {
while($result1 = $result->fetch_assoc()){
    $name = $result1["name"];
    $author = $result1["author"];
    $price = $result1["price"];
    $photo = $result1["photo"];
    $description = $result1["Description"];
    include "card.php";

}
}
 ?>