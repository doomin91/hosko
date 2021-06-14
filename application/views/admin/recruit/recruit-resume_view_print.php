<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-ｅquiv='Content-Type' content='text/html; charset=utf-8'/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="/assets/css/font-awesome.css" rel="stylesheet">
        <style>
            body { font-family:'NanumGothic', '나눔고딕', 'dotum', '돋움'; font-size: 10px; line-height:18px; -webkit-font-smoothing: antialiased; }
            .print_content {position:relative; width:700px;  }
            .print_content .header-text p {font-size: 13px;}
            .table {position:relative; width:100%;border-bottom:1px solid #777575;}
            .table table {width: 100%; border-spacing: 0;  }
            .table table tr {height: 35px; line-height: 18px; padding: 5px 0;  }
            .table table tr th {text-align: left; font-weight: bold;  padding-left: 5px; background-color:#e5e5e5; border-top:1px solid #777575; }
            .table table tr td {padding-left:10px; padding-top:5px; padding-bottom:5px; border-top:1px solid #777575; word-break: break-all}
            .approval_div {width: 160px; padding:5px; float:left;}
            .box_h30 {height:30px; vertical-align: middle; line-height: 30px; border-top-left-radius: 5px; border-top-right-radius: 5px; text-align: center; border:1px solid #777575;}
            .box_h60 {height:50px; vertical-align: middle; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-align: center; line-height: 22px; text-align: center; margin-top:-1px; border:1px solid #777575;}
            .comment {width: 100%;}
            .comment .comment_name {width: 100px; display: inline-block}
            .comment .comment_description {width: 300px; display: inline-block; word-break:break-all}
            .comment .comment_date {width: 130px; display: inline-block}

            .table_c {position:relative; width:100%; border-bottom:1px solid #777575;}
            .table_c table {width: 100%; border-spacing: 0; }
            .table_c table tr {height: 35px; line-height: 18px; padding: 5px 0; }
            .table_c table tr th {text-align:center; font-weight: bold; background:#e5e5e5; padding-left: 5px; border-top:1px solid #777575;}
            .table_c table tr td {padding-left:10px; padding-top:5px; padding-bottom:5px; text-align:center; border-top:1px solid #777575; word-break: break-all}
            .text-center {text-align:center;}
            .bg_bc01 {background-color:#e5e5e5; }
        </style>
    </head>
	<body class="bg-1">

		<!-- Preloader -->
		<div class="mask"><div id="loader"></div></div>
		<!--/Preloader -->

		<!-- Wrap all page content here -->
		<div id="wrap">

		<!-- Make page fluid -->
			<div class="row">

			<!-- Page content -->
			<div id="content" class="col-md-12">

			<!-- content main container -->
			<div class="main">

				<div class="row">
					<div class="col-md-12">
						<section class="tile transparent">
							<div class="tile-body color transparent-black rounded-corners">
								<span id="resume_title" class="col-sm-offset-4 col-sm-4 text-center"> <?php echo $RESUME_INFO->RESUME_USER_NAME ?> </span>
								<div id="resume_photo" class="col-sm-offset-4 col-sm-4 text-center"> <?php echo $RESUME_INFO->RESUME_USER_NAME ?> </div>
							</div>
						</section>
					</div>
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<section class="tile transparent">
							<div class="tile-body color transparent-black rounded-corners">
								<div class="col-sm-offset-4 col-sm-4 text-center"> <?php echo $RESUME_INFO->RESUME_USER_NAME ?> </div>
								<table class="table table-custom dataTable applyViewTable">
									<tbody>
										<tr>
											<th class="col-sm-2">Address</th>
											<td class="col-sm-10"><?php echo $RESUME_INFO->RESUME_USER_ADDR ?></td>
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
							<div class="tile-body color transparent-black rounded-corners">
								<table class="table table-custom dataTable applyViewTable">
									<tbody>
										<tr>
											<th colspan="4">PERSONAL PARTICULARS</th>
										</tr>
										<tr>
											<th class="col-sm-3">Age</th>
											<td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_ADDR ?></td>
											<th class="col-sm-3">Date of Birth</th>
											<td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_DOB ?></td>
										</tr>
										<tr>
											<th class="col-sm-3">Nationality</th>
											<td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_NATIONALITY ?></td>
											<th class="col-sm-3">Gender</th>
											<td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_GENDER ?></td>
										</tr><tr>
											<th class="col-sm-3">Martial Status</th>
											<td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_MARITAL_STATUS ?></td>
											<th class="col-sm-3">Gender</th>
											<td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_IC_NUMBER ?></td>
										</tr><tr>
											<th class="col-sm-3">Permanent Residence</th>
											<td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_PERMANENT_RESIDENCE ?></td>
											<th class="col-sm-3">Religion</th>
											<td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_RELIGION ?></td>
										</tr><tr>
											<th class="col-sm-3">City of Birth</th>
											<td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_COB ?></td>
											<th class="col-sm-3">Graduation Date</th>
											<td class="col-sm-3"><?php echo $RESUME_INFO->RESUME_USER_DOG ?></td>
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
										<tr>
											<th class="col-sm-2">Career Goal</th>
											<td colspan="3" class="col-sm-10"><?php echo $RESUME_INFO->RESUME_USER_GOAL ?></td>
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
							<div class="tile-body color transparent-black rounded-corners">
								<table class="table table-custom dataTable applyViewTable">
									<tbody>
										<tr>
											<th colspan="2">EDUCATION</th>
										</tr>
										<tr>
											<th class="col-sm-5"><?php echo $RESUME_INFO->RESUME_USER_EDUCATION1_DATE ?></th>
											<td class="col-sm-7"><?php echo $RESUME_INFO->RESUME_USER_EDUCATION1 ?></td>
										</tr>
										<tr>
											<th class="col-sm-5"><?php echo $RESUME_INFO->RESUME_USER_EDUCATION2_DATE ?></th>
											<td class="col-sm-7"><?php echo $RESUME_INFO->RESUME_USER_EDUCATION2 ?></td>
										</tr>
										<tr>
											<th class="col-sm-5"><?php echo $RESUME_INFO->RESUME_USER_EDUCATION3_DATE ?></th>
											<td class="col-sm-7"><?php echo $RESUME_INFO->RESUME_USER_EDUCATION3 ?></td>
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
							<div class="tile-body color transparent-black rounded-corners">
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
							<div class="tile-body color transparent-black rounded-corners">
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
							<div class="tile-body color transparent-black rounded-corners">
								<table class="table table-custom dataTable applyViewTable">
									<tbody>
										<tr>
											<th colspan="2">⊙ ACHIEVEMENTS</th>
										</tr>
									<?php foreach($RESUME_AHIEVEMENT as $AHVMNT) :?>
										<tr>
											<td class="col-sm-5"><?php echo $AHVMNT->RACHV_NAME?></td>
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
							<div class="tile-body color transparent-black rounded-corners">
								<table class="table table-custom dataTable applyViewTable">
									<tbody>
										<tr>
											<th colspan="2">⊙ PROFESSIONAL SKILLS</th>
										</tr>
									<?php foreach($RESUME_SKILL as $SKL) :?>
										<tr>
											<td class="col-sm-7"><?php echo $SKL->RSKL_NAME?></td>
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
							<div class="tile-body color transparent-black rounded-corners">
								<table class="table table-custom dataTable applyViewTable">
									<tbody>
										<tr>
											<th colspan="3">⊙ LANGUAGE SKILLS</th>
										</tr>
									<?php foreach($RESUME_LANGUAGE as $LANG) :?>
										<tr>
											<td class="col-sm-4"><?php echo $LANG->RLANG_NAME?></td>
											<td class="col-sm-4"><?php echo $LANG->RLANG_SPEAKING?></td>
											<td class="col-sm-4"><?php echo $LANG->RLANG_LISTENING?></td>
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
							<div class="tile-body color transparent-black rounded-corners">
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

			</div>
			<!-- /content container -->

			</div>
			<!-- Page content end -->

		</div>
		<!-- Make page fluid-->

		</div>
		<!-- Wrap all page content end -->

	</body>
</html>
<script>
	window.print();
    window.onfocus=function(){ window.close();}
</script>