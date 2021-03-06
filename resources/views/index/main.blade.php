<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>云信 Web Demo</title>
	<link rel="stylesheet" href="nim/im/css/base.css" />
	<link rel="stylesheet" href="nim/im/css/animate.css" />
	<link rel="stylesheet" href="nim/im/css/jquery-ui.css" />
	<link rel="stylesheet" href="nim/im/css/contextMenu/jquery.contextMenu.css" />
	<link rel="stylesheet" href="nim/im/css/minAlert.css" />
	<link rel="stylesheet" href="nim/im/css/main.css" />
	<link rel="stylesheet" href="nim/im/css/uiKit.css" />
	<link rel="stylesheet" href="nim/im/css/CEmojiEngine.css" />
	<link rel="stylesheet" href="nim/im/css/rangeslider.css" />
	<link rel="stylesheet" href="nim/im/css/pure-min.css">
	<link rel="stylesheet" href="nim/im/css/whiteboard.css" />
	<link rel="icon" href="nim/im/images/icon.ico" type="image/x-icon" />
</head>

<body>
	<div class="bad-network hide tc radius5px" id="errorNetwork">已与服务器断开，请检查网络连接</div>
	<div class="wrapper box-sizing">
		<div class="content">
			<div class="left-panel radius5px" id="left-panel">
				<div class="hide loading" id="loading"></div>
				<div class="title">
					<img src="" alt="" width="56" height="56" class="radius-circle avatar" id="userPic" /><span id="userName">&nbsp;</span>
					<span><img src="nim/im/images/pen.png" class="u-modify" id="showMyInfo"></span>
					<span class="exit" title="退出" id="logout">退出</span>
				</div>
				<div class="m-devices hide">正在使用云信web版</div>
				<div class="panel" id="switchPanel">
					<a class="box-sizing tc m-unread panel_tab cur" data-type="sessions"><span class="icon icon-session"></span><b class="u-unread hide"> </b></a>
					<a class="box-sizing tc panel_tab" data-type="friends"><span class="icon icon-friend"></span></a>
					<a class="box-sizing tc panel_tab" data-type="teams"><span class="icon icon-team"></span></a>
				</div>
				<div class="item" id="sessionsWrap" data-type="sessions">
					<!-- 最近联系人 -->
					<div class="list">
						<div class="m-panel">
							<div class="panel_item m-sysMsg" id="showNotice">
								<div class="panel_avatar">
									<img class="panel_image" src="nim/im/images/notice.png" alt="消息中心" />
								</div>
								<div class="panel_text">
									<p class="panel_single-row">消息中心</p>
								</div>
								<b class="count j-sysMsgCount hide"></b>
							</div>
						</div>
						<div id="sessions">
							<p>正在获取最近联系人...</p>
						</div>
					</div>
				</div>
				<div class="item hide" id="friendsWrap" data-type="friends">
					<!-- 通讯录 -->
					<div class="list">
						<div class="m-panel">
							<div class="panel_item" id="addFriend">
								<div class="panel_avatar">
									<img class="panel_image" src="nim/im/images/addFriend.png" alt="添加好友" />
								</div>
								<div class="panel_text">
									<p class="panel_single-row">添加好友</p>
								</div>
							</div>
							<div class="panel_item" id="showBlacklist">
								<div class="panel_avatar">
									<img class="panel_image" src="nim/im/images/black.png" alt="黑名单" />
								</div>
								<div class="panel_text">
									<p class="panel_single-row">黑名单</p>
								</div>
							</div>
							<div class="panel_item" id="myPhone">
								<div class="panel_avatar">
									<img class="panel_image" src="nim/im/images/myPhone.png" alt="我的手机" />
								</div>
								<div class="panel_text">
									<p class="panel_single-row">我的手机</p>
								</div>
							</div>
						</div>
						<div id="friends">
							<p>正在获取通讯录...</p>
						</div>
					</div>
				</div>
				<div class="item hide" id="teamsWrap" data-type="teams">
					<!-- 群 -->
					<div class="list">
						<div class="m-panel">
							<div class="panel_item" id="createTeam">
								<div class="panel_avatar">
									<img class="panel_image" src="nim/im/images/addTeam.png" alt="创建讨论组" />
								</div>
								<div class="panel_text">
									<p class="panel_single-row">创建讨论组</p>
								</div>
							</div>
						</div>
						<div class="m-panel">
							<div class="panel_item" id="createAdvanceTeam">
								<div class="panel_avatar">
									<img class="panel_image" src="nim/im/images/addTeam.png" alt="创建高级群" />
								</div>
								<div class="panel_text">
									<p class="panel_single-row">创建高级群</p>
								</div>
							</div>
						</div>
						<div class="m-panel">
							<div class="panel_item" id="searchAdvanceTeam">
								<div class="panel_avatar">
									<img class="panel_image" src="nim/im/images/searchTeam.png" alt="搜索高级群" />
								</div>
								<div class="panel_text">
									<p class="panel_single-row">搜索高级群</p>
								</div>
							</div>
						</div>
						<div class="teams m-panel" id="teams">
						</div>
					</div>
				</div>
			</div>
			<div class="chatVernier" id="chatVernier"><span class="radius-circle hide"></span></div>
			<div class="right-panel hide radius5px" id="rightPanel">
				<!-- 聊天面板 -->
				<div class="chat-box show-netcall-box" id="chatBox">
					<div class="title" id="chatTitle">
						<img src="" width="56" height="56" class="radius-circle img" id="headImg" />
						<span id="nickName"></span>
						<div class="cloudMsg tc radius4px" data-record-id="" id="cloudMsg"><i class="icon icon-team-info"></i>
							<p>云记录</p>
						</div>
						<div class="team-info hide tc radius4px" data-team-id="" id="teamInfo"><i class="icon icon-team-info"></i>
							<p>资料</p>
						</div>
					</div>
					<div class="netcall-box" id="netcallBox">
						<div class="netcall-mask hide">
							<div class="netcallTip"></div>
						</div>
						<div class="top hide">
							<span class="transferAudioAndVideo switchToAudio" id="switchToAudio">切换音频</span>
							<span class="transferAudioAndVideo switchToVideo" id="switchToVideo">切换视频</span>
							<span class="fullScreenIcon toggleFullScreenButton" id="toggleFullScreenButton" title="切换全屏">&nbsp;</span>
						</div>
						<!-- p2p呼叫界面 -->
						<div class="netcall-calling-box hide">
							<img alt="用户头像" class="avatar">
							<div class="nick"></div>
							<div class="tip">等待对方接听...</div>
							<div class="op">
								<button id="callingHangupButton" class="netcall-button red">挂断</button>
							</div>
						</div>
						<!-- p2p视频界面 -->
						<div class="netcall-show-video hide">
							<div class="netcall-video-left">
								<div class="netcall-video-remote bigView">
									<div class="message"></div>
									<span class="switchViewPositionButton"></span>
								</div>
							</div>
							<div class="netcall-video-right">
								<div class="netcall-video-local smallView">
									<div class="message"></div>
									<span class="switchViewPositionButton"></span>
								</div>
								<div class="operation">
									<div class="control">
										<div class="microphone control-item">
											<div class="slider hide">
												<div class="txt">10</div>
												<input class="microSliderInput" id="microSliderInput1" type="range" min="0" max="10" step="1" value="10" data-orientation="vertical">
											</div>
											<span class="icon-micro"></span>
										</div>
										<div class="volume control-item">
											<div class="slider hide">
												<div class="txt">10</div>
												<input class="volumeSliderInput" id="volumeSliderInput1" type="range" min="0" max="10" step="1" value="10" data-orientation="vertical">
											</div>
											<span class="icon-volume"></span>
										</div>
										<div class="camera control-item">
											<span class="icon-camera"></span>
										</div>
									</div>
									<div class="op">
										<button class="hangupButton netcall-button red">挂断</button>
									</div>
									<div class="tip">00 : 00</div>
								</div>
							</div>
						</div>
						<!-- p2p音频界面 -->
						<div class="netcall-show-audio hide">
							<img alt="用户头像" class="avatar">
							<div class="nick">test</div>
							<div class="tip">00 : 00</div>
							<div class="control">
								<div class="microphone control-item ">
									<div class="slider hide">
										<div class="txt">10</div>
										<input class="microSliderInput" id="microSliderInput" type="range" min="0" max="10" step="1" value="10" data-orientation="vertical">
									</div>
									<span class="icon-micro"></span>
								</div>
								<div class="volume control-item">
									<div class="slider hide">
										<div class="txt">10</div>
										<input class="volumeSliderInput" id="volumeSliderInput" type="range" min="0" max="10" step="1" value="10" data-orientation="vertical">
									</div>
									<span class="icon-volume"></span>
								</div>
							</div>
							<div class="op">
								<button class="hangupButton netcall-button red">挂断</button>
							</div>

						</div>
						<!-- 多人音视频互动界面 -->
						<div class="netcall-meeting-box hide" id="netcallMeetingBox"></div>
						<!-- 被叫界面 -->
						<div class="netcall-becalling-box hide">
							<img alt="用户头像" class="avatar">
							<div class="nick"></div>
							<p id="becallingText" class="tip"></p>
							<div class="op">
								<div class="normal">
									<div class="checking-tip">检查插件中...<span class="netcall-icon-checking"></span></div>
									<button class="netcall-button blue beCallingAcceptButton" id="beCallingAcceptButton">
                                        <span class="txt">接听</span>
                                        <span class="netcall-icon-checking"></span>
                                    </button>
									<button class="netcall-button red beCallingRejectButton" id="beCallingRejectButton">
                                        拒绝
                                    </button>
								</div>
								<div class="exception">
									<button class="netcall-button blue" id="downloadAgentButton">下载音视频插件</button><br/>
									<button class="netcall-button red beCallingRejectButton">拒绝</button>
									<div class="exception-tip">拒绝调用插件申请会导致无法唤起插件,需重启浏览器</div>
								</div>
							</div>
						</div>
						<div class="dialogs hide">
						</div>
					</div>
					<div id="whiteboard"></div>
					<div class="chat-content box-sizing" id="chatContent">
						<!-- 聊天记录 -->
					</div>
					<div class="u-chat-notice">您已退出</div>
					<div class="chat-mask"></div>
					<div class="chat-editor box-sizing" id="chatEditor" data-disabled="1">
						<div id="emojiTag" class="m-emojiTag"></div>
						<a class="chat-btn u-emoji" id="showEmoji"></a>
						<span class="chat-btn msg-type" id="chooseFileBtn">
							<a class="icon icon-file" data-type="file"></a>
						</span>
						<a class="chat-btn u-netcall-audio-link" id="showNetcallAudioLink">&nbsp;</a>
						<a class="chat-btn u-netcall-video-link" id="showNetcallVideoLink">&nbsp;</a>
						<!-- 在netcall_ui.js的fn.whenOpenChatBox中隐藏 -->
						<a class="chat-btn u-whiteboard" id="showWhiteboard">&nbsp;</a>
						<textarea id="messageText" class="chat-btn msg-input box-sizing radius5px p2p" rows="1" autofocus="autofocus" maxlength="500"></textarea>
						<a class="btn-send radius5px" id="sendBtn">发送</a>
						<form action="#" id="uploadForm">
							<input multiple="multiple" type="file" name="file" id="uploadFile" class="hide" />
						</form>
					</div>
				</div>
			</div>
			<div class="right-panel hide radius5px devices-container" id="devices">
				<!-- 设备管理面板 -->
				<div class="info-box">
					<div class="title tc">
						<button class="btn back-btn radius5px" id="backBtn2">返回</button>多端登录管理
					</div>
					<div class="content">
						<div class="main">
							<div class="pic"></div>
							<div class="mobile hide">
								<p>云信手机版</p>
								<a class="u-kick j-kickMoblie">下线</a>
							</div>
							<div class="pc hide">
								<p>云信PC版</p>
								<a class="u-kick j-kickPc">下线</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="asideBox">
			<div class="m-goWhiteboard hide">
				<span class="whiteboard-icon-state netcall-icon-state-audio"></span>
				<div class="nick"></div>
				<div class="tip"></div>
			</div>
			<div class="m-goNetcall hide">
				<span class="netcall-icon-state netcall-icon-state-audio"></span>
				<div class="nick">&nbsp;</div>
				<div class="tip">00 : 00</div>
			</div>
			<a href="./chatroom/list.html" target="_blank">
				<div class="u-goChartRoom"></div>
			</a>
		</div>
		<!-- 群资料 -->
		<div class="team-info-container hide" id="teamInfoContainer"></div>
		<!-- 云记录 -->
		<div class="cloud-msg-container hide" id="cloudMsgContainer"></div>
		<!-- 群弹框 -->
		<div class="dialog-team-container radius5px hide" id="dialogTeamContainer"></div>
		<!-- 技术方案弹框 -->
		<div class="dialog-team-container radius5px hide" id="dialogCallMethod"></div>
		<!-- 黑名单 -->
		<div class="m-blacklist radius5px hide" id="blacklist">
			<div class="title box-sizing">
				黑名单
				<i class="icon icon-close j-close"></i>
			</div>
			<div class="notice">你不会接收到列表中联系人的任何消息</div>
			<ul class="f-cb list">
				<li class="items f-cb">
					<img src="nim/im/images/default-icon.png" class="head">
					<span class="nick">未知</span>
					<button class="btn radius4px btn-ok j-rm">解除</button>
				</li>
			</ul>
		</div>
		<!-- 消息中心 -->
		<div class="m-notice radius5px hide" id="notice">
			<div class="title box-sizing">
				消息中心
				<i class="icon icon-close j-close"></i>
				<b class="j-rmAllSysNotice rmAll"></b>
			</div>
			<ul class="tab f-cb">
				<li class="crt" data-value="sys">系统通知</li>
				<li data-value="other">自定义通知</li>
			</ul>
			<div class="content j-sysMsg">
			</div>
			<div class="content j-customSysMsg hide">
			</div>
		</div>
		<!-- 搜索高级群 -->
		<div class="m-dialog hide" id="searchTeamBox">
			<div class="title box-sizing">
				搜索高级群
				<i class="icon icon-close j-close"></i>
			</div>
			<div class="content tc">
				<input type="text" class="ipt radius5px box-sizing j-account" placeholder="请输入群id" />
				<div class="info f-cb">
					<img src="nim/im/images/advanced.png">
					<div class="desc">
						<p class="j-name"></p>
						<p><span class="j-teamId"></span></p>
					</div>
				</div>
			</div>
			<div class="btns tc">
				<button class="btn btn-cancel radius4px cancel j-close">取消</button>
				<button class="btn btn-ok radius4px search j-search">确定</button>
				<button class="btn btn-cancel radius4px back j-back">继续搜索</button>
				<button class="btn btn-ok radius4px add j-add">申请加入</button>
				<button class="btn btn-ok radius4px chat j-chat">聊天</button>
			</div>
		</div>
	</div>
	<div class="footer tc">
		<span>&copy;1997 - 2018 网易公司版权所有</span>
	</div>






	<div id="mask" class="mask hide"></div>
	<script>
			// IE 11 polify
			if(!Object.assign) {
				Object.assign = function () {
					var list = arguments
					for (var i = 1; i < list.length; i++) {
						list[0] = extend(list[0], list[i])
					}
					return list[0]
				}

			function extend(obj1, obj2) {
				for (var i in obj2) {
					obj1[i] = obj2[i]
				}
				return obj1
			}
		}

	</script>
	<!-- <script src="../3rd/nim_server_conf.js"></script> -->
	<script src="nim/3rd/NIM_Web_SDK_v5.0.0.js"></script>
	<script src="nim/3rd/NIM_Web_Netcall_v5.0.0.js"></script>
	<script src="nim/3rd/NIM_Web_WebRTC_v5.0.0.js"></script>
	<script src="nim/3rd/NIM_Web_WhiteBoard_v4.9.0.js"></script>

	<script src="nim/3rd/jquery-1.11.3.min.js"></script>
	<!--<script src="../3rd/zepto.min.js"></script>-->
	<script>
		// FastClick.attach(document.body);
		window.onerror = function (errorMessage, source, lineno, colno, error) {
			var info = "错误信息：" + errorMessage + "\n" +
				"出错文件：" + source + "\n " +
				"出错行号：" + lineno + "\n" +
				"出错列号：" + colno + "\n" +
				"错误详情：" + error + "\n";

			// alert(JSON.stringify(ERROR));
			// ajax.postp(monitorUrl, ERROR, null, function(e){
			//     alert(e.stack);
			// });
			console.error(JSON.stringify(info));
			// ajax.post('/data/updateLog', ERROR);
			// alert(JSON.stringify(info))
			// minAlert.alert({
			// 	msg: JSON.stringify(info),
			// 	confirmBtnMsg: '好哒'
			// })
		}
	</script>

	<!-- <script src="../3rd/platform.js"></script> -->
	<script src="nim/3rd/rtcSupport.js"></script>
	<script src="nim/im/3rd/jquery-ui.min.js"></script>
	<script src="nim/3rd/rangeslider.min.js"></script>
	<!-- 右键菜单-->
	<script src="nim/im/js/3rd/contextMenu/jquery.ui.position.js"></script>
	<script src="nim/im/js/3rd/contextMenu/jquery.contextMenu.js"></script>

	<script src="nim/im/js/config.js"></script>
	<script src="nim/im/js/emoji.js"></script>
	<script src="nim/im/js/util.js?v=2"></script>
	<script src="nim/im/js/cache.js?v=2"></script>
	<script src="nim/im/js/link.js"></script>
	<script src="nim/im/js/ui.js?v=2"></script>
	<script src="nim/im/js/widget/uiKit.js?v=2"></script>
	<script src="nim/im/js/widget/minAlert.js"></script>
	<script src="nim/im/js/module/base.js"></script>
	<script src="nim/im/js/module/message.js"></script>
	<script src="nim/im/js/module/sysMsg.js"></script>
	<script src="nim/im/js/module/personCard.js"></script>
	<script src="nim/im/js/module/session.js"></script>
	<script src="nim/im/js/module/friend.js"></script>

	<script src="nim/im/js/module/team.js"></script>
	<script src="nim/im/js/module/dialog_team.js"></script>
	<script src="nim/im/js/module/cloudMsg.js"></script>
	<script src="nim/im/js/module/notification.js"></script>
	<script src="nim/im/js/module/netcall.js"></script>
	<script src="nim/im/js/module/netcall_meeting.js"></script>
	<script src="nim/im/js/module/netcall_ui.js"></script>
	<script src="nim/im/js/module/dialog_call_method.js"></script>
	<script src="nim/im/js/main.js?v=2"></script>
	<script src="nim/3rd/vue.min.js"></script>
	<script src="nim/im/js/module/whiteboard.js"></script>
</body>

</html>