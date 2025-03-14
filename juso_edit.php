<?php 
    include('sj_header.php'); 

    include ("common.php");

    $id = $_REQUEST['id'];

    $sql = "select * from juso where id = $id";
    $result = mysqli_query($db, $sql);
    if(!$result) exit("에러 : $sql");

    $row = mysqli_fetch_array($result);

    $name = $row['name'];
    $tel =  $row['tel'];
    $tel1 = trim(substr($tel, 0, 3));
    $tel2 = trim(substr($tel, 3, 4));
    $tel3 = trim(substr($tel, 7));

    $sm =  $row['sm'];

    $birthday =  $row['birthday'];
    $birthday1 = trim(substr($birthday, 0, 4));
    $birthday2 = trim(substr($birthday, 5, 2));
    $birthday3 = trim(substr($birthday, 8));

    $juso = $row['juso'];
?>

<div class="alert mycolor1">주소 수정</div>  
    
    <form name="form1" action="juso_update.php" method="post">    
    <table class="table table-borderd table-sm mymargin5">
        <tr>
            <td width="20%" class="mycolor2">id</td>
            <td width="80%" class="d-flex justify-content-start">
                <?= $id ?>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">이름</td>
            <td width="80%" class="d-flex justify-content-start">
                <input name="name" type="text" class="form-control form-control-sm"
                    value="<?= $name ?>">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">전화</td>
            <td width="80%" class="d-flex justify-content-start">
                <input type="text" name="tel1" size="3" value="<?= $tel1 ?>" class="form-control form-control-sm">-
                <input type="text" name="tel2" size="4" value="<?= $tel2 ?>" class="form-control form-control-sm">-
                <input type="text" name="tel3" size="4" value="<?= $tel3 ?>" class="form-control form-control-sm">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">음력/양력</td>
            <td width="80%" class="d-flex justify-content-start">
                <input type="radio" class="form-check-input" name="sm" value="0"  
                    <?php if($sm == 0) echo "checked"; ?> >양력 &nbsp;
                <input type="radio" class="form-check-input" name="sm" value="1"
                    <?php if($sm == 1) echo "checked"; ?> >음력
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">생일</td>
            <td width="80%" class="d-flex justify-content-start">
                <input type="text" name="birthday1" size="3" value="<?= $birthday1 ?>" class="form-control form-control-sm">-
                <input type="text" name="birthday2" size="4" value="<?= $birthday2 ?>" class="form-control form-control-sm">-
                <input type="text" name="birthday3" size="4" value="<?= $birthday3 ?>" class="form-control form-control-sm">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">주소</td>
            <td width="80%" class="d-flex justify-content-start ">
                <input type="text" name="juso" value="<?= $juso ?>" class="form-control form-control-sm">
            </td>
        </tr>
        
    </table>

        <div class="d-flex justify-content-center"> 
            <input type="hidden" name = "id" value="<?= $id ?>">           
            <button class="btn btn-sm mycolor1">저장</button>&nbsp;
            <a href="#" class="btn btn-sm mycolor1" onclick="history.back();">이전화면</a>
        </div>
    </form>       
<?php include('footer.php'); ?>