<?php
return array (
  'version' => 
  array (
    'app' => 
    array (
      'default' => 
      array (
        0 => '001_create_users',
        1 => '002_create_posts',
        2 => '003_create_monthly_point_rankings',
        3 => '004_create_subjects',
        4 => '005_create_user_marks',
        5 => '006_create_trainings',
        6 => '007_create_user_subject_execution_times',
        7 => '008_create_add_foreignkey_user_marks_to_subjects',
        8 => '009_create_add_foreignkey_monthly_point_rankings_to_users',
      ),
    ),
    'module' => 
    array (
    ),
    'package' => 
    array (
    ),
  ),
  'folder' => 'migrations/',
  'table' => 'migration',
  'flush_cache' => false,
);
