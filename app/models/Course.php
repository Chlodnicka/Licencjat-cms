<?php
/**
 * Course model.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class Course.
 *
 * @package Model
 * @author Maja Chłodnicka
 */
  class Course extends Eloquent
  {

    /**
     * Gets the lectures for course
     *
     * @return object
     */
      public function lectures()
      {
          return $this->hasMany('Lecture');
      }

      /**
       * Gets the exercises for course
       *
       * @return object
       */
      public function exercises()
      {
          return $this->hasMany('Exercise');
      }

      /**
       * Gets the students for course
       *
       * @return object
       */
      public function students()
      {
          return $this->belongsToMany('Student');
      }

      /**
       * Get the news for course
       *
       * @return object
       */
      public function news()
      {
          return $this->hasMany('News');
      }

      /**
       * Get the tags for course
       *
       * @return object
       */
      public function tags()
      {
          return $this->belongsToMany('Tag');
      }

      /**
       * Get the attachments for course
       *
       * @return object
       */
      public function attachments()
      {
          return $this->belongsToMany('Tag');
      }

      /**
       * Sends mail after introducing changes in course
       *
       * @return object
       */
      public function sendMail($id) {
          $email = DB::table('students')->where('course_id', '=', $id)->lists('email');
          $course = Course::findOrFail($id);
          $course_data = array();
          $course_data['name'] = $course->name;

          Mail::send('emails.course', $course_data, function($message) use ($email)
          {
              $message->from('us@example.com', 'Laravel');
              $message->to($email)->cc('maja.chlodnicka@gmail.com')->subject('Zmiany w kursach'); ;
          });
      }

      /**
       * Gets all courses for menu
       *
       * @return object
       */
      public static function all_courses() {
          return $courses = Course::all();
      }

      /**
       * Gets validation array
       *
       * @return $rules array
       */
      public function rules() {

          $rules = array(
              'name' => 'required|regex:/^[\pL\s\d\-\(\)\:\;\,\.]+$/u',
              'lead' => 'required|regex:/^[\pL\s\d\-\(\)\:\;\,\.]+$/u',
          );

          return $rules;
      }
  }


 ?>
