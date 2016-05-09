<?php
class PrintController extends \BaseController
{
    public function index()
    {
        $pdf = PDF::loadView('exercise.generated');
        return $pdf->stream();
    }
}