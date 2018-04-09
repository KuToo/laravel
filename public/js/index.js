//获取消息列表
function msgs(e){
    $('.options span').removeClass('active');
    $(e).addClass('active');
    $('.m-list').css('display','none');
    var sessions=data.sessions;
    var accids='';//聊天对象的accid
    var list='';
    for(i in sessions){
        if(sessions[i].lastMsg.flow=='out'){//发出去的
            accids+=sessions[i].lastMsg.to+',';
        }else{
            accids+=sessions[i].lastMsg.from+',';
        }
    }
    //请求会话列表头像
    $.ajax({
        type:'post',
        url:'/getavatars',
        data: {
            'ids':accids
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType:'json',
        success:function(res){
            console.log(res);

        }
    })
    // list+='<li onclick="toMsg(this)">'
    //     +'<img class="avatar" width="30" height="30" alt="示例介绍" src="images/2.png">'
    //     +'<div class="msg-text">'
    //     +'<p class="name">'+sessions[i].lastMsg.fromNick +'</p>'
    //     +'<p class="msg">'+sessions[i].lastMsg.text+'</p>'
    //     +'</div>'
    // '</li>';

    $('.message ul').empty().html(list);
    $('.message').css('display','block');


}



//获取好友列表
function users(e){
    $('.options span').removeClass('active');
    $(e).addClass('active');
    $('.m-list').css('display','none');
    $('.user').css('display','block');
    //好友列表

}

//获取群组列表
function groups(e){
    $('.options span').removeClass('active');
    $(e).addClass('active');
    $('.m-list').css('display','none');
    $('.group').css('display','block');
    //群组列表
    $.ajax({
        type:'post',
        url:'',
        data:'',
        dataType:'json',
        success:function(data){

        }
    })
}

//进入聊天界面
function toMsg(e){
    $('.message ul li').removeClass('active');
    $(e).addClass('active');

}