<?php
/**
 * Created by PhpStorm.
 * User: Azalsk
 * Date: 29/09/2015
 * Time: 21:07
 */

namespace CodeCommerce;


class Cart
{
    private $items;
    public function __construct(){
        $this->items = [];
    }

    public function add($id, $name, $price){
        //id -> qtd, price, nome
        $this->items += [
          $id => [
              'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
              'price' => $price,
              'name' => $name,
          ]
        ];

        return $this->items;
    }

    public function remove($id){
        unset($this->items[$id]);
    }
    public function all(){
        return $this->items;
    }

    public function getTotal(){
        $total = 0;
        foreach($this->items as $items){
            $total += $items['qtd'] * $items['price'];
        }

        return $total;
    }

    public function storeQuantity($id, $qtd){
        $this->items[$id]['qtd'] = $qtd;
    }

}