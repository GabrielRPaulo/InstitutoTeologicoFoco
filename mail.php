<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- CONFIGURAÇÃO DO E-MAIL DE DESTINO ---
    // As mensagens do formulário serão enviadas para este e-mail.
    $para = "riovdfrancisco123456@gmail.com"; // <-- E-MAIL CORRETO JÁ CONFIGURADO
    
    // Assunto do e-mail
    $assunto = "Nova Mensagem do Site - Instituto Ágape";
    // --- FIM DA CONFIGURAÇÃO ---

    // Pega os dados do formulário de forma segura
    $nome = trim(strip_tags($_POST["con_name"]));
    $email = trim(strip_tags($_POST["con_email"]));
    $telefone = trim(strip_tags($_POST["con_phone"]));
    $mensagem = trim(strip_tags($_POST["con_message"]));

    // Validação para garantir que os campos obrigatórios não estão vazios
    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo "Erro: Por favor, preencha todos os campos obrigatórios.";
        exit;
    }

    // Monta o corpo do e-mail que você receberá
    $corpo_email = "Você recebeu uma nova mensagem do formulário de contato do seu site:\n\n";
    $corpo_email .= "Nome: " . $nome . "\n";
    $corpo_email .= "E-mail: " . $email . "\n";
    if (!empty($telefone)) {
        $corpo_email .= "Telefone: " . $telefone . "\n";
    }
    $corpo_email .= "\nMensagem:\n" . $mensagem . "\n";

    // Cabeçalhos essenciais para o envio do e-mail
    $headers = "From: " . $nome . " <" . $email . ">\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Tenta enviar o e-mail
    if (mail($para, $assunto, $corpo_email, $headers)) {
        // Se o envio for bem-sucedido
        echo "Mensagem enviada com sucesso! Obrigado pelo seu contato.";
    } else {
        // Se houver um erro no servidor
        echo "Desculpe, houve um erro ao tentar enviar sua mensagem. Tente novamente mais tarde.";
    }

} else {
    // Impede o acesso direto ao arquivo
    echo "Acesso negado.";
}
?>