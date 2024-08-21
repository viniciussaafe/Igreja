<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiais</title>
    <style>
        /* Adicione seu CSS aqui */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: white;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #4abcdb;
        }

        .navbar .logo img {
            max-width: 100%;
            height: auto;
            margin-left: 35px;
        }

        nav {
            flex: 1;
            text-align: right;
        }

        nav ul {
            display: inline-block;
            list-style: none;
            margin-right: 20px;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        .menu-celular {
            width: 28px;
            margin-left: 20px;
            display: none;
        }

        .linha h1,
        .linha h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        @media screen and (max-width: 768px) {
            nav ul {
                position: absolute;
                top: 70px;
                left: 0;
                background: #333;
                width: 100%;
                overflow: hidden;
                transition: max-height 0.5s;
            }

            nav ul li {
                display: block;
                margin-top: 10px;
                margin-right: 50px;
                margin-bottom: 10px;
            }

            nav ul li a {
                color: white;
            }

            .menu-celular {
                display: block;
            }

            .navbar {
                flex-wrap: wrap;
            }
        }

        form {
            margin-top: 35px;
            margin-bottom: 35px;
            text-align: center;
            justify-content: center;
            align-items: center;
            padding: 5px;
            border-bottom: #4abcdb 2px solid;
        }

        form .nome {
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
        }

        form .envio {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        #gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            margin: 20px;
        }

        #gallery div {
            position: relative;
            width: 100%;
            max-width: 200px;
        }

        .gallery-item {
            display: block;
            align-items: center;
            gap: 20px;
        }

        #gallery img,
        #gallery video {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .image-details {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .image-input,
        .quantity-input {
            width: 200px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .quantity-input::-webkit-outer-spin-button,
        .quantity-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .quantity-input {
            --moz-appearance: textfield;
        }

        .delete-button {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            padding: 5px;
            cursor: pointer;
            border-radius: 3px;
        }

        .pdf-container {
            position: relative;
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        .pdf-link {
            display: none;
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
            border-bottom: 1px solid #4CAF50;
            padding: 10px 0;
        }

        .pdf-frame {
            width: 100%;
            height: 200px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        @media screen and (max-width: 768px) {
            #gallery {
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .pdf-frame {
                display: none;
            }

            .pdf-link {
                display: block;
            }
        }

        @media screen and (min-width: 769px) {
            .pdf-link {
                display: none;
            }

            .pdf-frame {
                display: block;
            }
        }

        /* CSS para o balão de confirmação */
        .confirm-delete {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 20px;
            border-radius: 8px;
            z-index: 1000;
            width: 300px;
            text-align: center;
        }

        .confirm-delete input[type="password"] {
            width: calc(100% - 20px);
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .confirm-delete button {
            padding: 10px 20px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
        }

        .confirm-delete .cancel {
            background-color: #f44336;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <img src="imagens/logo.png" width="100px">
        </div>
        <nav>
            <ul id="menuItens">
                <li><a href="index.html">Início</a></li>
                <li><a href="comprovante.php">Comprovante</a></li>
                <li><a href="andamento.php">Andamento</a></li>
                <li><a href="materiais.php">Materiais</a></li>
            </ul>
        </nav>
        <img src="imagens/menu.png" class="menu-celular" onclick="MenuCelular()">
    </div>
    <div class="linha">
        <h1>Materiais</h1>
        <h2>Imagem dos materiais</h2>
        <form action="materiais.php" method="POST" enctype="multipart/form-data">
            <input type="password" name="upload_password" placeholder="Digite a senha de upload" required class="nome">
            <input type="file" name="files[]" multiple class="nome">
            <input type="submit" value="Fazer Upload" class="envio">
        </form>
    </div>

    <?php
    $targetDir = "uploads/materiais/";
    $deletePassword = "YESHUA7*"; // Defina sua senha aqui
    $uploadPassword = "YESHUA7*"; // Defina sua senha aqui

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['upload_password'])) {
            $password = $_POST['upload_password'];

            if ($password === $uploadPassword) {
                if (!empty($_FILES['files']['name'][0])) {
                    foreach ($_FILES['files']['name'] as $key => $val) {
                        $targetFile = $targetDir . basename($_FILES['files']['name'][$key]);
                        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                        $validTypes = array("jpg", "png", "jpeg", "gif", "mp4", "avi", "mkv", "pdf", "docx", "doc");
                        if (in_array($fileType, $validTypes)) {
                            if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFile)) {
                                echo "O arquivo " . basename($_FILES['files']['name'][$key]) . " foi enviado com sucesso.<br>";
                            } else {
                                echo "Desculpe, houve um erro ao enviar " . basename($_FILES['files']['name'][$key]) . ".<br>";
                            }
                        } else {
                            echo "<span style='color: red;'>Tipo de arquivo inválido para " . basename($_FILES['files']['name'][$key]) . ".</span><br>";
                        }
                    }
                }
            } else {
                echo "<span style='color: red;'>Senha de upload incorreta.</span><br>";
            }
        }

        if (isset($_POST['confirm_delete'])) {
            $fileToDelete = $_POST['file_path'];
            $password = $_POST['delete_password'];

            if ($password === $deletePassword) {
                if (file_exists($fileToDelete)) {
                    unlink($fileToDelete);
                    echo "O arquivo foi deletado.<br>";

                    // Deletar o arquivo de informações associado (se existir)
                    $infoFileToDelete = $fileToDelete . '.txt';
                    if (file_exists($infoFileToDelete)) {
                        unlink($infoFileToDelete);
                        echo "O arquivo de informações foi deletado.<br>";
                    } else {
                        echo "Arquivo de informações não encontrado.<br>";
                    }
                } else {
                    echo "Arquivo não encontrado.<br>";
                }
            } else {
                echo "Senha incorreta.<br>";
            }
        }


        if (isset($_POST['save_data'])) {
            $fileToSave = $_POST['file_path'];
            $infoFilePath = $fileToSave . '.txt';

            $imageName = $_POST['image_name'];
            $imageValue = $_POST['image_value'];
            $imageQuantity = $_POST['image_quantity'];

            $infoContent = "Nome: $imageName\nValor: $imageValue\nQuantidade: $imageQuantity\n";

            file_put_contents($infoFilePath, $infoContent);

            echo "Informações salvas para " . basename($fileToSave) . ".<br>";
        }
    }
    ?>

    <div id="gallery">
        <?php
        $files = scandir($targetDir);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..' && !preg_match('/\.txt$/', $file)) {
                $filePath = $targetDir . $file;
                $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                $infoFilePath = $filePath . '.txt';

                echo "<div class='gallery-item'>";
                if (in_array($fileType, array("jpg", "png", "jpeg", "gif"))) {
                    echo "<img src='$filePath' alt='$file'>";
                } elseif (in_array($fileType, array("mp4", "avi", "mkv"))) {
                    echo "<video controls>
                    <source src='$filePath' type='video/$fileType'>
                    Seu navegador não suporta a tag de vídeo.
                    </video>";
                } elseif ($fileType == "pdf") {
                    echo "<div class='pdf-container'>";
                    echo "<iframe src='$filePath' class='pdf-frame'></iframe>";
                    echo "<a href='$filePath' class='pdf-link' target='_blank'>$file</a>";
                    echo "</div>";
                } elseif (in_array($fileType, array("docx", "doc"))) {
                    echo "<div class='pdf-container'>";
                    echo "<a href='$filePath' class='pdf-link' target='_blank'>$file</a>";
                    echo "</div>";
                }

                // Recuperar dados do arquivo de texto correspondente, se existir
                $savedName = $savedValue = $savedQuantity = "";
                if (file_exists($infoFilePath)) {
                    $infoLines = file($infoFilePath, FILE_IGNORE_NEW_LINES);
                    $savedName = explode(': ', $infoLines[0])[1] ?? "";
                    $savedValue = explode(': ', $infoLines[1])[1] ?? "";
                    $savedQuantity = explode(': ', $infoLines[2])[1] ?? "";
                }

                echo "<form method='POST' action='materiais.php'>
                <div class='image-details'>
                    <input type='text' name='image_name' value='$savedName' placeholder='Nome da Imagem' class='image-input'>
                    <input type='text' name='image_value' value='$savedValue' placeholder='Valor' class='image-input'>
                    <input type='number' name='image_quantity' value='$savedQuantity' placeholder='Quantidade' class='quantity-input'>
                </div>
                <input type='hidden' name='file_path' value='$filePath'>
                <input type='submit' name='save_data' value='Salvar Dados' class='envio'>
                <button type='button' class='delete-button' data-file-path='$filePath'>Deletar</button>
                </form>";

                echo "</div>";
            }
        }
        ?>
    </div>

    <!-- Balão de confirmação e sobreposição -->
    <div id="overlay" class="overlay"></div>
    <div id="confirmDelete" class="confirm-delete">
        <h3>Confirmar Exclusão</h3>
        <form id="confirmDeleteForm" method="POST" action="materiais.php">
            <input type="hidden" name="file_path" id="filePath">
            <input type="password" name="delete_password" placeholder="Digite a senha" required>
            <button type="submit" name="confirm_delete">Confirmar</button>
            <button type="button" class="cancel" onclick="closeConfirmDelete()">Cancelar</button>
        </form>
    </div>

    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const filePath = this.getAttribute('data-file-path');
                document.getElementById('filePath').value = filePath;
                document.getElementById('confirmDelete').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            });
        });

        function closeConfirmDelete() {
            document.getElementById('confirmDelete').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        // Mantém o comportamento para adicionar "R$" ao campo de valor
        document.querySelectorAll('input[name="image_value"]').forEach((input) => {
            input.addEventListener('blur', (e) => {
                let value = e.target.value.replace('R$', '').trim();
                if (value) {
                    e.target.value = `R$ ${value}`;
                }
            });
            input.addEventListener('focus', (e) => {
                let value = e.target.value;
                if (value.startsWith('R$')) {
                    e.target.value = value.replace('R$', '').trim();
                }
            });
        });
    </script>
    <script src="script.js"></script>
</body>

</html>