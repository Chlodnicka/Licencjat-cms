<?php


  /**
   *
   */
  class Exercise extends Eloquent
  {
      public function course()
      {
          return $this->belongsTo('Course');
      }

      public function lecture()
      {
          return $this->belongsTo('Lecture');
      }
  }


 ?>
