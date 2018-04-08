//获取消息列表
function msgs(e){
    $('.options span').removeClass('active');
    $(e).addClass('active');
    $('.m-list').css('display','none');
    $('.message').css('display','block');

}

//获取好友列表
function users(e){
    $('.options span').removeClass('active');
    $(e).addClass('active');
    $('.m-list').css('display','none');
    $('.user').css('display','block');
    //好友列表
    $.ajax({
        type:'post',
        url:'',
        data:'',
        dataType:'json',
        success:function(data){

        }
    })
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