<?php
/**
 * Role model.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class Role.
 *
 * @package Model
 * @author Maja Chłodnicka
 */
class Role extends Eloquent {

    public function users()
    {
        return $this->hasMany('User');
    }
}