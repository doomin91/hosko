<?php include_once "admin-header.php" ?>
  <body class="bg-1">
	<!-- Wrap all page content here -->
	<div id="wrap">
	  <!-- Make page fluid -->
	  <div class="row">
		<!-- Page content -->
		<div id="content" class="col-md-12 full-page login">


		  <div class="inside-block">
			<img src="/static/admin/images/logo-big.png" alt class="logo">
			<h1><strong>Welcome</strong> Admin</h1>
			<h5>사이트 관리자</h5>

			<form id="form-signin" class="form-signin">
			  <section>
				<div class="input-group">
				  <input type="text" class="form-control" name="admin_id" placeholder="관리자 아이디">
				  <div class="input-group-addon"><i class="fa fa-user"></i></div>
				</div>
				<div class="input-group">
				  <input type="password" class="form-control" name="admin_pass" placeholder="관리자 비밀번호">
				  <div class="input-group-addon"><i class="fa fa-key"></i></div>
				</div>
			  </section>
			  <section class="controls hide">
				<div class="checkbox check-transparent">
				  <input type="checkbox" value="1" id="remember" checked>
				  <label for="remember">아이디 기억하기</label>
				</div>
				<a href="#">Forget password?</a>
			  </section>
			  <section class="log-in">
				<button type="button" class="btn btn-greensea" id="loginBtn">Log In</button>
				<!--<span>or</span>
				<button class="btn btn-slategray">Create an account</button>-->
			  </section>
			</form>
		  </div>


		</div>
		<!-- /Page content -->
	  </div>
	</div>
	<!-- Wrap all page content end -->
	<?php include_once "admin-footer.php" ?>
  </body>
</html>

<script type="text/javascript">

(function($){
	$(document).on("click", "#loginBtn", function(){
		var admin_id = $("input[name=admin_id]").val();
		var admin_pass = $("input[name=admin_pass]").val();

		if (admin_id == ""){
			alert("관리자 아이디를 입력해주세요");
			$("input[name=admin_id]").focus();
			return false;
		}

		if (admin_pass == ""){
			alert("관리자 비밀번호를 입력하세요");
			$("input[name=admin_pass]").focus();
			return false;
		}

		$.ajax({
			type : "POST",
			url : "/admin/home/login_proc",
			dataType : "JSON",
			data : {
				"admin_id" : admin_id,
				"admin_pass" : admin_pass
			}, success : function(resultMsg){
				console.log(resultMsg);
				if (resultMsg.code == "200"){
					document.location.href="/administrator/notice";
				}else{
					alert(resultMsg.msg);
				}
			}, error : function(e){
				console.log(e.responseText);
			}
		});
	});
})(jQuery);

</script>
