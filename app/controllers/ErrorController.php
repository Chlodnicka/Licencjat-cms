<?php
/**
 * Error controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class ErrorController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */

class ErrorController extends BaseController {

    /**
     * @param $layout Base layout
     */
    protected $layout = 'layouts.master';

    /**
     * Missing action.
     *
     * @return \Illuminate\View\View
     */
    public function missing()
    {
        $this->layout->content = View::make('errors.error_404');
    }

    /**
     * Error action.
     *
     * @return \Illuminate\View\View
     */
    public function error()
    {
        $this->layout->content = View::make('errors.error_500');
    }

    /**
     * Error not found in database action.
     *
     * @return \Illuminate\View\View
     */
    public function errorNotFound()
    {
        $this->layout->content = View::make('errors.error_404');
    }
}