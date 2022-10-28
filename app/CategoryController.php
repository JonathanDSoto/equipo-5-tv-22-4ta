<?php
include_once "config.php";

if (isset($_POST["action"])) {
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
        switch ($_POST['action']) {

            case 'createCategory':
                $name = strip_tags($_POST['name']);
                $description = strip_tags($_POST['description']);
                $slug = strip_tags($_POST['slug']);
                $category_id = strip_tags($_POST['category_id']);

                $categoriesController = new CategoryController();
                $categoriesController->createCategory($name, $description, $slug, $category_id);
                break;

            case 'updateCategory':
                $name = strip_tags($_POST['name']);
                $description = strip_tags($_POST['description']);
                $slug = strip_tags($_POST['slug']);
                $category_id = strip_tags($_POST['category_id']);
                $id = strip_tags($_POST['id']);

                $categoriesController = new CategoryController();
                $categoriesController->updateCategory($name, $description, $slug, $category_id, $id);
                break;
        }
    }
}

class CategoryController
{
    public function getAllCategories()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
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

    public function createCategory($name, $description, $slug, $category_id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $name,
                'description' => $description,
                'slug' => $slug,
                'category_id' => $category_id
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        $response = json_decode($response);

        // Redirigir a vista de categorias
        // if (isset($response->code) && $response->code > 0) {
        //     header("Location:" . BASE_PATH . "/products?success");
        // } else {
        //     header("Location:" . BASE_PATH . "/products?error");
        // }
    }

    public function getCategory($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories/' . $id,
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

    public function updateCategory($id, $name, $description, $slug, $category_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>
            'id=' . $id .
                '&name=' . $name .
                '&description=' . $description .
                '&slug=' . $slug .
                '&category_id=' . $category_id,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        $response = json_decode($response);

        // Redirigir a vista de category
        // if (isset($response->code) && $response->code > 0) {
        //     header("Location:" . BASE_PATH . "/products?success");
        // } else {
        //     header("Location:" . BASE_PATH . "/products?error");
        // }
    }

    public function deleteCategory($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        $response = json_decode($response);
        if (isset($response->code) && $response->code > 0) {
            return true;
        } else {
            return false;
        }
    }
}
