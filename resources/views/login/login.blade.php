<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign Up Login</title>
    <link rel="stylesheet" href="web/css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
</head>
<body>
    <div class="cotn_principal">
        <div class="cont_centrar">
            <div class="cont_login">
                <div class="cont_info_log_sign_up">
                    <div class="col_md_login">
                        <div class="cont_ba_opcitiy">
                            <h2>LOGIN</h2>
                            <p>Welcome to login to lightChat</p>
                            <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                        </div>
                    </div>
                    <div class="col_md_sign_up">
                        <div class="cont_ba_opcitiy">
                            <h2>SIGN UP</h2>
                            <p>Welcome to join lightChat </p>
                            <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                        </div>
                    </div>
                </div>
                <div class="cont_back_info">
                    <div class="cont_img_back_grey"> <img src="web/imgs/po.jpg" alt="" /> </div>
                </div>
                <div class="cont_forms" >

                    {{--login start--}}
                    <div class="cont_img_back_"> <img src="web/imgs/po.jpg" alt="" /> </div>
                    <div class="cont_form_login">
                        <a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
                        <h2>LOGIN</h2>
                        <input type="text"  placeholder="Email Or Telphone" value="" onblur="checkname(this)" />
                        <input type="password" class="pass_login" placeholder="Password" />
                        <button class="btn_login" onclick="login()">LOGIN</button>
                    </div>
                    {{--login end--}}

                    {{--register start--}}
                    <div class="cont_form_sign_up">
                        <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                        <h2>SIGN UP</h2>
                        <input type="text" placeholder="Email Or Telphone" onblur="checkUser(this)" />
                        <input type="text" placeholder="Sms Code" onblur="checkCode(this)"/>
                        <input type="password" placeholder="Password" onblur="checkPass(this)"/>
                        <input type="password" placeholder="Confirm Password" onblur="confirmPass(this)"/>
                        <button class="btn_sign_up" onclick="sign_up()">SIGN UP</button>

                    </div>
                    {{--register end--}}

                </div>
            </div>
        </div>
    </div>
    <script src="web/js/login.js"></script>
    <script src="web/js/common/jquery.min.js"></script>
    <script>
    //登录检测用户名
    function checkname(e){

      var _this=$(e);
      var name=$(e).val();
      var mark=false;

      var name_reg=new RegExp("/^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){4,19}$/");
      var tel_reg=new RegExp("/^1[34578]\d{9}$/");
      if(!name_reg.test(name) && !tel_reg.test(name)){
        _this.css('color','red').css('border-color','red');

      }else{

          $.ajax({
              url:'/checkname',
              type:'post',
              data:{
                  'username':name
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              dataType:'json',
              success:function(data){
                  if(data != 1){
                      _this.css('color','red');
                  }else{
                      mark=true;
                  }
              }
          })
      }
      return mark;

    }

    //登录
    function login(){
      var pass=$('.pass_login').val();
      var mark=checkname();
      if(mark==true){
          $.ajax({
              url:'/tologin',
              type:'post',
              data:{
                  'username':name,
                  'password':pass
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              dataType:'json',
              success:function(data){
                  if(data != 1){
                      _this.css('color','red');
                  }else{
                      mark=true;
                  }
              }
          })
      }

    }

    //注册检测邮箱
    function checkEmail(e){
        var mark=false;
        var _this=$(e);
        var email=$(e).val();
        var emai_reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$");
        if(!emai_reg.test(email)){
            _this.css('color','red');
        }else{
            $.ajax({
                url:'/checkEmail',
                type:'post',
                data:{
                    'email':email
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                success:function(data){
                    if(data != 1){
                        _this.css('color','red');
                    }else{
                        mark=true;
                    }
                }
            })
        }
        return mark;

    }

    //注册检测手机号
    function checkTel(e){
        var mark=false;
        var _this=$(e);
        var tel=$(e).val();
        var tel_reg = new RegExp("/^1[34578]\d{9}$/");
        if(!tel_reg.test(tel)){
            _this.css('color','red');
        }else{
            $.ajax({
                url:'/checkTel',
                type:'post',
                data:{
                    'email':email
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                success:function(data){
                    if(data != 1){
                        _this.css('color','red');
                    }else{
                        mark=true;
                    }
                }
            })
        }
        return mark;

    }

    //注册检测密码长度
    function checkPass(e){
        var mark=false;
        var _this=$(e);
        var pass=$(e).val();
        if(pass.length>6 && pass.length<20 ){
            mark=true;
        }else{
            _this.css('color','red');

        }
        return mark;

    }
    //注册检测密码长度
    function confirmPass(e){
        var mark=false;
        var _this=$(e);
        var repass=$(e).val();
        var pass=$(e).prev('input').val();
        if( pass==repass  ){
            mark=true;
        }else{
            _this.css('color','red');

        }
        return mark;

    }

    //注册检测验证码
    function checkCode(e){
        var mark=false;
        var _this=$(e);
        var repass=$(e).val();
        var pass=$(e).prev('input').val();
        if( pass==repass  ){
            mark=true;
        }else{
            _this.css('color','red');

        }
        return mark;

    }

    //注册
    function register(){
        if(checkEmail() && checkTel() && checkPass() && confirmPass())
    }

    </script>
</body>
</html>
