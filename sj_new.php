<?php
    include('sj_header.php');

?>

<script>
    function cal_score(){
        var kor = form1.kor.value;
        var eng = form1.eng.value;
        var mat = form1.mat.value;
        var sum = Number(kor) + Number(eng) + Number(mat);
        var avg = sum / 3;
        form1.sum.value = sum;
        form1.avg.value = avg.toFixed(1);
    }
        
</script>
    <form name="form1" method="post" action="sj_insert.php">

<table class="table table-sm table-bordered mymargin5">
	<tr height="40">
		<td width="20%" class="mycolor2">ID</td>
		<td width="80%" align="left"></td>
	</tr>
	<tr>
		<td class="mycolor2">이름</td>
		<td align="left">
			<div class="d-inline-flex">
				<input type="text" name="name" value="" size="20" 
					class="form-control form-control-sm">
			</div>
		</td>
	</tr>
	<tr>
		<td class="mycolor2">국어</td>
		<td align="left">
			<div class="d-inline-flex">
				<input type="text" name="kor" value="" size="5" 
					class="form-control form-control-sm" 
					onChange="cal_score();">
			</div>
		</td>
	</tr>
	<tr>
		<td class="mycolor2">영어</td>
		<td align="left">
			<div class="d-inline-flex">
				<input type="text" name="eng" value="" size="5" 
					class="form-control form-control-sm" 
					onChange="cal_score();">
			</div>
		</td>
	</tr>
	<tr>
		<td class="mycolor2">수학</td>
		<td align="left">
			<div class="d-inline-flex">
				<input type="text" name="mat" value="" size="5" 
					class="form-control form-control-sm" 
					onChange="cal_score();">
			</div>
		</td>
	</tr>
	<tr>
		<td class="mycolor2"> 총점</td>
		<td align="left">
			<div class="d-inline-flex">
				 &nbsp; <input type="text" name="sum" size="5" value="" 
					class="form-control-plaintext form-control-sm" 
					onfocus="form1.name.focus()" readonly >
			</div>
		</td>
	</tr>
	<tr>
		<td class="mycolor2"> 평균</td>
		<td align="left">
			<div class="d-inline-flex">
				 &nbsp; <input type="text" name="avg" size="5" value="" 
					class="form-control-plaintext form-control-sm" 
					onfocus="form1.name.focus()" readonly>
			</div>
		</td>
	</tr>
</table>

<div align="center">
	<input type="submit" value="저장" 
		class="btn btn-sm mycolor1">&nbsp;
	<input type="button" value="이전화면" 
		class="btn btn-sm mycolor1" onClick="history.back();">
</div>

</form> 
    
    



<?php
    include('footer.php');
?>