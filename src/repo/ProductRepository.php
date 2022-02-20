<?php

class ProductRepository
{
    private $db;

    function __construct()
    {
        $this->db = new DataBase;
        require_once "./src/models/AttributesClass.php";
        require_once "./src/models/ProductClass.php";
        require_once "./src/models/DvdClass.php";
        require_once "./src/models/BookClass.php";
        require_once "./src/models/FurnitureClass.php";
    }

    // public function add(ProductClass $product)
    // {
    //     $sql = 'INSERT INTO prod (sku, name, price, size, weight,  height, lenght, width) VALUES (:sku, :name, :price, :size, :weight, :height:lenght, :width)';
    //     $this->db->query($sql);
    //     foreach ($product->getParams() as $key => $value) {
    //         $this->db->bind($key, $value);
    //     }
    //     $this->db->execute();
    // }




    public function getProducts()
    {
        $dsn = "mysql:host=localhost;dbname=productdb";
        try {
            $db = new PDO($dsn, 'root', '');
            $statement = $db->prepare("SELECT * FROM `prod`");
            $results = $statement->execute(); //luam rezultatele din db

            if ($results) {
                $statement->setFetchMode(PDO::FETCH_OBJ);
                $rez = $statement->fetchAll();
            }
            $list = array(); //cream lista

            // parcurgem fiecare linie si creem obiecte de tip produs
            foreach ($rez as $item) {
                $product = new ProductClass($item->id, $item->sku, $item->name, $item->price);
                if ($item->size != null) {
                    $product->setAttribute(new DvdClass($item->size));
                } else if ($item->weight != null) {
                    $product->setAttribute(new BookClass($item->weight));
                } else {
                    $product->setAttribute(new FurnitureClass($item->height, $item->width, $item->lenght));
                }
                $list[] = $product;
            }
            return $list;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo $error;
        }
    }

    public function addProduct($data)
    {
        $product = new ProductClass(0, $data['sku'], $data['name'], (float)$data['price']);
        if (isset($data['size']) && $data['size']) {
            $product->setAttribute(new DvdClass((float) $data['size']));
        } else if (isset($data['weight']) && $data['weight']) {
            $product->setAttribute(new BookClass((float)$data['weight']));
        } else {
            $product->setAttribute(new FurnitureClass($data['height'], $data['width'], $data['lenght']));
        }
        try {
            $dsn = "mysql:host=localhost;dbname=productdb";
            $db = new PDO($dsn, 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $db->setAttribute(PDO::ATTR_PERSISTENT, true);
            $statement = $db->prepare("INSERT INTO `prod` (`sku`, `name`, `price`, `size`, `height`, `weight`, `lenght`, `width`) VALUES (:sku, :name, :price, :size, :height, :weight, :lenght, :width)");

            foreach ($product->getParams() as $key => $value) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
                $statement->bindValue($key, $value, $type);
            }
            $statement->execute();

            redirect('products');
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo $error;
        }
    }
    public function deleteProduct($productsId)
    {
        echo $_POST['is_selected'];
        try {
            $dsn = "mysql:host=localhost;dbname=productdb";
            $db = new PDO($dsn, 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $db->setAttribute(PDO::ATTR_PERSISTENT, true);

            foreach ($productsId as $id) {
                $statement = $db->prepare("DELETE FROM `prod` WHERE `prod`.`id` =:id;");
                $statement->bindValue(':id', $id, PDO::PARAM_INT);
                $statement->execute();
            }
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo $error;
        }
    }
}
