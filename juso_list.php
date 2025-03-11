<?php

include("common.php");

// 페이지네이션 변수 결정정 로직
$text1 = $_REQUEST['text1'] ? $_REQUEST['text1'] : "";
$page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;

$sql = "select  count(*) from juso where name like '%$text1%' order by name";
$result = mysqli_query($db, $sql);
if (!$result)
    exit("에러: $sql");
$row = mysqli_fetch_array($result);
$count = $row[0];//이제 가져올 전체 line 수(레코드 수)를 알았다.


// /한 페이지 당 데이터 표시 갯수
$page_line =3;

// 한 블럭당 페이지 링크 표시 갯수
$page_block = 5;


$first = ($page - 1) * $page_line; // 1페이지는 레코드 0번 (id와는 다름)부터 시작하고
// 2페이지는 15번부터 시작한다($page_line=15이므로).

$sql = "select * from juso where name like '%$text1%' order by name  limit $first, $page_line";
$result = mysqli_query($db, $sql);
if (!$result)
    exit("에러: $sql");

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
            <a href="sj_new.php" class="btn btn-sm mycolor1 align-content-center mymargin5">추가</a>
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
                <a href="sj_edit.php?id=<?= $id ?>" class="btn btn-sm btn-outline-primary py-0 my-0">수정</a>&nbsp;
                <a href="sj_delete.php?id=<?= $id ?>" class="btn btn-sm btn-outline-primary py-0 my-0"
                    onclick="return confirm('삭제할까요?');">삭제</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>



<?php
// ** 페이지네이션 표시 로직 **

//이름 검색 또는 페이지 이동에도 여전히 juso_list.php가 표시한다.
$url = "juso_list.php?text1=$text1";

// 전체 페이지 수; 전체 기록의 수에다 한 페이지 표시할 줄의 수를 나눈다. 3.4라도 4 페이지를 차지
$pages = ceil($count / $page_line);

// 1000 개의 자료이고, 한 페이지에 15개($page_line)씩 표시한다면 총 67 페이지가 필요하게 되지만
// 모든 페이지에서는 67 페이지 중 어느 페이지라도 클릭 한 번으로 이동할 수 있어야 한다. 하지만만
// 한 페이지에 67개의 링크를 모두 표시할 수는 없다. 다섯개씩만 표시한다면 어떤 페이지의 링크들로 
// 구성해야 할까? 그것을 블록이라 부른다. 그 블록에는 현재페이지의 링크를 포함하는 연속적인 페이지수의
// 링크라야 할 것이다. $page_block은 블럭에 포함되는 링크의 수를 정의한다. 전체 페이지 수는 표시할 
// 전체 링크의 수와 같다. 그러므로 전체 페이지 수에다 블록을 구성하는 링크의 수를 나누면 필요한 전체체
//  블록 수가 나온다. 먼저 전체 블록의 수를 구한다
$blocks = ceil($pages / $page_block);

// 현재 페이지가 2 페이지라면 어떤 5개의 페이지 링크를 표시해야 할까? 물론 1~5번까지의 
// 링크를 표시하겠지만 공식으로 구해져야 한다. 아래에 표시되는 $page / $page_block은 현재 
// 페이지 번호에다 한 블럭을 구성하는 링크의 수를 나눈 값이다. 2/5 = 0.4이지만 올림 처리하면
// 1이다. 즉 2 페이지에는 1번 블럭의 다섯 링크를 표시하는 것이 페이지네이션의 결과이다. 1번 
// 블록의 링크의 구성은 1,2,3,4,5의 다섯 링크이다. 그러므로 현재 페이지는 어느 블럭에 
// 속하는지를 알아야 그 블럭을 표시한다. 다음은 어떤 페이지가 어떤 블럭에 속하는지를 나타낸다.
$block = ceil($page / $page_block);

// 62 페이지는 몇 번 블럭에 포함될까? 62/5=12.4이나 올림처리하면 13번 블록이다. 즉 62
// 페이지에는 13번 블록의 5 링크를 표시하면 된다. 시작 번호만 알면 연이어 5개를 표시하는 것이다.
// 13번 블록의 처음 시작 링크는 12번 블록의 마지막의 다음 번일 것이다. 12*5 =60, 즉 12 블럭의
// 마지막 페이지 링크는 60이었으므로 13번 블럭은 61,62,63,64,65의 다섯 개로 구성된다.그러므로
// 즉 현재 페이지가 속한 블럭의 첫 링크는 이전 블럭의 마지막 링크를 구하여 +1을 하면 된다.
// $page_s는 이전 블럭의 마지막 링크의 번호이며, $page_e는 현재 블럭의 끝 링크 번호이다.
$page_s = $page_block * ($block - 1);
$page_e = $page_block * $block;

//  $blocks는 전체 블럭의 수이며 $block은 현재 페이지의 블럭이다. 
// 끝 블럭에 이르면 마지막 링크는 전체 페이지의 끝 페이지라야 한다.
if ($blocks <= $block)
    $page_e = $pages;
?>

<?php
include "pagination.php";
include('footer.php');
?>