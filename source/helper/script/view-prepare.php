<?php

namespace Mizi;

use Mizi\Input\InstanceInputForm;

View::prepare('form', function (string $name = '', bool $action = true) {
    $name = $name ? $name : Code::on(url(0));
    return prepare("target [#action] key='[#key]' ", [
        'key' =>  Cif::on(InstanceInputForm::getFormKey($name)),
        'action' => $action ? 'action="' . url(0) . '"' : ''
    ]);
});