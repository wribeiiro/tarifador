<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row justify-content-center d-flex ">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Registro</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Sei lá mano cria conta ai</h6>
                    <div class="card-text">
                        <form method="post" action="{{route('register')}}" id="register">
                            @csrf
                            <div class="form-group">
                                <label for="nickname">Nickname</label>
                                <input type="text" class="form-control" name="name" id="nickname"
                                       aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                       aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="passwordc">Password Confirmation</label>
                                <input type="password" class="form-control" name="password_confirmation" id="passwordc"
                                       aria-describedby="emailHelp" placeholder="Enter email">
                            </div>

                            <input type="submit" class="btn btn-primary btn-block" id="createAccBtn" value="Registrar">
                        </form>
                    </div>
                    <a href="#" class="card-link">Ir para o Login</a>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function () {
        $("#register").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{route('register')}}',
                data: $(this).serialize(),
                success: function (data) {
                    $('#createAccBtn').prop('disabled', false);
                    toastr.success('Cadastro efetuado com sucesso!', 'Boa <3');
                    setTimeout(() => {
                        window.location.href = "{{route('login')}}"
                    }, 3000)
                },
                error: function (data) {
                    $('#createAccBtn').prop('disabled', false);
                    let errors = data.responseJSON.errors;

                    for (let i in errors) {
                        let error = errors[i];
                        toastr.error(error[0]);
                    }

                    console.log(data);
                }
            });
        })
    })
</script>
</body>
</html>
