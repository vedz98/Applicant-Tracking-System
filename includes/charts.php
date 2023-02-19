<?php
class Charts extends Front_end {

  function __construct(){
    parent :: __construct();
      $this->load->model('charts_model');
  }

  function index()
  {
    $data ['has_categories_rate'] = $this-> charts_model->get_employees_has_categories();

    $this->view('content/charts', $data);

  }

}


?>
