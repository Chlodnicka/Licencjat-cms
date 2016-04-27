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
  }


 ?>
