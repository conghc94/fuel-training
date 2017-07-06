<?php

namespace admin;

//use Model_Monthlypointtranking;
/* profile student
 * radar chart, 
 *
 *   
 */

class Controller_Trainingcalendar extends Controller_Admin {

    public $template = 'training/template';

    /*
     * 
     *      
     */

    public function action_index() {
        $data = NULL;
        $this->template->title = "Training Calendar";
        $this->template->content = \View::forge('training/index', $data);
    }

}
