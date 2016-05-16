<?php
/**
 * Student model.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class Student.
 *
 * @package Model
 * @author Maja Chłodnicka
 */
  class Student extends Eloquent
  {
      /**
       * Gets the course connected with student
       *
       * @return object
       */
      public function course()
      {
          return $this->belongsTo('Course');
      }
  }


 ?>
