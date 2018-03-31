<?php 
/**
* 群组操作类
*/
class Group
{
    private $SendRequest;
    
    public function __construct($SendRequest) {
            $this->SendRequest = $SendRequest;
    }
    /**
     * 群组功能（高级群）-创建群
     * @param  $tname       [群名称，最大长度64字节]
     * @param  $owner       [群主用户帐号，最大长度32字节]
     * @param  $members     [["aaa","bbb"](JsonArray对应的accid，如果解析出错会报414)，长度最大1024字节]
     * @param  $announcement [群公告，最大长度1024字节]
     * @param  $intro       [群描述，最大长度512字节]
     * @param  $msg       [邀请发送的文字，最大长度150字节]
     * @param  $magree      [管理后台建群时，0不需要被邀请人同意加入群，1需要被邀请人同意才可以加入群。其它会返回414。]
     * @param  $joinmode    [群建好后，sdk操作时，0不用验证，1需要验证,2不允许任何人加入。其它返回414]
     * @param  $custom      [自定义高级群扩展属性，第三方可以跟据此属性自定义扩展自己的群属性。（建议为json）,最大长度1024字节.]
     * @return $result      [返回array数组对象]
     */
    public function createGroup($tname,$owner,$members,$announcement='',$intro='',$msg='',$magree='0',$joinmode='0',$custom='0'){
        $url = 'https://api.netease.im/nimserver/team/create.action';
        $data= array(
            'tname' => $tname,
            'owner' => $owner,
            'members' => json_encode($members),
            'announcement' => $announcement,
            'intro' => $intro,
            'msg' => $msg,
            'magree' => $magree,
            'joinmode' => $joinmode,
            'custom' => $custom
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 群组功能（高级群）-拉人入群
     * @param  $tid       [云信服务器产生，群唯一标识，创建群时会返回，最大长度128字节]
     * @param  $owner       [群主用户帐号，最大长度32字节]
     * @param  $members     [["aaa","bbb"](JsonArray对应的accid，如果解析出错会报414)，长度最大1024字节]
     * @param  $magree      [管理后台建群时，0不需要被邀请人同意加入群，1需要被邀请人同意才可以加入群。其它会返回414。]
     * @param  $joinmode    [群建好后，sdk操作时，0不用验证，1需要验证,2不允许任何人加入。其它返回414]
     * @param  $custom      [自定义高级群扩展属性，第三方可以跟据此属性自定义扩展自己的群属性。（建议为json）,最大长度1024字节.]
     * @return $result      [返回array数组对象]
     */
    public function addIntoGroup($tid,$owner,$members,$magree='0',$msg='请您入伙'){
        $url = 'https://api.netease.im/nimserver/team/add.action';
        $data= array(
            'tid' => $tid,
            'owner' => $owner,
            'members' => json_encode($members),
            'magree' => $magree,
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
     * 群组功能（高级群）-踢人出群
     * @param  $tid       [云信服务器产生，群唯一标识，创建群时会返回，最大长度128字节]
     * @param  $owner       [群主用户帐号，最大长度32字节]
     * @param  $member     [被移除人得accid，用户账号，最大长度字节]
     * @return $result      [返回array数组对象]
     */
    public function kickFromGroup($tid,$owner,$member){
        $url = 'https://api.netease.im/nimserver/team/kick.action';
        $data= array(
            'tid' => $tid,
            'owner' => $owner,
            'member' => $member
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 群组功能（高级群）-解散群
     * @param  $tid       [云信服务器产生，群唯一标识，创建群时会返回，最大长度128字节]
     * @param  $owner       [群主用户帐号，最大长度32字节]
     * @return $result      [返回array数组对象]
     */
    public function removeGroup($tid,$owner){
        $url = 'https://api.netease.im/nimserver/team/remove.action';
        $data= array(
            'tid' => $tid,
            'owner' => $owner
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 群组功能（高级群）-更新群资料
     * @param  $tid       [云信服务器产生，群唯一标识，创建群时会返回，最大长度128字节]
     * @param  $owner       [群主用户帐号，最大长度32字节]
     * @param  $tname     [群主用户帐号，最大长度32字节]
     * @param  $announcement [群公告，最大长度1024字节]
     * @param  $intro       [群描述，最大长度512字节]
     * @param  $joinmode    [群建好后，sdk操作时，0不用验证，1需要验证,2不允许任何人加入。其它返回414]
     * @param  $custom      [自定义高级群扩展属性，第三方可以跟据此属性自定义扩展自己的群属性。（建议为json）,最大长度1024字节.]
     * @return $result      [返回array数组对象]
     */
    public function updateGroup($tid,$owner,$tname,$announcement='',$intro='',$joinmode='0',$custom=''){
        $url = 'https://api.netease.im/nimserver/team/update.action';
        $data= array(
            'tid' => $tid,
            'owner' => $owner,
            'tname' => $tname,
            'announcement' => $announcement,
            'intro' => $intro,
            'joinmode' => $joinmode,
            'custom' => $custom
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 群组功能（高级群）-群信息与成员列表查询
     * @param  $tids       [群tid列表，如[\"3083\",\"3084"]]
     * @param  $ope       [1表示带上群成员列表，0表示不带群成员列表，只返回群信息]
     * @return $result      [返回array数组对象]
     */
    public function queryGroup($tids,$ope='1'){
        $url = 'https://api.netease.im/nimserver/team/query.action';
        $data= array(
            'tids' => json_encode($tids),
            'ope' => $ope
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 群组功能（高级群）-移交群主
     * @param  $tid       [云信服务器产生，群唯一标识，创建群时会返回，最大长度128字节]
     * @param  $owner       [群主用户帐号，最大长度32字节]
     * @param  $newowner     [新群主帐号，最大长度32字节]
     * @param  $leave       [1:群主解除群主后离开群，2：群主解除群主后成为普通成员。其它414]
     * @return $result      [返回array数组对象]
     */
    public function changeGroupOwner($tid,$owner,$newowner,$leave='2'){
        $url = 'https://api.netease.im/nimserver/team/changeOwner.action';
        $data= array(
            'tid' => $tid,
            'owner' => $owner,
            'newowner' => $newowner,
            'leave' => $leave
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 群组功能（高级群）-任命管理员
     * @param  $tid       [云信服务器产生，群唯一标识，创建群时会返回，最大长度128字节]
     * @param  $owner       [群主用户帐号，最大长度32字节]
     * @param  $members     [["aaa","bbb"](JsonArray对应的accid，如果解析出错会报414)，长度最大1024字节（群成员最多10个）]
     * @return $result      [返回array数组对象]
     */
    public function addGroupManager($tid,$owner,$members){
        $url = 'https://api.netease.im/nimserver/team/addManager.action';
        $data= array(
            'tid' => $tid,
            'owner' => $owner,
            'members' => json_encode($members)
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 群组功能（高级群）-移除管理员
     * @param  $tid       [云信服务器产生，群唯一标识，创建群时会返回，最大长度128字节]
     * @param  $owner       [群主用户帐号，最大长度32字节]
     * @param  $members     [["aaa","bbb"](JsonArray对应的accid，如果解析出错会报414)，长度最大1024字节（群成员最多10个）]
     * @return $result      [返回array数组对象]
     */
    public function removeGroupManager($tid,$owner,$members){
        $url = 'https://api.netease.im/nimserver/team/removeManager.action';
        $data= array(
            'tid' => $tid,
            'owner' => $owner,
            'members' => json_encode($members)
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 群组功能（高级群）-获取某用户所加入的群信息
     * @param  $accid       [要查询用户的accid]
     * @return $result      [返回array数组对象]
     */
    public function joinTeams($accid){
        $url = 'https://api.netease.im/nimserver/team/joinTeams.action';
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
     * 群组功能（高级群）-修改群昵称
     * @param  $tid       [云信服务器产生，群唯一标识，创建群时会返回，最大长度128字节]
     * @param  $owner       [群主用户帐号，最大长度32字节]
     * @param  $accid     [要修改群昵称对应群成员的accid]
     * @param  $nick     [accid对应的群昵称，最大长度32字节。]
     * @return $result      [返回array数组对象]
     */
    public function updateGroupNick($tid,$owner,$accid,$nick){
        $url = 'https://api.netease.im/nimserver/team/updateTeamNick.action';
        $data= array(
            'tid' => $tid,
            'owner' => $owner,
            'accid' => $accid,
            'nick' => $nick
        );
        if($this->RequestType=='curl'){
            $result = $this->postDataCurl($url,$data);
        }else{
            $result = $this->postDataFsockopen($url,$data);
        }
        return $result;
    }
}