<?php
class Add extends BaseController
{
    public  function __construct()
    {
        //instantiem repository
        $this->repo = $this->repository('ProductRepository');
    }
    public function index()
    {
        $this->view('product_add');
    }
    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
          
            $_POST = filter_input_array(INPUT_POST);
          
            $this->repo->addProduct($_POST);
        }
    }
}
