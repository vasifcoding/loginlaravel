<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Laravel 10 Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: min-content;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: min-content;
    width: 600px;
    background-color: rgba(255,255,255,0.1);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 20px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 30px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{

  background: red;
  width: 150px;
  border-radius: 3px;
  padding:15px 10px 15px 10px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
    cursor: pointer;
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
 width:100%;
 margin-left:auto !important;
  display:flex;
  justify-content:center;
  align-items:center;

}

h3{
    margin-bottom:-15px;
}
.social .go{
    width:40%;
}
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="{{route('createuser')}}" enctype="multipart/form-data" method="POST">
        @csrf

        <h3>Kayit Ol</h3>
     <div class="container">
        <div class="row">
            <div class="col-md-6">
        <label for="name">Adiniz ve Soyadiniz</label>
        <input type="text" name="name" required placeholder="Adinizi ve Soyadinizi giriniz" id="username">
        </div>
        <div class="col-md-6">
        <label for="email">Email</label>
        <input type="email" required name="email" placeholder="Email giriniz" id="username">
        </div>

        </div></div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <label for="password">Şifre</label>
        <input name="password" required type="password" placeholder="Şifre giriniz" id="password">
        @if($errors->has('passwordmin8'))
    <div id="errorAlert" class="alert alert-danger my-2 d-flex justify-content-start  p-0 bg-danger text-white-50">
        <ul>

                <li>{{ $errors->first('passwordmin8') }}</li>

            </div>


@endif

</div>
<div class="col-md-6">
        <label for="password">Şifre  Tekrar</label>
        <input  name="passwordretry" required type="password" placeholder="Şifre Tekrarini giriniz" id="password">

        @if($errors->has('passwordnotequal'))
        <div class="alert alert-danger my-2 d-flex justify-content-start  p-0 bg-danger text-white-50">
            <ul>

                    <li>{{ $errors->first('passwordnotequal') }}</li>

            </ul>

        </div>
    @endif
        </div>
        </div>
    </div>

        <label for="guvenliksorusu">Guvenlik Sorusu</label>
        <select name="securityquestion" class="form-select form-select-sm" aria-label=".form-select-sm example">
           
  <option class="bg-dark"  selected value="1">Annenizin kizlik soyadi</option>
  <option class="bg-dark"  value="2">Evcil Hayvaninizin ismi</option>
  <option  class="bg-dark" value="3">Okudugunuz ilkokul ismi</option>
</select>
<input type="text" required name="securityanswer" placeholder="Guvenlik sorusu cevabi (Sadece Tek Kelime!)" id="username">
<label for="resim">Resim secin</label>
<input type="file"style="padding:10px;"  name="resim" id="">

        <button name="registeruser">Kayit Ol</button>

        <div class="social">
     
          <div class="fb ml-auto"> <a class="text-decoration-none " href="{{route('index')}}"> Giriş Yap</a></div>
        </div>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>
</html>
