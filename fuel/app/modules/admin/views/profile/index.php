<div class="row">
    <div class="panel-default header-background">
        <div class="col-xs-12">
            <button class="btn color-button">first button</button>

            <button class="btn color-button">second button</button>

            <button class="btn color-button">third button</button>

            <button class="btn color-button">fourth button</button>

            <button class="btn color-button">first button</button>
        </div>
        <div class="col-xs-12 padding-top-5">
            <button class="btn color-button">first button</button>

            <button class="btn color-button">second button</button>

            <button class="btn click-color-button">third button</button>

            <button class="btn afer-click-color-button">fourth button</button>

            <button class="btn afer-click-color-button">fifth button</button>

            <button class="btn afer-click-color-button">sixth button</button>
        </div>
        <div class="col-xs-12 padding-top-5">
            <button class="btn color-button">first button</button>

            <button class="btn color-button">second button</button>

            <button class="btn color-button">third button</button>

            <button class="btn color-button">fourth button</button>

            <button class="btn color-button">fifth button</button>

            <button class="btn color-button">sixth button</button>

            <button class="btn color-button">seventh button</button>
        </div>
        <hr class="hr-header">
    </div>
    <div class="col-xs-3">
        <div class="scrollbar" id="style-default">
            <button class="btn color-button left-btn-width-200 margin-top-15">first button</button>

            <button class="btn color-button left-btn-width-200 margin-top-5">second button</button>

            <button class="btn color-button left-btn-width-200 margin-top-5">third button</button>

            <div class="force-overflow"></div>
        </div>
    </div>
    <div class="col-xs-9">
        <div class="scrollbar col-xs-12" id="style-default">
            <p class="margin-top-15 ">
                <span class="top-content-span">My profile  My profile My profile My profile My profile My profile My profile</span> 
            </p>
            <h3>MY PROFILE MY PROFILE </h3>
            <div class="col-xs-12">
                <button class="tablink" onclick="openCity('London', this, 'white')" id="defaultOpen">London</button>
                <button class="tablink" onclick="openCity('Paris', this, 'white')">Paris</button>
                <div id="London" class="tabcontent">
                    <div class="col-xs-12">
                        <div class="col-xs-6 padding-top-25" style="margin-left: -430px;">
                            <div class="ground-name">
                                <p class="name-radar-chart">Radar chart</p>
                            </div>
                            <canvas id="myCanvas" width="400" height="400">
                            </canvas>
                        </div>
                        <div class="col-xs-6 padding-top-25">
                            <div class="button-right">
                                <button class="btn btn-primary"><span>Button right |  </span><span class="glyphicon glyphicon-briefcase"></span></button>
                            </div>
                            <div class="col-xs-12 detail-radar-chart">
                                <label class="col-xs-12 label-detail-radar-chart margin-top-5"> Name Radar Chart </label>
                                <textarea class="col-xs-12 textarea-detail-radar-chart">Name Radar Chart Name Radar Chart Name Radar Chart Name Radar Chart</textarea>
                                <button class="btn btn-primary button-detail-radar-chart">Name Radar</button>
                            </div>
                            <div class="col-xs-12 detail-radar-chart-down">
                                <label class="col-xs-12 label-detail-radar-chart margin-top-5">Name Radar Chart</label>
                                <div class="col-xs-4 color-average-user-mark">
                                    <span class=""></span>
                                </div>
                                <div class="col-xs-4 line-average-user-mark">
                                </div>
                                <div class="col-xs-4 name-average-user-mark">
                                    <span>average users</span>
                                </div>
                                <div class="col-xs-4 color-highest-user-mark">
                                    <span class=""></span>
                                </div>
                                <div class="col-xs-4 line-highest-user-mark">
                                </div>
                                <div class="col-xs-4 name-average-user-mark">
                                    <span>highest marks</span>
                                </div>
                                <div class="col-xs-4 color-user-mark">
                                    <span class=""></span>
                                </div>
                                <div class="col-xs-4 line-user-mark">
                                </div>
                                <div class="col-xs-4 name-average-user-mark">
                                    <span>marks of <?php echo \Auth::get('name')?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="Paris" class="tabcontent">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">

                </div>
            </div>
        </div>
    </div>

</div>

<div class="force-overflow"></div>
</div>
</div>
</div>
<?php echo Asset::js('profile.js'); ?>
<?php echo Asset::js('polygonalGraphWidget.js'); ?>
<script>
    /*create label name subject in chart*/
    var subjects_chart = new Array();
<?php foreach ($subjects as $subject) { ?>
        subjects_chart.push('<?php echo $subject; ?>');
<?php } ?>
    console.log(subjects_chart);

    /*create point user_auth*/
    var user_marks_chart = new Array();
<?php foreach ($user_marks as $user_mark) { ?>
        user_marks_chart.push('<?php echo $user_mark * 10; ?>');
<?php } ?>
    console.log(user_marks_chart);

    /*create point highest chart*/
    var highest_marks_chart = new Array();
<?php foreach ($highest_marks as $highest_mark) { ?>
        highest_marks_chart.push('<?php echo $highest_mark * 10; ?>');
<?php } ?>
    console.log(highest_marks_chart);
    var data = new Array(user_marks_chart, highest_marks_chart);

    /*create point average users chart*/
    var average_marks_users_chart = new Array();
<?php foreach ($average_marks_users as $average_marks_user) { ?>
        average_marks_users_chart.push('<?php echo $average_marks_user * 10; ?>');
<?php } ?>
    console.log(average_marks_users_chart);
    var data = new Array(user_marks_chart, highest_marks_chart, average_marks_users_chart);
    var myVar = $("#myCanvas").polygonalGraphWidget(
            {
                labels: subjects_chart,
                data: data
            }
    );
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>