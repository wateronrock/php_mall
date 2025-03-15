<?php
    include "main_top.php";
?>

<div class="row m-1 mb-0">
	<div class="col" align="center">

		<h4 class="m-0 mt-5">회원 가입</h4>

		<hr size="4px" class="my-3">

		<!-- form2 시작 -->
		<form name="form2" method="post" action="member_joinend.html">
		<input type="hidden" name="check_id" value="y"> 

		<table style="font-size:12px;">
			<tr height="40">
				<td align="left" width="90">아이디 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="uid" size="20" value="" class="form-control form-control-sm">
					</div>
					<a href="javascript:check_id();"  class="btn btn-sm btn-secondary text-white mb-1" style="font-size:12px">중복 아이디</a>
				</td>
			</tr>
			<tr height="40">
				<td align="left">비밀번호 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="password" name="pwd" size="20" value="" 
							pattern="^([a-z0-9]){4,50}$" placeholder="영문자,숫자만 이용" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="left">비밀번호 확인 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex mb-2">
						<input type="password" name="pwd1" size="20" value="" 
							pattern="^([a-z0-9]){4,50}$" placeholder="영문자,숫자만 이용" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="left">이름 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="name" size="20" value="" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="left">휴대폰 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="tel1" size="3" maxlength="3" value="010" class="form-control form-control-sm">-
						<input type="text" name="tel2" size="4" maxlength="4" value=""	 class="form-control form-control-sm">-
						<input type="text" name="tel3" size="4" maxlength="4" value=""	 class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="90">
				<td align="left">주소 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex mb-1">
						<input type="text" name="zip" size="5" maxlength="5" value="" class="form-control form-control-sm">&nbsp;
					</div>
					<a href="javascript:FindZip(0);"  class="btn btn-sm btn-secondary text-white mb-1"  
						style="font-size:12px">우편번호 찾기</a><br>
					<div class="d-inline-flex">
						<input type="text" name="juso" size="50" value="" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="left">E-Mail</td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="email" size="50" value="" 
							pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" class="form-control form-control-sm">
					</div>
				</td>
			</tr>

			<tr height="40">
				<td align="left">생일</td>
				<td align="left">
					<div class="d-inline-flex mt-2">
						<input type="text" name="birthday1" size="4" maxlength="4" value="" class="form-control form-control-sm"> -
						<input type="text" name="birthday2" size="2" maxlength="2" value="" class="form-control form-control-sm"> -
						<input type="text" name="birthday3" size="2" maxlength="2" value="" class="form-control form-control-sm">
					</div>
				</td>
			</tr>

		</table>

		<a href="javascript:Check_Value();"  class="btn btn-sm btn-dark text-white my-4">&nbsp;회원가입&nbsp;</a>

		</form>

	</div>
</div>

<br><br>

<?php
    include "main_bottom.php";
?>