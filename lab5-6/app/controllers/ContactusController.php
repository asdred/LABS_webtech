<?php

class ContactusController extends ControllerBase
{

    public function indexAction()
    {
        
        $ip = $_SERVER['REMOTE_ADDR'];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $key = "333555777";
        
        // Запись в сессию
        
        $this->session->set("token", md5($ip . $agent . $key));
        
        // Выдача формы
        
        $this->view->form = new ContactusForm();
    }

}

