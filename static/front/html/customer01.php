<?php include 'header.php'; ?>

    <body>

        <div id="wrap" class="main_wrap">

            <?php include 'nav.php'; ?>

            <div id="container">
                <div class="layout_sub">
                    <div class="sub_visual v01">
                        <div class="sub_visual_text">
                            <h1>상담ㆍ신청</h1>
                            <p>HOSPITALITY KOREA</p>
                        </div>

                    </div>
                    <div class="sub_contents">
                        <div class="sub_category">
                            <ul>
                                <li class="on"><a href="/">Q&A</a></li>
                                <li><a href="/">온라인 상담</a></li>
                                <li><a href="/">방문상담신청</a></li>
                                <li><a href="/">포지션ㆍ연수 지원</a></li>
                                <li><a href="/">설명회신청</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>온라인 상담</h2>
                                </div>
                                <div class="subContSec">
                                    <div class="boardWriteTop">

                                        <div class="type_tableWrite">
                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>작성자</strong>
                                                    <div class="type_td">
                                                        <input type="text" class="input_s1">								
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>이메일</strong>
                                                    <div class="type_td">
                                                        <input type="email" class="input_s1">
                                                    </div>
                                                </div>                               
                                            </div>


                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>제목</strong>
                                                    <div class="type_td">
                                                        <div class="boardSelect">
                                                            <select name="" id="" class="select_s1">
                                                                <option value="">111</option>
                                                                <option value="">222</option>
                                                                <option value="">333</option>
                                                                <option value="">444</option>

                                                            </select>
                                                        </div>
                                                        <div class="boardInputText">
                                                            <input type="text" class="input_s1">
                                                        </div>
                                                    </div>
                                                </div>                               
                                            </div>

                                        </div>
                                    </div>


                                    <div class="boardWriteCont">

                                        <div class="type_tableWrite">
                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>내용</strong>
                                                    <div class="type_td">
                                                        <textarea class="textarea_s1"> </textarea>								
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>첨부파일</strong>
                                                    <div class="type_td">
                                                        <div class="filebox file_s1">
                                                            <label for="file">파일선택</label> 
                                                            <input type="file" id="file" > 

                                                            <input class="upload-name" value="선택된 파일 없음">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>



                                    <div class="boardBtnArea pb50">
                                        <div class="btn_box f_left">
                                            <a href="/"  class="btn_style01 ">목록보기</a>
                                        </div>

                                        <div class="btn_box f_right">
                                            <a href="/"  class="btn_style02">확인하기</a>
                                        </div>

                                        <div class="btn_box f_right">
                                            <a href="/"  class="btn_style01">취소하기</a>
                                        </div>

                                    </div>


                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>

        <?php include 'footer.php'; ?>

        </div>


<script>
$("#file").on('change',function(){
  var fileName = $("#file").val();
  $(".upload-name").val(fileName);
});
</script>



    </body>
</html>






