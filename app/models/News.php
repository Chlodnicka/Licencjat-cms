<?php
/**
 * News model.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class News.
 *
 * @package Model
 * @author Maja Chłodnicka
 */
  class News extends Eloquent
  {
      /**
       * Gets author connected with news item
       *
       * @return object
       */
      public function author()
      {
          return $this->belongsTo('Owner', 'owner_id');
      }

      /**
       * Gets tags connected with news item
       *
       * @return object
       */
      public function tags()
      {
          return $this->belongsToMany('Tag');
      }

      /**
       * Gets attachments connected with news item
       *
       * @return object
       */
      public function attachments()
      {
          return $this->belongsToMany('Tag');
      }

      /**
       * Sends mail after introducing changes in news item
       *
       * @return object
       */
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
