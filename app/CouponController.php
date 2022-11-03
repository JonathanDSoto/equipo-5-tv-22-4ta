<?php
include_once "config.php";
if (isset($_POST["action"])) {
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
        switch ($_POST['action']) {

            case 'createCoupon':
                $name = strip_tags($_POST['name']);
                $code = strip_tags($_POST['code']);
                $discount = strip_tags($_POST['percentage_discount']);
                $min_amount = strip_tags($_POST['min_amount_required']);
                $min_product = strip_tags($_POST['min_product_required']);
                $start_date = strip_tags($_POST['start_date']);
                $end_date = strip_tags($_POST['end_date']);
                $max_uses = strip_tags($_POST['max_uses']);
                $count_uses = strip_tags($_POST['count_uses']);
                $valid_once = strip_tags($_POST['valid_only_first_purchase']);
                $status = strip_tags($_POST['status']);

                $couponController = new CouponController();
                $couponController->createCoupon($name, $code, $discount, $min_amount, $min_product, $start_date, $end_date, $max_uses, $count_uses, $valid_once, $status);
                break;

            case 'updateCoupon':
                $name = strip_tags($_POST['name']);
                $code = strip_tags($_POST['code']);
                $discount = strip_tags($_POST['percentage_discount']);
                $min_amount = strip_tags($_POST['min_amount_required']);
                $min_product = strip_tags($_POST['min_product_required']);
                $start_date = strip_tags($_POST['start_date']);
                $end_date = strip_tags($_POST['end_date']);
                $max_uses = strip_tags($_POST['max_uses']);
                $count_uses = strip_tags($_POST['count_uses']);
                $valid_once = strip_tags($_POST['valid_only_first_purchase']);
                $status = strip_tags($_POST['status']);
                $id = strip_tags($_POST['id']);

                $couponController = new CouponController();
                $couponController->updateCoupon($id, $name, $code, $discount, $min_amount, $min_product, $start_date, $end_date, $max_uses, $count_uses, $valid_once, $status);
                break;
        }
    }
}

class CouponController
{
    public function getAllCoupons()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
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

    public function getCoupon($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/' . $id,
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

    public function createCoupon($name, $code, $discount, $min_amount, $min_product, $start_date, $end_date, $max_uses, $count_uses, $valid_once, $status)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $name,
                'code' => $code,
                'percentage_discount' => $discount,
                'min_amount_required' => $min_amount,
                'min_product_required' => $min_product,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'max_uses' => $max_uses,
                'count_uses' => $count_uses,
                'valid_only_first_purchase' => $valid_once,
                'status' => $status
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        $response = json_decode($response);

        // Redirigir a vista de cupones
        // if (isset($response->code) && $response->code > 0) {
        //     header("Location:" . BASE_PATH . "");
        // } else {
        //     header("Location:" . BASE_PATH . "/?error");
        // }
    }

    public function updateCoupon($id, $name, $code, $discount, $min_amount, $min_product, $start_date, $end_date, $max_uses, $count_uses, $valid_once, $status)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
            'name='.$name.
            '&code='.$code.
            '&percentage_discount='.$discount.
            '&min_amount_required='.$min_amount.
            '&min_product_required='.$min_product.
            '&start_date='.$start_date.
            '&end_date='.$end_date.
            '&max_uses='.$max_uses.
            '&count_uses='.$count_uses.
            '&valid_only_first_purchase='.$valid_once.
            '&status='.$status.
            '&id='.$id,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        $response = json_decode($response);

        // Redirigir a vista de cupones
        // if (isset($response->code) && $response->code > 0) {
        //     header("Location:" . BASE_PATH . "");
        // } else {
        //     header("Location:" . BASE_PATH . "/?error");
        // }
    }

    public function deleteCoupon($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/'.$id,
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

        // Redirigir a vista de cupones
        if (isset($response->code) && $response->code > 0) {
            return true;
        } else {
            return false;
        }
    }
}
