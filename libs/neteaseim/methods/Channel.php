<?php 
/**
* 直播频道操作类
*/
class Channel extends AnotherClass
{
    
    function __construct(argument)
    {
        # code...
    }

    /**
     * 创建一个直播频道
     * @param  $name       [频道名称, string]
     * @param  $type       [频道类型（0:rtmp；1:hls；2:http）]
     */
    public function channelCreate($name,$type){
        $url = 'https://vcloud.163.com/app/channel/create';
        $data= array(
            'name' => $name,
            'type' => $type
        );
        if($this->RequestType=='curl'){
            $result = $this->postJsonDataCurl($url,$data);
        }else{
            $result = $this->postJsonDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 修改直播频道信息
     * @param  $name       [频道名称, string]
     * @param  $cid       [频道ID，32位字符串]
     * @param  $type       [频道类型（0:rtmp；1:hls；2:http）]
     */
    public function channelUpdate($name, $cid, $type){
        $url = 'https://vcloud.163.com/app/channel/update';
        $data= array(
            'name' => $name,
            'cid' => $cid,
            'type' => $type
        );
        if($this->RequestType=='curl'){
            $result = $this->postJsonDataCurl($url,$data);
        }else{
            $result = $this->postJsonDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 删除一个直播频道
     * @param  $cid       [频道ID，32位字符串]
     */
    public function channelDelete($cid){
        $url = 'https://vcloud.163.com/app/channel/delete';
        $data= array(
            'cid' => $cid
        );
        if($this->RequestType=='curl'){
            $result = $this->postJsonDataCurl($url,$data);
        }else{
            $result = $this->postJsonDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 获取一个直播频道的信息
     * @param  $cid       [频道ID，32位字符串]
     */
    public function channelStats($cid){
        $url = 'https://vcloud.163.com/app/channelstats';
        $data= array(
            'cid' => $cid
        );
        if($this->RequestType=='curl'){
            $result = $this->postJsonDataCurl($url,$data);
        }else{
            $result = $this->postJsonDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 获取用户直播频道列表
     * @param  $records       [单页记录数，默认值为10]
     * @param  $pnum = 1       [要取第几页，默认值为1]
     * @param  $ofield       [排序的域，支持的排序域为：ctime（默认）]
     * @param  $sort            [升序还是降序，1升序，0降序，默认为desc]
     */
    public function channelList($records = 10, $pnum = 1, $ofield = 'ctime', $sort = 0){
        $url = 'https://vcloud.163.com/app/channellist';
        $data= array(
            'records' => $records,
            'pnum' => $pnum,
            'ofield' => $ofield,
            'sort' => $sort
        );
        if($this->RequestType=='curl'){
            $result = $this->postJsonDataCurl($url,$data);
        }else{
            $result = $this->postJsonDataFsockopen($url,$data);
        }
        return $result;
    }

    /**
     * 重新获取推流地址
     * @param  $cid       [频道ID，32位字符串]
     */
    public function channelRefreshAddr($cid){
        $url = 'https://vcloud.163.com/app/address';
        $data= array(
            'cid' => $cid
        );
        if($this->RequestType=='curl'){
            $result = $this->postJsonDataCurl($url,$data);
        }else{
            $result = $this->postJsonDataFsockopen($url,$data);
        }
        return $result;
    }
}