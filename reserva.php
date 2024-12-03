<!-- Desenvolvido por: Marcio Tascheck -->
<!-- Data Dev: 25/11/2024 -->
<!-- E-mail: marciotascheck8@gmail.com -->

<?php
// Configuração do banco de dados
$servername = "localhost"; // Endereço do servidor que hospeda o banco de dados
$username = "root"; // Nome de usuário
$password = ""; // Senha
$dbname = "confeitaria"; // Nome do banco de dados

// Conecta com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefone = $conn->real_escape_string($_POST['phone']);
    $data_reserva = $conn->real_escape_string($_POST['date']);
    $hora_reserva = $conn->real_escape_string($_POST['time']);
    $numero_pessoas = $conn->real_escape_string($_POST['people']);
    $mensagem = $conn->real_escape_string($_POST['message']);

    // Faz o insert no banco de dados (tabela reservas)
    $sql = "INSERT INTO reservas (nome, email, telefone, data_reserva, hora_reserva, numero_pessoas, mensagem) 
            VALUES ('$nome', '$email', '$telefone', '$data_reserva', '$hora_reserva', '$numero_pessoas', '$mensagem')";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
        echo "OK";

    }
}

// Encerra a conexão
$conn->close();
?>
