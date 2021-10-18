                    <div id="left">
                        <!--
                        <div class="media user-media bg-dark dker">
                            <div class="user-media-toggleHover">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="user-wrapper bg-dark">
                                <a class="user-link" href="">
                                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="/assets/img/user.gif">
                                    <span class="label label-danger user-label">16</span>
                                </a>

                                <div class="media-body">
                                    <h5 class="media-heading"><?php //echo $this->session->userdata("user_name"); ?></h5>
                                    <ul class="list-unstyled user-info">
                                        <li><?php //echo $this->session->userdata("user_id"); ?></li>
                                        <li>Last Access : <br>
                                            <small><i class="fa fa-calendar"></i>&nbsp;16 Mar 16:32</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        -->
                        <ul id="menu" class="bg-blue dker">
                            <!--<li class="nav-header">Menu</li>-->
                            <li <?php if ($this->router->fetch_class() == "admin") echo "class=\"active\""; ?>>
                                <a href="#">
                                    <i class="fa fa-users"></i>
                                    <span class="link-title">회원관리</span>
									<span class="fa arrow"></span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="/administrator/user"><i class="fa fa-angle-right"></i>&nbsp;전체회원</a></li>
                                    <li><a href="/administrator/guide_list"><i class="fa fa-angle-right"></i>&nbsp;가이드 회원</a></li>
                                </ul>
                            </li>
                            <!--
                            <li>
                                <a href="/order/order_list">
                                    <span class="link-title">발주정보</span>
                                    </i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="link-title">영업정보</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="/sales/order_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;발주내역 관리</a></li>
                                    <li><a href="/sales/receipt_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;수주품의서 관리</a></li>
                                    <li><a href="/sales/estimate_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;견적서 관리</a></li>
                                    <li><a href="/sales/request_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;선발주/BMT요청</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="link-title">재고정보</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="/stock/product_list_in"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;입고관리</a></li>
                                    <li><a href="/stock/product_list_out"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;출고관리</a></li>
                                    <li><a href="/stock/product_list_in">&nbsp;신품재고&nbsp;<i class="glyphicon glyphicon-arrow-right"></i></a></li>
                                    <li><a href="/stock/product_list_cancel">&nbsp;해지재고&nbsp;<i class="glyphicon glyphicon-arrow-right"></i></a></li>
                                    <li><a href="/stock/product_list_all"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;재고현황</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="link-title">고객정보</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="/customer/assignment_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;엔지니어 배정현황</a></li>
									<li><a href="/customer/customer_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;고객장비 검색</a></li>
                                    <li><a href="/customer/customer_total_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;고객장비 종합검색</a></li>
                                    <li><a href="/customer/technical_support_history"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;기술지원이력 종합검색</a></li>
                                    <li><a href="/customer/engineer_schedule"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;일정관리 현황판</a></li>
                                    <li><a href="/customer/engineer_schedule_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;엔지니어 일정현황</a></li>
									
									<li><a href="/admin/admin_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;설치확인서</a></li>
                                    <li><a href="/admin/company_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;일정 관리</a></li>
									
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="link-title">정산정보</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="/calculate/sales_calculate"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;KT 정산관리</a></li>
                                    <li><a href="/calculate/sales_calculate_other"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;영우/에스원 정산관리</a></li>
                                    <li><a href="/calculate/calculate_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;정산요청</a></li>
                                    <li><a href="/calculate/bill_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;계산서 관리</a></li>
                                    <li><a href="/calculate/bond_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;채권 관리</a></li>
                                    <li><a href="/calculate/purchaseOfsales">&nbsp;매출/매입 관리</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="link-title">게시판관리</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="/board/notice_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;공지사항</a></li>
                                    <li><a href="/board/pds_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;자료실</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="link-title">통계관리</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="/board/notice_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;매출통계</a></li>
                                    <li><a href="/board/pds_list"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;정산통계</a></li>
                                </ul>
                            </li>
                            -->
                        </ul>
                    </div>
