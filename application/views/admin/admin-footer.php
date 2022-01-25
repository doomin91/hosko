    <section class="videocontent" id="video"></section>

    <script>

// (function(){var url='//www.sprymedia.co.uk/VisualEvent/VisualEvent_Loader.js';if(typeof VisualEvent!='undefined'){if(VisualEvent.instance!==null){VisualEvent.close();}else{new VisualEvent();}}else{var n=document.createElement('script');n.setAttribute('language','JavaScript');n.setAttribute('src',url+'?rand='+new Date().getTime());document.body.appendChild(n);}})();

        // $('li.dropdown.open.hovered').on("click", function(e) {
        //     console.log("TEST222");

            
        //     // $(this).data('closable', true);
        //     console.log($(e.target).closest("li"));
        //     var menu = $(e.target).closest("li");

        //     if ($(menu).hasClass('open')) {
        //         $(menu).removeClass('open');
        //     }else{
        //         $(menu).addClass('open');
        //     }

        //     e.stopPropagation();
        //     // if ($('#sidebar').hasClass('collapsed')) {
        //     // // Avoid having the menu to close when clicking
        //     // e.stopPropagation();
        //     // }

        //     // // resize scrollbar
        //     // $("#sidebar").getNiceScroll().resize();

        //     // },
        //     // "hide.bs.dropdown": function() {
        //     // return $(this).data('closable');
        //     // // resize scrollbar
        //     // $("#sidebar").getNiceScroll().resize();
        //     // }
        // });
        $('li.dropdown').on("click", function(e) {
            console.log("TEST");

            
            // $(this).data('closable', true);
            
            console.log($(e.target).closest("li"));
            var menu = $(e.target).closest("li");

            if ($(menu).hasClass('open')) {
                if($(menu).hasClass('hovered')){
                    console.log("hoverd");
                    
                }
                $(menu).removeClass('open');
                
            }else{
                $(menu).addClass('open');
            }

            e.stopPropagation();
            e.stopImmediatePropagation()
            
            // if ($('#sidebar').hasClass('collapsed')) {
            // // Avoid having the menu to close when clicking
            // e.stopPropagation();
            // }

            // // resize scrollbar
            // $("#sidebar").getNiceScroll().resize();

            // },
            // "hide.bs.dropdown": function() {
            // return $(this).data('closable');
            // // resize scrollbar
            // $("#sidebar").getNiceScroll().resize();
            // }
        });
        
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/static/admin/js/vendor/bootstrap/bootstrap.js"></script>
    <script src="/static/admin/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js"></script>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?lang=css&amp;skin=sons-of-obsidian"></script>
    <script type="text/javascript" src="/static/admin/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
    <script type="text/javascript" src="/static/admin/js/vendor/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="/static/admin/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="/static/admin/js/vendor/animate-numbers/jquery.animateNumbers.js"></script>
    <script type="text/javascript" src="/static/admin/js/vendor/videobackground/jquery.videobackground.js"></script>
    <script type="text/javascript" src="/static/admin/js/vendor/blockui/jquery.blockUI.js"></script>
    <script type="text/javascript" src="/static/admin/js/vendor/jquery-ui/jquery-ui-1.10.4.custom.min.js"></script>

    <script src="/static/admin/js/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/static/admin/js/vendor/datatables/ColReorderWithResize.js"></script>
    <script src="/static/admin/js/vendor/datatables/colvis/dataTables.colVis.min.js"></script>
    <script src="/static/admin/js/vendor/datatables/tabletools/ZeroClipboard.js"></script>
    <script src="/static/admin/js/vendor/datatables/tabletools/dataTables.tableTools.min.js"></script>
    <script src="/static/admin/js/vendor/datatables/dataTables.bootstrap.js"></script>

    <script src="/static/admin/js/vendor/chosen/chosen.jquery.min.js"></script>

    <script src="/static/admin/js/vendor/momentjs/moment.min.js"></script>
    <script src="/static/admin/js/vendor/datepicker/bootstrap-datetimepicker.js"></script>
    <script src="/static/admin/js/vendor/summernote/summernote.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


    <script src="/static/admin/js/minimal.js"></script>

    <script src="/js/editor.js"></script>

    
