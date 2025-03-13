<?php

include("common.php");

$text1 = $_REQUEST['text1'] ? $_REQUEST['text1'] : "";

$sql = "select  * from juso where name like '%$text1%' order by name";
$args="text1=$text1";

$result = mypagination($sql, $args, $pagebar);

?>

<?php include('sj_header.php'); ?>
<div class="alert mycolor1">주소</div>
<form action="juso_list.php" name="form1" method="post">
    <div class="row mb-2">
        <div class="col-3">
            <div class="input-group d-flex justify-content-start">
                <span class="input-group-text" id="basic-addon1">이름</span>
                <input type="text" name="text1" class="form-control" placeholder="찾을 이름은?">
                <button class="btn mycolor1" type="submit">검색</button>
            </div>
        </div>
        <div class="col-9 d-flex justify-content-end">
            <a href="juso_new.php" class="btn btn-sm mycolor1 align-content-center mymargin5">추가</a>
        </div>
    </div>
</form>
<table class="table table-borderd table-hover table-sm mymargin5">
    <tr class="mycolor2">
        <td>id</td>
        <td>이름</td>
        <td>전화</td>
        <td>음/양</td>
        <td>생일</td>
        <td>주소</td>
        <td>수정/삭제</td>
    </tr>
    <?php foreach ($result as $row): ?>
        <?php
        if ($row['sm'] == 0)
            $sm = "양력";
        else
            $sm = "음력";
        $tel1 = trim(substr($row['tel'], 0, 3));
        $tel2 = trim(substr($row['tel'], 3, 4));
        $tel3 = trim(substr($row['tel'], 7));
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $tel1 . " - " . $tel2 . " - " . $tel3 ?></td>
            <td><?= $sm ?></td>
            <td><?= $row['birthday'] ?></td>
            <td><?= $row['juso'] ?></td>
            <td class="d-inline-flex">
                <a href="juso_edit.php?id=<?= $id ?>" class="btn btn-sm btn-outline-primary py-0 my-0">수정</a>&nbsp;
                <a href="juso_delete.php?id=<?= $id ?>" class="btn btn-sm btn-outline-primary py-0 my-0"
                    onclick="return confirm('삭제할까요?');">삭제</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
// include "pagination.php";
echo $pagebar;
include('footer.php');
?>