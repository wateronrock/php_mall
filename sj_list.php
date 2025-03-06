<?php

include("common.php");

// 페이지네이션 변수 결정정 로직
$text1 = $_REQUEST['text1'] ? $_REQUEST['text1'] : "";
$page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;

$sql = "select  count(*) from sj where name like '%$text1%' order by name";     
$result = mysqli_query($db, $sql);
if(!$result) exit("에러: $sql");
$row = mysqli_fetch_array($result);
$count = $row[0];//이제 가져올 전체 line 수(레코드 수)를 알았다.


$first = ($page - 1) * $page_line; // 1페이지는 레코드 0번 (id와는 다름)부터 시작하고
// 2페이지는 15번부터 시작한다($page_line=15이므로).

$sql = "select * from sj where name like '%$text1%' order by name  limit $first, $page_line";
$result = mysqli_query($db, $sql);
if(!$result) exit("에러: $sql");



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
// ** 페이지네이션 표시 로직 **

//이름 검색 또는 페이지 이동에도 여전히 sj_list.php가 표시한다.
$url = "sj_list.php?text1=$text1";

// 전체 페이지 수; 3.4라도 4 페이지를 차지, 페이지라인은 common.php에 설정됨
$pages = ceil($count/$page_line);

// 1000 개의 자료라면 한 페이지에 15개($page_line)씩 표시한다면 총 67 페이지가 필요하게 되며 
// 페이지네이션에는 5개의 페이지 링크($page_block)만 표시하도록 하였다.
// 먼저 전체 블록의 수를 구한다
$blocks = ceil($pages/$page_block);

// 현재 페이지가 62 페이지라면 어떤 5개의 페이지 링크를 표시해야 할까?
// 먼저 현재 페이지가 몇 번째 블럭에 해당하는지를 결정한다. 62/5 = 12.4이므로 올림처리하면 13번 블럭이 된다.
$block = ceil($page/$page_block);

// 62 페이지에 하단에 표시될 첫 페이지 링크는 몇 번이 될까? 
// 62 페이지가 13번 블럭에 들어가므로 12번 블럭 마지막 링크 다음 번호가 13번 블럭의 첫 번호호 일것이다. 
// 12*5 = 60이므로 다름인인 61번 페이지 링크부터 5개를 표시하게 된다.
// 즉 현재 페이지가 속한 블럭의 이전 블럭의 마지막 링크를 구하여 +1을 하면 된다.
$page_s = $page_blcok*($block-1);
$page_e = $page_blcok*$block;

// 끝 블럭에 이르면 마지막 링크는 전체 페이지의 끝 페이지라야 한다.
if($blocks<=$block) $page_e = $pages;
?>
<!-- bootstrap5를 기준으로 페이지 네비를 기술한다 -->
<nav>
  <ul class="pagination pagination-sm justify-content-center py-1">
<?php if($block>1): ?>
    <li class="page-item">
      <a class="page-link" href="<?=$url?>&page=<?=$page_s?>">◀</a>
    </li>
<?php endif;?>
<?php for($i = $page_s+1;$i<=$page_e;$i++):?>
    <?php if($i == $page):?>
        <li class="page-item active">
            <span class="page-link mycolor1"><?=$i?></span>
        </li>
    <?php else:?>
        <li class="page-item">
            <a class="page-link" href="<?=$url?>&page=<?=$i?>"><?=$i ?></a>
        </li>
    <?php endif; ?>
<?php endfor;?>
<?php if($block < $blocks): ?>
    <li class="page-item">
      <a class="page-link" href="<?=$url?>&page=<?=$page_s?>"> ▶ </a>
    </li>
<?php endif;?>
  </ul>
</nav>
<?php
include('footer.php'); 
?>