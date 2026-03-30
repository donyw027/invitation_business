<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= html_escape($project->title); ?></title>

    <style>
        body {
            font-family: Arial;
            background: #fff7fb;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .bear {
            font-size: 80px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-15px)
            }

            100% {
                transform: translateY(0)
            }
        }

        h1 {
            color: #ff4fa3;
        }

        .message {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>

</head>

<body>

    <div class="card">

        <div class="bear">🐻💐</div>

        <h1><?= html_escape($project->receiver_name); ?></h1>

        <div class="message">
            <?= nl2br(html_escape($project->message_body)); ?>
        </div>

        <p style="margin-top:20px;">
            From ❤️ <?= html_escape($project->sender_name); ?>
        </p>

    </div>

</body>

</html>