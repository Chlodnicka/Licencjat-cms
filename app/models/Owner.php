<?php

  /**
   *
   */
  class Owner extends Eloquent
  {
   // protected $table = 'Owner';
      public function news()
      {
          return $this->hasMany('News');
      }
  }


 ?>
