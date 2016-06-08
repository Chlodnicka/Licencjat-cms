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
       * Gets tags connected with owner
       *
       * @return object
       */
      public function tags()
      {
          return $this->belongsToMany('Tag');
      }

      /**
       * Gets main attachment connected with news item
       *
       * @return object
       */
      public function attachment()
      {
          return $this->hasMany('Attachment');
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

      /**
       * Gets validation array
       *
       * @return $rules array
       */
      public function rules() {
          $rules = array(
              'firstname' => 'required|regex:/^[\pL\s]+$/u',
              'lastname' => 'required|regex:/^[\pL\s]+$/u',
              'email' => 'required|email',
              'position' => 'required',
              'phone' => 'numeric|min:9',
              'university' => array(
                  'required',
                  'regex:/^[\pL\s]+$/u'
              ),
              'department' => array(
                  'required',
                  'regex:/^[\pL\s]+$/u'
              ),
              'tutorshipHours' => array(
                  'required',
                  'regex:/^[\pL\s\-\.\:\d]+$/u'
              ),
              'institute' => 'regex:/^[\pL\s]+$/u',
          );

          return $rules;
      }
  }


 ?>
