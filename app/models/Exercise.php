<?php


  /**
   *
   */
  class Exercise extends Eloquent
  {
      public function course()
      {
          return $this->belongsTo('Course');
      }

      public function lecture()
      {
          return $this->belongsTo('Lecture');
      }

      public function tags()
      {
          return $this->belongsToMany('Tag');
      }

      public function attachments()
      {
          return $this->belongsToMany('Tag');
      }

      public function difficulty()
      {
        $difficulty = array(
            '1' => 'easy',
            '2' => 'medium',
            '3' => 'hard'
        );
        return $difficulty;
      }

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
  }


 ?>
