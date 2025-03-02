<?php 
  include("test_header.php");
?>
          <div class="alert mycolor1">회원</div>

          <form action="" name="form1" method="post">
            <div class="row mb-2">
              <div class="col-3" >
                  <div class="input-group d-flex justify-content-start">
                      <span class="input-group-text" id="basic-addon1">이름</span>
                      <input type="text" name="text1"class="form-control" placeholder="찾을 이름은?"
                        onkeydown="if(event.keyCode==13) {find_text();}">
                      <button class="btn mycolor1" type="button"
                        onclick="find_text()">검색</button>
                  </div>
              </div>
              <div class="col-9 d-flex justify-content-end">
                <a href="#" class="btn btn-sm mycolor1 align-content-center mymargin5">추가</a>
              </div>
            </div>
          </form>
            

          <table class="table table-sm table-borderd table-hover mymargin5">
            <tr class="mycolor2">
                <td width="10%">번호</td>
                <td width="20%">아이디</td>
                <td width="20%">암호</td>
                <td width="20%">이름</td>
                <td width="20%">전화</td>
                <td width="10%">등급</td>
            </tr>
            <tr>
                <td>1</td>
                <td>adimin</td>
                <td>1234</td>
                <td>관리자</td>
                <td>010-1111-1111</td>
                <td>관리자</td>
            </tr>
            <tr>
                <td>2</td>
                <td>d1</td>
                <td>1234</td>
                <td>홍길동</td>
                <td>010-2222-2222</td>
                <td>직원</td>
            </tr>
          </table>

          <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>

<?php 
  include("test_footer.php");
?>          
