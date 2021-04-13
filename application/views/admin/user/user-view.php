<?php
  include_once dirname(__DIR__)."/admin-header.php";
?>
<script src="/ckeditor/ckeditor.js"></script>
  <body class="bg-1">

	<!-- Preloader -->
	<div class="mask"><div id="loader"></div></div>
	<!--/Preloader -->

	<!-- Wrap all page content here -->
	<div id="wrap">

	  <!-- Make page fluid -->
	  <div class="row">

		<!-- Fixed navbar -->

		<?php
			include_once dirname(__DIR__)."/admin-top.php";
		?>
		<!-- Fixed navbar end -->

		<!-- Page content -->
		<div id="content" class="col-md-12">

		  <!-- page header -->
		  <div class="pageheader">
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>공지사항</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="index.html">공지사항</a></li>
				<li class="active">공지사항 등록하기</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">

			<!-- row -->
			<div class="row">

			  <!-- col 6 -->
			  <div class="col-md-12">
				<!-- tile -->
				<section class="tile color transparent-black">

					<!-- tile body -->
					<div class="tile-body">
						<table class="table table-custom dataTable">
							<tbody>
							<tr>
								<th class="col-sm-2">제목</th>
								<td class="col-sm-10"><?php echo $detail->NOTICE_TITLE; ?></td>
							</tr>
							<tr>
								<th class="col-sm-2">첨부파일</th>
								<td class="col-sm-10"><?php echo $detail->NOTICE_FILE_NAME; ?></td>
							</tr>
							<tr>
								<td colspan="2"><?php echo $detail->NOTICE_CONTENTS; ?></td>
							</tr>
							</tbody>
						</table>

						<div class="row form-footer">
							<div class="col-sm-offset-2 col-sm-10 text-right">
								<a href="/administrator/notice/notice_modify/<?php echo $detail->SEQ; ?>" class="btn btn-default">수정하기</a>
								<button id="notice_del" data-seq="<?php echo $detail->SEQ; ?>" class="btn btn-default">삭제하기</button>
								<a href="/administrator/notice" class="btn btn-primary">목록가기</a>

							</div>
						</div>

					</div>
				  <!-- /tile body -->

				</section>
				<!-- /tile -->

			  </div>
			  <!-- /col 12 -->

			</div>
			<!-- /row -->

		  </div>
		  <!-- /content container -->

		</div>
		<!-- Page content end -->

	  </div>
	  <!-- Make page fluid-->

	</div>
	<!-- Wrap all page content end -->

	<?php
		include_once dirname(__DIR__)."/admin-footer.php";
	?>
</body>
</html>

