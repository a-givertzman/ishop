<?php

/*
 * v.001
 *
 * @author antonlobanov
 */

namespace ishop\libs;

/**
 * Класс Debuger | Выводит сообщения в лог-файл или на страничку
 */
class Debuger {
//    use \ishop\TSingleton;
    
    // контейнер для хранения параметров
//    protected static $properties = [];

    public static function log($data) {
        echo '<pre>';
        echo print_r($data, true);
        echo '</pre>';
    }
}
