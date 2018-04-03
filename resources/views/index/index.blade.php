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
            <!--v-component-->
            <div class="m-list">
                <ul><!--v-for-start-->
                    <li class="active">
                        <img class="avatar" width="30" height="30" alt="示例介绍" src="images/2.png">
                        <p class="name">示例介绍</p>
                    </li>
                    <li>
                        <img class="avatar" width="30" height="30" alt="webpack" src="images/3.jpg">
                        <p class="name">webpack</p>
                    </li><!--v-for-end-->
                </ul>
            </div><!--v-component-->
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

    <script>
        //  云信初始化
        var data = {};
        var nim = NIM.getInstance({
            debug: false,
            appKey: "214d34cfe8e1ba09e872bcbcda509109",
            account: '4',
            token: 'a5cc338605f25f848d6048b552d13c66',
            onconnect: onConnect,
            onwillreconnect: onWillReconnect,
            ondisconnect: onDisconnect,
            onerror: onError
        });
        function onConnect() {
            console.log('连接成功');
        }
        function onWillReconnect(obj) {
            // 此时说明 SDK 已经断开连接, 请开发者在界面上提示用户连接已断开, 而且正在重新建立连接
            console.log('即将重连');
        }
        function onDisconnect(error) {
            // 此时说明 SDK 处于断开状态, 开发者此时应该根据错误码提示相应的错误信息, 并且跳转到登录页面
            console.log('丢失连接');
            if (error) {
                switch (error.code) {
                    // 账号或者密码错误, 请跳转到登录页面并提示错误
                    case 302:
                        window.locarion.href="/login";
                        break;
                    // 重复登录, 已经在其它端登录了, 请跳转到登录页面并提示错误
                    case 417:
                        window.locarion.href="/index";
                        break;
                    // 被踢, 请提示错误后跳转到登录页面
                    case 'kicked':
                        window.locarion.href="/login";
                        break;
                    default:
                        break;
                }
            }
        }
        function onError(error) {
            console.log(error);
        }
    </script>
</body>
</html>