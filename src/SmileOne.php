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
    protected $region;

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

    public function setProduct(String $product,String $productid = null){
        $this->product = $product;
        $this->productid = $productid;
       return $this;
    }

    public function setUser(String $userid,String $zoneid){
        $this->userid = $userid;
        $this->zoneid = $zoneid;
        return $this;
    }

    public function getProductList($region = 'br'){
       $this->region = $region;
       return $this->productPriceList();
    }

    public function getProduct($region = 'br'){
        $this->region = $region;
        return $this->productAvailable();
    }

    public function checkProductPoints($region = 'br'){
        $this->region = $region;
        return $this->roleQuery();
    }

    public function getPoints($region = 'br'){
        $this->region = $region;
        return $this->productPoints();
    }

    public function purchase($region = 'br'){
        $this->region = $region;
        return $this->postPurchase();
    }



}