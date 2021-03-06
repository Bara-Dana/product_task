<?php
class Products extends BaseController
{
    public  function __construct()
    {
        //instantiem repository
        $this->repo = $this->repository('ProductRepository');
    }
    public function index()
    {
        $prodList = $this->repo->getProducts();

        $this->view('product_list', $prodList);
    }

    public function deleteProduct()
    {
        if (isset($_POST['is_selected'])>0) {

            $this->repo->deleteProduct($_POST['is_selected']);

            redirect('products/index');
        }else{
            redirect('');
        }
    }
}
