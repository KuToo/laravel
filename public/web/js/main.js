//关系管理===开始=========================================================================================================
//加入黑名单
function addToBlacklist(){
    nim.markInBlacklist({
        account: 'account',
        // `true`表示加入黑名单, `false`表示从黑名单移除
        isAdd: true,
        done: function(error,obj){
            console.log(error);
            console.log(obj);
            console.log('将' + obj.account + (isAdd ? '加入黑名单' : '从黑名单移除') + (!error?'成功':'失败'));
            if (!error) {
                onMarkInBlacklist(obj);
            }
        }
    });

}

//从黑名单移除
function removeFromBlacklist(){
    nim.removeFromBlacklist({
        account: 'account',
        done: function(error,obj){
            console.log(error);
            console.log(obj);
            console.log('从黑名单移除' + (!error?'成功':'失败'));
            if (!error) {
                removeFromBlacklist(obj);
            }
        }
    });

}

//加入静音列表
function addToMutelist(){
    nim.addToMutelist({
        account: 'account',
        done: function(error,obj){
            console.log(error);
            console.log(obj);
            console.log('加入静音列表' + (!error?'成功':'失败'));
            if (!error) {
                addToMutelist(obj);
            }
        }
    });
}

//从静音列表中移除
function removeFromMutelist(){
    nim.addToMutelist({
        account: 'account',
        done: function(error,obj){
            console.log(error);
            console.log(obj);
            console.log('从静音列表移除' + (!error?'成功':'失败'));
            if (!error) {
                removeFromMutelist(obj);
            }
        }
    });
}
//关系管理===结束=========================================================================================================

//好友管理===开始=========================================================================================================
//刷新页面
function refreshFriendsUI(op) {
    // 刷新界面
    switch (op) {
        case 'add':
            break;
        case 'del':
            break;
        case 'upd':

            break;
    }
}

//申请添加好友
function applyFriend(){
    nim.applyFriend({
        account: 'account',
        ps: 'ps',
        done: function(error,obj){
            console.log(error);
            console.log(obj);
            console.log('申请加为好友' + (!error?'成功':'失败'));
        }
    });
}

//添加好友
function addFriend(){
    nim.addFriend({
        account: 'account',
        ps: 'ps',
        done: function(error,obj){
            console.log(error);
            console.log(obj);
            console.log('直接加为好友' + (!error?'成功':'失败'));
            if (!error) {
                onAddFriend(obj.friend);
            }
        }
    });
}
//通过好友申请
function passFriendApply(){
    nim.passFriendApply({
        idServer: sysMsg.idServer,
        account: 'account',
        ps: 'ps',
        done: function (error, obj) {
            console.log(error);
            console.log(obj);
            console.log('通过好友申请' + (!error?'成功':'失败'));
            if (!error) {
                onAddFriend(obj.friend);
            }
        }
    });
}
//拒绝好友申请
function rejectFriendApply(){
    nim.rejectFriendApply({
        idServer: sysMsg.idServer,
        account: 'account',
        ps: 'ps',
        done: function (error, obj) {
            console.log(error);
            console.log(obj);
            console.log('拒绝好友申请' + (!error?'成功':'失败'));
        }
    });

}
//删除好友
function deleteFriend(){
    nim.deleteFriend({
        account: 'account',
        done: function (error, obj) {
            console.log(error);
            console.log(obj);
            console.log('删除好友' + (!error?'成功':'失败'));
            if (!error) {
                onDeleteFriend(obj.account);
            }
        }
    });

}
//更新好友
function updateFriend(){
    nim.updateFriend({
        account: 'account',
        alias: 'alias',
        custom: 'custom',
        done: function (error, obj) {
            console.log(error);
            console.log(obj);
            console.log('更新好友' + (!error?'成功':'失败'));
            if (!error) {
                onUpdateFriend(obj);
            }
        }
    });

}
//获取好友列表
function getFriends(){
    nim.getFriends({
        done: function (error, friends) {
            console.log('获取好友列表' + (!error?'成功':'失败'), error, friends);
            if (!error) {
                onFriends(friends);
            }
        }
    });

}
//好友管理===结束=========================================================================================================

//会话管理===开始=========================================================================================================
//初始化
var nim = NIM.getInstance({

});
function onSessions(sessions) {
    console.log('收到会话列表', sessions);
    data.sessions = nim.mergeSessions(data.sessions, sessions);
    updateSessionsUI();
}
function onUpdateSession(session) {
    console.log('会话更新了', session);
    data.sessions = nim.mergeSessions(data.sessions, session);
    updateSessionsUI();
}
function updateSessionsUI() {
    // 刷新界面
}

//会话管理===结束=========================================================================================================
