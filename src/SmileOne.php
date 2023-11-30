<?php
namespace Amk\SmileOne;

use Amk\SmileOne\Exceptions\SmileOneException;
use Amk\SmileOne\Traits\SmileOneTrait;

class SmileOne 
{
    use SmileOneTrait;

    protected $uid;
    protected $email;
    protected $key;
    protected $userid;
    protected $zoneid;
    protected $product;
    protected $productid;
    protected $config;

    public function __construct()
    {
        $this->config = Config('smileone') != null ? Config('smileone') : throw SmileOneException::info('You need to publish smileone config file.');
        $this->configData();
    }

    private function configData(){
        $this->uid = $this->getConfigData('uid');
        $this->email = $this->getConfigData('email');
        $this->key = $this->getConfigData('key');

    }

    private function getConfigData($key){
        return !empty($this->config[$key]) ? $this->config[$key] : throw SmileOneException::configError($key);
    }

    public function getProductList(String $product){
        $this->product = $product;
       return $this->productPriceList();
    }

    public function getProduct(String $product){
        $this->product = $product;
        return $this->productAvailable();
     }

    public function getQueryPoints(String $product){
        $this->product = $product;
        return $this->productPoints();
    }

    public function role(String $product,String $productid){
        $this->product = $product;
        $this->productid = $productid;
        return $this->roleQuery();
    }

    public function purchase(String $product,String $productid){
        $this->product = $product;
        $this->productid = $productid;
        return $this->postPurchase();
    }

    public function user(String $userid,String $zoneid){
        $this->userid = $userid;
        $this->zoneid = $zoneid;
        return $this;
    }

}