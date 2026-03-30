<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= html_escape($project->title); ?></title>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(180deg, #fff9e6, #ffeaa7);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: white;
            padding: 50px;
            border-radius: 25px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }

        .sunflower {
            font-size: 90px;
            animation: spin 8s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        h1 {
            color: #e17055;
            margin-top: 10px;
        }

        .message {
            margin-top: 20px;
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }

        .sender {
            margin-top: 25px;
            font-weight: bold;
            color: #2d3436;
        }
    </style>
</head>

<body>

    <div class="card">

        <div class="sunflower">🌻</div>

        <h1><?= html_escape($project->receiver_name); ?></h1>

        <div class="message">
            <?= nl2br(html_escape($project->message_body)); ?>
        </div>

        <div class="sender">
            From 🌻 <?= html_escape($project->sender_name); ?>
        </div>

    </div>

</body>

</html>