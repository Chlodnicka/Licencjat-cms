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
          return $this->belongsToMany('Course');
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

      /*
       * Gets 3 last subscribed students
       */

      public static function get_students() {
          $students = DB::table('students')->orderBy('id', 'desc')->limit(3)->get();
          return $students;
      }
  }


 ?>
