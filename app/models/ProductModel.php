<?php

/*
 * v.001
 *
 * @author antonlobanov
 */

namespace app\models;

use ishop\base\Model;



/**
 * Класс        | Отвечает за работу с данными, основные задачи выполняет Model
 * ProductModel | Спецефические задачи данного приложения выполняет данный класс
 *                В том числе:
 *                  - валидация данных
 *                  - работа с файлами
 *                  - работа с базой данных
 */
class ProductModel extends Model {


    /**
     * Метод |
     */
    public function setRecentlyViewed($id) {
        $recentlyViewed = $this->getRecentlyViewedIds();

        if (empty($recentlyViewed)) {
            // сохраняем в куках просмотренный товар
            setcookie('recentlyViewed', $id, time() + 3600*24*7, '/');
        } else {
            if (!in_array($id, $recentlyViewed)) {

                // добавляем новый товар в просмотренные
                $recentlyViewed[] = $id;
                setcookie('recentlyViewed', implode(';', $recentlyViewed), time() + 3600*24*7, '/');
            }
        }
        debug($recentlyViewed);
    }



    /**
     * Метод |
     */
    public function getRecentlyViewed($id) {
    }



    /**
     * Метод | Возвращает массив id продуктов просмотренных
     *         ранее в количестве $count
     */
    protected function getRecentlyViewedIds($count = null) {

        if (!empty($_COOKIE['recentlyViewed'])) {

            $recentlyViewed = explode(';', $_COOKIE['recentlyViewed']);

            return array_slice($recentlyViewed, - $count);
        }
        return false;
    }
}
