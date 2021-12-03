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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>포지션공고 등록</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">수속관리</a></li>
				<li class="active">유학목록</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">

          <form name="abroadRegisterForm" id="abroadRegisterForm" class="form-horizontal" method="post" action="/admin/recruit/recruit_abroad_new_proc" role="form">
            <input type="hidden" name="user_ip" value="<?php echo $USER_IP?>">
            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata("admin_id")?>">
			<div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
                        <!-- tile header -->
                        <div class="header-text">
                            <p class="apply_detail_view"><strong>기본정보</strong></p>
                        </div>
                        <!-- tile body -->
                        
						<div class="tile color transparent-black rounded-corners">
							<table class="table datatable table-custom applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">컨텐츠분류</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-6">
                                                <select name="ctg" class="ctg_select common_select" >
                                                    <option value="" >:: 대분류 ::</option>
                                                    <option value="1" >인턴쉽</option>
                                                    <option value="2" >채용&헤드헌팅</option>
                                                    <option value="3" >유학</option>
                                                </select>
                                                
                                                <select name="ctg2" class="ctg_select common_select">
                                                    <option value="" selected>:: 중분류 ::</option>
                                                </select>

                                                <select name="ctg3" class="ctg_select common_select">
                                                    <option value="" selected>:: 소분류 ::</option>
                                                </select>
                                            </div>
                                        </td>
									</tr>
									<tr>
                                        <th class="col-sm-2">컨텐츠명</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-4">
                                                <input type="text" class="common_input wid100p" id="abroad_contents_title" name="abroad_contents_title" value="">
                                            </div></td>
									</tr>
                                    <tr>
                                        <th class="col-sm-2">마감</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-6">
                                                <label for="abroad_status_open"><input type="radio" name="abroad_status" id="abroad_status_open" value="1" > 모집중 </label>
                                                <label for="abroad_status_close"><input type="radio" name="abroad_status" id="abroad_status_close" value="0" > 마감 </label>
                                            </div></td>
									</tr>
                                    <tr>
                                        <th class="col-sm-2">조회수</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-2">
                                                <input type="text" class="common_input" id="abroad_hit_count" name="abroad_hit_count" value="0">
                                            </div></td>
									</tr>
                                    <tr>
                                        <th class="col-sm-2">담당</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-2">
                                                <input type="text" class="common_input" id="abroad_manager" name="abroad_manager" value="<?php echo $this->session->userdata("admin_id")?>">
                                            </div>
                                        </td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
                        <!-- tile header -->
                        <div class="header-text">
                            <p class="apply_detail_view"><strong>컨텐츠정보</strong></p>
                        </div>
                        <!-- tile body -->
						<div class="tile color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyViewTable">
								<tbody>
                                    <tr>
										<th class="col-sm-2" rowspan="12">컨텐츠 정보</th>
                                        <td class="col-sm-1 text-center">국가/도시</td>
                                        <td class="col-sm-8 zeropd">
                                            <div class="col-sm-11">
                                                <textarea class="common_input wid100p" name="abroad_country" id="abroad_country"></textarea>
                                            </div></td>
									</tr>
									<tr>
                                        <td class="col-sm-1 text-center">유학분류</td>
                                        <td class="col-sm-8 zeropd">
                                            <div class="col-sm-11">
                                                <textarea class="common_input wid100p" name="abroad_type" id="abroad_type"></textarea>
                                            </div></td>
									</tr>
									<tr>
                                        <td class="col-sm-1 text-center">기간</td>
                                        <td class="col-sm-8 zeropd">
                                            <div class="col-sm-11">
                                                <textarea class="common_input wid100p" name="abroad_period" id="abroad_period"></textarea>
                                            </div></td>
									</tr>
									<tr>
                                        <td class="col-sm-1 text-center">채용분야</td>
                                        <td class="col-sm-8 zeropd">
                                            <div class="col-sm-11">
                                                <textarea class="common_input wid100p" name="abroad_recruit_type" id="abroad_recruit_type"></textarea>
                                            </div></td>
									</tr>
									<tr>
                                        <td class="col-sm-1 text-center">채용마감</td>
                                        <td class="col-sm-8 zeropd">
                                            <div class="col-sm-11">
                                                <textarea class="common_input wid100p" name="abroad_deadline" id="abroad_deadline"></textarea>
                                            </div></td>
									</tr>
									<tr>
                                        <td class="col-sm-1 text-center">면접방식</td>
                                        <td class="col-sm-8 zeropd">
                                            <div class="col-sm-11">
                                                <textarea class="common_input wid100p" name="abroad_interview_type" id="abroad_interview_type"></textarea>
                                            </div></td>
									</tr>
									<tr>
                                        <td class="col-sm-1 text-center">면접일자</td>
                                        <td class="col-sm-8 zeropd">
                                            <div class="col-sm-11">
                                                <textarea class="common_input wid100p" name="abroad_interview_date" id="abroad_interview_date"></textarea>
                                            </div></td>
									</tr>
									<tr>
                                        <td class="col-sm-1 text-center">자격요건</td>
                                        <td class="col-sm-8 zeropd">
                                            <div class="col-sm-11">
                                                <textarea class="common_input wid100p" name="abroad_prerequisite" id="abroad_prerequisite"></textarea>
                                            </div></td>
									</tr>
									<tr>
                                        <td class="col-sm-1 text-center">급여</td>
                                        <td class="col-sm-8 zeropd">
                                            <div class="col-sm-11">
                                                <textarea class="common_input wid100p" name="abroad_pay" id="abroad_pay"></textarea>
                                            </div></td>
									</tr>
									<tr>
                                        <td class="col-sm-1 text-center">숙소</td>
                                        <td class="col-sm-8 zeropd">
                                            <div class="col-sm-11">
                                                <textarea class="common_input wid100p" name="abroad_accomdation" id="abroad_accomdation"></textarea>
                                            </div></td>
									</tr>
									<tr>
                                        <td class="col-sm-1 text-center">복지</td>
                                        <td class="col-sm-8 zeropd">
                                            <div class="col-sm-11">
                                                <textarea class="common_input wid100p" name="abroad_welfare" id="abroad_welfare"></textarea>
                                            </div></td>
									</tr>
									<tr>
                                        <td class="col-sm-1 text-center">비자</td>
                                        <td class="col-sm-8 zeropd">
                                            <div class="col-sm-11">
                                                <textarea class="common_input wid100p" name="abroad_visa" id="abroad_visa"></textarea>
                                            </div></td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
                        <!-- tile header -->
                        <div class="header-text">
                            <p class="apply_detail_view"><strong>컨텐츠사진</strong></p>
                        </div>
                        <!-- tile body -->
						<div class="tile color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">원본 이미지</th>
                                        <td>
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="input-group col-sm-12">
                                                        <span class="input-group-btn">
                                                            <span class="btn btn-primary btn-file">
                                                            <i class="fa fa-upload"></i><input type="file" id="abroad_origin_pic" name="abroad_pics[]">
                                                            </span>
                                                        </span>
                                                        <input type="text" class="form-control file_view" readonly="">
                                                    </div>
                                                    <p style="margin-top: 5px;">
                                                    원본이미지를 등록하면 나머지 이미지가 자동생성 됩니다.
                                                    </p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p style="margin-top: 7px; margin-left: -15px"> [GIF, JPG, PNG] </p>
                                                </div>
                                            </div>
                                        </td>
									</tr>
                                    <tr>
                                        <th class="col-sm-2">컨텐츠목록 이미지 * <br> => 크기 : 200* x 200*</th>
                                        <td >
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="input-group col-sm-12">
                                                        <span class="input-group-btn">
                                                            <span class="btn btn-primary btn-file disabled">
                                                            <i class="fa fa-upload"></i><input type="file" id="abroad_contents_pic" name="abroad_pics[]">
                                                            </span>
                                                        </span>
                                                        <input type="text" class="form-control file_view" readonly="">
                                                    </div>  
                                                </div>
                                            </div>                                      
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2">축소 이미지1 <br> => 크기 : 200 x 200</th>
                                        <td>
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="input-group col-sm-12">
                                                        <span class="input-group-btn">
                                                            <span class="btn btn-primary btn-file disabled">
                                                            <i class="fa fa-upload"></i><input type="file" id="abroad_contents_small_pic" name="abroad_pics[]">
                                                            </span>
                                                        </span>
                                                        <input type="text" class="form-control file_view" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2">제품상세 이미지1 * <br> =>크기 : 200 x 200</th>
                                        <td>
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="input-group col-sm-12">
                                                        <span class="input-group-btn">
                                                            <span class="btn btn-primary btn-file disabled">
                                                            <i class="fa fa-upload"></i><input type="file" id="abroad_contents_medium_pic" name="abroad_pics[]">
                                                            </span>
                                                        </span>
                                                        <input type="text" class="form-control file_view" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2">확대 이미지1 * <br> =>크기 : 200 x 200</th>
                                        <td>
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="input-group col-sm-12">
                                                        <span class="input-group-btn">
                                                            <span class="btn btn-primary btn-file disabled">
                                                            <i class="fa fa-upload"></i><input type="file" id="abroad_contents_large_pic" name="abroad_pics[]">
                                                            </span>
                                                        </span>
                                                        <input type="text" class="form-control file_view" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                        
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
                        <!-- tile header -->
                        <div class="header-text">
                            <p class="apply_detail_view"><strong>컨텐츠설명</strong></p>
                        </div>
                        <!-- tile body -->
						<div class="tile color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-12 text-center">상세설명</th>
									</tr>
                                    <tr>
                                        <td class="col-sm-12">
                                            <div class="col-sm-12 transparent-editor">
                                               <textarea class="form-control " name="abroad_detail" id="abroad_detail"></textarea>
                                            </div>
                                            
                                        </td>
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
                <div class="col-md-4 text-left">
                    <!-- <input type="button" id="apply_view_print" class="btn btn-default" value="인쇄하기"> -->
                </div>
                <div class="col-md-8 text-right">
                    <input type="button" class="btn btn-primary" name="abroad_submit" id="abroad_submit" value="확인">
                    <a href ="/admin/recruit/recruit_abroad_list" class="btn btn-default">목록</a>
                </div>
            </div>
            <!-- /row -->
            </form>
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
            var FILE = new FormData();
            
            $("#apply_view_print").on("click", function(){
                alert("인쇄하기");
            });

            $("#abroad_submit").on("click", function(){
                var fd = new FormData();
                var is_blank = false;

                var form_data = $('#abroadRegisterForm').serializeArray(); // serialize 사용
                $.each(form_data, function (key, input) {
                    // if(input.value=="" && input.name != "abroad_detail"){
                        // console.log($(input));
                        // alert("빈 값을 넣어주세요");
                        // var ip = $(`textarea[name=${input.name}]`);
                        // console.log(ip);
                        // $(ip).focus();
                        // is_blank = true;
                        // return false;
                    // }
                    if(input.name == "ctg"){
                        if(input.value == ""){
                            alert("컨텐츠 분류를 선택해주세요 (대분류)");
                            is_blank = true;
                            return false;
                        }
                        
                    }

                    if(input.name == "abroad_contents_title"){
                        if(input.value == ""){
                            alert("컨텐츠 명을 입력해주세요");
                            is_blank = true;
                            return false;
                        }
                    }
                    
                    console.log(input);
                    if(input.name=="abroad_detail"){
                        input.value = $("#abroad_detail").code();
                    }
                    fd.append(input.name, input.value);
                });

                if(is_blank){
                    return false;
                }
                
                for (var key of FILE.keys()) {
                    fd.append(key, FILE.get(key));
                }

                for (var key of fd.keys()) {
                    console.log(key);
                }

                // FormData의 value 확인
                for (var value of fd.values()) {
                    console.log(value);
                }
                // return 0;
                $.ajax({
                    url: "/admin/recruit/recruit_abroad_new_proc",
                    type: "POST",
                    data: fd,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function(resultMsg){
                        console.log(resultMsg);
                        if(resultMsg.code == "200"){
                            alert("생성 되었습니다");
                            document.location.href="/admin/recruit/recruit_abroad_list";
                        }else{
                            console.log("문제 발생");
                        }
                    },
                    error: function (request, status, error){        
                        console.log(error);
                    }
                });
            });

            $(".ctg_select").on("change", function(){
                var ctg = "";
                var ctg2 = "";
                var ctg3 = "";
                var ctg2Html = "";
                var ctg3Html = "";
                
                console.log($(this));

                if($(this).is("select[name=ctg]")){
                    ctg = $(this).val();
                    if(ctg == ""){
                        ctg2Html = ""
                                + "<option value=\"\">:: 중분류 ::</option>";
                        ctg3Html = ""
                                + "<option value=\"\">:: 소분류 ::</option>";
                        $("select[name=ctg3]").html(ctg3Html);
                        $("select[name=ctg3] option[value='"+ctg3+"']").attr("selected", 'selected');
                    }else if(ctg == 1){
                        ctg2Html = ""
                                + "<option value=\"\">:: 중분류 ::</option>"
                                + "<option value=\"10\">해외호텔 인턴쉽</option>"
                                + "<option value=\"11\">해외 외식전문 인턴쉽</option>"
                                + "<option value=\"12\">국내호텔 인턴쉽</option>";

                    }else if(ctg == 2){
                        ctg2Html = ""
                                + "<option value=\"\">:: 중분류 ::</option>"
                                + "<option value=\"20\">Job</option>"
                                + "<option value=\"21\">Headhunting</option>";

                    }else if(ctg == 3){
                        ctg2Html = ""
                                + "<option value=\"\">:: 중분류 ::</option>"
                                + "<option value=\"30\">영어권유학</option>"
                                + "<option value=\"31\">일본어 및 기타국가 유학</option>"
                                + "<option value=\"32\">해외추업교육과정</option>"
                                + "<option value=\"32\">EMT 영어캠프</option>";
                    }
                    $("select[name=ctg2]").html(ctg2Html);
                    $("select[name=ctg2] option[value='"+ctg2+"']").attr("selected", 'selected');
                }else if($(this).is("select[name=ctg2]")){
                    ctg2 = $(this).val();
                    if(ctg2 == ""){
                        ctg3Html = ""
                                + "<option value=\"\">:: 소분류 ::</option>";
                    }else if(ctg2 == 10){
                        ctg3Html = ""
                                + "<option value=\"\">:: 소분류 ::</option>"
                                + "<option value=\"100\">호텔 인턴 및 직원 채용</option>"
                                + "<option value=\"101\">조리인턴 및 직원 채용</option>"
                                + "<option value=\"102\">Management Trainee</option>";
                                + "<option value=\"103\">기타</option>";
                    }else if(ctg2 == 11){
                        ctg3Html = ""
                                + "<option value=\"\">:: 소분류 ::</option>"
                                + "<option value=\"110\">호텔 인턴 및 직원 채용</option>"
                                + "<option value=\"111\">조리인턴 및 직원 채용</option>"
                                + "<option value=\"112\">기타</option>";
                    }else if(ctg2 == 12){
                        ctg3Html = ""
                                + "<option value=\"\">:: 소분류 ::</option>"
                                + "<option value=\"120\">호텔 인턴 및 직원 채용</option>"
                                + "<option value=\"121\">조리인턴 및 직원 채용</option>"
                                + "<option value=\"122\">기타</option>";
                    }else if(ctg2 == 20){
                        ctg3Html = ""
                                + "<option value=\"\">:: 소분류 ::</option>"
                                + "<option value=\"200\">국내호텔 직원 채용</option>"
                                + "<option value=\"201\">해외취업</option>"
                                + "<option value=\"202\">유학+취업프로그램</option>"
                                + "<option value=\"203\">크루즈</option>";
                    }else if(ctg2 == 21){
                        ctg3Html = ""
                                + "<option value=\"\">:: 소분류 ::</option>"
                                + "<option value=\"210\">호스코 귀국 회원 채용 정보</option>"
                                + "<option value=\"211\">호텔 및 기타 헤드헌팅</option>";
                    }else if(ctg2 == 30){
                        ctg3Html = ""
                                + "<option value=\"\">:: 소분류 ::</option>";
                    }else if(ctg2 == 31){
                        ctg3Html = ""
                                + "<option value=\"\">:: 소분류 ::</option>";
                    }else if(ctg2 == 32){
                        ctg3Html = ""
                                + "<option value=\"\">:: 소분류 ::</option>";
                    }else if(ctg2 == 33){
                        ctg3Html = ""
                                + "<option value=\"\">:: 소분류 ::</option>";
                    }
                    $("select[name=ctg3]").html(ctg3Html);
                    $("select[name=ctg3] option[value='"+ctg3+"']").attr("selected", 'selected');
                }
                
            });
            
            $("input[name='abroad_pics[]']").change(function(){
                FILE = new FormData();
                var file = this.files[0];
                var parent = $(this).closest(".input-group");
                // $(this).val("test");
                console.log(parent);
                var input = $(parent).find(".file_view");
                console.log(input);
                $(input).val(file['name']);
                // console.log(file['name']);
                // console.log(input);
                console.log(file);
                console.log(this.id);

                FILE.append(this.id, file);

                // for (var key of FILES.keys()) {
                // console.log(key);
                // }

                // // FormData의 value 확인
                // for (var value of FILES.values()) {
                // console.log(value);
                // }
            });

            $('#abroad_detail').summernote({
                height: 500,                 // 에디터 높이
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                onImageUpload: function(files, editor, welEditable) {
                        uploadImage(files[0], editor, welEditable);
                }
            });

            function uploadImage(image, editor, welEditable){
                var data = new FormData();
                data.append("image", image);
                //console.log("AAAAA");
                $.ajax({
                    url : "/admin/recruit/recruit_abroad_upload_contents_image",
                    cache : false,
                    contentType : false,
                    processData : false,
                    data : data,
                    type : "POST",
                    dataType : "JSON",
                    success : function(resultMsg){
                        if (resultMsg.code == "200"){
                            console.log(resultMsg);
                            editor.insertImage(welEditable, resultMsg.image_url);
                        }else{
                            console.log(resultMsg);
                            alert(resultMsg.msg);
                        }
                    }, error : function(data){
                        console.log(data);
                    }
                })
            }

        });
    </script>
    <style>
        .applyTopViewTable{
            height: 90px;
        }
        
        .common_select{
            padding: 7px 10px;
			border-radius: 5px;
			margin-bottom: 5px !important;
			margin: 5px !important;
			border: 0;
			background-color: #f3f3f3;
			color: #555;
			border: 1px solid #e4e4e4;
        }
        
        .common_input{
            padding: 7px 10px;
			border-radius: 5px;
			margin-bottom: 5px !important;
			margin: 5px !important;
			border: 0;
			background-color: #f3f3f3;
			color: #555;
			border: 1px solid #e4e4e4;
        }
        
        .note-editable{
            overflow-y: auto;
            background-color: #f3f3f3 !important;
			color: #555 !important;
        }

        .file_view{
            background-color: #e4e4e4 !important;
        }

        .ui-tooltip-content{
            
        }
        .ui-tooltip{
            background: #f3f3f3;
            opacity: 1;
        }
        

    </style>
</body>
</html>