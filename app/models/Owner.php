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
  }


 ?>
