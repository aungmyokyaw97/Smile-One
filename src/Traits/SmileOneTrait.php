<?php

namespace Amk\SmileOne\Traits;
use Illuminate\Support\Facades\Http;

trait SmileOneTrait{

    public function productAvailable(){
        $data['product'] = $this->product;
        return $this->callSmileOne($data,$this->getFullURL(config('smileone.API_URL.get-product')));
    }

    public function productPriceList(){
        $data['product'] = $this->product;
        return $this->callSmileOne($data,$this->getFullURL(config('smileone.API_URL.get-product-list')));
    }

    public function productPoints(){
        $data['product'] = $this->product;
        return $this->callSmileOne($data,$this->getFullURL(config('smileone.API_URL.get-query-points')));
    }

    public function roleQuery(){
        return $this->callSmileOne($this->formParam(),$this->getFullURL(config('smileone.API_URL.role-query')));
    }

    public function postPurchase(){
        return $this->callSmileOne($this->formParam(),$this->getFullURL(config('smileone.API_URL.purchase')));
    }

    public function callSmileOne($body,$url){
    
        $body['time'] = time();
        $body['email'] = $this->email;
        $body['uid'] = $this->uid;

        $body['sign'] = $this->encryptedSign($body);

        $response = Http::asForm()->post($url, $body);
        
        return $response->object();
    }

    public function encryptedSign($body){

        $m_key = config('smileone')['key'];
        
        ksort($body);

        $str = '';
        foreach ($body as $k => $v) {
            $str.=$k.'='.$v.'&';
        }

        $str = $str.$m_key;
 
        return md5(md5($str));
    }

    public function getFullURL($data){
        return config('smileone.domain').$data;
    }

    private function formParam(){
        $data['product'] = $this->product;       
        $data['productid'] = $this->productid;
        $data['userid'] = $this->userid;        
        $data['zoneid'] = $this->zoneid;
        return $data;
    }








}