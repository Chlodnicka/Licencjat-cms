<?php
/**
 * Exercise model.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class Exercise.
 *
 * @package Model
 * @author Maja Chłodnicka
 */
  class Exercise extends Eloquent
  {

      /**
       * Gets the course connected with exercise
       *
       * @return object
       */
      public function course()
      {
          return $this->belongsTo('Course');
      }

      /**
       * Gets the lecture connected with exercise
       *
       * @return object
       */
      public function lecture()
      {
          return $this->belongsTo('Lecture');
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
       * Returns array of difficulty levels
       *
       * @return $difficulty array
       */
      public function difficulty()
      {
        $difficulty = array(
            '1' => 'easy',
            '2' => 'medium',
            '3' => 'hard'
        );
        return $difficulty;
      }

      /**
       * Sends mail after introducing changes in exercise
       *
       * @return object
       */
      public function sendMail($id, $action) {
          $email = DB::table('students')->where('course_id', '=', $id)->lists('email');
          $course = Course::findOrFail($id);
          $course_data = array();
          $course_data['name'] = $course->name;
          if($action == 'new') {
              $course_data['message'] = 'Dodano nowe zadania';
          } else if ($action == 'update') {
              $course_data['message'] = 'Edycja nowych zadań';
          }
          Mail::send('emails.course', $course_data, function($message) use ($email)
          {
              $message->from('us@example.com', 'Laravel');
              $message->to($email)->cc('maja.chlodnicka@gmail.com')->subject('Zmiany w kursach'); ;
          });
      }

      /**
       * Gets validation array
       *
       * @return $rules array
       */
      public function rules() {

          $rules = array(
              'title' => 'required|regex:/^[\pL\s\-\d]+$/u',
              'difficulty' => 'required',
              'lectures' => 'required|regex:/^[1-9]+$/u',
              'courses' => 'required|regex:/^[1-9]+$/u',
          );

          return $rules;
      }

      /**
       * Gets validation array for generating PDF
       *
       * @return $rules array
       */
      public function rules_generate() {

          $rules = array(
              'content' => 'required|regex:/^[\pL\s\-\d\.]+$/u',
              'difficulty' => 'required',
              'exercise_tags' => 'required',
              'exercise_lecture' => 'required',
              'number' => 'numeric',
          );

          return $rules;
      }
  }


 ?>
