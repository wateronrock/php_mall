<?php
    include('common.php');
    
    $name = $_REQUEST['name'];
    $tel1 = $_REQUEST['tel1'];
    $tel2 = $_REQUEST['tel2'];
    $tel3 = $_REQUEST['tel3'];
    $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
    $sm = $_REQUEST['sm'];
    $birthday1 = $_REQUEST['birthday1'];
    $birthday2 = $_REQUEST['birthday2'];
    $birthday3 = $_REQUEST['birthday3'];
    $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

    
    $juso = $_REQUEST['juso'];

    $sql = "insert into juso (name, tel, sm, birthday, juso)
        values ('$name', '$tel', $sm, '$birthday', '$juso')";

    $result = mysqli_query($db, $sql);
    if(!$result) exit("에러: $sql");

    header("Location: juso_list.php");
?>