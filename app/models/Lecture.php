<?php
/**
 * Lecture model.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class Lecture.
 *
 * @package Model
 * @author Maja Chłodnicka
 */
  class Lecture extends Eloquent
  {

      /**
       * Gets the course connected with lecture
       *
       * @return object
       */
      public function course()
      {
          return $this->belongsTo('Course');
      }

      /**
       * Gets tags connected with exercise
       *
       * @return object
       */
      public function tags()
      {
          return $this->belongsToMany('Tag');
      }

      /**
       * Gets attachments connected with exercise
       *
       * @return object
       */
      public function attachments()
      {
          return $this->belongsToMany('Tag');
      }

      /**
       * Gets exercises connected with exercise
       *
       * @return object
       */
      public function exercises()
      {
          return $this->hasMany('Exercise');
      }

      /**
       * Sends mail after introducing changes in lecture
       *
       * @return object
       */
      public function sendMail($id, $action) {
          $email = DB::table('students')->where('course_id', '=', $id)->lists('email');
          $course = Course::findOrFail($id);
          $course_data = array();
          $course_data['name'] = $course->name;
          if($action == 'new') {
              $course_data['message'] = 'Dodano nowe wykłady';
          } else if ($action == 'update') {
              $course_data['message'] = 'Edycja istniejących materiałów';
          }
          Mail::send('emails.course', $course_data, function($message) use ($email)
          {
              $message->from('us@example.com', 'Laravel');
              $message->to($email)->cc('maja.chlodnicka@gmail.com')->subject('Zmiany w kursach'); ;
          });
      }

  }


 ?>
