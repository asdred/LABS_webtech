<?php

class ReportController extends ControllerBase
{

    public function indexAction()
    {

    }
    
    public function addAction()
    {
        // Проверка значения в сессии
        
        if ($this->session->has("token")) {
            
            $ip = $_SERVER['REMOTE_ADDR']; 
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $key = "333555777";
            
            //echo $ip . "<br>" . $agent . "<br>" . $key . "<br>" . $this->session->get("token") . "<br>";
            
            // Сравнение с полученным значенем из сессии
            
            if (md5($ip . $agent . $key) == $this->session->get("token")) {
                
                // Проверяем, что данные пришли методом POST
        
                if ($this->request->isPost() == true) {

                    // Получаем POST данные

                    $name = $this->request->getPost("name");
                    $sname = $this->request->getPost("sname");
                    $email = $this->request->getPost("email");
                    $website = $this->request->getPost("website");
                    $message = $this->request->getPost("message");
                    
                    $dfdsfname = $this->request->getPost("sdfdsfdsf");
                    
                    // Очищаем полученные данные

                    $name = $this->clean($name);
                    $sname = $this->clean($sname);
                    $email = $this->clean($email);
                    $website = $this->clean($website);
                    $message = $this->clean($message);
                    
                    // Проверяем их на пустосу и нормальный размер

                    if (!empty($name) && !empty($sname) && !empty($email) && !empty($message)) {
                        $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);

                        if (!empty($website)) {
                            $website_validate = filter_var($website, FILTER_VALIDATE_URL);

                            if ($this->isLengthNormal($name, 2, 20) && $this->isLengthNormal($sname, 2, 20) && $this->isLengthNormal($message, 1, 255) && $this->isLengthNormal($email, 3, 50) && $email_validate && $this->isLengthNormal($website, 10, 50) && $website_validate) {
                                echo "Всё хорошо, и даже сайт";
                                $this->insertReport($name, $sname, $email, $website, $message);
                            } else {
                                echo "Всё плохо. 1";
                            }
                        } elseif ($this->isLengthNormal($name, 2, 20) && $this->isLengthNormal($sname, 2, 20) && $this->isLengthNormal($message, 1, 255) && $this->isLengthNormal($email, 3, 50) && $email_validate) {
                            echo "Всё хорошо";
                            $this->insertReport($name, $sname, $email, $website, $message);
                        } else {
                            echo "Всё плохо. 2";
                        }
                    } else {
                        echo "Что-то незаполнено";
                    }
                }
            } else {
                echo "Ты какой-то не такой";
            }
        }
    }
    
    // Очистка
    
    private function clean($value = "") {
        return trim(stripslashes(htmlspecialchars(strip_tags($value))));;
    }
    
    // Проверка на допустимую длину

    private function isLengthNormal($value = "", $min, $max) {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }
    
    // Добавление в базу
    
    private function insertReport($name = "", $sname = "", $email = "", $website = "", $message = "") {
        
        $report = new Report();
        
        $report->id = 'null';
        $report->name = $name;
        $report->sname = $sname;
        $report->email = $email;
        $report->website = $website;
        $report->message = $message;
        
        // Сохраняем и проверяем на наличие ошибок
        $success = $report->create();

        if ($success) {
            echo "<br/> Спасибо за сообщение!";
        } else {
            echo "К сожалению, возникли следующие проблемы: ";
            foreach ($user->getMessages() as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
    }

}

