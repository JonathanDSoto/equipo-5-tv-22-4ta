<?php
include_once "config.php";

if (isset($_POST["action"])) {
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
        switch ($_POST["action"]) {

            case 'createProduct':
                $name = strip_tags($_POST['name']);
                $slug = strip_tags($_POST['slug']);
                $desc = strip_tags($_POST['desc']);
                $features = strip_tags($_POST['features']);
                $marca = strip_tags($_POST['marca']);
                $categories = strip_tags($_POST['categories']);
                $tags = strip_tags($_POST['tags']);

                $productsController = new ProductsController();
                $productsController->createProduct($name, $slug, $desc, $features, $marca, $categories, $tags);
                break;

            case 'deleteProduct':
                $id = strip_tags($_POST['id']);

                $productsController = new ProductsController();
                $productsController->deleteProduct($id);

                echo json_encode($productsController->deleteProduct($id));

                break;

            case 'updateProduct':
                $id = strip_tags($_POST['id']);
                $name = strip_tags($_POST['name']);
                $slug = strip_tags($_POST['slug']);
                $desc = strip_tags($_POST['desc']);
                $features = strip_tags($_POST['features']);
                $marca = strip_tags($_POST['marca']);
                $categories = strip_tags($_POST['categories']);
                $tags = strip_tags($_POST['tags']);

                $productsController = new ProductsController();
                $productsController->updateProduct($id, $name, $slug, $desc, $features, $marca, $categories, $tags);
                break;
        }
    }
}

// var_dump($_POST);
class ProductsController
{
    public function getAllProducts()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        } else {
            return array();
        }
    }

    public function createProduct($name, $slug, $desc, $features, $marca, $categories, $tags)
    {
        $curl = curl_init();

        $categories = explode (' ', $categories);
        $tags = explode (' ', $tags);

        foreach ($categories as $key => $category) {
            $catArray['categories['.$key.']'] = $category;
        }

        foreach ($tags as $key => $tags) {
            $tagArray['tags['.$key.']'] = $tags;
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $name,
                'slug' => $slug,
                'description' => $desc,
                'features' => $features,
                'brand_id' => $marca,
                'cover' => new CURLFILE($_FILES['cover']['tmp_name']),
                $catArray,
                $tagArray
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // var_dump($response);


        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            header("Location:" . BASE_PATH . "/products?success");
        } else {
            header("Location:" . BASE_PATH . "/products?error");
        }
    }

    public function getProduct($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;

        var_dump($response);
        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        } else {
            return array();
        }
    }

    public function deleteProduct($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;

        // var_dump($response);

        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProduct($id, $name, $slug, $desc, $features, $marca, $categories, $tags)
    {
        $curl = curl_init();

        $categories = explode (' ', $categories);
        $tags = explode (' ', $tags);

        foreach ($categories as $key => $category) {
            $catArray = '&categories['.$key.']=' . urlencode($category);
        }

        foreach ($tags as $key => $tags) {
            $tagArray = 'tags['.$key.']=' . urlencode($tags);
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>
            'name=' . $name .
                '&slug=' . $slug .
                '&description=' . $desc .
                '&features=' . $features .
                '&brand_id=' . $marca .
                '&id=' . $id .
                $catArray .
                $tagArray ,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        $response = json_decode($response);
        if (isset($response->code) && $response->code > 0) {
            header("Location:" . BASE_PATH . "/products?success");
        } else {
            header("Location:" . BASE_PATH . "/?error");
        }
    }

    public function getProductBySlug($slug)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/' . $slug,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        } else {
            return array();
        }
    }

    public function getCategoryBySlug($slug)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/categories/'.$slug,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        } else {
            return array();
        }
    }
}
