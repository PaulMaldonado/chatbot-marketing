<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Marketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .chat-box {
            height: 500px;
            overflow-y: scroll;
        }

        .user-image, .chatbot-image {
            max-width: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="chat-box mb-3">
                            <?php 
                                include "./config/db.php";

                                $display_response_chat = "SELECT * FROM db_name ORDER BY created_at DESC";
                                $result_chats = mysqli_query($db, $display_response_chat);
                                
                                while($rowChats = mysqli_fetch_array($result_chats)) {
                                    echo '<img src="./assets/img/hombre.png" alt="User" class="user-image">';
                                    echo $rowChats['message'] . '<br><br>';
                                
                                    echo '<img src="./assets/img/chatbot.png" alt="Chatbot" class="chatbot-image">';
                                    echo $rowChats['chat_response'] . $rowChats['url_site'] . '<br>';
                                }
                            ?>
                        </div>
                        <form action="chat.php" method="POST">
                            <div class="mb-3">
                                <textarea cols="30" rows="3" class="form-control" placeholder="Escribe tu mensaje aquí" name="message" required></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="url" name="url_site" class="form-control" placeholder="URL del Sitio Web" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
