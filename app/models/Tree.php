<?php
/**
 * Tree model.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class Tree.
 *
 * @package Model
 * @author Maja Chłodnicka
 */
  class Tree extends Eloquent
  {
      /**
       * Gets tree for dynamically loaded menu and footer for guest and logged student
       *
       * @return object
       */
      public static function menu() {
          $tree = DB::table('trees')
              ->where('active', '=', 1)
              ->whereIn('id', array(1, 2, 3, 4))
              ->get();
          return $tree;
      }

      /**
       * Gets tree for dynamically loaded menu for logged admin
       *
       * @return object
       */
      public static function menuLogged() {
          $tree = Tree::all();
          return $tree;
      }



      /**
       * Gets validation array
       *
       * @return $rules array
       */
      public function rules() {
          $rules = array(
              'name' => 'required|regex:/^[\pL\s]+$/u',
          );

          return $rules;
      }
  }


 ?>
