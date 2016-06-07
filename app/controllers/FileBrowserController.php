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
class FileBrowserController extends BaseController
{

    public function imageList() {
        $imgList = array();
        $files = File::allfiles(public_path().'/img');
        foreach ($files as $file) {
            array_push($imgList, array("title"=>str_replace( './', '',$file), "value"=>'img/'.str_replace( './', '',$file)));
        }
        return json_encode($imgList);
    }

    public function upload(){
        $valid_exts = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $max_size = 2000 * 1024; // max file size (200kb)
        $path = public_path() . '/assets/uploads/'; // upload directory
        $fileName = NULL;
        $file = Input::file('image');
    // get uploaded file extension
    //$ext = $file['extension'];
        $ext = $file->guessClientExtension();
    // get size
        $size = $file->getClientSize();
    // looking for format and size validity
        $name = $file->getClientOriginalName();
        if (in_array($ext, $valid_exts) AND $size < $max_size)
        {
    // move uploaded file from temp to uploads directory
            if ($file->move($path,$name))
            {
                $status = 'Image successfully uploaded!';
                $fileName = $name;
            }
            else {
            $status = 'Upload Fail: Unknown error occurred!';
            }
        }
        else {

            $status = 'Upload Fail: Unsupported file format or It is too large to upload!';
        }

    //echo out script that TinyMCE can handle and update the image in the editor

        return ("
    // <![CDATA[
    top.$('.mce-btn.mce-open').parent().find('.mce-textbox').val('/img/".$fileName."').closest('.mce-window').find('.mce-primary').click();
    // ]]>
    ");
    }
}