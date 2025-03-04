<?php
    include('common.php');
    
    $id = $_REQUEST['id'];
    $kor = $_REQUEST['kor'];
    $eng = $_REQUEST['eng'];
    $mat = $_REQUEST['mat'];
    $sum = $kor + $eng + $mat;
    $avg = round($sum/3, 1);

    $sql = "update sj set kor = $kor, eng = $eng, mat = $mat, sum = $sum, avg = $avg where id = $id ";
    $result = mysqli_query($db, $sql);
    if(!$result) exit("에러: $sql");

    header("Location: sj_list.php");
?>