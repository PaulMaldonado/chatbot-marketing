<?php
    include "./config/db.php";

    require "../vendor/autoload.php";

    use Orhanerday\OpenAi\OpenAi;

    $open_key = '';
    $open_ai = new OpenAi($open_key);

    $url = $_POST['url_site'];
    $message = "Instrucción: " . $_POST['message'] . "\nURL: " . $url;

    if(!$url && !$message) {
        echo "Error, el mensaje y la url son obligatorios.";
    } else {
        $chat = $open_ai->chat([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 
                'content' => 'Necesito que generes copys en base a la información de ' . $message . 'marketing digital...']
            ],
    
            'temperature' => 1.0,
            'max_tokens' => 3000,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ]);
    
        $response = json_decode($chat);
        $content = $response->choices[0]->message->content;
        $content = mysqli_real_escape_string($db, $content);

        $content = substr($content, 0, 3000);

        $sql_insert_chats = "INSERT INTO chats(message, url_site, chat_response, created_at) VALUES('$message', '$url', '$content', NOW())";
        $result_insert_chats = mysqli_query($db, $sql_insert_chats);

        if ($result_insert_chats) {
           header('Location: index.php');
        }
    }
?>