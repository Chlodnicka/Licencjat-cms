<?php


  /**
   *
   */
  class News extends Eloquent
  {
      public function author()
      {
          return $this->belongsTo('Owner', 'owner_id');
      }
  }


 ?>
