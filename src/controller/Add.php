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

            $this->repo->addProduct($_POST);
        }
    }
}
