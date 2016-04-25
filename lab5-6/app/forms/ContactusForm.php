<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Textarea;
use Phalcon\Validation\Validator\PresenceOf;
//use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Numericality;

class ContactusForm extends Form
{

    /**
     * Initialize the products form
     */
    public function initialize()
    {
        
        // Поле имя
        $name = new Text("name", array(
            'maxlength'   => 20,
            'placeholder' => 'Михаил',
            'required'    => true
        ));
        $name->setLabel("Имя:");
        $name->setFilters(array('striptags', 'string'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Имя обязательно'
            ))
        ));
        $this->add($name);
        
        // Поле фамилия
        $sname = new Text("sname", array(
            'maxlength'   => 20,
            'placeholder' => 'Стругов',
            'required'    => true
        ));
        $sname->setLabel("Фамилия:");
        $sname->setFilters(array('striptags', 'string'));
        $sname->addValidators(array(
            new PresenceOf(array(
                'message' => 'Фамилия обязательна'
            ))
        ));
        $this->add($sname);
        
        // Поле email
        $email = new Email("email", array(
            'maxlength'   => 50,
            'placeholder' => 'qwerty@domain.com',
            'required'    => true,
        ));
        $email->setLabel("E-mail:");
        $email->setFilters(array('striptags', 'string'));
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'E-mail обязателен'
            ))
        ));
        $this->add($email);
        
        // Поле website
        $url = new Url("website", array(
            'maxlength'   => 50,
            'placeholder' => 'domain.com',
            'pattern'     => '(http|https)://.+'
        ));
        $url->setLabel("Сайт:");
        $url->setFilters(array('striptags', 'string'));
        $this->add($url);
        
        // Поле сообщение
        $message = new Textarea("message", array(
            'maxlength'   => 255,
            'placeholder' => 'Ваше сообщение',
            'required'    => true,
            'cols'        => 40,
            'rows'        => 6
        ));
        $message->setLabel("Сообщение:");
        $message->setFilters(array('striptags', 'string'));
        $message->addValidators(array(
            new PresenceOf(array(
                'message' => 'Сообщение обязательно'
            ))
        ));
        $this->add($message);
    }
}

class Url extends Text
{
    public function render($attributes=null)
    {
        $elementId = $this->getAttribute('id') ? $this->getAttribute('id') : $this->getName();

        // forced ltr direction
        $this->setAttribute('class', $this->getAttribute('class'));

        //$this->clear();
        $html = parent::render($attributes);

        $html = str_replace('type="text"', 'type="url"', $html);
        return $html;
    }
}