<?php

namespace App\Controller;
use App\Models\Type;
use App\Models\Product;
use App\Models\Brand;

class MainController extends CoreController {

    public function productsFindAllMethod()
    {
        $productModel = Product::findAll();
        
        // comme je veux passer des informations à la vue
        // je créer un tableau avec toutes les informations dedans
        $parametreDeLaVue = [];
        // j'ajoute une information dans le tableau
        $parametreDeLaVue['allProduct'] = $productModel;
        
        $this->show('product/products', $parametreDeLaVue);
    }

    public function getSingleProduct ($param) {
        $productModel =  Product::find($param);
        $paramVue = [];
        $paramVue['produit'] = $productModel;
        $this->show('product/product', $paramVue);
    }

    public function singleTypeProducts ($route) {
        $singleTypeModel = Product::getSingleType($route['id']);
        $parametreDeLaVue = [];
        $parametreDeLaVue['singleType'] = $singleTypeModel;
        $this->show('product/product-by-type', $parametreDeLaVue);
    }

    public function allTypes () {
        $AllTypesModel = Type::getAllTypes();
        $parametreDeLaVue = [];
        $parametreDeLaVue['allTypes'] = $AllTypesModel;
        $this->show('main/home', $parametreDeLaVue);
    }

    public function viewId () {
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
        $allTypes = Type::getAllTypes();
        $allBrands = Brand::findAll();
        $allProducts = Product::findAll();


        $this->show('product/create', [
            'token' => $token,
            'types' => $allTypes,
            'brands' => $allBrands,
            'products' =>$allProducts
        ]);
    }

    public function create () {

  
        $createdModel = new Product;
        

        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');
        $description_totale = filter_input(INPUT_POST, 'description_totale');
        $price = filter_input(INPUT_POST, 'price');
        $rate = filter_input(INPUT_POST, 'rate');
        $status = filter_input(INPUT_POST, 'status');
        $contenance = filter_input(INPUT_POST, 'contenance');
        $brand_id = filter_input(INPUT_POST, 'brand_id');
        $typeid = filter_input(INPUT_POST, 'type_id');

        $createdModel->setName($name);
        $createdModel->setDescription($description);
        $createdModel->setDescription_totale($description_totale);
        $createdModel->setPrice($price);
        $createdModel->setRate($rate);
        $createdModel->setContenance($contenance);
        $createdModel->setStatus($status);
        $createdModel->setBrand_id($brand_id);
        $createdModel->setType_id($typeid);

        if($createdModel->insert()) {
            $this->redirect('home');
        } else {
            echo 'Erreue quelque part !';
        }
    }

    public function productList () {
        $productsList = Product::findAll();
        $this->show('product/list', ['productsList' => $productsList]);
    }

    public function viewUpdate ($id) {
        $product = Product::find($id);
        $paramVue = [];
        $paramVue['product'] = $product;
        $this->show('product/update', $paramVue);
    }

    public function update ($id) {
        $productToUpdate = Product::find($id);

        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');
        $descriptionTotale = filter_input(INPUT_POST, 'descriptionTotale');
        $content = filter_input(INPUT_POST, 'content');
        $price = filter_input(INPUT_POST, 'price');

        $productToUpdate->setName($name);
        $productToUpdate->setDescription($description);
        $productToUpdate->setDescription_totale($descriptionTotale);
        $productToUpdate->setContenance($content);
        $productToUpdate->setPrice($price);

        if($productToUpdate->update()) {
            $this->redirect('home');
        } else {
            echo "Raté";
        }
    }

    
    public function homeMethod()
    {
        // afficher la page home   
        $this->show('main/home');
    }

    public function productMethod()
    {
        // afficher la page home   
        $this->show('product/product');
    }

    public function productsMethod()
    {
        // afficher la page home   
        $this->show('product/products');
    }

    public function contactMethod()
    {
        // afficher la page product   
        $this->show('main/contact');
    }

    public function storeMethod()
    {
        // afficher la page product   
        $this->show('main/store');
    }


}