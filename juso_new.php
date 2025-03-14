<?php
    include('sj_header.php');

?>
    <div class="alert mycolor1">신규 주소</div>  
    
    <form name="form1" action="juso_insert.php" method="post">    
    <table class="table table-borderd table-sm mymargin5">
        <tr>
            <td width="20%" class="mycolor2">이름</td>
            <td width="80%" class="d-flex justify-content-start">
                <input name="name" type="text" class="form-control form-control-sm">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">전화</td>
            <td width="80%" class="d-flex justify-content-start">
                <input type="text" name="tel1" size="3" value="010" class="form-control form-control-sm">-
                <input type="text" name="tel2" size="4" class="form-control form-control-sm">-
                <input type="text" name="tel3" size="4" class="form-control form-control-sm">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">음력/양력</td>
            <td width="80%" class="d-flex justify-content-start">
                <input type="radio" class="form-check-input" name="sm" value="0" checked>양력 &nbsp;
                <input type="radio" class="form-check-input" name="sm" value="1" >음력
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">생일</td>
            <td width="80%" class="d-flex justify-content-start">
                <input type="text" name="birthday1" size="3" class="form-control form-control-sm">-
                <input type="text" name="birthday2" size="4" class="form-control form-control-sm">-
                <input type="text" name="birthday3" size="4" class="form-control form-control-sm">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">주소</td>
            <td width="80%" class="d-flex justify-content-start ">
                <input type="text" name="juso" class="form-control form-control-sm">
            </td>
        </tr>
        
    </table>

        <div class="d-flex justify-content-center">            
            <button class="btn btn-sm mycolor1">저장</button>&nbsp;
            <a href="#" class="btn btn-sm mycolor1" onclick="history.back();">이전화면</a>
        </div>
    </form>       
    
    



<?php
    include('footer.php');
?>