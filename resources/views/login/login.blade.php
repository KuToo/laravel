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
                            <p>Lorem ipsum dolor sit amet, consectetur.</p>
                            <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                        </div>
                    </div>
                    <div class="col_md_sign_up">
                        <div class="cont_ba_opcitiy">
                            <h2>SIGN UP</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur.</p>
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
                        <input type="text"  placeholder="Email / Telphone" value="" onblur="checkname(this)" />
                        <input type="password" placeholder="Password" />
                        <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                    </div>
                    {{--login end--}}

                    {{--register start--}}
                    <div class="cont_form_sign_up">
                        <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                        <h2>SIGN UP</h2>
                        <input type="text" placeholder="Email" />
                        <input type="text" placeholder="User" />
                        <input type="password" placeholder="Password" />
                        <input type="password" placeholder="Confirm Password" />
                        <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>

                    </div>
                    {{--register end--}}

                </div>
            </div>
        </div>
    </div>
    <script src="web/js/login.js"></script>
    <script src="web/js/common/jquery.min.js"></script>
    <script>
      function checkname(e){

          var _this=$(e);
          var name=$(e).val();

          var name_reg='/^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){4,19}$/';
          var tel_reg='/^1[34578]\d{9}$/';
          if(name=='' || ){
            _this.css('color','red').css('border-color','red');
          }
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
                }
              }
          })

      }
      function login(){

      }
    </script>
</body>
</html>
