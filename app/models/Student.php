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

      /**
       * Gets validation array
       *
       * @return $rules array
       */
      public function rules() {

          $rules = array(
              'firstname' => 'required|regex:/^[\pL\s]+$/u',
              'lastname' => 'required|regex:/^[\pL\s]+$/u',
              'email' => 'required|email',
              'courses' => 'required',
          );


          return $rules;
      }
  }


 ?>
