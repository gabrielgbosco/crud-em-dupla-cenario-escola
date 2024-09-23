<?php
// Função para limpar dados de entrada
function limparEntrada($dados) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($dados));
}

// Criação
if (isset($_POST['create_aula'])) {
    $numero_da_sala = limparEntrada($_POST['numero_da_sala']);
    $data_aula = $_POST['data_aula'];
    $horario_aula = $_POST['horario_aula'];
    $disciplina_aula = limparEntrada($_POST['disciplina_aula']);
    $turma_aula = limparEntrada($_POST['turma_aula']);

    $sql = "INSERT INTO aulas (numero_da_sala, disciplina_aula, turma_aula) 
            VALUES ('$numero_da_sala', '$disciplina_aula', '$turma_aula');
            
            INSERT INTO diaria (data_aula, horario_aula) 
            VALUES ('$data_aula', '$horario_aula');";   

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
    <title>Adição de aulas</title>
</head>
<body>
    <h2>Adicionar Aula</h2>
    <form method="POST">
        <label for="numero_da_sala">Número da sala de aula:</label><input type="number" id="numero_da_sala" name="numero_da_sala" required><br><br>
        <label for="data_aula">Data da aula:</label><input type="date" id="data_aula" name="data_aula" required><br><br>
        <label for="horario_aula">Horário da aula:</label><input type="time" id="horario_aula" name="horario_aula" required><br><br>
        <label for="disciplina_aula">Disciplina da aula:</label><input type="text" id="disciplina_aula" name="disciplina_aula" required><br><br>
        <label for="turma_aula">Turma:</label><input type="text" id="turma_aula" name="turma_aula" required><br><br>
        <input type="submit" name="create_aula" value="Adicionar aula">
    </form>
</body>
</html>