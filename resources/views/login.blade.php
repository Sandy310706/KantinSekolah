<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Login</title>
    <style>
        body{
	        background-color: #19123B;
        }
        .card{
            border: none;
            border-top: 5px solid  rgb(176,106,252);
            background: #212042;
            color: #57557A;
        }
        p{
            font-weight: 600;
            font-size: 15px;
        }
        .fab{
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            background: #2A284D;
            height: 40px;
            width: 90px;
        }
        .division{
            float: none;
            position: relative;
            margin: 30px auto 20px;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
        }
        .division .line{
            border-top: 1.5px solid #57557A;;
            position: absolute;
            top: 13px;
            width: 85%;
        }
        .line.l{
            left: 52px;
        }
        .line.r{
            right: 45px;

        }
        .division span{
            font-weight: 600;
            font-size: 14px;
        }
        .myform{
            padding: 0 25px 0 33px;
        }
        .form-control{
            border: 1px solid #57557A;
            border-radius: 3px;
            background: #212042;
            margin-bottom: 20px;
            letter-spacing: 1px;

        }
        .form-control:focus{
            border: 1px solid #57557A;
            border-radius: 3px;
            box-shadow: none;
            background: #212042;
            color: #fff;
            letter-spacing: 1px;
        }
        .bn{
            text-decoration: underline;
        }
        .bn:hover{
            cursor: pointer;
        }
        .form-check-input {
            margin-top: 8px!important;
            }
        .btn-primary{
        background: linear-gradient(135deg, rgba(176,106,252,1) 39%,rgba(116,17,255,1) 101%);
        border: none;
        border-radius: 50px;
        }
        .btn-primary:focus{
            box-shadow: none;
            border: none;
        }
        small{
            color: #F2CEFF;
        }
        .far.fa-user{
            font-size: 13px;
        }

        @media(min-width: 767px){
            .bn{
                text-align: right;
            }
        }
        @media(max-width: 767px){
            .form-check{
                text-align: center;
            }
            .bn{
                text-align: center;
                align-items: center;
            }
        }
        @media(max-width: 450px){
            .fab{
                width: 100%;
                height: 100%;
            }
            .division .line{
                width: 50%;
            }
        }
        .row .col a{
            font-family:  "Comic Sans MS", cursive, sans-serif;;
        }
        .input-group-text{
            background-color: #212042;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                @if( session('gagal'))
                    <div class="alert" style="background-color: rgba(255, 0, 0, 0.634);" role="alert">
                        <i class="bi bi-exclamation-triangle-fill" style="color: white;"> </i><span style="color: white;">{{ session('gagal') }}</span>
                    </div>
                @endif
                @if (session('berhasil'))
                <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('berhasil') }}
                </div>
                @endif
                <div class="card py-3 px-2">
                    <div class="division">
                        <div class="row">
                            <div class="col-3"><div class="line l"></div></div>
                            <div class="col-6"><span>L o g i n</span></div>
                            <div class="col-3"><div class="line r"></div></div>
                        </div>
                    </div>
                    <form class="myform" method="POST" action="{{ route('loginauth') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror m-0" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="Password" placeholder="Password" aria-describedby="cekPassword">
                            <span class="input-group-text" id="cekPassword" onclick="change()"><i class="bi bi-eye-fill"></i></span>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg"><small>L o g i n</small></button>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <a class="text-decoration-none" href="#">Lupa Password</a>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="/buatakun" class="text-decoration-none">Buat Akun</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function change()
        {
            var x = document.getElementById('Password').type;
            if ( x == 'password'){
                document.getElementById('Password').type = 'text';
                document.getElementById('cekPassword').innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
            }else{
                document.getElementById('Password').type = 'password';
                document.getElementById('cekPassword').innerHTML = '<i class="bi bi-eye-fill"></i>';
            }
        }
    </script>
</body>
</html>
