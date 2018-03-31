<?php 
/**
* 消息操作类
*/
class Message
{
    private $SendRequest;

    public function __construct($SendRequest) {
            $this->SendRequest = $SendRequest;
    }

    /**
     * 消息功能-发送普通消息
     * @param  $from       [发送者accid，用户帐号，最大32字节，APP内唯一]
     * @param  $ope        [0：点对点个人消息，1：群消息，其他返回414]
     * @param  $to        [ope==0是表示accid，ope==1表示tid]
     * @param  $type        [0 表示文本消息,1 表示图片，2 表示语音，3 表示视频，4 表示地理位置信息，6 表示文件，100 自定义消息类型]
     * @param  $body       [请参考下方消息示例说明中对应消息的body字段。最大长度5000字节，为一个json字段。]
     * @param  $option       [发消息时特殊指定的行为选项,Json格式，可用于指定消息的漫游，存云端历史，发送方多端同步，推送，消息抄送等特殊行为;option中字段不填时表示默认值]
     * @param  $pushcontent      [推送内容，发送消息（文本消息除外，type=0），option选项中允许推送（push=true），此字段可以指定推送内容。 最长200字节]
     * @return $result      [返回array数组对象]
     */
    public function sendMsg($from,$ope,$to,$type,$body,$option=array("push"=>false,"roam"=>true,"history"=>false,"sendersync"=>true, "route"=>false),$pushcontent=''){
        $url = 'https://api.netease.im/nimserver/msg/sendMsg.action';
        $data= array(
            'from' => $from,
            'ope' => $ope,
            'to' => $to,
            'type' => $type,
            'body' => json_encode($body),
            'option' => json_encode($option),
            'pushcontent' => $pushcontent
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 消息功能-发送自定义系统消息
     * 1.自定义系统通知区别于普通消息，方便开发者进行业务逻辑的通知。
     * 2.目前支持两种类型：点对点类型和群类型（仅限高级群），根据msgType有所区别。
     * @param  $from       [发送者accid，用户帐号，最大32字节，APP内唯一]
     * @param  $msgtype        [0：点对点个人消息，1：群消息，其他返回414]
     * @param  $to        [msgtype==0是表示accid，msgtype==1表示tid]
     * @param  $attach        [自定义通知内容，第三方组装的字符串，建议是JSON串，最大长度1024字节]
     * @param  $pushcontent       [ios推送内容，第三方自己组装的推送内容，如果此属性为空串，自定义通知将不会有推送（pushcontent + payload不能超过200字节）]
     * @param  $payload       [ios 推送对应的payload,必须是JSON（pushcontent + payload不能超过200字节）]
     * @param  $sound      [如果有指定推送，此属性指定为客户端本地的声音文件名，长度不要超过30个字节，如果不指定，会使用默认声音]
     * @return $result      [返回array数组对象]
     */
    public function sendAttachMsg($from,$msgtype,$to,$attach,$pushcontent='',$payload=array(),$sound=''){
        $url = 'https://api.netease.im/nimserver/msg/sendAttachMsg.action';
        $data= array(
            'from' => $from,
            'msgtype' => $msgtype,
            'to' => $to,
            'attach' => $attach,
            'pushcontent' => $pushcontent,
            'payload' => json_encode($payload),
            'sound' => $sound
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 消息功能-文件上传
     * @param  $content       [字节流base64串(Base64.encode(bytes)) ，最大15M的字节流]
     * @param  $type        [上传文件类型]
     * @return $result      [返回array数组对象]
     */
    public function uploadMsg($content,$type='0'){
        $url = 'https://api.netease.im/nimserver/msg/upload.action';
        $data= array(
            'content' => $content,
            'type' => $type
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 消息功能-文件上传（multipart方式）
     * @param  $content       [字节流base64串(Base64.encode(bytes)) ，最大15M的字节流]
     * @param  $type        [上传文件类型]
     * @return $result      [返回array数组对象]
     */
    public function uploadMultiMsg($content,$type='0'){
        $url = 'https://api.netease.im/nimserver/msg/fileUpload.action';
        $data= array(
            'content' => $content,
            'type' => $type
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }
    /**
     * 历史记录-单聊
     * @param  $from       [发送者accid]
     * @param  $to          [接收者accid]
     * @param  $begintime     [开始时间，ms]
     * @param  $endtime     [截止时间，ms]
     * @param  $limit       [本次查询的消息条数上限(最多100条),小于等于0，或者大于100，会提示参数错误]
     * @param  $reverse    [1按时间正序排列，2按时间降序排列。其它返回参数414.默认是按降序排列。]
     * @return $result      [返回array数组对象]
     */
    public function querySessionMsg($from,$to,$begintime,$endtime='',$limit='100',$reverse='1'){
        $url = 'https://api.netease.im/nimserver/history/querySessionMsg.action';
        $data= array(
            'from' => $from,
            'to' => $to,
            'begintime' => $begintime,
            'endtime' => $endtime,
            'limit' => $limit,
            'reverse' => $reverse
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 历史记录-群聊
     * @param  $tid       [群id]
     * @param  $accid          [查询用户对应的accid.]
     * @param  $begintime     [开始时间，ms]
     * @param  $endtime     [截止时间，ms]
     * @param  $limit       [本次查询的消息条数上限(最多100条),小于等于0，或者大于100，会提示参数错误]
     * @param  $reverse    [1按时间正序排列，2按时间降序排列。其它返回参数414.默认是按降序排列。]
     * @return $result      [返回array数组对象]
     */
    public function queryGroupMsg($tid,$accid,$begintime,$endtime='',$limit='100',$reverse='1'){
        $url = 'https://api.netease.im/nimserver/history/queryTeamMsg.action';
        $data= array(
            'tid' => $tid,
            'accid' => $accid,
            'begintime' => $begintime,
            'endtime' => $endtime,
            'limit' => $limit,
            'reverse' => $reverse
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }
}