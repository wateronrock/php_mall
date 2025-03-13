<?php 
    include('sj_header.php'); 

    include ("common.php");

    $id = $_REQUEST['id'];

    $sql = "select * from sj where id = $id";
    $result = mysqli_query($db, $sql);
    if(!$result) exit("에러 : $sql");

    $row = mysqli_fetch_array($result);

    $name = $row['name'];
    $kor =  $row['kor'];
    $eng =  $row['eng'];
    $mat =  $row['mat'];
?>

<div class="alert mycolor1">성적 수정</div>
<form name="form1" action="sj_update.php" method="post">    
    <table class="table table-borderd table-sm mymargin5">
        <tr>
            <td width="20%" class="mycolor2">번호</td>
            <td width="80%" class="d-flex justify-content-start">
                <?= $id ?>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2 text-danger">이름</td>
            <td width="80%" class="d-flex justify-content-start">
                <?php echo $name; ?> 
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">국어</td>
            <td width="80%" class="d-flex justify-content-start">
                <input class="form-control form-control-sm" name="kor" type="text"
                    value="<?= $kor ?>">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">영어</td>
            <td width="80%" class="d-flex justify-content-start">
                <input class="form-control form-control-sm" name="eng" type="text"
                value="<?= $eng ?>">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">수학</td>
            <td width="80%" class="d-flex justify-content-start">
                <input class="form-control form-control-sm" name="mat" type="text"
                value="<?= $mat ?>">
            </td>
        </tr>
        
    </table>
    <div class="d-flex justify-content-center">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" class="btn btn-sm mycolor1" value="저장">&nbsp;
        <input type="button" class="btn btn-sm mycolor1" value="이전화면" onclick="history.back();">
    </div>
</form>
<?php include('footer.php'); ?>