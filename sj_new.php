<?php
    include('sj_header.php');

?>
    <div class="alert mycolor1">신규 성적</div>  
    
    <form name="form1" action="sj_insert.php" method="post">    
    <table class="table table-borderd table-sm mymargin5">
        <tr>
            <td width="20%" class="mycolor2">이름</td>
            <td width="80%" class="d-flex justify-content-start">
                <input name="name" type="text">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">국어</td>
            <td width="80%" class="d-flex justify-content-start">
                <input type="text" name="kor">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">영어</td>
            <td width="80%" class="d-flex justify-content-start">
                <input type="text" name="eng">
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2">수학</td>
            <td width="80%" class="d-flex justify-content-start">
                <input type="text" name="mat">
            </td>
        </tr>
        
    </table>

        <div class="d-flex justify-content-center">            
            <button class="btn btn-sm mycolor1">저장</button>&nbsp;
            <a href="#" class="btn btn-sm mycolor1" onclick="history.back();">이전화면</a>
        </div>
    </form>       
    
    



<?php
    include('test_footer.php');
?>