<?php include('test_header.php'); ?>
<div class="alert mycolor1">회원</div>
<form name="form1" action="" method="post">    
    <table class="table table-borderd table-sm mymargin5">
        <tr>
            <td width="20%" class="mycolor2">번호</td>
            <td width="80%" class="d-flex justify-content-start">1</td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2 text-danger">이름</td>
            <td width="80%" class="d-flex justify-content-start">
                <input class="form-control form-control-sm" name="name" type="text" size="20" maxlength="20" value="">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">비밀번호</td>
            <td width="80%" class="d-flex justify-content-start">
                <input class="form-control form-control-sm" name="name" type="text" size="20" maxlength="20" value="">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">전화번호</td>
            <td width="80%" class="d-flex justify-content-start">
                <div class="d-inline-flex">
                    <input class="form-control form-control-sm" type="text" size="3" maxlength="3" name="tel1" value="010">-
                    <input class="form-control form-control-sm" type="text" size="4" maxlength="4" name="tel2">-
                    <input class="form-control form-control-sm" type="text" size="4" maxlength="4" name="tel3">
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">등급</td>
            <td width="80%" class="d-flex justify-content-start">
                <input name="rank" type="radio" value="0" checked>&nbsp;직원&nbsp;&nbsp;
                <input name="rank" type="radio" value="0" >&nbsp;관리자
            </td>
        </tr>
    </table>
    <div class="d-flex justify-content-center">
        <a href="#" class="btn btn-sm mycolor1">수정</a>&nbsp;
        <a href="#" class="btn btn-sm mycolor1"
            onclick="return confirm('삭제할까요?');">삭제</a>&nbsp;
        <a href="#" class="btn btn-sm mycolor1">저장</a>&nbsp;
        <a href="#" class="btn btn-sm mycolor1" onclick="history.back();">이전화면</a>
    </div>
</form>
<?php include('test_footer.php'); ?>