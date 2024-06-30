<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Gerado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @media print {
            .breadcrumb-print,
            .print-button,
            .hide-on-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="breadcrumb-print">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="pagina_inicial.php">Página Inicial</a></li>
            <li class="breadcrumb-item"><a href="index.php">Gerador de Currículo</a></li>
            <li class="breadcrumb-item active" aria-current="page">Currículo Gerado</li>
        </ol>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-4 hide-on-print">Currículo Gerado</h1> <!-- Adicionado a classe hide-on-print -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Dados Pessoais</h5>
                <p><strong>Nome:</strong> <?php echo $_POST['nome']; ?></p>
                <p><strong>Data de Nascimento:</strong> <?php echo $_POST['dataNascimento']; ?></p>
                <p><strong>Email:</strong> <?php echo $_POST['email']; ?></p>
                <p><strong>Telefone:</strong> <?php echo $_POST['telefone']; ?></p>
            </div>
        </div>

        <!-- Experiências Profissionais -->
        <?php
        if (!empty($_POST['experiencia_dinamica'])) {
            $experiencias_dinamicas = $_POST['experiencia_dinamica'];
            foreach ($experiencias_dinamicas as $key => $experiencia) {
                ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Experiência Profissional <?php echo $key + 1; ?></h5>
                        <p><?php echo nl2br(htmlspecialchars($experiencia)); ?></p>
                    </div>
                </div>
                <?php
            }
        }
        ?>

        <button id="btnImprimir" class="btn btn-success mt-4 print-button">Imprimir Currículo</button>
    </div>

    <!-- Biblioteca jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btnImprimir').on('click', function() {
                window.print();
            });
        });
    </script>
</body>
</html>
