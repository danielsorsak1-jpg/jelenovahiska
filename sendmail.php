<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "daniel.sorsak1@gmail.com"; // <- tvoj email
    $subject = "Novo povpraševanje s spletne strani";

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    $body = "Ime: $name\nEmail: $email\n\nSporočilo:\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "✅ Hvala, sporočilo je bilo poslano!";
    } else {
        echo "⚠️ Žal ni uspelo poslati. Prosim poskusite kasneje.";
    }
}
?>
