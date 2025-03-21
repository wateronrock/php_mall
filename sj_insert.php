<?php
    include('common.php');
    
    $name = $_REQUEST['name'];
    $kor = $_REQUEST['kor'];
    $eng = $_REQUEST['eng'];
    $mat = $_REQUEST['mat'];

    $sum = $_REQUEST['sum'];
    $avg = $_REQUEST['avg'];

    $sql = "insert into sj (id, name, kor, eng, mat, sum, avg)
        values ('', '$name', $kor, $eng, $mat, $sum, $avg)";

    $result = mysqli_query($db, $sql);
    if(!$result) exit("에러: $sql");

    header("Location: sj_list.php");
?>