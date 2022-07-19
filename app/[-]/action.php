<?php

use Mizi\Input\InstanceInputForm;

return new class
{
    function get()
    {
        return view();
    }

    function post()
    {
        $form = new InstanceInputForm();

        $form->field('email', 'Email')->validate(FILTER_VALIDATE_EMAIL)->get();

        alert("Email aceito");

        return;
    }
};