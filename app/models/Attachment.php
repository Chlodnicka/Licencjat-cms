<?php


  /**
   *
   */
  class Attachment extends Eloquent
  {
      public function courses()
      {
          return $this->belongsToMany('Course');
      }

      public function lectures()
      {
          return $this->belongsToMany('Lecture');
      }

      public function exercises()
      {
          return $this->belongsToMany('Exercise');
      }

      public function news()
      {
          return $this->belongsToMany('News');
      }
  }


 ?>
