<?php


  /**
   *
   */
  class Student extends Eloquent
  {
      public function course()
      {
          return $this->belongsTo('Course');
      }
  }


 ?>
