<?php
/**
 * Base controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class BaseController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */
class BaseController extends Controller {
	
	/**
	 * Setup the layout used by the controller action.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
