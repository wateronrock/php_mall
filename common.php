<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set("display_errors", 1);

mysqli_report(MYSQLI_REPORT_OFF);

$db = mysqli_connect("localhost", "shop0", "1234", "shop0");

if (!$db)
    exit("연결에러");

// 페이지네이션을 위한 정의
$page_line = 5;
$page_block =5;

function mypagination($query, $args, &$pagebar)
{
    global $db, $page_line, $page_block;
    
    $page = $_REQUEST['page'] ?? "1";

    $url = basename($_SERVER['PHP_SELF']) . "?" . $args;

    // count(*)을 구하는 sql 문 제작
    $sql = strtolower($query);
    $sql = "select count(*)" . substr($sql, strpos($sql, 'from'));
    $result = mysqli_query($db, $sql);
    if(!$result) exit("에러: $sql");

    $row = mysqli_fetch_array($result);
    $count = $row[0];

    $first = ($page-1)*$page_line;

    // * 을 구하는 sql 문 제작
    $sql = str_replace(";", "", $query);
    $sql .= " limit $first, $page_line";

    $result = mysqli_query($db, $sql);
    if(!$result) exit("에러: $sql");

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
    // 페이지에는 13번 블록의 다섯섯 링크를 표시하면 된다. 시작 번호만 알면 연이어 5개를 표시하는 것이다.
    // 13번 블록의 처음 시작 링크는 12번 블록의 마지막의 다음 번일 것이다. 12*5 =60, 즉 12 블럭의
    // 마지막 페이지 링크는 60이었으므로 13번 블럭은 61,62,63,64,65의 다섯 개로 구성된다.그러므로
    // 즉 현재 페이지가 속한 블럭의 첫 링크는 이전 블럭의 마지막 링크를 구하여 +1을 하면 된다.
    // $page_s는 이전 블럭의 마지막 링크의 번호이며, $page_e는 현재 블럭의 끝 링크 번호이다.
    $page_s = $page_block * ($block - 1);
    $page_e = $page_block * $block;

    //  $blocks는 전체 블럭의 수이며 $block은 현재 페이지의 블럭이다. 
    // 끝 블럭에 이르면 마지막 링크는 전체 페이지의 끝 페이지라야 한다.
    if ($blocks <= $block) $page_e = $pages;

    $pagebar = "<nav>
    <ul class='pagination pagination-sm justify-content-center py-1'>";

    if($block>1)
            $pagebar .= "<li class='page-item'>
        <a class='page-link' href='$url&page=$page_s'>◀</a>
        </li>";

    for($i = $page_s+1;$i<=$page_e;$i++)
    {
        if($page == $i)
            $pagebar .= "<li class='page-item active'>
                <span class='page-link mycolor1'>$i</span>
            </li>";
        else
            $pagebar .= "<li class='page-item'>
                <a class='page-link' href='$url&page=$i'>$i</a>
            </li>";
    }

    if($block < $blocks )
        $pagebar .= "<li class='page-item'>
        <a class='page-link' href='$url&page=" . ($page_e+1) . "'> ▶ </a>
        </li>";

    $pagebar .= "</ul>
    </nav>";

    // 최종적으로 select * 한 결과를 반환한다. 이는 외부에서 변수에 담아 사용한다.
    return $result;
}

?>