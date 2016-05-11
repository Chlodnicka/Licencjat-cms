<?php

  class Tree extends Eloquent
  {
      public static function menu() {
          $tree = DB::table('trees')
              ->where('active', '=', 1)
              ->whereIn('id', array(1, 2, 3, 4))
              ->get();
          return $tree;
      }

      public  static function contentTree() {
          
      }
  }


 ?>
