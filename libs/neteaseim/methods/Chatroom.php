<?php 
/**
* 聊天室操作类
*/
class ClassName extends AnotherClass
{
    
    private $SendRequest;

    public function __construct($SendRequest) {
            $this->SendRequest = $SendRequest;
    }
    /**
     * 创建聊天室
     * @param $accid 聊天室属主的账号accid
     * @param $name  聊天室名称，长度限制128个字符
     */
    public function chatroomCreates($accid,$name){
        $url = 'https://api.netease.im/nimserver/chatroom/create.action';
        $data = array(
            'creator'=>$accid,
            'name'=>$name
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 更新聊天室
     * @param $roomid  聊天室ID
     * @param $name    聊天室名称
     * @return array
     */
    public function chatroomUpdates($roomid,$name){
        $url = 'https://api.netease.im/nimserver/chatroom/update.action';
        $data = array(
            'roomid'=>$roomid,
            'name'=>$name
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 修改聊天室开启或关闭聊天室
     * @param $roomid        聊天室ID
     * @param $operator      创建者ID
     * @param string $status 修改还是关闭  false => 关闭
     */
    public function chatroomToggleCloses($roomid,$operator)
    {
        $url = 'https://api.netease.im/nimserver/chatroom/toggleCloseStat.action';
        $data = array(
            'roomid'=>$roomid,
            'operator'=>$operator,
            'valid'=>'false'
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    public function chatroomToggleStats($roomid,$operator)
    {
        $url = 'https://api.netease.im/nimserver/chatroom/toggleCloseStat.action';
        $data = array(
            'roomid'=>$roomid,
            'operator'=>$operator,
            'valid'=>'true'
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     *设置聊天室内用户角色
     * @param $roomid            // 聊天室ID
     * @param $operator          // 操作者账号accid   operator必须是创建者
     * @param $target            // 被操作者账号accid
     * @param $opt
     *          1: 设置为管理员，operator必须是创建者
                2:设置普通等级用户，operator必须是创建者或管理员
                -1:设为黑名单用户，operator必须是创建者或管理员
                -2:设为禁言用户，operator必须是创建者或管理员
     * @param string $optvalue   // true:设置；false:取消设置
     */
    public function chatroomSetMemberRoles($roomid,$operator,$target,$opt,$optvalue)
    {
        $url = 'https://api.netease.im/nimserver/chatroom/setMemberRole.action';
        $data = array(
            'roomid'=>$roomid,
            'operator'=>$operator,
            'target'=>$target,
            'opt'=>$opt,
            'optvalue'=>$optvalue,
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    // 获取聊天室的信息
    public function chatroomgets($roomid)
    {
        $url = 'https://api.netease.im/nimserver/chatroom/get.action';
        $data = array(
            'roomid'=>$roomid,
            'needOnlineUserCount'=>'true'
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;

    }
}