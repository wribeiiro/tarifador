@extends('layout.auth')
@section('content')
<div class="row justify-content-center d-flex mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Autenticação</h4>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <div class="card-text">
                    <form method="post" action="{{route('login')}}" id="register">
                        @csrf
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" name="email" id="email"
                                    aria-describedby="emailHelp" placeholder="Informe seu email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" name="password" id="password"
                                    aria-describedby="emailHelp" placeholder="Informe sua senha" required>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" id="createAccBtn" value="Log-in">
                    </form>
                </div>
                <hr>
                <a href="{{route('register')}}" class="card-link mt-4">Não possui uma conta? Criar conta.</a>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $("#register").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{{route("login")}}',
            data: $(this).serialize(),
            success: (data) => {
                $('#createAccBtn').prop('disabled', false);
                toastr.success('Login efetuado com sucesso!', 'Boa <3');
                setTimeout(() => {
                    window.location.href = "/dashboard"
                }, 2000)
            },
            error: (data) => {
                console.log(data)
                if (data.status === 401 || data.status === 422) {
                    toastr.error('Credenciais incorretas')
                } else {
                    toastr.error('Chama o ademir que deu merda')
                }
            }
        })
    })
    })
</script>
@endsection
