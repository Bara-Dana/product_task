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

    public function deleteProduct($data = [])
    {
        $this->repo->deleteProduct($data);
        
        redirect('products/index');
    }
}
