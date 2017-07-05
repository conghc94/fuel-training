<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::css('admin/profile-template.css'); ?>

        <style>
            body { margin: 50px; }
        </style>
        <?php
        echo Asset::js(array(
            'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
            'bootstrap.js',
            'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
            "http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js",
            
        ));
        ?>
        <script>
            $(function () {
                $('.topbar').dropdown();
            });
        </script>
    </head>
    <body>
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

                            <?php
                            $files = new GlobIterator(APPPATH . 'classes/controller/admin/*.php');
                            foreach ($files as $file) {
                                $section_segment = $file->getBasename('.php');
                                $section_title = Inflector::humanize($section_segment);
                                ?>
                                <li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
                                    <?php echo Html::anchor('admin/' . $section_segment, $section_title) ?>
                                </li>
                                <?php
                            }
                            ?>
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

        <div class="container">
            <div class="row border-around">
                <div class="col-md-12 padding-top-20 header-background">

                </div>
                <div class="col-md-12">
                    <?php echo $content; ?>
                </div>
            </div>
            <hr/>
            <footer>
                <p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
                <p>
                    <a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
                    <small>Version: <?php echo e(Fuel::VERSION); ?></small>
                </p>
            </footer>
        </div>
    </body>
</html>
