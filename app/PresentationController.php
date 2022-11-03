<?php
include_once "config.php";

if (isset($_POST["action"])) {
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
        switch ($_POST['action']) {

            case 'createPresentation':
                $description = strip_tags($_POST['description']);
                $code = strip_tags($_POST['code']);
                $weight = strip_tags($_POST['weight_in_grams']);
                $status = strip_tags($_POST['status']);
                $stock = strip_tags($_POST['stock']);
                $stock_min = strip_tags($_POST['stock_min']);
                $stock_max = strip_tags($_POST['stock_max']);
                $product_id = strip_tags($_POST['product_id']);
                $amount = strip_tags($_POST['amount']);

                $presentationsController = new PresentationController();
                $presentationsController->createPresentation($description, $code, $weight, $status, $stock, $stock_min, $stock_max, $product_id, $amount);
                break;

            case 'updatePresentation':
                $description = strip_tags($_POST['description']);
                $code = strip_tags($_POST['code']);
                $weight = strip_tags($_POST['weight_in_grams']);
                $status = strip_tags($_POST['status']);
                $stock = strip_tags($_POST['stock']);
                $stock_min = strip_tags($_POST['stock_min']);
                $stock_max = strip_tags($_POST['stock_max']);
                $product_id = strip_tags($_POST['product_id']);
                $amount = strip_tags($_POST['amount']);
                $id = strip_tags($_POST['id']);

                $presentationsController = new PresentationController();
                $presentationsController->updatePresentation($description, $code, $weight, $status, $stock, $stock_min, $stock_max, $product_id, $amount, $id);
                break;

            case 'updatePricePresentation':
                $id = strip_tags($_POST['id']);
                $amount = strip_tags($_POST['amount']);

                $presentationsController = new PresentationController();
                $presentationsController->updatePricePresentation($id, $amount);
                break;
        }
    }
}

class PresentationController
{
    public function getProductPresentation($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/product/' . $id,
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
        echo $response;
        $response = json_decode($response);


        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        } else {
            return array();
        }
    }

    public function getPresentation($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/' . $id,
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
        echo $response;

        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        } else {
            return array();
        }
    }

    public function createPresentation($description, $code, $weight, $status, $stock, $stock_min, $stock_max, $product_id, $amount)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'description' => $description,
                'code' => $code,
                'weight_in_grams' => $weight,
                'status' => $status,
                'cover' => new CURLFILE($_FILES['cover']['tmp_name']),
                'stock' => $stock,
                'stock_min' => $stock_min,
                'stock_max' => $stock_max,
                'product_id' => $product_id,
                'amount' => $amount
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        $response = json_decode($response);


        // Redirigir a vista de productos o presentación
        // if (isset($response->code) && $response->code > 0) {
        //     header("Location:" . BASE_PATH . "/products?success");
        // } else {
        //     header("Location:" . BASE_PATH . "/products?error");
        // }
    }

    public function updatePresentation($description, $code, $weight, $status, $stock, $stock_min, $stock_max, $product_id, $amount, $id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>
            'description=' . $description .
                '&code=' . $code .
                '&weight_in_grams=' . $weight .
                '&status=' . $status .
                '&stock=' . $stock .
                '&stock_min=' . $stock_min .
                '&stock_max=' . $stock_max .
                '&product_id=' . $product_id .
                '&id=' . $id .
                '&amount=' . $amount,
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        $response = json_decode($response);

        // Redirigir a vista de productos o presentación
        // if (isset($response->code) && $response->code > 0) {
        //     header("Location:" . BASE_PATH . "/products?success");
        // } else {
        //     header("Location:" . BASE_PATH . "/products?error");
        // }
    }

    public function deletePresentation($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/' . $id,
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
        echo $response;

        $response = json_decode($response);

        // Redirigir a vista de productos o presentación
        if (isset($response->code) && $response->code > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePricePresentation($id, $amount)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/set_new_price',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>
            'id=' . $id .
                '&amount=' . $amount,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        $response = json_decode($response);

        // Redirigir a vista de productos o presentación
        // if (isset($response->code) && $response->code > 0) {
        //     header("Location:" . BASE_PATH . "/products?success");
        // } else {
        //     header("Location:" . BASE_PATH . "/products?error");
        // }
    }
}
