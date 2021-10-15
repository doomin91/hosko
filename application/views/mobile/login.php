<?php include_once "header.php"; ?>
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
            <h5>withnetworks website administrator</h5>

            <form id="form-signin" class="form-signin">
              <section>
                <div class="input-group">
                  <input type="text" class="form-control" name="username" placeholder="관리자 아이디">
                  <div class="input-group-addon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" placeholder="관리자 비밀번호">
                  <div class="input-group-addon"><i class="fa fa-key"></i></div>
                </div>
              </section>
              <section class="controls">
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
  </body>
</html>
      