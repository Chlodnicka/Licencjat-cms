<?php
/**
 * Owner model.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class Owner.
 *
 * @package Model
 * @author Maja Chłodnicka
 */
  class Owner extends Eloquent
  {
      /**
       * Gets news connected with owner
       *
       * @return object
       */
      public function news()
      {
          return $this->hasMany('News');
      }

      /**
       * Gets courses connected with owner
       *
       * @return object
       */
      public function courses()
      {
          return $this->hasMany('News');
      }

      /**
       * Gets lectures connected with owner
       *
       * @return object
       */
      public function lectures()
      {
          return $this->hasMany('News');
      }

      /**
       * Gets exercises connected with owner
       *
       * @return object
       */
      public function exercises()
      {
          return $this->hasMany('News');
      }

      /**
       * Gets students connected with owner
       *
       * @return object
       */
      public function students()
      {
          return $this->hasMany('News');
      }

      /**
       * Gets attachments connected with owner
       *
       * @return object
       */
      public function attachments()
      {
          return $this->belongsToMany('Tag');
      }

      /**
       * Gets possible positions for owner
       *
       * @return $positions array
       */
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
