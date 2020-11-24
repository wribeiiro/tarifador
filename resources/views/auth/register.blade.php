@extends('layout.auth')
@section('content')
<div class="row justify-content-center d-flex mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Criar conta</h4>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <div class="card-text">
                    <form method="post" action="{{route('register')}}" id="register">
                        @csrf
                        <div class="form-group">
                            <label for="nickname">Usuário:</label>
                            <input type="text" class="form-control" name="name" id="nickname"
                                    aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" name="email" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" name="password" id="password"
                                    aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordc">Confirme a senha:</label>
                            <input type="password" class="form-control" name="password_confirmation" id="passwordc"
                                    aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>

                        <input type="submit" class="btn btn-primary btn-block" id="createAccBtn" value="Registrar">
                    </form>
                </div>
                <hr>
                <a href="{{route('login')}}" class="card-link mt-4">Já possuo uma conta. Ir para login!</a>
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
            url: '{{route('register')}}',
            data: $(this).serialize(),
            success: (data) => {
                $('#createAccBtn').prop('disabled', false);
                toastr.success('Cadastro efetuado com sucesso!', 'Boa <3')

                setTimeout(() => {
                    window.location.href = "{{route('login')}}"
                }, 2000)
            },
            error: (data) => {
                $('#createAccBtn').prop('disabled', false)

                const errors = data.responseJSON.errors

                for (let i in errors) {
                    let error = errors[i]
                    toastr.error(error[0])
                }
            }
        })
    })
})
</script>
@endsection
