<?php


  /**
   *
   */
  class Course extends Eloquent
  {
    /**
     * Get the lectures for course
     */

      public function lectures()
      {
          return $this->hasMany('Lecture');
      }
  }


 ?>
