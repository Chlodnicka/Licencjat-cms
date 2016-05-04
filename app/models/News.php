<?php


  /**
   *
   */
  class News extends Eloquent
  {
      public function author()
      {
          return $this->belongsTo('Owner', 'owner_id');
      }

      public function tags()
      {
          return $this->belongsToMany('Tag');
      }

      public function attachments()
      {
          return $this->belongsToMany('Tag');
      }

      public function sendMail($id, $action) {
          $email = DB::table('students')->where('course_id', '=', $id)->lists('email');
          $course = Course::findOrFail($id);
          $course_data = array();
          $course_data['name'] = $course->name;
          if($action == 'new') {
              $course_data['message'] = 'Dodano nową wiadomość';
          } else if ($action == 'update') {
              $course_data['message'] = 'Edycja istniejących wiadomości';
          }
          Mail::send('emails.course', $course_data, function($message) use ($email)
          {
              $message->from('us@example.com', 'Laravel');
              $message->to($email)->cc('maja.chlodnicka@gmail.com')->subject('Zmiany w kursach'); ;
          });
      }
  }


 ?>
