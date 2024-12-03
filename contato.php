<!-- Desenvolvido por: Marcio Tascheck -->
<!-- Data Dev: 25/11/2024 -->
<!-- E-mail: marciotascheck8@gmail.com -->

<?php
// Configuração do banco de dados
$servername = "localhost"; // Endereço do servidor que hospeda o banco de dados
$username = "root"; // Nome de usuário
$password = ""; // Senha
$dbname = "confeitaria"; // Nome do banco de dados

// Conectar com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Testa a conexão com o banco de dados
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $assunto = $conn->real_escape_string($_POST['subject']);
    $mensagem = $conn->real_escape_string($_POST['message']);
    
    // Faz o insert no banco de dados (tabela contato)
    $sql = "INSERT INTO contato (nome, email, assunto, mensagem) 
            VALUES ('$nome', '$email', '$assunto', '$mensagem')";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
       echo "OK";
    }
}

// Fecha a conexão
$conn->close();
?>
