<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .produtos {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-column-gap: 5px;
            grid-row-gap: 4px;
        }
    </style>
</head>

<body class="pb-4">
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" type="button" id="login">Minha conta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Sobre</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control form-control-sm me-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                    <button class="btn btn-success btn-sm" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </nav>

    @yield('conteudo')

    <div class="modal fade" id="modal-login" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Entrar</h1>
                    <button class="btn btn-sm btn-primary" id="cadastro">Cadastro</button>
                </div>
                <div class="modal-body">
                    <form id="form-login">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email-login" placeholder="..." name="email">
                            <label for="email-login">Email </label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="senha-login" placeholder="..." name="password">
                            <label for="senha-login">Senha</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-sm btn-primary" id="logar">Entrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-cadastro" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro</h1>
                </div>
                <div class="modal-body">
                    <form id="form-cadastro">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nome-cadastro" placeholder="..." name="name">
                            <label for="nome-cadastro">Nome </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email-cadastro" placeholder="..." name="email">
                            <label for="email-cadastro">Email </label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="senha-cadastro" placeholder="..." name="password">
                            <label for="senha-cadastro">Senha</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-sm btn-danger voltar">Voltar</button>
                    <button type="button" class="btn btn-sm btn-primary" id="cadastrar">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    const modalCadastro = $("#modal-cadastro");
    const formCadastro = $("#form-cadastro");
    const modalLogin = $("#modal-login");
    const btnCadastrar = $("#cadastrar");
    const formLogin = $("#form-login");
    const btnLogar = $("#logar");

    $("#login").on("click", () => {
        formLogin[0].reset()
        modalLogin.modal("show")
    })

    $("#cadastro").on("click", () => {
        formCadastro[0].reset()
        modalLogin.modal("hide")
        modalCadastro.modal("show")
    })

    modalCadastro.find('.modal-footer button.voltar').on("click", () => {
        modalCadastro.modal('hide');
        modalLogin.modal('show');
    })

    btnLogar.on("click", () => {
        btnLogar.prop("disabled", true);

        const dadosBrutos = formLogin.serializeArray();
        const dados = {}

        $.each(dadosBrutos, (i, dado) => {
            dados[dado.name] = dado.value;
        })

        $.ajax({
            url: window.location.protocol + "//" + window.location.host + "/login_ajax",
            method: 'POST',
            data: dados,
            success: (res) => {
                console.log(res);
            },
            error: (erros) => erroAjax(erros, formLogin),
            complete: () => btnLogar.prop("disabled", false)
        })
    })

    btnCadastrar.on("click", () => {
        $(".is-invalid").removeClass("is-invalid");
        btnCadastrar.prop("disabled", true);

        const dadosBrutos = formCadastro.serializeArray();
        const dados = {}

        $.each(dadosBrutos, (i, dado) => {
            dados[dado.name] = dado.value;
        })

        $.ajax({
            url: window.location.protocol + "//" + window.location.host + "/cadastro_ajax",
            method: 'POST',
            data: dados,
            success: (res) => {
                $(".is-invalid").removeClass("is-invalid");
                formCadastro[0].reset();
                modalCadastro.modal("hide")
            },
            error: (erros) => erroAjax(erros, formCadastro),
            complete: () => btnCadastrar.prop("disabled", false)
        })
    })

    function erroAjax(erros, $form = undefined) {
        if (erros.responseJSON.errors && $form) {
            $.each(erros.responseJSON.errors, (name, erro) => {
                const input = $form.find(`input[name="${name}"]`);
                const divErro = $("<div></div>", {
                    class: 'invalid-tooltip',
                    html: erro[0]
                })

                if (input.length === 0) return;

                input.addClass("is-invalid").after(divErro);

            })

            setTimeout(() => {
                $(".invalid-tooltip").remove();
            }, 3000);
        }
    }
</script>
@yield('script')
