<?php

namespace admin;

//use Model_Monthlypointtranking;
/* profile student
 * radar chart, 
 *
 *   
 */

class Controller_Profile extends Controller_Admin {

    public $template = 'profile/template';

    /*
     * 
     *      
     */

    public function action_index() {

        /* get name data subjects */
        $data['subjects'] = \Model_Subject::find('all');
        $subject_name = [];
        foreach ($data['subjects'] as $subject) {
            array_push($subject_name, $subject['name']);
        }
        $data['subjects'] = $subject_name;

        /* get mark of user_id = auth */
        $data['user_marks'] = \Model_User::query()->select('*')->where('id', \Auth::get('id'))->related('user_marks', array('join_type' => 'inner'))->from_cache(false)->get();
        $user_marks = [];
        foreach ($data['user_marks'] as $user_mark) {
            foreach ($user_mark->user_marks as $marks) {
                array_push($user_marks, $marks->mark);
            }
        }
        $data['user_marks'] = $user_marks;

        /* get mark highest in table user_mark */
        $highest_marks = [];
        $highest_math = \Model_Usermark::query()->select('id', 'mark')
                ->related('subjects', array('where' => array(array('name', '=', 'math'))))
                ->where('t1.name', 'math')->order_by('mark', 'DESC')
                ->rows_limit(1)
                ->get();
        foreach ($highest_math as $value) {
            array_push($highest_marks, $value['mark']);
        }

        $highest_history = \Model_Usermark::query()->select('id', 'mark')
                ->related('subjects', array('where' => array(array('name', '=', 'history'))))
                ->rows_limit(1)
                ->order_by('mark', 'DESC')
                ->get();
        foreach ($highest_history as $value) {
            array_push($highest_marks, $value['mark']);
        }

        $highest_english = \Model_Usermark::query()->select('id', 'mark')
                ->related('subjects', array('where' => array(array('name', '=', 'english'))))
                ->rows_limit(1)
                ->order_by('mark', 'DESC')
                ->get();
        foreach ($highest_english as $value) {
            array_push($highest_marks, $value['mark']);
        }

        $highest_science = \Model_Usermark::query()->select('id', 'mark')
                ->related('subjects', array('where' => array(array('name', '=', 'science'))))
                ->rows_limit(1)
                ->order_by('mark', 'DESC')
                ->get();
        foreach ($highest_english as $value) {
            array_push($highest_marks, $value['mark']);
        }

        $highest_physics = \Model_Usermark::query()->select('id', 'mark')
                ->related('subjects', array('where' => array(array('name', '=', 'physics'))))
                ->rows_limit(1)
                ->order_by('mark', 'DESC')
                ->get();
        foreach ($highest_physics as $value) {
            array_push($highest_marks, $value['mark']);
        }

        $data['highest_marks'] = $highest_marks;

        /* get mark average users */
        $average_marks_users = [];
        /* average mark math */
        $count_math = count(\Model_Usermark::query()->select('mark')->related('subjects', array('where' => array(array('name', '=', 'math'))))->get());
//        $average_math = \Model_Usermark::query()->select('mark')->group_by('subjec_id')->get();
//        echo "<pre>";
//            print_r($average_math);
//        exit;
//        
        $average_math = \Model_Usermark::query()->select('mark')->related('subjects', array('where' => array(array('name', '=', 'math'))))->get();
        $sum_point_math = 0;
        foreach ($average_math as $mark) {
            $sum_point_math = $sum_point_math + $mark['mark'];
        }
        array_push($average_marks_users, ($sum_point_math / $count_math));
//        echo "<pre>";
//        print_r($average_marks_users);
//        exit;

        /* average mark history */
        $count_history = count(\Model_Usermark::query()->select('mark')->related('subjects', array('where' => array(array('name', '=', 'history'))))->get());
        $average_history = \Model_Usermark::query()->select('mark')->related('subjects', array('where' => array(array('name', '=', 'history'))))->get();
        $sum_point_history = 0;
        foreach ($average_history as $mark) {
            $sum_point_history = $sum_point_history + $mark['mark'];
        }
        array_push($average_marks_users, ($sum_point_history / $count_history));
//        echo "<pre>";
//        print_r($average_marks_users);exit;

        /* average mark english */
        $count_english = count(\Model_Usermark::query()->select('mark')->related('subjects', array('where' => array(array('name', '=', 'english'))))->get());
        $average_english = \Model_Usermark::query()->select('mark')->related('subjects', array('where' => array(array('name', '=', 'english'))))->get();
        $sum_point_english = 0;
        foreach ($average_english as $mark) {
            $sum_point_english = $sum_point_english + $mark['mark'];
        }
        array_push($average_marks_users, ($sum_point_english / $count_english));
//        echo "<pre>";
//        print_r($average_marks_users);exit;

        /* average mark science */
        $count_science = count(\Model_Usermark::query()->select('mark')->related('subjects', array('where' => array(array('name', '=', 'science'))))->get());
        $average_science = \Model_Usermark::query()->select('mark')->related('subjects', array('where' => array(array('name', '=', 'science'))))->get();
        $sum_point_science = 0;
        foreach ($average_science as $mark) {
            $sum_point_science = $sum_point_science + $mark['mark'];
        }
        array_push($average_marks_users, ($sum_point_science / $count_science));
//        echo "<pre>";
//        print_r($average_marks_users);exit;

        /* average mark physics */
        $count_physics = count(\Model_Usermark::query()->select('mark')->related('subjects', array('where' => array(array('name', '=', 'physics'))))->get());
        $average_physics = \Model_Usermark::query()->select('mark')->related('subjects', array('where' => array(array('name', '=', 'physics'))))->get();
        $sum_point_physics = 0;
        foreach ($average_physics as $mark) {
            $sum_point_physics = $sum_point_physics + $mark['mark'];
        }
        array_push($average_marks_users, ($sum_point_physics / $count_physics));

        $data['average_marks_users'] = $average_marks_users;

//        echo "<pre>";
//        print_r($average_marks_users);exit;

        $this->template->title = "Profile";
        $this->template->content = \View::forge('profile/index', $data);
    }

}
