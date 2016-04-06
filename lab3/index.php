<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Web. Лабораторная работа 2</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
</head>
<script>
    $(document).ready(function() {
        
    });
</script>
<body>
    <form class="contact_form" action="add.php" method="post" name="contact_form">
        <ul>
            <li>
                <h2>ООО "ООО". Техническая поддержка.</h2>
                <span class="required_notification">* Обозначает поля обязательные для заполнения</span>
            </li>
            <li>
                <label for="name">Имя:</label>
                <input id="name" type="text" name="name" placeholder="Михаил" maxlength="20" required />
            </li>
            <li>
                <label for="sname">Фамилия:</label>
                <input id="sname" type="text" name="sname" placeholder="Стругов" maxlength="20" required />
            </li>
            <li>
                <label for="email">E-mail:</label>
                <input id="email" type="email" name="email" placeholder="laikaboss@mail.com" maxlength="50" required />
                <span class="form_hint">Формат text@text</span>
            </li>
            <li>
                <label for="website">Сайт:</label>
                <input id="website" type="url" name="website" placeholder="http://laikaboss.com" pattern="(http|https)://.+" maxlength="100" />
                <span class="form_hint">Формат "http://someaddress.com"</span>
            </li>
            <li>
                <label for="message">Проблема:</label>
                <textarea id="message" name="message" cols="40" rows="6" maxlength="255" required ></textarea>
            </li>
            <li>
                <button class="submit" type="submit">Отправить</button>
            </li>
        </ul>
        <input id="key" type="hidden" name="" value="333"></input>
    </form>
</form>
</body>
</html>
