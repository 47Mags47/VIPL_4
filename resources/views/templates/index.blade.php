<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        textarea {
            resize: none;

            width: 100%;
            height: 0%;
            border: none;
            outline: none;

            padding: 15px;
        }

        body {
            width: 100vw;
            height: 100vh;
        }

        .content {
            width: 100%;
            height: 100%;
            position: relative;

            display: flex;
        }

        .template-box {
            width: 80%;

            border-right: 2px solid #999
        }
    </style>


    <div class="content">
        <form class="template-box" method="POST">
            @csrf
            <textarea name="template" id="template">

            </textarea>
            <input type="submit" value="Отправить">

            <div class="view">
                <pre>{{ $return }}</pre>
            </div>
        </form>
        <div class="var-vox">
            <details>
                <summary>Программирование</summary>
                <ul>
                    <li>Цикл</li>
                    <li>Условие</li>
                </ul>
            </details>
            <details>
                <summary>Глобальные переменные</summary>
                <ul>
                    <li>Наименование организации</li>
                    <li>ИНН организации</li>
                    <li>БИК организации</li>
                </ul>
            </details>
            <details>
                <summary>Информация о получателе</summary>
                <ul>
                    <li>Фамилия</li>
                    <li>Имя</li>
                    <li>Отчество</li>
                </ul>
            </details>
        </div>
    </div>
</body>

</html>
