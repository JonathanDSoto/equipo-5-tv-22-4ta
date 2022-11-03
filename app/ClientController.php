<?php
include_once "config.php";

if (isset($_POST["action"])) {
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
        switch ($_POST['action']) {

            case 'createClient':
                $name = strip_tags($_POST['name']);
                $email = strip_tags($_POST['email']);
                $password = strip_tags($_POST['password']);
                $phone = strip_tags($_POST['phone_number']);
                $is_suscribed = strip_tags($_POST['is_suscribed']);
                $level_id = strip_tags($_POST['level_id']);

                $clientController = new ClientController();
                $clientController->createClient($name, $email, $password, $phone, $is_subscribed, $level_id);
                break;

            case 'updateClient':
                $name = strip_tags($_POST['name']);
                $email = strip_tags($_POST['email']);
                $password = strip_tags($_POST['password']);
                $phone = strip_tags($_POST['phone_number']);
                $is_subscribed = strip_tags($_POST['is_subscribed']);
                $level_id = strip_tags($_POST['level_id']);
                $id = strip_tags($_POST['id']);

                $clientController = new ClientController();
                $clientController->updateClient($name, $email, $password, $phone, $is_subscribed, $level_id, $id);
                break;

            // DIRECCIONES -------------------------------------------------

            case 'createAddress':
                $first_name = strip_tags($_POST['first_name']);
                $last_name = strip_tags($_POST['last_name']);
                $street_number = strip_tags($_POST['street_and_use_number']);
                $postal_code = strip_tags($_POST['postal_code']);
                $city = strip_tags($_POST['city']);
                $province = strip_tags($_POST['province']);
                $phone = strip_tags($_POST['phone_number']);
                $is_billing = strip_tags($_POST['is_billing_address']);
                $client_id = strip_tags($_POST['client_id']);

                $clientController = ClientController();
                $clientController->createAddress($first_name, $last_name, $street_number, $postal_code, $city, $province, $phone, $is_billing, $client_id);
                break;

            case 'updateAddress':
                $first_name = strip_tags($_POST['first_name']);
                $last_name = strip_tags($_POST['last_name']);
                $street_number = strip_tags($_POST['street_and_use_number']);
                $postal_code = strip_tags($_POST['postal_code']);
                $city = strip_tags($_POST['city']);
                $province = strip_tags($_POST['province']);
                $phone = strip_tags($_POST['phone_number']);
                $is_billing = strip_tags($_POST['is_billing_address']);
                $client_id = strip_tags($_POST['client_id']);
                $id = strip_tags($_POST['id']);

                $clientController = ClientController();
                $clientController->updateAddress($first_name, $last_name, $street_number, $postal_code, $city, $province, $phone, $is_billing, $client_id, $id);
                break;
        }
    }
}

class ClientController
{

    /*--------------------------------------------------------------------------------------------
      |                              INFORMACIÓN GENERAL DE CLIENTES                             |
      -------------------------------------------------------------------------------------------- */

    public function getAllClients()
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

    public function getClient($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/' . $id,
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

    public function createClient($name, $email, $password, $phone, $is_subscribed, $level_id)
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
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'phone_number' => $phone,
                'is_suscribed' => $is_subscribed,
                'level_id' => $level_id
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        $response = json_decode($response);
        if (isset($response->code) && $response->code > 0) {
            header("Location:" . BASE_PATH . "/clientes?success"); 
        } else {
            header("Location:" . BASE_PATH . "/?error");
        }
    }

    public function updateClient($name, $email, $password, $phone, $is_subscribed, $level_id, $id)
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
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>
            'name=' . $name .
                '&email=' . $email .
                '&password=' . $password .
                '&phone_number=' . $phone .
                '&is_suscribed=' . $is_subscribed .
                '&level_id=' . $level_id .
                '&id=' . $id,
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
            header("Location:" . BASE_PATH. "/clientes?success"); 
        } else {
            header("Location:" . BASE_PATH . "/?error");
        }
    }

    public function deleteClient($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/' . $id,
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

    /*--------------------------------------------------------------------------------------------
      |                     INFORMACIÓN ESPECÍFICA DE CLIENTES (DIRECCIONES)                     |
      --------------------------------------------------------------------------------------------*/

    public function getAddress($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/' . $id,
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

    public function createAddress($first_name, $last_name, $street_number, $postal_code, $city, $province, $phone, $is_billing, $client_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'street_and_use_number' => $street_number,
                'postal_code' => $postal_code,
                'city' => $city,
                'province' => $province,
                'phone_number' => $phone,
                'is_billing_address' => $is_billing,
                'client_id' => $client_id
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        // Redirigir a vista de direcciones
        // $response = json_decode($response);
        // if (isset($response->code) && $response->code > 0) {
        //     header("Location:" . BASE_PATH); //Ruta crud direcciones*)
        // } else {
        //     header("Location:" . BASE_PATH . "/?error");
        // }
    }

    public function updateAddress($first_name, $last_name, $street_number, $postal_code, $city, $province, $phone, $is_billing, $client_id, $id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>
            'first_name=' . $first_name .
                '&last_name=' . $last_name .
                '&street_and_use_number=' . $street_number .
                '&postal_code=' . $postal_code .
                '&city=' . $city .
                '&province=' . $province .
                '&phone_number=' . $phone .
                '&is_billing_address=' . $is_billing .
                '&client_id=' . $client_id .
                '&id=' . $id,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        // Redirigir a vista de direcciones
        // $response = json_decode($response);
        // if (isset($response->code) && $response->code > 0) {
        //     header("Location:" . BASE_PATH); //Ruta crud direcciones*)
        // } else {
        //     header("Location:" . BASE_PATH . "/?error");
        // }
    }

    public function deleteAddress($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/'.$id,
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
