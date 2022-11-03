<?php
include_once "config.php";
if (isset($_POST["action"])) {
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
        switch ($_POST['action']) {

            case 'createOrder':
                $folio = strip_tags($_POST['folio']);
                $total = strip_tags($_POST['total']);
                $is_paid = strip_tags($_POST['is_paid']);
                $client_id = strip_tags($_POST['client_id']);
                $address_id = strip_tags($_POST['address_id']);
                $order_status_id = strip_tags($_POST['order_status']);
                $payment_type_id = strip_tags($_POST['payment_type_id']);
                $coupon_id = strip_tags($_POST['coupon_id']);
                $presentations = strip_tags($_POST['presentations']);
                $id = strip_tags($_POST['id']);
                $quantity = strip_tags($_POST['quantity']);

                $ordersController = new OrderController();
                $ordersController->createOrder($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, $payment_type_id, $coupon_id, $presentations, $id, $quantity);
                break;

            case 'updateOrder':
                $order_status_id = strip_tags($_POST['order_status_id']);
                $id = strip_tags($_POST['id']);

                $ordersController = new OrderController();
                $ordersController->updateOrder($id, $order_status_id);
                break;
        }
    }
}

class OrderController
{
    public function getAllOrders()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
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

    public function getOrdersBetweenDates($start_date, $end_date)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/' . $start_date . '/' . $end_date,
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

    public function getOrder($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/details/' . $id,
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

    public function createOrder($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, $payment_type_id, $coupon_id, $presentations, $id, $quantity)
    {
        $curl = curl_init();

        $presentations = explode (' ', $presentations);

        foreach ($presentations as $key => $presentations) {
            $presArrayId['presentations['.$key.']['.$id.']'] = $presentations;
        }
        foreach ($presentations as $key => $presentations) {
            $presArrayQt['presentations['.$key.']['.$quantity.']'] = $presentations;
        }


        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'folio' => $folio,
                'total' => $total,
                'is_paid' => $is_paid,
                'client_id' => $client_id,
                'address_id' => $address_id,
                'order_status_id' => $order_status_id,
                'payment_type_id' => $payment_type_id,
                'coupon_id' => $coupon_id,
                $presArrayId,
                $presArrayQt
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
            header("Location:" . BASE_PATH . "/products?success");
        } else {
            header("Location:" . BASE_PATH . "/?error");
        }
    }

    public function updateOrder($id, $order_status_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
            'id='.$id.
            '&order_status_id='.$order_status_id,
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

    public function deleteOrder($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/' . $id,
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
        if (isset($response->code) && $response->code > 0) {
            return true;
        } else {
            return false;
        }
    }
}
