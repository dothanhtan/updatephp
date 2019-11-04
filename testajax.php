<?php
    include_once("model/book.php");
    //include_once("model/user.php");
    //$username=$_REQUEST["username"];
    //$user = new User($username, "12345", "Do Thanh Tan");
    //$jsonUser = json_encode($user);
    //echo $jsonUser;
    //echo "<h2 style='color:red'>Xin chao $username. Toi la Ajax day!</h2>";
    $listFromFile = Book::getListFromFile();
    $jsonBook = json_encode($listFromFile);
    echo $jsonBook;
?>
