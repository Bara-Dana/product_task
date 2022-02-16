<?php
class BaseController{
 // Loads Model
 public function model($model)
 {
     require_once "./src/models/" . $model . ".php";

     return new $model();
 }

 // Loads Views
 public function view($view, $data = [])
 {
     if (file_exists('./src/view/' . $view . '.php')) {
         require_once './src/view/' . $view . '.php';
     } else {
         die("View does not exist");
     }
 }

 // Loads Repo
 public function repository($repo)
 {
     require_once "./src/repo/" . $repo . ".php";

     return new $repo();
 }   
}