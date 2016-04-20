<?php


  /**
   *
   */
  class Lecture extends Eloquent
  {

      /**
       * Get the course that owns the lecture.
       */
      public function course()
      {
          return $this->belongsTo('Course');
      }
      
      
  }


 ?>
