<meta charset="utf-8">
<?php 

// Чистка

function clean($value = "") {
    $value = trim($value);              // Убрать пробелы
    $value = stripslashes($value);      // Убрать экранирование
    $value = strip_tags($value);        // Убрать html теги
    $value = htmlspecialchars($value);  // Преобразует спец символы в html сущности
    
    return $value;
}

// Длина

function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}

session_start();

$ip = $_SERVER['REMOTE_ADDR']; 
$agent = $_SERVER['HTTP_USER_AGENT'];
$special_key = "333555777";

if (md5($ip . $agent . $special_key) == $_SESSION['token']) {

    // Приём

    $name = $_POST['name'];
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $message = $_POST['message'];

    // Чистка

    $name = clean($name);
    $surname = clean($surname);
    $email = clean($email);
    $message = clean($message);

    // Проверка на пустоту

    if (!empty($name) && !empty($sname) && !empty($email) && !empty($message)) {
        $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!empty($website)) {
            $website_validate = filter_var($website, FILTER_VALIDATE_URL);


            if (check_length($name, 2, 20) && check_length($sname, 2, 20) && check_length($message, 1, 255) && check_length($email, 3, 50) && $email_validate && check_length($website, 10, 50) && $website_validate) {
                echo "Всё хорошо, и даже сайт";
            } else {
                echo "Всё плохо";
            }
        } elseif (check_length($name, 2, 20) && check_length($sname, 2, 20) && check_length($message, 1, 255) && check_length($email, 3, 50) && $email_validate) {
            echo "Всё хорошо";
        } else {
            echo "Всё плохо";
        }
    } else {
        echo "Всё плохо";
    }
    
} else {
    echo "Воу воу. Это уже слишком";
}

unset($_SESSION['token']);
session_destroy();

?>