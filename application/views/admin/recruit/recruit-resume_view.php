<?php
	include_once dirname(__DIR__)."/admin-header.php";
?>
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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>이력서 상세보기</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">수속관리</a></li>
				<li class="active">이력서 상세보기</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">

			<div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile color transparent-black rounded-corners">
                            <span id="resume_title" class="col-sm-offset-4 col-sm-4 text-center"> <?php echo $RESUME_INFO->RESUME_USER_NAME ?> </span>
                            <div id="resume_photo" class="col-sm-offset-4 col-sm-4 text-center"> <img src='<?php echo $RESUME_INFO->RESUME_USER_PHOTO ?>'/> </div>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <!-- row -->
            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile color transparent-black rounded-corners">
                            <div class="col-sm-offset-4 col-sm-4 text-center"> <?php echo $RESUME_INFO->RESUME_USER_NAME ?> </div>
							<table class="table table-custom dataTable applyViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">Address</th>
                                        <td class="col-sm-10"><?php echo '('.$RESUME_INFO->RESUME_USER_ZIPCODE.')'.$RESUME_INFO->RESUME_USER_ADDR1.$RESUME_INFO->RESUME_USER_ADDR2 ?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">Phone No</th>
                                        <td class="col-sm-10"><?php echo $RESUME_INFO->RESUME_USER_PHONE ?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">E-mail</th>
                                        <td class="col-sm-10"><?php echo $RESUME_INFO->RESUME_USER_EMAIL ?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">Skype ID</th>
                                        <td class="col-sm-10"><?php echo $RESUME_INFO->RESUME_USER_SKYPE_ID ?></td>
									</tr>
								</tbody>
							</table>

                            
                            
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <!-- row -->
            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyViewTable">
								<tbody>
                                    <tr>
                                        <th colspan="4">PERSONAL PARTICULARS</th>
                                    </tr>
									<tr>
										<th class="col-sm-3">Age</th>
                                        <td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_AGE ?></td>
                                        <th class="col-sm-3">Date of Birth</th>
                                        <td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_DOB ?></td>
									</tr>
									<tr>
										<th class="col-sm-3">Nationality</th>
                                        <td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_NATIONALITY ?></td>
                                        <th class="col-sm-3">IC Number</th>
                                        <td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_IC_NUMBER ?></td>
									</tr><tr>
										<th class="col-sm-3">Martial Status</th>
                                        <td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_MARTIAL_STATUS ?></td>
                                        <th class="col-sm-3">Graduation Date</th>
                                        <td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_DOG ?></td>
									</tr><tr>
										<th class="col-sm-3">Permanent Residence</th>
                                        <td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_PERMANENT_RESIDENCE ?></td>
                                        <th class="col-sm-3">Religion</th>
                                        <td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_RELIGION ?></td>
									</tr><tr>
										<th class="col-sm-3">Height</th>
                                        <td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_HEIGHT ?></td>
                                        <th class="col-sm-3">Weight</th>
                                        <td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_WEIGHT ?></td>
									</tr><tr>
										<th class="col-sm-3">Hobbies</th>
                                        <td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_HOBBY ?></td>
                                        <th class="col-sm-3">Criminal Record</th>
                                        <td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_CRIMINAL_RECORD ?></td>
									</tr>
                                    <!-- <tr>
										<th class="col-sm-2">Career Goal</th>
                                        <td colspan="3" class="col-sm-10"><?php echo $RESUME_INFO->RESUME_USER_GOAL ?></td>
									</tr> -->
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <!-- row -->
            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyViewTable">
								<tbody>
                                    <tr>
                                        <th colspan="2">EDUCATION</th>
                                    </tr>
									<?php foreach( $RESUME_EDUCATION as $EDU ):?>
										<tr>
											<th class="col-sm-5"><?php echo $EDU->REDU_DATE ?></th>
											<td class="col-sm-7"><?php echo $EDU->REDU_DESCRIPTION ?></td>
										</tr>
									
									<?php endforeach ?>
									
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <!-- row -->
            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyViewTable">
								<tbody>
                                    <tr>
                                        <th colspan="2">⊙ WORKING EXPERIENCE</th>
                                    </tr>
                                    
                                <?php foreach($RESUME_WORKING_EXP as $EXP) :?>
                                    <tr>
                                        <td class="col-sm-5"><?php echo $EXP->RWEXP_DATE?></td>
                                        <td class="col-sm-7"><?php echo $EXP->RWEXP_DESCRIPTION?></td>
                                    </tr>
                                <?php endforeach?>
									
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <!-- row -->
            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyViewTable">
								<tbody>
                                    <tr>
                                        <th colspan="2">⊙ ACTIVITIES</th>
                                    </tr>
                                <?php foreach($RESUME_ACTIVITY as $ACT) :?>
                                    <tr>
                                        <td class="col-sm-5"><?php echo $ACT->RACT_DATE?></td>
                                        <td class="col-sm-7"><?php echo $ACT->RACT_DESCRIPTION?></td>
                                    </tr>
                                <?php endforeach?>
									
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <!-- row -->
            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyViewTable">
								<tbody>
                                    <tr>
                                        <th colspan="2">⊙ ACHIEVEMENTS</th>
                                    </tr>
                                <?php foreach($RESUME_AHIEVEMENT as $AHVMNT) :?>
                                    <tr>
                                        <td class="col-sm-5"><?php echo $AHVMNT->RACHV_TITLE?></td>
                                        <td class="col-sm-7"><?php echo $AHVMNT->RACHV_DESCRIPTION?></td>
                                    </tr>
                                <?php endforeach?>
									
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <!-- row -->
            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyViewTable">
								<tbody>
                                    <tr>
                                        <th colspan="2">⊙ PROFESSIONAL SKILLS</th>
                                    </tr>
                                <?php foreach($RESUME_SKILL as $SKL) :?>
                                    <tr>
                                        <td class="col-sm-7"><?php echo $SKL->RSKL_DESCRIPTION?></td>
                                        <td class="col-sm-5"><?php echo $SKL->RSKL_DATE?></td>
                                    </tr>
                                <?php endforeach?>
									
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <!-- row -->
            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyViewTable">
								<tbody>
                                    <tr>
                                        <th colspan="3">⊙ LANGUAGE SKILLS</th>
                                    </tr>
									<tr>
										<th> Language </th>
										<th> Speaking  </th>
										<th> Writing </th>
									</tr>
                                <?php foreach($RESUME_LANGUAGE as $LANG) :?>
                                    <tr>
                                        <td class="col-sm-4 text-center"><?php echo $LANG->RLANG_NAME?></td>
										<?php if( $LANG->RLANG_SPEAKING ==  0): ?>
											<td class="col-sm-4 text-center"><?php echo "Basic" ?></td>
										<?php elseif( $LANG->RLANG_SPEAKING == 1): ?>
											<td class="col-sm-4 text-center"><?php echo "Good" ?></td>
										<?php else : ?>
											<td class="col-sm-4 text-center"><?php echo "Excellent" ?></td>
										<?php endif?>
										<?php if( $LANG->RLANG_WRITING ==  0): ?>
											<td class="col-sm-4 text-center"><?php echo "Basic" ?></td>
										<?php elseif( $LANG->RLANG_WRITING == 1): ?>
											<td class="col-sm-4 text-center"><?php echo "Good" ?></td>
										<?php else : ?>
											<td class="col-sm-4 text-center"><?php echo "Excellent" ?></td>
										<?php endif?>
                                    </tr>
                                <?php endforeach?>
									
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <!-- row -->
            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyViewTable">
								<tbody>
                                    <tr>
                                        <th>COMPUTER SKILLS</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $RESUME_INFO->RESUME_USER_COMPUTER_SKILL?></th>
                                    </tr>
									
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <!-- row -->
            <div class="row" style="margin-bottom: 20px; ">
                <div class="col-md-4 text-left">
                    <input type="button" id="resume_view_print" class="btn btn-default" data-seq="<?php echo $RESUME_INFO->RESUME_SEQ ?>" value="인쇄하기">
                </div>
                <div class="col-md-8 text-right">
                    <a href ="/admin/recruit/recruit_resume_list" class="btn btn-default">목록</a>
                </div>
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

    <script>
        $(function(){
            $("#resume_view_print").on("click", function(){
                var seq = $(this).data("seq");
                var url = "/admin/recruit/recruit_resume_view_print/"+seq;
                var name = "PopPrint";
                var option = "width=720,height=800,top=100,left=200,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,";

                window.open(url, name, option);
            })
        });
    </script>
    <style>
        #resume_title{
            display: block
        }
    </style>
</body>
</html>


