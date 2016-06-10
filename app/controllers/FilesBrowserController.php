<?php
/**
 * Exercise controller.
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

/**
 * Class ExerciseController.
 *
 * @package Controller
 * @author Maja Chłodnicka
 */

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FilesBrowserController extends BaseController
{

    public function imageList() {
        $test = $_GET['CKEditorFuncNum'];
        $images = [];
        $files = \File::files(public_path() . '/uploads');
        foreach ($files as $file) {
            $images[] = pathinfo($file);
        }

        return Response::view('files.browse', array(
            'files' => $images,
            'test' => $test
        ));
/*        return View::make('files.browse', array(
            'files' => $images,
            'test' => $test
        ));
        return view('files.browse',[
            'files' => $images,
            'test' => $test
          ]);*/
    }

    public function upload(){
        $file = Input::file('upload');
        $uploadDestination = public_path() . '/uploads';
        $filename = preg_replace('/\s+/', '', $file->getClientOriginalName());
        $fileName = md5($filename) . '_' . $filename;
        $file->move($uploadDestination, $fileName);
    }
}