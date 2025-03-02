function admin_menu()
{
	var s_menu;

	s_menu="<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>" + "\n"
		+ "			<div class='container-fluid'>" + "\n"
		+ "				<a class='navbar-brand text-white' href='../admin/index.html'>관리자</a>" + "\n"
		+ "				<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>" + "\n"
		+ "				<span class='navbar-toggler-icon'></span>" + "\n"
		+ "				</button>" + "\n"
		+ "				<div class='collapse navbar-collapse' id='navbarNav'>" + "\n"
		+ "					<ul class='navbar-nav  me-auto' style='font-size:15px'>" + "\n"
		+ "						<li class='nav-item'><a class='nav-link' href='member.html'>회원관리</a></li>" + "\n"
		+ "						<li class='nav-item'><a class='nav-link' href='product.html'>제품관리</a></li>" + "\n"
		+ "						<li class='nav-item'><a class='nav-link' href='jumun.html'>주문관리</a></li>" + "\n"
		+ "						<li class='nav-item'><a class='nav-link' href='opt.html'>옵션관리</a></li>" + "\n"
		+ "						<li class='nav-item'><a class='nav-link' href='faq.html'>FAQ</a></li>" + "\n"
		+ "					</ul>" + "\n"
		+ "					<a class='btn btn-sm btn-outline-secondary btn-dark' href='../index.html'>Goto SHOP</a>" + "\n"
		+ "				</div>" + "\n"
		+ "			</div>" + "\n"
		+ "		</nav>" + "\n"
		+ "		<br><br><br>" + "\n";

	return s_menu;
}

function find_text()
{
	form1.action="#";
	form1.submit();

}

function cal_score()
{
	form1.sum.value=Number(form1.kor.value)
		+ Number(form1.eng.value)
		+ Number(form1.mat.value);
	
	form1.avg.value = (form1.sum.value/3).toFixed(1);
}



