<?php
/**
 * Tag model.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class Tag.
 *
 * @package Model
 * @author Maja Chłodnicka
 */
  class Tag extends Eloquent
  {
      /**
       * Gets courses connected with tag
       *
       * @return object
       */
      public function courses()
      {
          return $this->belongsToMany('Course');
      }

      /**
       * Gets lectures connected with tag
       *
       * @return object
       */
      public function lectures()
      {
          return $this->belongsToMany('Lecture');
      }

      /**
       * Gets exercises connected with tag
       *
       * @return object
       */
      public function exercises()
      {
          return $this->belongsToMany('Exercise');
      }

      /**
       * Gets news connected with tag
       *
       * @return object
       */
      public function news()
      {
          return $this->belongsToMany('News');
      }

      /**
       * Gets validation array
       *
       * @return $rules array
       */
      public function rules() {

          $rules = array(
              'name' => 'required|regex:/^[\pL\s\d\-\,\:\;\.]+$/u',
          );

          return $rules;
      }

  }


 ?>
