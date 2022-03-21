<?php
// Importar as classes
namespace src;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class EnvioPHPMailer
{

    
    public function enviar($file)
    {
        // Instância da classe
        $mail = new PHPMailer(true);
        try {
            // Configurações do servidor
            $mail->isSMTP(); // Devine o uso de SMTP no envio
            $mail->SMTPDebug = 0; // opção 2 para testar e opção 0 status final
            $mail->SMTPAuth = true; // Habilita a autenticação SMTP
            $mail->Username = 'backup@araujoseguros.com.br';
            $mail->Password = 'hazKBD|BwgIVt|8?';
            // Criptografia do envio SSL também é aceito
            $mail->SMTPSecure = 'tls';
            // Informações específicadas pelo Google
            $mail->Host = 'smtp.hostinger.com';
            $mail->Port = 587;
            // Define o remetente
            $mail->setFrom('backup@araujoseguros.com.br', 'Backup');
            // Define o destinatário
            $mail->addAddress('paulolima9429@gmail.com', 'Paulo Lima');
            
            // Gerando data para o arquivo
            date_default_timezone_set('America/Recife'); // definir fuso horário
            $date = date('d-m-Y'); // data no padrão brasileiro
            $hour = date('H:i:s'); // hora no padrão brasileiro
            
            // Conteúdo da mensagem
            $mail->isHTML(true); // Seta o formato do e-mail para aceitar conteúdo HTML
            $mail->Subject = 'Backup BD araujoseguros.com.br '.$date.'';
            $mail->Body = '<strong>BACKUP DA BASE DE DADOS ARAUJOSEGUROS.COM.BR</strong><br/>';
            $mail->Body .= '<br/>Data:' .$date. '<br/>';
            $mail->Body .= '<br/>Hora:' .$hour. '<br/>';
            $mail->Body .= '<br/>Esse e-mail é gerado automaticamente pelos nossos servidores.<br/>';
            // anexar arquivo
            $mail->AddAttachment($file);
            // Enviar
            $mail->send();
            echo 'A mensagem foi enviada!';
        } catch (Exception $e) {
            echo "A mensagem não pôde ser enviada. Erro de correspondência: {$mail->ErrorInfo}";
        }
    }
}