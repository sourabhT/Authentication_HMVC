</section>

<!-- container section end -->

<!-- javascripts -->
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_THEME_URL; ?>js/jquery-ui-1.9.2.custom.min.js"></script>
<!-- bootstrap -->
<script src="<?php echo ADMIN_THEME_URL; ?>js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery.scrollTo.min.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- charts scripts -->
<script src="<?php echo ADMIN_THEME_URL; ?>assets/jquery-knob/js/jquery.knob.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery.sparkline.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/owl.carousel.js" ></script>
<!-- jQuery full calendar -->
<<script src="<?php echo ADMIN_THEME_URL; ?>js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="<?php echo ADMIN_THEME_URL; ?>assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
<!--script for this page only-->
<script src="<?php echo ADMIN_THEME_URL; ?>js/calendar-custom.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery.rateit.min.js"></script>
<!-- custom select -->
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery.customSelect.min.js" ></script>
<script src="<?php echo ADMIN_THEME_URL; ?>assets/chart-master/Chart.js"></script>

<!--custome script for all page-->
<script src="<?php echo ADMIN_THEME_URL; ?>js/scripts.js"></script>
<!-- custom script for this page-->
<script src="<?php echo ADMIN_THEME_URL; ?>js/sparkline-chart.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/easy-pie-chart.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/xcharts.min.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery.autosize.min.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery.placeholder.min.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/gdp-data.js"></script>	
<script src="<?php echo ADMIN_THEME_URL; ?>js/morris.min.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/sparklines.js"></script>	
<script src="<?php echo ADMIN_THEME_URL; ?>js/charts.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/jquery.slimscroll.min.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_THEME_URL; ?>js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $("#news_date").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
</script>            

<script>

    function changeStatus(moduleName, actionName)
    {
        var base_url = '<?php echo MODULE_PATH; ?>';
        var modname = moduleName;
        var acname = actionName;
        var IDS = "";
        var lenchk = $('[name="id[]"]').length;
        var j = 0;
        for (var i = 0; i < lenchk; i++)
        {
            if (document.getElementById('id_' + i).checked)
            {
                var newone = document.getElementById('id_' + i).value;
                if (j === 0)
                {
                    IDS += newone;
                } else
                {
                    IDS += "-" + newone;
                }
                j++;
            }
        }
        if (!isEmpty(IDS))
        {
            $.ajax({
                url: base_url + modname + "/" + acname,
                type: "GET",
                data: "id=" + IDS,
                success: function (result) {
                    location.reload();
                }
            });
        }
    }



    function sideActions(link, id)
    {
        var IDS = id;
        var base_url = '<?php echo MODULE_PATH; ?>';
        if (!isEmpty(IDS))
        {
            $.ajax({
                url: base_url + link,
                type: "GET",
                data: "id=" + IDS,
                success: function (result) {
                    location.reload();
                }
            });
        }
    }
    function isEmpty(str) {
        return (!str || 0 === str.length);
    }
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#selectall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkboxchild').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox+id"               
            });
        }else{
            $('.checkboxchild').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox+id"                       
            });         
        }
    });
});
</script>
<script>

    //knob
    $(function () {
        $(".knob").knob({
            'draw': function () {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function () {
        $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });
    });

    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function () {
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                        values: gdpData,
                        scale: ['#000', '#000'],
                        normalizeFunction: 'polynomial'
                    }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function (e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });



</script>

</body>
</html>
