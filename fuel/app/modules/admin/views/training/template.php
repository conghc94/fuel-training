<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::css('admin/admin-template.css'); ?>
        <?php echo Asset::css('material-dashboard.css'); ?>
        <?php echo Asset::css('calendar/dhtmlxscheduler.css') ?>
        <style>
            body { margin: 50px; }
        </style>
        <style type="text/css" >
            html, body{
                margin:0;
                padding:0;
                height:100%;
                overflow:hidden;
            }

            .dhx_cal_event div.dhx_footer,
            .dhx_cal_event.past_event div.dhx_footer,
            .dhx_cal_event.event_english div.dhx_footer,
            .dhx_cal_event.event_math div.dhx_footer,
            .dhx_cal_event.event_science div.dhx_footer{
                background-color: transparent !important;
            }
            .dhx_cal_event .dhx_body{
                -webkit-transition: opacity 0.1s;
                transition: opacity 0.1s;
                opacity: 0.7;
            }
            .dhx_cal_event .dhx_title{
                line-height: 12px;
            }
            .dhx_cal_event_line:hover,
            .dhx_cal_event:hover .dhx_body,
            .dhx_cal_event.selected .dhx_body,
            .dhx_cal_event.dhx_cal_select_menu .dhx_body{
                opacity: 1;
            }

            .dhx_cal_event.event_math div, .dhx_cal_event_line.event_math{
                background-color: orange !important;
                border-color: #a36800 !important;
            }
            .dhx_cal_event_clear.event_math{
                color:orange !important;
            }

            .dhx_cal_event.event_science div, .dhx_cal_event_line.event_science{
                background-color: #36BD14 !important;
                border-color: #698490 !important;
            }
            .dhx_cal_event_clear.event_science{
                color:#36BD14 !important;
            }

            .dhx_cal_event.event_english div, .dhx_cal_event_line.event_english{
                background-color: #FC5BD5 !important;
                border-color: #839595 !important;
            }
            .dhx_cal_event_clear.event_english{
                color:#B82594 !important;
            }
        </style>

        <?php
        echo Asset::js(array(
            'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
            'bootstrap.js',
            'calendar/dhtmlxscheduler.js',
            'calendar/dhtmlxscheduler_minical.js',
        ));
        ?>
        <script>
            $(function () {
                $('.topbar').dropdown();
            });
        </script>
    </head>
    <body onload="init();">
        <?php if ($current_user): ?>
            <div class="navbar navbar-inverse navbar-fixed-top header-background">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">My Site</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
                                <?php echo Html::anchor('admin', 'Dashboard') ?>
                            </li>
                            <li><a href="<?php echo Uri::base() ?>admin/profile">Profile</a></li>
                            <li><a href="<?php echo Uri::base() ?>admin/trainingcalendar">Training Calendar</a></li>
                        </ul>
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $current_user->username ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><?php echo Html::anchor('admin/logout', 'Logout') ?></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="container" style="height: 100%">
            <?php echo $content; ?>
        </div>
        
    </body>
    <script type="text/javascript" charset="utf-8">
        function init() {
            scheduler.config.xml_date = "%Y-%m-%d %H:%i";
            scheduler.config.time_step = 30;
            scheduler.config.multi_day = true;
            scheduler.locale.labels.section_subject = "Subject";
            scheduler.config.first_hour = 6;
            scheduler.config.limit_time_select = true;
            scheduler.config.details_on_dblclick = true;
            scheduler.config.details_on_create = true;

            scheduler.templates.event_class = function (start, end, event) {
                var css = "";

                if (event.subject) // if event has subject property then special class should be assigned
                    css += "event_" + event.subject;

                if (event.id == scheduler.getState().select_id) {
                    css += " selected";
                }
                return css; // default return

                /*
                 Note that it is possible to create more complex checks
                 events with the same properties could have different CSS classes depending on the current view:
                 
                 var mode = scheduler.getState().mode;
                 if(mode == "day"){
                 // custom logic here
                 }
                 else {
                 // custom logic here
                 }
                 */
            };

            var subject = [
                {key: '', label: 'Appointment'},
                {key: 'english', label: 'English'},
                {key: 'math', label: 'Math'},
                {key: 'science', label: 'Science'}
            ];

            scheduler.config.lightbox.sections = [
                {name: "description", height: 43, map_to: "text", type: "textarea", focus: true},
                {name: "subject", height: 20, type: "select", options: subject, map_to: "subject"},
                {name: "time", height: 72, type: "time", map_to: "auto"}
            ];

            scheduler.init('scheduler_here', new Date(2017, 3, 20), "week");

            scheduler.parse([
                {start_date: "2017-04-18 09:00", end_date: "2017-04-18 12:00", text: "English lesson", subject: 'english'},
                {start_date: "2017-04-20 10:00", end_date: "2017-04-21 16:00", text: "Math exam", subject: 'math'},
                {start_date: "2017-04-21 10:00", end_date: "2017-04-21 14:00", text: "Science lesson", subject: 'science'},
                {start_date: "2017-04-23 16:00", end_date: "2017-04-23 17:00", text: "English lesson", subject: 'english'},
                {start_date: "2017-04-22 09:00", end_date: "2017-04-22 17:00", text: "Usual event"}
            ], "json");

        }
    </script>

</html>
