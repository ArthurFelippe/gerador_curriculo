<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilizando os placeholders para itálico */
        ::-webkit-input-placeholder {
            font-style: italic;
        }
        :-moz-placeholder {
            font-style: italic;
        }
        ::-moz-placeholder {
            font-style: italic;
        }
        :-ms-input-placeholder {
            font-style: italic;
        }
    </style>
    <script>
        // Variável global para contar o número de campos de experiência adicionados dinamicamente
        let contadorExperiencia = 0;

        // Função para limpar todos os campos do formulário
        function limparFormulario() {
            document.getElementById("nome").value = "";
            document.getElementById("dataNascimento").value = "";
            document.getElementById("email").value = "";
            document.getElementById("telefone").value = "";
            document.getElementById("experiencia").innerHTML = ""; // Limpa os campos dinâmicos de experiência
            contadorExperiencia = 0; // Reinicia o contador de campos de experiência
        }

        // Função para validar se todos os campos obrigatórios foram preenchidos antes de enviar o formulário
        function validarFormulario() {
            var nome = document.getElementById("nome").value.trim();
            var dataNascimento = document.getElementById("dataNascimento").value.trim();
            var email = document.getElementById("email").value.trim();
            var telefone = document.getElementById("telefone").value.trim();

            if (nome === '' || dataNascimento === '' || email === '' || telefone === '') {
                alert('Por favor, preencha todos os campos antes de gerar o currículo.');
                return false; // Impede o envio do formulário se algum campo estiver vazio
            }

            return true; // Permite o envio do formulário se todos os campos estiverem preenchidos
        }

        // Função para adicionar dinamicamente um campo de experiência profissional ao formulário
        function adicionarCampoExperiencia() {
            contadorExperiencia++;
            let novoCampo = `<div class="form-group">
                                <label for="experiencia${contadorExperiencia}">Experiência profissional ${contadorExperiencia}:</label>
                                <textarea id="experiencia${contadorExperiencia}" name="experiencia_dinamica[]" class="form-control" rows="4" placeholder="Exemplo: Experiência profissional na área administrativa, com foco em atendimento ao cliente e organização de processos internos." style="font-style: italic;"></textarea>
                            </div>`;
            document.getElementById("experiencia").insertAdjacentHTML('beforeend', novoCampo); // Insere o novo campo no formulário
        }

        // Função para permitir apenas números no campo "Telefone"
        function apenasNumeros(event) {
            var charCode = (event.which) ? event.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                event.preventDefault(); // Impede a digitação de caracteres não numéricos no campo de telefone
            }
        }
    </script>
</head>
<body>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="pagina_inicial.php">Página Inicial</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gerador de Currículo</li>
        </ol>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-4">Gerador de Currículo</h1>

        <div class="row">
            <div class="col-md-6">
                <form action="curriculo_gerado.php" method="post" onsubmit="return validarFormulario()">
                    <div class="form-group">
                        <label for="nome">Nome completo:</label>
                        <input type="text" id="nome" name="nome" class="form-control" required placeholder="Digite seu nome completo">
                    </div>
                    <div class="form-group">
                        <label for="dataNascimento">Data de Nascimento:</label>
                        <input type="date" id="dataNascimento" name="dataNascimento" class="form-control" required style="font-style: italic;">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required placeholder="Digite seu e-mail: exemplo@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" class="form-control" required placeholder="Digite seu telefone: (DDD) 12345-6789" onkeypress="apenasNumeros(event)">
                    </div>
                    <div id="experiencia">
                        <!-- Campos de Experiência Profissional são adicionados dinamicamente -->
                    </div>
                    <button type="button" class="btn btn-info mb-2" onclick="adicionarCampoExperiencia()">+ Adicionar Experiência Profissional</button>
                    <button type="submit" class="btn btn-success">Gerar Currículo</button>
                    <button type="button" class="btn btn-danger" onclick="limparFormulario()">Limpar Formulário</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
