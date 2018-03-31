<?php 
namespace libs\neteaseim\mothods;
/**
* 用户操作类
*/
class User extends AnotherClass
{
    
    private $SendRequest;
    
    public function __construct($SendRequest) {
            $this->SendRequest = $SendRequest;
    }

    /**
     * 更新并获取新token
     * @param  $accid     [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @return $result    [返回array数组对象]
     */
    public function updateUserToken($accid){
        $url = 'https://api.netease.im/nimserver/user/refreshToken.action';
        $data= array(
            'accid' => $accid
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }
    /**
     * 创建云信ID
     * 1.第三方帐号导入到云信平台；
     * 2.注意accid，name长度以及考虑管理秘钥token
     * @param  $accid     [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @param  $name      [云信ID昵称，最大长度64字节，用来PUSH推送时显示的昵称]
     * @param  $props     [json属性，第三方可选填，最大长度1024字节]
     * @param  $icon      [云信ID头像URL，第三方可选填，最大长度1024]
     * @param  $token     [云信ID可以指定登录token值，最大长度128字节，并更新，如果未指定，会自动生成token，并在创建成功后返回]
     * @return $result    [返回array数组对象]
     */
    public function createUserIds($accid,$name='',$props='{}',$icon='',$token=''){
        $url = 'https://api.netease.im/nimserver/user/create.action';
        $data= array(
            'accid' => $accid,
            'name'  => $name,
            'props' => $props,
            'icon'  => $icon,
            'token' => $token
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 更新云信ID
     * @param  $accid     [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @param  $name      [云信ID昵称，最大长度64字节，用来PUSH推送时显示的昵称]
     * @param  $props     [json属性，第三方可选填，最大长度1024字节]
     * @param  $token     [云信ID可以指定登录token值，最大长度128字节，并更新，如果未指定，会自动生成token，并在创建成功后返回]
     * @return $result    [返回array数组对象]
     */
    public function updateUserId($accid,$name='',$props='{}',$token=''){
        $url = 'https://api.netease.im/nimserver/user/update.action';
        $data= array(
            'accid' => $accid,
            'name'  => $name,
            'props' => $props,
            'token' => $token
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }
    /**
     * 封禁云信ID
     * 第三方禁用某个云信ID的IM功能,封禁云信ID后，此ID将不能登陆云信imserver
     * @param  $accid     [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @return $result    [返回array数组对象]
     */
    public function blockUserId($accid){
        $url = 'https://api.netease.im/nimserver/user/block.action';
        $data= array(
            'accid' => $accid
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 解禁云信ID
     * 第三方禁用某个云信ID的IM功能,封禁云信ID后，此ID将不能登陆云信imserver
     * @param  $accid     [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @return $result    [返回array数组对象]
     */
    public function unblockUserId($accid){
        $url = 'https://api.netease.im/nimserver/user/unblock.action';
        $data= array(
            'accid' => $accid
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }


    /**
     * 更新用户名片
     * @param  $accid       [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @param  $name        [云信ID昵称，最大长度64字节，用来PUSH推送时显示的昵称]
     * @param  $icon        [用户icon，最大长度256字节]
     * @param  $sign        [用户签名，最大长度256字节]
     * @param  $email       [用户email，最大长度64字节]
     * @param  $birth       [用户生日，最大长度16字节]
     * @param  $mobile      [用户mobile，最大长度32字节]
     * @param  $ex          [用户名片扩展字段，最大长度1024字节，用户可自行扩展，建议封装成JSON字符串]
     * @param  $gender      [用户性别，0表示未知，1表示男，2女表示女，其它会报参数错误]
     * @return $result      [返回array数组对象]
     */
    public function updateUinfo($accid,$name='',$icon='',$sign='',$email='',$birth='',$mobile='',$gender='0',$ex=''){
        $url = 'https://api.netease.im/nimserver/user/updateUinfo.action';
        $data= array(
            'accid' => $accid,
            'name' => $name,
            'icon' => $icon,
            'sign' => $sign,
            'email' => $email,
            'birth' => $birth,
            'mobile' => $mobile,
            'gender' => $gender,
            'ex' => $ex
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 获取用户名片，可批量
     * @param  $accids    [用户帐号（例如：JSONArray对应的accid串，如："zhangsan"，如果解析出错，会报414）（一次查询最多为200）]
     * @return $result    [返回array数组对象]
     */
    public function getUinfoss($accids){
        $url = 'https://api.netease.im/nimserver/user/getUinfos.action';
        $data= array(
            'accids' => json_encode($accids)
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 好友关系-加好友
     * @param  $accid       [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @param  $faccid        [云信ID昵称，最大长度64字节，用来PUSH推送时显示的昵称]
     * @param  $type        [用户type，最大长度256字节]
     * @param  $msg        [用户签名，最大长度256字节]
     * @return $result      [返回array数组对象]
     */
    public function addFriend($accid,$faccid,$type='1',$msg=''){
        $url = 'https://api.netease.im/nimserver/friend/add.action';
        $data= array(
            'accid' => $accid,
            'faccid' => $faccid,
            'type' => $type,
            'msg' => $msg
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 好友关系-更新好友信息
     * @param  $accid       [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @param  $faccid        [要修改朋友的accid]
     * @param  $alias        [给好友增加备注名]
     * @return $result      [返回array数组对象]
     */
    public function updateFriend($accid,$faccid,$alias){
        $url = 'https://api.netease.im/nimserver/friend/update.action';
        $data= array(
            'accid' => $accid,
            'faccid' => $faccid,
            'alias' => $alias
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 好友关系-获取好友关系
     * @param  $accid       [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @return $result      [返回array数组对象]
     */
    public function getFriend($accid){
        $url = 'https://api.netease.im/nimserver/friend/get.action';
        $data= array(
            'accid' => $accid,
            'createtime' => (string)(time()*1000)
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 好友关系-删除好友信息
     * @param  $accid       [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @param  $faccid        [要修改朋友的accid]
     * @return $result      [返回array数组对象]
     */
    public function deleteFriend($accid,$faccid){
        $url = 'https://api.netease.im/nimserver/friend/delete.action';
        $data= array(
            'accid' => $accid,
            'faccid' => $faccid
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }
}