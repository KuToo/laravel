<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div id="chat">
        <div class="sidebar">
            <div class="m-card">
                <header>
                    <img class="avatar" width="40" height="40" alt="Coffce" src="images/1.jpg">
                    <p class="name">Coffce</p>
                </header>
                <footer>
                    <input class="search" placeholder="search user..."></footer>
            </div>

            <div class="options"><span class="active iconfont" onclick="msgs(this)">&#xe60f;</span><span class="iconfont" onclick="users(this)">&#xe62f;</span><span class="iconfont" onclick="groups(this)">&#xe7d9;</span></div>
            <!--message-component-->
            <div class="m-list message">
                <ul><!--v-for-start-->
                    <li>
                        <img class="avatar" width="30" height="30" alt="示例介绍" src="images/2.png">
                        <p class="name">消息</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">朋友</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">群组</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">直播</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">系统</p>
                    </li><!--v-for-end-->
                </ul>
            </div><!--message-component-->

            <!--user-component-->
            <div class="m-list user">
                <ul><!--v-for-start-->
                    <li>
                        <img class="avatar" width="30" height="30" alt="示例介绍" src="images/2.png">
                        <p class="name">消息1</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">朋友1</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">群组1</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">直播1</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">系统1</p>
                    </li><!--v-for-end-->
                </ul>
            </div><!--user-component-->

            <!--group-component-->
            <div class="m-list group">
                <ul><!--v-for-start-->
                    <li>
                        <img class="avatar" width="30" height="30" alt="示例介绍" src="images/2.png">
                        <p class="name">消息2</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">朋友2</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">群组2</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">直播2</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">系统2</p>
                    </li><!--v-for-end-->
                </ul>
            </div><!--group-component-->
        </div>
        <div class="main">
            <div class="m-message">
                <ul><!--v-for-start-->
                    <li>
                        <p class="time"><span>10:23</span></p>
                        <div class="main">
                            <img class="avatar" width="30" height="30" src="images/2.png">
                            <div class="text">Hello，聊天记录保存在localStorge。简单演示了Vue的基础特性和webpack配置。</div>
                        </div>
                    </li>
                    <li>
                        <p class="time"><span>10:23</span></p>
                        <div class="main"><img class="avatar" width="30" height="30" src="images/2.png">
                            <div class="text">项目地址: https://github.com/coffcer/vue-chat</div>
                        </div>
                    </li><!--v-for-end-->
                </ul>
            </div><!--v-component-->
            <div class="m-text">
                <textarea placeholder="按 Ctrl + Enter 发送"></textarea>
            </div><!--v-component-->
        </div>
    </div>
    <script src="plug/nim/NIM_Web_NIM_v5.0.0.js"></script>
    <script src="js/common/jquery-3.3.1.min.js"></script>
    <script src="js/index.js"></script>

    <script>

        var data = {};
        var nim = NIM.getInstance({
            // 初始化SDK
            debug: false,
            appKey: "214d34cfe8e1ba09e872bcbcda509109",
            account: '4',
            token: 'a5cc338605f25f848d6048b552d13c66',
            onconnect: onConnect,
            onerror: onError,
            onwillreconnect: onWillReconnect,
            ondisconnect: onDisconnect,
            // 多端登录
            onloginportschange: onLoginPortsChange,
            // 用户关系
            onblacklist: onBlacklist,
            onsyncmarkinblacklist: onMarkInBlacklist,
            onmutelist: onMutelist,
            onsyncmarkinmutelist: onMarkInMutelist,
            // 好友关系
            onfriends: onFriends,
            onsyncfriendaction: onSyncFriendAction,
            // 用户名片
            onmyinfo: onMyInfo,
            onupdatemyinfo: onUpdateMyInfo,
            onusers: onUsers,
            onupdateuser: onUpdateUser,
            // 机器人列表的回调
            onrobots: onRobots,
            // 群组
            onteams: onTeams,
            onsynccreateteam: onCreateTeam,
            onUpdateTeam: onUpdateTeam,
            onteammembers: onTeamMembers,
            // onsyncteammembersdone: onSyncTeamMembersDone,
            onupdateteammember: onUpdateTeamMember,
            // 群消息业务已读通知
            onTeamMsgReceipt: onTeamMsgReceipt,
            // 会话
            onsessions: onSessions,
            onupdatesession: onUpdateSession,
            // 消息
            onroamingmsgs: onRoamingMsgs,
            onofflinemsgs: onOfflineMsgs,
            onmsg: onMsg,
            // 系统通知
            onofflinesysmsgs: onOfflineSysMsgs,
            onsysmsg: onSysMsg,
            onupdatesysmsg: onUpdateSysMsg,
            onsysmsgunread: onSysMsgUnread,
            onupdatesysmsgunread: onUpdateSysMsgUnread,
            onofflinecustomsysmsgs: onOfflineCustomSysMsgs,
            oncustomsysmsg: onCustomSysMsg,
            // 收到广播消息
            onbroadcastmsg: onBroadcastMsg,
            onbroadcastmsgs: onBroadcastMsgs,
            // 同步完成
            onsyncdone: onSyncDone
        });

        function onConnect() {
            console.log('连接成功');
        }
        function onWillReconnect(obj) {
            // 此时说明 `SDK` 已经断开连接, 请开发者在界面上提示用户连接已断开, 而且正在重新建立连接
            console.log('即将重连');
            console.log(obj.retryCount);
            console.log(obj.duration);
        }
        function onDisconnect(error) {
            // 此时说明 `SDK` 处于断开状态, 开发者此时应该根据错误码提示相应的错误信息, 并且跳转到登录页面
            console.log('丢失连接');
            console.log(error);
            if (error) {
                switch (error.code) {
                    // 账号或者密码错误, 请跳转到登录页面并提示错误
                    case 302:
                        break;
                    // 被踢, 请提示错误后跳转到登录页面
                    case 'kicked':
                        break;
                    default:
                        break;
                }
            }
        }
        function onError(error) {
            console.log(error);
        }

        function onLoginPortsChange(loginPorts) {
            console.log('当前登录帐号在其它端的状态发生改变了', loginPorts);
        }

        function onBlacklist(blacklist) {
            console.log('收到黑名单', blacklist);
            data.blacklist = nim.mergeRelations(data.blacklist, blacklist);
            data.blacklist = nim.cutRelations(data.blacklist, blacklist.invalid);
            refreshBlacklistUI();
        }
        function onMarkInBlacklist(obj) {
            console.log(obj);
            console.log(obj.account + '被你在其它端' + (obj.isAdd ? '加入' : '移除') + '黑名单');
            if (obj.isAdd) {
                addToBlacklist(obj);
            } else {
                removeFromBlacklist(obj);
            }
        }
        function addToBlacklist(obj) {
            data.blacklist = nim.mergeRelations(data.blacklist, obj.record);
            refreshBlacklistUI();
        }
        function removeFromBlacklist(obj) {
            data.blacklist = nim.cutRelations(data.blacklist, obj.record);
            refreshBlacklistUI();
        }
        function refreshBlacklistUI() {
            // 刷新界面
        }
        function onMutelist(mutelist) {
            console.log('收到静音列表', mutelist);
            data.mutelist = nim.mergeRelations(data.mutelist, mutelist);
            data.mutelist = nim.cutRelations(data.mutelist, mutelist.invalid);
            refreshMutelistUI();
        }
        function onMarkInMutelist(obj) {
            console.log(obj);
            console.log(obj.account + '被你' + (obj.isAdd ? '加入' : '移除') + '静音列表');
            if (obj.isAdd) {
                addToMutelist(obj);
            } else {
                removeFromMutelist(obj);
            }
        }
        function addToMutelist(obj) {
            data.mutelist = nim.mergeRelations(data.mutelist, obj.record);
            refreshMutelistUI();
        }
        function removeFromMutelist(obj) {
            data.mutelist = nim.cutRelations(data.mutelist, obj.record);
            refreshMutelistUI();
        }
        function refreshMutelistUI() {
            // 刷新界面
        }

        function onFriends(friends) {
            console.log('收到好友列表', friends);
            data.friends = nim.mergeFriends(data.friends, friends);
            data.friends = nim.cutFriends(data.friends, friends.invalid);
            refreshFriendsUI();
        }
        function onSyncFriendAction(obj) {
            console.log(obj);
            switch (obj.type) {
                case 'addFriend':
                    console.log('你在其它端直接加了一个好友' + obj.account + ', 附言' + obj.ps);
                    onAddFriend(obj.friend);
                    break;
                case 'applyFriend':
                    console.log('你在其它端申请加了一个好友' + obj.account + ', 附言' + obj.ps);
                    break;
                case 'passFriendApply':
                    console.log('你在其它端通过了一个好友申请' + obj.account + ', 附言' + obj.ps);
                    onAddFriend(obj.friend);
                    break;
                case 'rejectFriendApply':
                    console.log('你在其它端拒绝了一个好友申请' + obj.account + ', 附言' + obj.ps);
                    break;
                case 'deleteFriend':
                    console.log('你在其它端删了一个好友' + obj.account);
                    onDeleteFriend(obj.account);
                    break;
                case 'updateFriend':
                    console.log('你在其它端更新了一个好友', obj.friend);
                    onUpdateFriend(obj.friend);
                    break;
            }
        }
        function onAddFriend(friend) {
            data.friends = nim.mergeFriends(data.friends, friend);
            refreshFriendsUI();
        }
        function onDeleteFriend(account) {
            data.friends = nim.cutFriendsByAccounts(data.friends, account);
            refreshFriendsUI();
        }
        function onUpdateFriend(friend) {
            data.friends = nim.mergeFriends(data.friends, friend);
            refreshFriendsUI();
        }
        function refreshFriendsUI() {
            // 刷新界面
        }

        function onMyInfo(user) {
            console.log('收到我的名片', user);
            data.myInfo = user;
            updateMyInfoUI();
        }
        function onUpdateMyInfo(user) {
            console.log('我的名片更新了', user);
            data.myInfo = NIM.util.merge(data.myInfo, user);
            updateMyInfoUI();
        }
        function updateMyInfoUI() {
            // 刷新界面
        }
        function onUsers(users) {
            console.log('收到用户名片列表', users);
            data.users = nim.mergeUsers(data.users, users);
        }
        function onUpdateUser(user) {
            console.log('用户名片更新了', user);
            data.users = nim.mergeUsers(data.users, user);
        }
        function onRobots (robots) {
            // 客户私有化方案不支持
            console.log('收到机器人列表', robots);
            data.robots = robots;
        }
        function onTeams(teams) {
            console.log('群列表', teams);
            data.teams = nim.mergeTeams(data.teams, teams);
            onInvalidTeams(teams.invalid);
        }
        function onInvalidTeams(teams) {
            data.teams = nim.cutTeams(data.teams, teams);
            data.invalidTeams = nim.mergeTeams(data.invalidTeams, teams);
            refreshTeamsUI();
        }
        function onCreateTeam(team) {
            console.log('你创建了一个群', team);
            data.teams = nim.mergeTeams(data.teams, team);
            refreshTeamsUI();
            onTeamMembers({
                teamId: team.teamId,
                members: owner
            });
        }
        function refreshTeamsUI() {
            // 刷新界面
        }
        function onTeamMembers(teamId, members) {
            console.log('群id', teamId, '群成员', members);
            var teamId = obj.teamId;
            var members = obj.members;
            data.teamMembers = data.teamMembers || {};
            data.teamMembers[teamId] = nim.mergeTeamMembers(data.teamMembers[teamId], members);
            data.teamMembers[teamId] = nim.cutTeamMembers(data.teamMembers[teamId], members.invalid);
            refreshTeamMembersUI();
        }
        // function onSyncTeamMembersDone() {
        //     console.log('同步群列表完成');
        // }
        function onUpdateTeam (team) {
            console.log('群状态更新', team)
        }
        function onUpdateTeamMember(teamMember) {
            console.log('群成员信息更新了', teamMember);
            onTeamMembers({
                teamId: teamMember.teamId,
                members: teamMember
            });
        }
        function refreshTeamMembersUI() {
            // 刷新界面
        }
        function onTeamMsgReceipt (teamMsgReceipts) {
            console.log('群消息已读通知', teamMsgReceipts)
        }

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

        function onRoamingMsgs(obj) {
            console.log('漫游消息', obj);
            pushMsg(obj.msgs);
        }
        function onOfflineMsgs(obj) {
            console.log('离线消息', obj);
            pushMsg(obj.msgs);
        }
        function onMsg(msg) {
            console.log('收到消息', msg.scene, msg.type, msg);
            pushMsg(msg);
        }
        function onBroadcastMsg(msg) {
            console.log('收到广播消息', msg);
        }
        function onBroadcastMsgs(msgs) {
            console.log('收到广播消息列表', msgs);
        }
        function pushMsg(msgs) {
            if (!Array.isArray(msgs)) { msgs = [msgs]; }
            var sessionId = msgs[0].sessionId;
            data.msgs = data.msgs || {};
            data.msgs[sessionId] = nim.mergeMsgs(data.msgs[sessionId], msgs);
        }

        function onOfflineSysMsgs(sysMsgs) {
            console.log('收到离线系统通知', sysMsgs);
            pushSysMsgs(sysMsgs);
        }
        function onSysMsg(sysMsg) {
            console.log('收到系统通知', sysMsg)
            pushSysMsgs(sysMsg);
        }
        function onUpdateSysMsg(sysMsg) {
            pushSysMsgs(sysMsg);
        }
        function pushSysMsgs(sysMsgs) {
            data.sysMsgs = nim.mergeSysMsgs(data.sysMsgs, sysMsgs);
            refreshSysMsgsUI();
        }
        function onSysMsgUnread(obj) {
            console.log('收到系统通知未读数', obj);
            data.sysMsgUnread = obj;
            refreshSysMsgsUI();
        }
        function onUpdateSysMsgUnread(obj) {
            console.log('系统通知未读数更新了', obj);
            data.sysMsgUnread = obj;
            refreshSysMsgsUI();
        }
        function refreshSysMsgsUI() {
            // 刷新界面
        }
        function onOfflineCustomSysMsgs(sysMsgs) {
            console.log('收到离线自定义系统通知', sysMsgs);
        }
        function onCustomSysMsg(sysMsg) {
            console.log('收到自定义系统通知', sysMsg);
        }

        function onSyncDone() {
            console.log('同步完成');
        }

        // 清除实例
        nim.destroy()


    </script>
</body>
</html>