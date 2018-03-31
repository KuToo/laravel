<?php 
/**
* 语音视频操作类
*/
class Media
{
    
    private $SendRequest;

    public function __construct($SendRequest) {
            $this->SendRequest = $SendRequest;
    }

    /**
     * 发起单人专线电话
     * @param  $callerAcc       [发起本次请求的用户的accid]
     * @param  $caller          [主叫方电话号码(不带+86这类国家码,下同)]
     * @param  $callee          [被叫方电话号码]
     * @param  $maxDur          [本通电话最大可持续时长,单位秒,超过该时长时通话会自动切断]
     * @return $result      [返回array数组对象]
     */
    public function startcall($callerAcc,$caller,$callee,$maxDur='60'){
        $url = 'https://api.netease.im/call/ecp/startcall.action';
        $data= array(
            'callerAcc' => $callerAcc,
            'caller' => $caller,
            'callee' => $callee,
            'maxDur' => $maxDur
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 发起专线会议电话
     * @param  $callerAcc       [发起本次请求的用户的accid]
     * @param  $caller          [主叫方电话号码(不带+86这类国家码,下同)]
     * @param  $callee          [所有被叫方电话号码,必须是json格式的字符串,如["13588888888","13699999999"]]
     * @param  $maxDur          [本通电话最大可持续时长,单位秒,超过该时长时通话会自动切断]
     * @return $result      [返回array数组对象]
     */
    public function startconf($callerAcc,$caller,$callee,$maxDur='60'){
        $url = 'https://api.netease.im/call/ecp/startconf.action';
        $data= array(
            'callerAcc' => $callerAcc,
            'caller' => $caller,
            'callee' => json_encode($callee),
            'maxDur' => $maxDur
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 查询单通专线电话或会议的详情
     * @param  $session       [本次通话的id号]
     * @param  $type          [通话类型,1:专线电话;2:专线会议]
     * @return $result      [返回array数组对象]
     */
    public function queryCallsBySession($session,$type){
        $url = 'https://api.netease.im/call/ecp/queryBySession.action';
        $data= array(
            'session' => $session,
            'type' => $type
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /* 2016-06-15 新增php调用直播接口示例 */

    /**
     * 获取语音视频安全认证签名
     * @param  $uid       [用户帐号唯一标识，必须是Long型]
     */
    public function getUserSignature($uid){
        $url = 'https://api.netease.im/nimserver/user/getToken.action';
        $data= array(
            'uid' => $uid
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }
}