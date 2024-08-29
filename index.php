<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam application system</title>



    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url('images/background.jpg') no-repeat center center;
            background-size: cover;
        }

        .header {
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            width: 100%;
            text-align: center;
            padding: 20px 0;
            font-size: 24px;
            position: absolute;
            top: 0;
        }

        .buttons {

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 50px;
            width: 80%;


        }

        button {
            flex-basis: 48%;
            height: 80px;
            border-radius: 50px;
            border: 0;
            outline: 0;
            background: #3c00a0;
            color: #fff;
            cursor: pointer;
            transition: background 1s;
            font-size: 30px;
        }

        .student-btn {
            background-color: #00bfff;
        }

        .teacher-btn {
            background-color: #32cd32;
        }

        .button:hover {
            opacity: 0.8;
        }

        @media (min-width: 600px) {
            .buttons {
                flex-direction: row;
                justify-content: center;
            }
        }

        @media (max-width: 600px) {
            button {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="buttons">
            <button onclick="window.location.href='pages/login-and-signup-page/index.php'" class="button student-btn">I am a Student</button>
            <button onclick="window.location.href='pages/login-and-signup-page/index.php'" class="button teacher-btn">I am a Teacher</button>
        </div>
    </div>
</body>

</html>