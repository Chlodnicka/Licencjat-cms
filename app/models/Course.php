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

      public function news()
      {
          return $this->hasMany('News');
      }

      public function tags()
      {
          return $this->belongsToMany('Tag');
      }

      public function attachments()
      {
          return $this->belongsToMany('Tag');
      }

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

      public static function all_courses() {
          return $courses = Course::all();
      }
  }


 ?>
