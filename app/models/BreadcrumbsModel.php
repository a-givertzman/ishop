<?php

/*
 * v.001
 *
 * @author antonlobanov
 */

namespace app\models;

use ishop\App;
use ishop\base\Model;



/**
 * Класс            | Строит хлебные крошки
 * BreadcrumbsModel |
 */
class BreadcrumbsModel extends Model {


    /**
     * Метод | Возвращает массив содержащий хлебные кошки
     */
    public function getBreadcrumbs($category_id, $name = '') {

        // Получаем массив категорий
        $category = App::$app->getProperty('category');

        // Получаем массив Хлебные крошки
        $parts = $this->getParts($category, $category_id);

        return $parts;
    }



    /**
     * Метод | Формирует массив Хлебные крошки
     */
    protected function getParts($category, $id) {

        if (empty($category) or empty($id) or $id == 0) {
            return false;
        } else {
            $parts = [];
             while (!empty($category[$id])) {
                $parts[] = [
                    'title' => $category[$id]['title'],
                    'alias' => $category[$id]['alias'],
                ];
                $id = $category[$id]['parent_id'];
            }
            return array_reverse($parts);
        }
    }
}
