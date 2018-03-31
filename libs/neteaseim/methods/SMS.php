<?php 
/**
* 短信操作类
*/
class SMS
{
    private $SendRequest;
    
    public function __construct($SendRequest) {
            $this->SendRequest = $SendRequest;
    }
    /**
     * 发送短信验证码
     * @param  $mobile       [目标手机号]
     * @param  $deviceId     [目标设备号，可选参数]
     * @return $result      [返回array数组对象]
     */
    public function sendSmsCode($mobile,$deviceId=''){
        $url = 'https://api.netease.im/sms/sendcode.action';
        $data= array(
            'mobile' => $mobile,
            'deviceId' => $deviceId
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 校验验证码
     * @param  $mobile       [目标手机号]
     * @param  $code          [验证码]
     * @return $result      [返回array数组对象]
     */
    public function verifycode($mobile,$code=''){
        $url = 'https://api.netease.im/sms/verifycode.action';
        $data= array(
            'mobile' => $mobile,
            'code' => $code
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 发送模板短信
     * @param  $templateid       [模板编号(由客服配置之后告知开发者)]
     * @param  $mobiles          [验证码]
     * @param  $params          [短信参数列表，用于依次填充模板，JSONArray格式，如["xxx","yyy"];对于不包含变量的模板，不填此参数表示模板即短信全文内容]
     * @return $result      [返回array数组对象]
     */
    public function sendSMSTemplate($templateid,$mobiles=array(),$params=array()){
        $url = 'https://api.netease.im/sms/sendtemplate.action';
        $data= array(
            'templateid' => $templateid,
            'mobiles' => json_encode($mobiles),
            'params' => json_encode($params)
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 查询模板短信发送状态
     * @param  $sendid       [发送短信的编号sendid]
     * @return $result      [返回array数组对象]
     */
    public function querySMSStatus($sendid){
        $url = 'https://api.netease.im/sms/querystatus.action';
        $data= array(
            'sendid' => $sendid
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }
}