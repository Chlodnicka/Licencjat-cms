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

      public function tags()
      {
          return $this->belongsToMany('Tag');
      }

      public function attachments()
      {
          return $this->belongsToMany('Tag');
      }
  }


 ?>
