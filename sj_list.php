<?php

include("common.php");

// 페이지네이션 변수 결정정 로직
$text1 = $_REQUEST['text1'] ?? "";

$sql = "select  * from sj where name like '%$text1%' order by name";   
$args = "text1=$text1";
$result = mypagination($sql, $args, $pagebar);
?>

<?php include('sj_header.php'); ?>
<div class="alert mycolor1">성적</div>  
    <form action="sj_list.php" name="form1" method="post">
        <div class="row mb-2">
            <div class="col-3" >
                <div class="input-group d-flex justify-content-start">
                    <span class="input-group-text" id="basic-addon1">이름</span>
                    <input type="text" name="text1"class="form-control" placeholder="찾을 이름은?">
                    <button class="btn mycolor1" type="submit">검색</button>
                </div>
            </div>
            <div class="col-9 d-flex justify-content-end">
            <a href="sj_new.php" class="btn btn-sm mycolor1 align-content-center mymargin5">추가</a>
            </div>
        </div>
    </form>
    <table class="table table-borderd table-hover table-sm mymargin5">
        <tr class="mycolor2">
            <td>번호</td>
            <td>이름</td>
            <td>국어</td>
            <td>영어</td>
            <td>수학</td>
            <td>합계</td>
            <td>평균</td>
            <td>수정/삭제</td>
        </tr>
    <?php foreach($result as $row): ?>
    <?php $id = $row['id']; ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['kor'] ?></td>
            <td><?= $row['eng'] ?></td>
            <td><?= $row['mat'] ?></td>
            <td><?= $row['sum'] ?></td>
            <td><?= $row['avg'] ?></td>
            <td class="d-inline-flex">
                <a href="sj_edit.php?id=<?= $id ?>"
                class="btn btn-sm btn-outline-primary py-0 my-0">수정</a>&nbsp;
                <a href="sj_delete.php?id=<?= $id ?>"
                class="btn btn-sm btn-outline-primary py-0 my-0"
                onclick="return confirm('삭제할까요?');">삭제</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>

<?php
echo $pagebar;
include('footer.php'); 
?>