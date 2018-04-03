<?php
/**
 * 融云 Server API PHP 客户端
 * create by kitName
 * create datetime : 2016-09-05 
 * 
 * v2.0.1
 */
namespace libs\neteaseim;

use libs\neteaseim\SendRequest;
use libs\neteaseim\methods\User;
use libs\neteaseim\methods\Message;
use libs\neteaseim\methods\Group;
use libs\neteaseim\methods\Chatroom;
use libs\neteaseim\methods\SMS;

class NeteaseCloud
{
    /**
     * 参数初始化
     * @param $appKey
     * @param $appSecret
     * @param string $format
     */
    public function __construct($appKey, $appSecret, $RequestType = 'curl') {
        $this->SendRequest = new SendRequest($appKey, $appSecret, $RequestType);
    }
    
    public function User() {
        $User = new User($this->SendRequest);
        return $User;
    }
    
    public function Message() {
        $Message = new Message($this->SendRequest);
        return $Message;
    }
    
    
    public function Group() {
        $Group = new Group($this->SendRequest);
        return $Group;
    }
    
    public function Chatroom() {
        $Chatroom = new Chatroom($this->SendRequest);
        return $Chatroom;
    }
    
    public function SMS() {
        $SMS = new SMS($this->SendRequest);
        return $SMS;
    }
    
}