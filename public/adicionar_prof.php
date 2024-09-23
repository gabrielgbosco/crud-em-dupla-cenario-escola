<?php
// Função para limpar dados de entrada
function limparEntrada($dados) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($dados));
}

// Criação
if (isset($_POST['create_professor'])) {
    $nome_professor = limparEntrada($_POST['nome_professor']);
    $sobrenome_professor = limparEntrada($_POST['sobrenome_professor']);
    $disciplina_professor = limparEntrada($_POST['disciplina_professor']);
    $email_professor = limparEntrada($_POST['email_professor']);
    $telefone_professor = limparEntrada($_POST['telefone_professor']);

    $sql = "INSERT INTO professores (nome_professor, sobrenome_professor, disciplina_professor, email_professor, telefone_professor)
            VALUES ('$nome_professor', '$sobrenome_professor', '$disciplina_professor', '$email_professor', '$telefone_professor');";   

    if ($conn->query($sql) === TRUE) {
        echo "Novo pedido criado com sucesso.<br>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adição de professores</title>
</head>
<body>
    <h2>Adicionar Professor</h2>
    <form method="POST">
        <label for="nome_professor">Nome do professor:</label><input type="text" id="nome_professor" name="nome_professor" required><br><br>
        <label for="sobrenome_professor">Sobrenome do professor:</label><input type="text" id="sobrenome_professor" name="sobrenome_professor" required><br><br>
        <label for="disciplina_professor">Disciplina:</label><input type="text" id="disciplina_professor" name="disciplina_professor" required><br><br>
        <label for="email_professor">Email:</label><input type="email" id="email_professor" name="email_professor" required><br><br>
        <label for="telefone_professor">Telefone:</label><input type="text" id="telefone_professor" name="telefone_professor" required><br><br>
        <input type="submit" name="create_professor" value="Adicionar professor">
    </form>
</body>
</html>