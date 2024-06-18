<?php
require_once "../../php/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $messages = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $messages[] = "Invalid_email_format";
    } else {
        $sql_checker = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql_checker);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $messages[] = "email_not_found";
        } else {
            $token = bin2hex(random_bytes(16));
            $token_hash = hash("sha256", $token);
            $expiry = date("Y-m-d H:i:s", time() + 1000 * 30);

            $sql_update = "UPDATE users
                            SET reset_token_hash = ?,
                            reset_token_expires_at = ?
                            WHERE email = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("sss", $token_hash, $expiry, $email);
            $stmt_update->execute();

            if ($stmt_update->affected_rows) {
                $mail = require __DIR__ . "/mailer.php";
                $mail->setFrom("plorarsid@gmail.com");
                $mail->addAddress($email);
                $mail->Subject = "Password Reset";
                $mail->Body = <<<END
                    <h1>Hello There</h1>
                    <p>You have requested to reset your password.</p>
                    Click <a href="http://localhost/47-04-tubes-adicitya/pages/forgot-password/reset_password.php?token=$token">here</a> 
                    to reset your password.
                END;

                try {
                    $mail->send();
                    $messages[] = "Message sent, please check your inbox.";
                } catch (Exception $e) {
                    $messages[] = "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
                }
            } else {
                $messages[] = "Failed to update the database.";
            }
        }
    }

    echo json_encode($messages);
}
?>