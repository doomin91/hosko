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
            url : "/administrator/home/login_proc",
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

    $(document).on("click", "#notice-save", function(){
        var notice_title = $("input[name=notice_title]").val();
        //var notice_contents = CKEDITOR.instances["notice_contents"].getData();
        var notice_contents = $("#notice_contents").Editor("getText");

        var formData = new FormData();
        formData.append("notice_title", notice_title);
        formData.append("notice_contents", notice_contents);
        formData.append("notice_file_name", $("input[name=notice_file_name]").prop("files")[0]);

        if (notice_title == ""){
            alert("공지사항 제목을 입력해주세요");
            $("input[name=notice_title]").focus();
            return false;
        }

        if (notice_contents == ""){
            alert("공지사항 내용을 입력해주세요");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/notice/notice_write_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 작성되었습니다.");
                    document.location.href="/administrator/notice";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#notice-modify", function(){
        var seq = $("input[name=seq]").val();
        var notice_title = $("input[name=notice_title]").val();
        //var notice_contents = CKEDITOR.instances["notice_contents"].getData();
        var notice_contents = $("#notice_contents").Editor("getText");

        var formData = new FormData();
        formData.append("seq", seq);
        formData.append("notice_title", notice_title);
        formData.append("notice_contents", notice_contents);
        formData.append("notice_file_name", $("input[name=notice_file_name]").prop("files")[0]);

        if (notice_title == ""){
            alert("공지사항 제목을 입력해주세요");
            $("input[name=notice_title]").focus();
            return false;
        }

        if (notice_contents == ""){
            alert("공지사항 내용을 입력해주세요");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/notice/notice_modify_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 수정되었습니다.");
                    document.location.href="/administrator/notice/notice_view/"+seq;
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#notice_del", function(){
        var seq = $(this).data("seq");

        if (confirm("삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/notice/notice_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("게시물이 삭제되었습니다.");
                        document.location.href="/administrator/notice";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#press-save", function(){
        var press_title = $("input[name=press_title]").val();
        var press_contents = $("#press_contents").Editor("getText");
        var press_link = $("input[name=press_link]").val();

        var formData = new FormData();
        formData.append("press_title", press_title);
        formData.append("press_contents", press_contents);
        formData.append("press_link", press_link);
        formData.append("press_thumbnail", $("input[name=press_thumbnail]").prop("files")[0]);

        if (press_title == ""){
            alert("보도자료 제목을 입력해주세요");
            $("input[name=notice_title]").focus();
            return false;
        }

        if (press_contents == ""){
            alert("보도자료 내용을 입력해주세요");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/press/press_write_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 작성되었습니다.");
                    document.location.href="/administrator/press";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#press-modify", function(){
        var seq = $("input[name=seq]").val();
        var press_title = $("input[name=press_title]").val();
        var press_contents = $("#press_contents").Editor("getText");
        var press_link = $("input[name=press_link]").val();

        var formData = new FormData();
        formData.append("seq", seq);
        formData.append("press_title", press_title);
        formData.append("press_contents", press_contents);
        formData.append("press_link", press_link);
        formData.append("press_thumbnail", $("input[name=press_thumbnail]").prop("files")[0]);

        if (press_title == ""){
            alert("보도자료 제목을 입력해주세요");
            $("input[name=press_title]").focus();
            return false;
        }

        if (press_contents == ""){
            alert("보도자료 내용을 입력해주세요");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/press/press_modify_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 수정되었습니다.");
                    document.location.href="/administrator/press/press_view/"+seq;
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#press_del", function(){
        var seq = $(this).data("seq");

        if (confirm("삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/press/press_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("게시물이 삭제되었습니다.");
                        document.location.href="/administrator/press";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#brochure-save", function(){
        var brochure_title = $("input[name=brochure_title]").val();
        var brochure_contents = $("#brochure_contents").Editor("getText");
        var test = $("input[name=brochure_file_name]").prop("files")[0];
        var formData = new FormData();
        formData.append("brochure_title", brochure_title);
        formData.append("brochure_contents", brochure_contents);
        formData.append("brochure_file_name", $("input[name=brochure_file_name]").prop("files")[0]);

        if (brochure_title == ""){
            alert("브로슈어 제목을 입력해주세요");
            $("input[name=brochure_title]").focus();
            return false;
        }

        if (brochure_contents == ""){
            alert("브로슈어 내용을 입력해주세요");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/brochure/brochure_write_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 작성되었습니다.");
                    document.location.href="/administrator/brochure";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#brochure-modify", function(){
        var seq = $("input[name=seq]").val();
        var brochure_title = $("input[name=brochure_title]").val();
        var brochure_contents = $("#brochure_contents").Editor("getText");

        var formData = new FormData();
        formData.append("seq", seq);
        formData.append("brochure_title", brochure_title);
        formData.append("brochure_contents", brochure_contents);
        formData.append("brochure_file_name", $("input[name=brochure_file_name]").prop("files")[0]);

        if (brochure_title == ""){
            alert("브로슈어 제목을 입력해주세요");
            $("input[name=brochure_title]").focus();
            return false;
        }

        if (brochure_contents == ""){
            alert("브로슈어 내용을 입력해주세요");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/brochure/brochure_modify_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 수정되었습니다.");
                    document.location.href="/administrator/brochure/brochure_view/"+seq;
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#brochure_del", function(){
        var seq = $(this).data("seq");

        if (confirm("삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/brochure/brochure_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("게시물이 삭제되었습니다.");
                        document.location.href="/administrator/brochure";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#promotion_del", function(){
        var seq = $(this).data("seq");

        if (confirm("삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/promotion/promotion_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("게시물이 삭제되었습니다.");
                        document.location.href="/administrator/promotion";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#manual-save", function(){
        var manual_title = $("input[name=manual_title]").val();
        var manual_contents = $("#manual_contents").Editor("getText");

        var formData = new FormData();
        formData.append("manual_title", manual_title);
        formData.append("manual_contents", manual_contents);
        formData.append("manual_file_name", $("input[name=manual_file_name]").prop("files")[0]);

        if (manual_title == ""){
            alert("메뉴얼 제목을 입력해주세요");
            $("input[name=manualtitle]").focus();
            return false;
        }

        if (manual_contents == ""){
            alert("메뉴얼 얼용을 입력해주세요");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/manual/manual_write_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 작성되었습니다.");
                    document.location.href="/administrator/manual";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#manual-modify", function(){
        var seq = $("input[name=seq]").val();
        var manual_title = $("input[name=manual_title]").val();
        var manual_contents = $("#manual_contents").Editor("getText");

        var formData = new FormData();
        formData.append("seq", seq);
        formData.append("manual_title", manual_title);
        formData.append("manual_contents", manual_contents);
        formData.append("manual_file_name", $("input[name=manual_file_name]").prop("files")[0]);

        if (manual_title == ""){
            alert("메뉴얼 제목을 입력해주세요");
            $("input[name=manual_title]").focus();
            return false;
        }

        if (manual_contents == ""){
            alert("메뉴얼 내용을 입력해주세요");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/manual/manual_modify_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 수정되었습니다.");
                    document.location.href="/administrator/manual/manual_view/"+seq;
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#manual_del", function(){
        var seq = $(this).data("seq");

        if (confirm("삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/manual/manual_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("게시물이 삭제되었습니다.");
                        document.location.href="/administrator/manual";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#update-save", function(){
        var update_title = $("input[name=update_title]").val();
        var update_contents = $("#update_contents").Editor("getText");

        var formData = new FormData();
        formData.append("update_title", update_title);
        formData.append("update_contents", update_contents);
        formData.append("update_file_name", $("input[name=update_file_name]").prop("files")[0]);

        if (update_title == ""){
            alert("메뉴얼 제목을 입력해주세요");
            $("input[name=update_title]").focus();
            return false;
        }

        if (update_contents == ""){
            alert("메뉴얼 얼용을 입력해주세요");
            return false;
        }
        console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/update/update_write_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 작성되었습니다.");
                    document.location.href="/administrator/update";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#update-modify", function(){
        var seq = $("input[name=seq]").val();
        var update_title = $("input[name=update_title]").val();
        var update_contents = $("#update_contents").Editor("getText");
        //console.log(update_title);
        //console.log(update_contents);

        var formData = new FormData();
        formData.append("seq", seq);
        formData.append("update_title", update_title);
        formData.append("update_contents", update_contents);
        formData.append("update_file_name", $("input[name=update_file_name]").prop("files")[0]);

        if (update_title == ""){
            alert("메뉴얼 제목을 입력해주세요");
            $("input[name=update_title]").focus();
            return false;
        }

        if (update_contents == ""){
            alert("메뉴얼 내용을 입력해주세요");
            return false;
        }
        console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/update/update_modify_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 수정되었습니다.");
                    document.location.href="/administrator/update/update_view/"+seq;
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#update_del", function(){
        var seq = $(this).data("seq");

        if (confirm("삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/update/update_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("게시물이 삭제되었습니다.");
                        document.location.href="/administrator/update";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#award-save", function(){
        var award_title = $("input[name=award_title]").val();

        var formData = new FormData();
        formData.append("award_title", award_title);
        formData.append("award_image", $("input[name=award_image]").prop("files")[0]);

        if (award_title == ""){
            alert("인증 및 수상 타이틀을 입력해주세요");
            $("input[name=award_title]").focus();
            return false;
        }

        if ($("input[name=award_image]").val() == ""){
            alert("인증 및 수상 이미지를 등록해주세요");
            return false;
        }
        console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/award/award_write_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 작성되었습니다.");
                    document.location.href="/administrator/award";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#award-modify", function(){
        var seq = $("input[name=seq]").val();
        var award_title = $("input[name=award_title]").val();

        var formData = new FormData();
        formData.append("seq", seq);
        formData.append("award_title", award_title);
        formData.append("award_image", $("input[name=award_image]").prop("files")[0]);

        if (award_title == ""){
            alert("인증 및 수상 타이틀을 입력해주세요");
            $("input[name=award_title]").focus();
            return false;
        }

        $.ajax({
            type : "POST",
            url : "/administrator/award/award_modify_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 수정되었습니다.");
                    document.location.href="/administrator/award/award_view/"+seq;
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#award_del", function(){
        var seq = $(this).data("seq");

        if (confirm("삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/award/award_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("게시물이 삭제되었습니다.");
                        document.location.href="/administrator/award";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("keypress", "#search", function(key){
        if (key.keyCode == "13"){
            /*
            if ($(this).val() == ""){
                alert("검색어를 입력해주세요");
                return false;
            }else{
                $("#sform").submit();
            }
            */
            $("#sform").submit();
        }
    });

    $(document).on("click", "#thumbnail_del", function(){
        var seq = $(this).data("seq");
        var part = $(this).data("part");

        if (confirm("삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/home/thumbnail_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq,
                    "part" : part
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        document.location.reload();
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#gift_del_with_button", function(){
        var seq = $(this).data("seq");
        var part = $(this).data("part");

        // console.log(seq);
        // console.log(part);
        
        if (confirm("기존에 있던 경품입니다. 삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/home/thumbnail_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq,
                    "part" : part
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        document.location.reload();
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#question_del_with_button", function(){
        var seq = $(this).data("seq");
        var part = $(this).data("part");

        if (confirm("기존에 있던 질문입니다. 삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/home/thumbnail_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq,
                    "part" : part
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        document.location.reload();
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#i24-notice-save", function(){
        var notice_title = $("input[name=notice_title]").val();
        //var notice_contents = CKEDITOR.instances["notice_contents"].getData();
        var notice_contents = $("#notice_contents").Editor("getText");

        if (notice_title == ""){
            alert("공지사항 제목을 입력해주세요");
            $("input[name=notice_title]").focus();
            return false;
        }

        if (notice_contents == ""){
            alert("공지사항 내용을 입력해주세요");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/i24safe/notice_write_proc",
            dataType : "JSON",
            data : {
                "notice_title" : notice_title,
                "notice_contents" : notice_contents
            }, success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 작성되었습니다.");
                    document.location.href="/administrator/i24safe/notice_list";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#i24safe-notice-modify", function(){
        var notice_title = $("input[name=notice_title]").val();
        //var notice_contents = CKEDITOR.instances["notice_contents"].getData();
        var notice_contents = $("#notice_contents").Editor("getText");
        var seq = $("input[name=seq]").val();

        if (notice_title == ""){
            alert("공지사항 제목을 입력해주세요");
            $("input[name=notice_title]").focus();
            return false;
        }

        if (notice_contents == ""){
            alert("공지사항 내용을 입력해주세요");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/i24safe/notice_modify_proc",
            dataType : "JSON",
            data : {
                "notice_title" : notice_title,
                "notice_contents" : notice_contents,
                "seq" : seq,
            }, success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 작성되었습니다.");
                    document.location.href="/administrator/i24safe/notice_list";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#i24safe_notice_del", function(){
        var seq = $(this).data("seq");

        if (confirm("삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/i24safe/notice_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("게시물이 삭제되었습니다.");
                        document.location.href="/administrator/i24safe/notice_list";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#i24-news-save", function(){
        var news_title = $("input[name=news_title]").val();
        //var notice_contents = CKEDITOR.instances["notice_contents"].getData();
        var news_contents = $("#news_contents").Editor("getText");

        if (news_title == ""){
            alert("뉴스 제목을 입력해주세요");
            $("input[name=news_title]").focus();
            return false;
        }

        if (news_contents == ""){
            alert("뉴스 내용을 입력해주세요");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/i24safe/news_write_proc",
            dataType : "JSON",
            data : {
                "news_title" : news_title,
                "news_contents" : news_contents
            }, success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 작성되었습니다.");
                    document.location.href="/administrator/i24safe/news_list";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#i24safe-news-modify", function(){
        var news_title = $("input[name=news_title]").val();
        //var notice_contents = CKEDITOR.instances["notice_contents"].getData();
        var news_contents = $("#news_contents").Editor("getText");
        var seq = $("input[name=seq]").val();

        if (news_title == ""){
            alert("뉴스 제목을 입력해주세요");
            $("input[name=news_title]").focus();
            return false;
        }

        if (news_contents == ""){
            alert("뉴스 내용을 입력해주세요");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/i24safe/news_modify_proc",
            dataType : "JSON",
            data : {
                "news_title" : news_title,
                "news_contents" : news_contents,
                "seq" : seq,
            }, success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("게시물이 작성되었습니다.");
                    document.location.href="/administrator/i24safe/news_list";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#i24safe_news_del", function(){
        var seq = $(this).data("seq");

        if (confirm("삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/i24safe/news_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("게시물이 삭제되었습니다.");
                        document.location.href="/administrator/i24safe/news_list";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#i24safe_support_del", function(){
        var seq = $(this).data("seq");

        if (confirm("삭제하시겠습니까?")){
            $.ajax({
                type : "POST",
                url : "/administrator/i24safe/support_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("게시물이 삭제되었습니다.");
                        document.location.href="/administrator/i24safe/support_list";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#en-notice-save", function(){
        var notice_title = $("input[name=notice_title]").val();
        //var notice_contents = CKEDITOR.instances["notice_contents"].getData();
        var notice_contents = $("#notice_contents").Editor("getText");

        var formData = new FormData();
        formData.append("notice_title", notice_title);
        formData.append("notice_contents", notice_contents);
        formData.append("notice_file_name", $("input[name=notice_file_name]").prop("files")[0]);

        if (notice_title == ""){
            alert("Please enter a title");
            $("input[name=notice_title]").focus();
            return false;
        }

        if (notice_contents == ""){
            alert("Please enter a contents");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/en/notice/notice_write_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("This post has been registered");
                    document.location.href="/administrator/en/notice";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#en-notice-modify", function(){
        var seq = $("input[name=seq]").val();
        var notice_title = $("input[name=notice_title]").val();
        //var notice_contents = CKEDITOR.instances["notice_contents"].getData();
        var notice_contents = $("#notice_contents").Editor("getText");

        var formData = new FormData();
        formData.append("seq", seq);
        formData.append("notice_title", notice_title);
        formData.append("notice_contents", notice_contents);
        formData.append("notice_file_name", $("input[name=notice_file_name]").prop("files")[0]);

        if (notice_title == ""){
            alert("Please enter a title");
            $("input[name=notice_title]").focus();
            return false;
        }

        if (notice_contents == ""){
            alert("Please enter a contents");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/en/notice/notice_modify_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("Posts modified.");
                    document.location.href="/administrator/en/notice/notice_view/"+seq;
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#en-notice_del", function(){
        var seq = $(this).data("seq");

        if (confirm("Are you sure you want to delete?")){
            $.ajax({
                type : "POST",
                url : "/administrator/en/notice/notice_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("Your post has been deleted");
                        document.location.href="/administrator/en/notice";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#en-press-save", function(){
        var press_title = $("input[name=press_title]").val();
        var press_contents = $("#press_contents").Editor("getText");
        var press_link = $("input[name=press_link]").val();

        var formData = new FormData();
        formData.append("press_title", press_title);
        formData.append("press_contents", press_contents);
        formData.append("press_link", press_link);
        formData.append("press_thumbnail", $("input[name=press_thumbnail]").prop("files")[0]);

        if (press_title == ""){
            alert("Please enter press title");
            $("input[name=notice_title]").focus();
            return false;
        }

        if (press_contents == ""){
            alert("Please enter press contents");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/en/press/press_write_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("This post has been registered");
                    document.location.href="/administrator/en/press";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#en-press-modify", function(){
        var seq = $("input[name=seq]").val();
        var press_title = $("input[name=press_title]").val();
        var press_contents = $("#press_contents").Editor("getText");
        var press_link = $("input[name=press_link]").val();

        var formData = new FormData();
        formData.append("seq", seq);
        formData.append("press_title", press_title);
        formData.append("press_contents", press_contents);
        formData.append("press_link", press_link);
        formData.append("press_thumbnail", $("input[name=press_thumbnail]").prop("files")[0]);

        if (press_title == ""){
            alert("Please enter press title");
            $("input[name=notice_title]").focus();
            return false;
        }

        if (press_contents == ""){
            alert("Please enter press contents");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/en/press/press_modify_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("Posts modified.");
                    document.location.href="/administrator/en/press/press_view/"+seq;
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#en-press_del", function(){
        var seq = $(this).data("seq");

        if (confirm("Are you sure you want to delete?")){
            $.ajax({
                type : "POST",
                url : "/administrator/en/press/press_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("Your post has been deleted");
                        document.location.href="/administrator/en/press";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });
    $(document).on("click", "#en-award-save", function(){
        var award_title = $("input[name=award_title]").val();

        var formData = new FormData();
        formData.append("award_title", award_title);
        formData.append("award_image", $("input[name=award_image]").prop("files")[0]);

        if (award_title == ""){
            alert("please enter award title");
            $("input[name=award_title]").focus();
            return false;
        }

        if ($("input[name=award_image]").val() == ""){
            alert("Please insert award image");
            return false;
        }
        console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/en/award/award_write_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("This post has been registered");
                    document.location.href="/administrator/en/award";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#en-award-modify", function(){
        var seq = $("input[name=seq]").val();
        var award_title = $("input[name=award_title]").val();

        var formData = new FormData();
        formData.append("seq", seq);
        formData.append("award_title", award_title);
        formData.append("award_image", $("input[name=award_image]").prop("files")[0]);

        if (award_title == ""){
            alert("please enter award title");
            $("input[name=award_title]").focus();
            return false;
        }

        $.ajax({
            type : "POST",
            url : "/administrator/en/award/award_modify_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("Posts modified.");
                    document.location.href="/administrator/en/award/award_view/"+seq;
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#en-award_del", function(){
        var seq = $(this).data("seq");

        if (confirm("Are you sure you want to delete?")){
            $.ajax({
                type : "POST",
                url : "/administrator/en/award/award_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("Your post has been deleted");
                        document.location.href="/administrator/en/award";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#en-brochure-save", function(){
        var brochure_title = $("input[name=brochure_title]").val();
        var brochure_contents = $("#brochure_contents").Editor("getText");

        var formData = new FormData();
        formData.append("brochure_title", brochure_title);
        formData.append("brochure_contents", brochure_contents);
        formData.append("brochure_file_name", $("input[name=brochure_file_name]").prop("files")[0]);

        if (brochure_title == ""){
            alert("please enter brochure title");
            $("input[name=brochure_title]").focus();
            return false;
        }

        if (brochure_contents == ""){
            alert("Please enter brochure contents");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/en/brochure/brochure_write_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("This post has been registered");
                    document.location.href="/administrator/en/brochure";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#en-brochure-modify", function(){
        var seq = $("input[name=seq]").val();
        var brochure_title = $("input[name=brochure_title]").val();
        var brochure_contents = $("#brochure_contents").Editor("getText");

        var formData = new FormData();
        formData.append("seq", seq);
        formData.append("brochure_title", brochure_title);
        formData.append("brochure_contents", brochure_contents);
        formData.append("brochure_file_name", $("input[name=brochure_file_name]").prop("files")[0]);

        if (brochure_title == ""){
            alert("please enter brochure title");
            $("input[name=brochure_title]").focus();
            return false;
        }

        if (brochure_contents == ""){
            alert("Please enter brochure contents");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/en/brochure/brochure_modify_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("Posts modified.");
                    document.location.href="/administrator/en/brochure/brochure_view/"+seq;
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#en-brochure_del", function(){
        var seq = $(this).data("seq");

        if (confirm("Are you sure you want to delete?")){
            $.ajax({
                type : "POST",
                url : "/administrator/en/brochure/brochure_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("Your post has been deleted");
                        document.location.href="/administrator/en/brochure";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#en-manual-save", function(){
        var manual_title = $("input[name=manual_title]").val();
        var manual_contents = $("#manual_contents").Editor("getText");

        var formData = new FormData();
        formData.append("manual_title", manual_title);
        formData.append("manual_contents", manual_contents);
        formData.append("manual_file_name", $("input[name=manual_file_name]").prop("files")[0]);

        if (manual_title == ""){
            alert("Please enter manual title");
            $("input[name=manualtitle]").focus();
            return false;
        }

        if (manual_contents == ""){
            alert("Please enter manual contents");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/en/manual/manual_write_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("This post has been registered");
                    document.location.href="/administrator/en/manual";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#en-manual-modify", function(){
        var seq = $("input[name=seq]").val();
        var manual_title = $("input[name=manual_title]").val();
        var manual_contents = $("#manual_contents").Editor("getText");

        var formData = new FormData();
        formData.append("seq", seq);
        formData.append("manual_title", manual_title);
        formData.append("manual_contents", manual_contents);
        formData.append("manual_file_name", $("input[name=manual_file_name]").prop("files")[0]);

        if (manual_title == ""){
            alert("Please enter manual title");
            $("input[name=manualtitle]").focus();
            return false;
        }

        if (manual_contents == ""){
            alert("Please enter manual contents");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/en/manual/manual_modify_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("Posts modified.");
                    document.location.href="/administrator/en/manual/manual_view/"+seq;
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#en-manual_del", function(){
        var seq = $(this).data("seq");

        if (confirm("Are you sure you want to delete?")){
            $.ajax({
                type : "POST",
                url : "/administrator/en/manual/manual_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("Your post has been deleted");
                        document.location.href="/administrator/en/manual";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

    $(document).on("click", "#en-update-save", function(){
        var update_title = $("input[name=update_title]").val();
        var update_contents = $("#update_contents").Editor("getText");

        var formData = new FormData();
        formData.append("update_title", update_title);
        formData.append("update_contents", update_contents);
        formData.append("update_file_name", $("input[name=update_file_name]").prop("files")[0]);

        if (update_title == ""){
            alert("Please enter update title");
            $("input[name=update_title]").focus();
            return false;
        }

        if (update_contents == ""){
            alert("Please enter update contents");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/en/update/update_write_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("This post has been registered");
                    document.location.href="/administrator/en/update";
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#en-update-modify", function(){
        var seq = $("input[name=seq]").val();
        var update_title = $("input[name=update_title]").val();
        var update_contents = $("#update_contents").Editor("getText");
        //console.log(update_title);
        //console.log(update_contents);

        var formData = new FormData();
        formData.append("seq", seq);
        formData.append("update_title", update_title);
        formData.append("update_contents", update_contents);
        formData.append("update_file_name", $("input[name=update_file_name]").prop("files")[0]);

        if (update_title == ""){
            alert("Please enter update title");
            $("input[name=update_title]").focus();
            return false;
        }

        if (update_contents == ""){
            alert("Please enter update contents");
            return false;
        }
        //console.log(formData);
        $.ajax({
            type : "POST",
            url : "/administrator/en/update/update_modify_proc",
            dataType : "JSON",
            data : formData,
            contentType : false,
            processData : false,
            success : function(resultMsg){
                console.log(resultMsg);
                if (resultMsg.code == "200"){
                    alert("Posts modified");
                    document.location.href="/administrator/en/update/update_view/"+seq;
                }else{
                    alert(resultMsg.msg);
                }
            }, error : function(e){
                console.log(e.responseText);
            }
        });
    });

    $(document).on("click", "#en-update_del", function(){
        var seq = $(this).data("seq");

        if (confirm("Are you sure you want to delete?")){
            $.ajax({
                type : "POST",
                url : "/administrator/en/update/update_del_proc",
                dataType : "JSON",
                data : {
                    "seq" : seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("Your post has been deleted");
                        document.location.href="/administrator/en/update";
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e.responseText);
                }
            })
        }
    });

})(jQuery);
