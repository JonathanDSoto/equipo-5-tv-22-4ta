<?php
include_once "config.php";

if (isset($_POST["action"])) {
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
        switch ($_POST['action']) {

            case 'login':
                $email = strip_tags($_POST['email']);
                $password = strip_tags($_POST['password']);

                $authController = new AuthController();
                $authController->login($email, $password);
                break;

            case 'logout':
                $email = strip_tags($_POST['email']);

                $authController = new AuthController();
                $authController->logout($email);
                break;

            case 'register':
                $name = strip_tags($_POST['name']);
                $lastname = strip_tags($_POST['lastname']);
                $email = strip_tags($_POST['email']);
                $password = strip_tags($_POST['password']);
                $phone = strip_tags($_POST['phone_number']);
                $role = strip_tags($_POST['role']);
                $avatar = strip_tags($_POST['profile_photo_file']);


                $authController = new AuthController();
                $authController->register($name, $lastname, $email, $password, $phone, $role, $avatar);
                break;

            case 'forgotPassword':
                $email = strip_tags($_POST['email']);

                $authController = new AuthController();
                $authController->forgotPassword($email);
                break;
        }
    }
}

class AuthController
{
    public function login($email, $password)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'email' => $email, 
                'password' => $password),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        $response = json_decode($response);
        if (isset($response->code) && $response->code > 0) {
            $_SESSION['id'] = $response->data->id;
            $_SESSION['name'] = $response->data->name;
            $_SESSION['lastname'] = $response->data->lastname;
            $_SESSION['avatar'] = $response->data->avatar;
            $_SESSION['role'] = $response->data->role;
            $_SESSION['token'] = $response->data->token;

            header("Location:" . BASE_PATH.'/products?success'); 
        } else {
            header("Location:" . BASE_PATH . "/?error");
        }
    }

    public function logout($email)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/logout',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $email),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        $response = json_decode($response);
        if (isset($response->code) && $response->code > 0) {
            session_destroy();
            header("Location:" . BASE_PATH. '../');
        } else {
            header("Location:" . BASE_PATH . "/?error");
        }
    }

    public function register($name, $lastname, $email, $password, $phone, $role)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/register',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $name, 
                'lastname' => $lastname, 
                'email' => $email, 
                'phone_number' => $phone, 
                'created_by' => 'Equipo 5', 
                'role' => $role, 
                'password' => $password, 
                'profile_photo_file' => new CURLFILE($_FILES['cover']['tmp_name'])),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        $response = json_decode($response);
        if (isset($response->code) && $response->code > 0) {
            header("Location:" . BASE_PATH. '/?success'); 
        } else {
            header("Location:" . BASE_PATH . "/?error");
        }
    }

    public function forgotPassword($email)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/forgot-password',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $email),
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
