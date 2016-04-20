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

      public function exercises()
      {
          return $this->hasMany('Exercise');
      }

      public function students()
      {
          return $this->hasMany('Student');
      }

  }


 ?>
