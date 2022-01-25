<footer>
    <div class="footer_menu">
        <ul>
            <li><a href="/company/agreement">이용약관</a></li>
            <li><a href="/company/privacy">개인정보정책</a></li>
            <li><a href="/static/front/file/(주)프로액티브러닝 HOSKO 브로셔(2021).pdf" target="_blank" style="color:#005baa;">HOSKO 브로셔</a></li>
        </ul>
    </div>

    <div class="footer_info">
        <div class="f_logo">
            <img src="/static/front/img/f_hosko_logo.png">
        </div>
        <div class="f_address">
            <ul>
                <li>(주)프로액티브러닝 HOSKO</li>
                <li>서울시 서초구 서운로 43 (서암빌딩) 3층</li>
                <li>TEL. 02-2052-9700~6 / FAX. 02-2052-9708 / EMAIL. hosko@hospitalitykorea.com</li>
                <li>대표자명 : 홍성민 사업자등록번호 : 117-81-46905 고용노동부등록번호  : 서울청유제2011-7호</li>
                <li>Copyright HOSKO.All right reserved.</li>
            </ul>
        </div>
    </div>
</footer>

<script src="/js/editor.js"></script>

<script type="text/javascript">
        $(function(){
        
        $("ul.sub").hide();
        
        $("ul.gnb_menu li").hover(function(){
        
        $("ul:not(:animated)",this).slideDown("fast");
        },
        function(){
            $("ul",this).slideUp("fast");
        });

    });	
</script>