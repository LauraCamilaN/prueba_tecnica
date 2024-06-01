<?php

class Controller
{

    public function render($folder, $subFolder, $path, $parameters = [])
    {
        if ($subFolder == '') {
            require_once(__DIR__ . '/../Views/' . $folder .  '/' . $path . '.php');
        } else {
            require_once(__DIR__ . '/../Views/' . $folder . '/' . $subFolder . '/' . $path . '.php');
        }
    }
}
