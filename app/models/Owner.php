<?php

  /**
   *
   */
  class Owner extends Eloquent
  {
   // protected $table = 'Owner';
      public function news()
      {
          return $this->hasMany('News');
      }

      public function courses()
      {
          return $this->hasMany('News');
      }

      public function lectures()
      {
          return $this->hasMany('News');
      }

      public function exercises()
      {
          return $this->hasMany('News');
      }

      public function students()
      {
          return $this->hasMany('News');
      }

      public function attachments()
      {
          return $this->belongsToMany('Tag');
      }

      public function  position()
      {
          $positions = array(
              '1' => 'mgr',
              '2' => 'inż.',
              '3' => 'mgr inż.',
              '4' => 'dr',
              '5' => 'dr inż.',
              '6' => 'dr hab.',
              '7' => 'prof.'
          );

          return $positions;
      }

  }


 ?>
