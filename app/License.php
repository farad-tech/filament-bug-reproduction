<?php

namespace App;

class License
{

  protected $api;

  protected $username;

  protected $order_id;

  protected $domain;

  protected $productId;

  protected $response;


  public function setUsername($username)
  {

    $this->username = $username;
  }

  public function setOrderId($order_id)
  {

    $this->order_id = $order_id;
  }

  public function setDomain()
  {

    $this->domain = $_SERVER['HTTP_HOST'];
  }

  public function setProductId($productId)
  {

    $this->productId = $productId;
  }


  public function send()
  {
    $this->api = 'rtl7c6562d513a63piman350c700cab4c';

    $url = 'https://www.rtl-theme.com/oauth/';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "api=$this->api&username=$this->username&order_id=$this->order_id&domain=$this->domain&pid=$this->productId");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    curl_close($ch);
    return $res;
  }

  public function translateResponse()
  {

    switch ($this->response) {
      case '1':
        $error = NULL;
        break;
      case '-1':
        $error = 'API اشتباه است';
        break;
      case '-2':
        $error = 'نام کاربری اشتباه است';
        break;
      case '-3':
        $error = 'کد سفارش اشتباه است';
        break;
      case '-4':
        $error = 'کد سفارش قبلاً ثبت شده است';
        break;
      case '-5':
        $error = 'کد سفارش مربوطه به این نام کاربری نمیباشد.';
        break;
      case '-6':
        $error = 'اطلاعات وارد شده در فرمت صحیح نمیباشند!';
        break;
      case '-7':
        $error = 'کد سفارش مربوط به این محصول نیست';
        break;
      case '-8':
        $error = 'کد سفارش مربوطه به این نام کاربری نمیباشد.';
        break;
      default:
        $error = 'خطای غیرمنتظره رخ داده است';
        break;
    }

    return $error;
  }
}
