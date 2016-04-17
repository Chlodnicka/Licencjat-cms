<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
* Main page
*/
Route::get('/', 'HomeController@showMainPage');


/**
* Owner routing
*/
Route::get('/owner', ['as' => 'owner', 'uses' => 'OwnerController@index']);
Route::get('/owner/index', ['as' => 'owner', 'uses' => 'OwnerController@index']);
Route::get('/owner/index/', ['as' => 'owner', 'uses' => 'OwnerController@index']);
Route::get('/owner/edit', ['as' => 'owner', 'uses' => 'OwnerController@edit']);
Route::get('/owner/edit/', ['as' => 'owner', 'uses' => 'OwnerController@edit']);
Route::get('/owner/new', ['as' => 'owner', 'uses' => 'OwnerController@newOne']);
Route::get('/owner/new/', ['as' => 'owner', 'uses' => 'OwnerController@newOne']);

/**
* News routing
*/
Route::get('/news', ['as' => 'news', 'uses' => 'NewsController@index']);
Route::get('/news/index', ['as' => 'news', 'uses' => 'NewsController@index']);
Route::get('/news/index/', ['as' => 'news', 'uses' => 'NewsController@index']);
Route::get('/news/view', ['as' => 'news', 'uses' => 'NewsController@view']);//do poprawy
Route::get('/news/view/', ['as' => 'news', 'uses' => 'NewsController@view']);//do poprawy
Route::get('/news/view/{id}', ['as' => 'news', 'uses' => 'NewsController@view']);
Route::get('/news/view/{id}/', ['as' => 'news', 'uses' => 'NewsController@view']);
Route::get('/news/edit', ['as' => 'news', 'uses' => 'NewsController@index']);
Route::get('/news/edit/', ['as' => 'news', 'uses' => 'NewsController@index']);
Route::get('/news/edit/{id}', ['as' => 'news', 'uses' => 'NewsController@edit']);
Route::get('/news/edit/{id}/', ['as' => 'news', 'uses' => 'NewsController@edit']);
Route::get('/news/new', ['as' => 'news', 'uses' => 'NewsController@newOne']);
Route::get('/news/new/', ['as' => 'news', 'uses' => 'NewsController@newOne']);
Route::get('/news/delete', ['as' => 'news', 'uses' => 'NewsController@delete']);
Route::get('/news/delete/', ['as' => 'news', 'uses' => 'NewsController@delete']);
Route::get('/news/delete/{id}', ['as' => 'news', 'uses' => 'NewsController@delete']);
Route::get('/news/delete/{id}/', ['as' => 'news', 'uses' => 'NewsController@delete']);

/**
* Course routing
*/
Route::get('/course', ['as' => 'course', 'uses' => 'CourseController@index']);
Route::get('/course', ['as' => 'course', 'uses' => 'CourseController@index']);
Route::get('/course/index', ['as' => 'course', 'uses' => 'CourseController@index']);
Route::get('/course/index/', ['as' => 'course', 'uses' => 'CourseController@index']);
Route::get('/course/view', ['as' => 'course', 'uses' => 'CourseController@view']);//do poprawy
Route::get('/course/view/', ['as' => 'course', 'uses' => 'CourseController@view']);//do poprawy
Route::get('/course/view/{id}', ['as' => 'course', 'uses' => 'CourseController@view']);
Route::get('/course/view/{id}/', ['as' => 'course', 'uses' => 'CourseController@view']);
Route::get('/course/edit', ['as' => 'course', 'uses' => 'CourseController@index']);
Route::get('/course/edit/', ['as' => 'course', 'uses' => 'CourseController@index']);
Route::get('/course/edit/{id}', ['as' => 'course', 'uses' => 'CourseController@edit']);
Route::get('/course/edit/{id}/', ['as' => 'course', 'uses' => 'CourseController@edit']);
Route::get('/course/new', ['as' => 'course', 'uses' => 'CourseController@newOne']);
Route::get('/course/new/', ['as' => 'course', 'uses' => 'CourseController@newOne']);
Route::get('/course/delete', ['as' => 'course', 'uses' => 'CourseController@delete']);
Route::get('/course/delete/', ['as' => 'course', 'uses' => 'CourseController@delete']);
Route::get('/course/delete/{id}', ['as' => 'course', 'uses' => 'CourseController@delete']);
Route::get('/course/delete/{id}/', ['as' => 'course', 'uses' => 'CourseController@delete']);

/**
* Lecture routing
*/
Route::get('/lecture', ['as' => 'lecture', 'uses' => 'LectureController@index']);
Route::get('/lecture', ['as' => 'lecture', 'uses' => 'LectureController@index']);
Route::get('/lecture/index', ['as' => 'lecture', 'uses' => 'LectureController@index']);
Route::get('/lecture/index/', ['as' => 'lecture', 'uses' => 'LectureController@index']);
Route::get('/lecture/view', ['as' => 'lecture', 'uses' => 'LectureController@view']);//do poprawy
Route::get('/lecture/view/', ['as' => 'lecture', 'uses' => 'LectureController@view']);//do poprawy
Route::get('/lecture/view/{id}', ['as' => 'lecture', 'uses' => 'LectureController@view']);
Route::get('/lecture/view/{id}/', ['as' => 'lecture', 'uses' => 'LectureController@view']);
Route::get('/lecture/edit', ['as' => 'lecture', 'uses' => 'LectureController@index']);
Route::get('/lecture/edit/', ['as' => 'lecture', 'uses' => 'LectureController@index']);
Route::get('/lecture/edit/{id}', ['as' => 'lecture', 'uses' => 'LectureController@edit']);
Route::get('/lecture/edit/{id}/', ['as' => 'lecture', 'uses' => 'LectureController@edit']);
Route::get('/lecture/new', ['as' => 'lecture', 'uses' => 'LectureController@newOne']);
Route::get('/lecture/new/', ['as' => 'lecture', 'uses' => 'LectureController@newOne']);
Route::get('/lecture/delete', ['as' => 'lecture', 'uses' => 'LectureController@delete']);
Route::get('/lecture/delete/', ['as' => 'lecture', 'uses' => 'LectureController@delete']);
Route::get('/lecture/delete/{id}', ['as' => 'lecture', 'uses' => 'LectureController@delete']);
Route::get('/lecture/delete/{id}/', ['as' => 'lecture', 'uses' => 'LectureController@delete']);

/**
* Exercise routing
*/
Route::get('/exercise', ['as' => 'exercise', 'uses' => 'ExerciseController@index']);
Route::get('/exercise', ['as' => 'exercise', 'uses' => 'ExerciseController@index']);
Route::get('/exercise/index', ['as' => 'exercise', 'uses' => 'ExerciseController@index']);
Route::get('/exercise/index/', ['as' => 'exercise', 'uses' => 'ExerciseController@index']);
Route::get('/exercise/view', ['as' => 'exercise', 'uses' => 'ExerciseController@view']);//do poprawy
Route::get('/exercise/view/', ['as' => 'exercise', 'uses' => 'ExerciseController@view']);//do poprawy
Route::get('/exercise/view/{id}', ['as' => 'exercise', 'uses' => 'ExerciseController@view']);
Route::get('/exercise/view/{id}/', ['as' => 'exercise', 'uses' => 'ExerciseController@view']);
Route::get('/exercise/edit', ['as' => 'exercise', 'uses' => 'ExerciseController@index']);
Route::get('/exercise/edit/', ['as' => 'exercise', 'uses' => 'ExerciseController@index']);
Route::get('/exercise/edit/{id}', ['as' => 'exercise', 'uses' => 'ExerciseController@edit']);
Route::get('/exercise/edit/{id}/', ['as' => 'exercise', 'uses' => 'ExerciseController@edit']);
Route::get('/exercise/new', ['as' => 'exercise', 'uses' => 'ExerciseController@newOne']);
Route::get('/exercise/new/', ['as' => 'exercise', 'uses' => 'ExerciseController@newOne']);
Route::get('/exercise/delete', ['as' => 'exercise', 'uses' => 'ExerciseController@delete']);
Route::get('/exercise/delete/', ['as' => 'exercise', 'uses' => 'ExerciseController@delete']);
Route::get('/exercise/delete/{id}', ['as' => 'exercise', 'uses' => 'ExerciseController@delete']);
Route::get('/exercise/delete/{id}/', ['as' => 'exercise', 'uses' => 'ExerciseController@delete']);
Route::get('/exercise/generateExam', ['as' => 'exercise', 'uses' => 'ExerciseController@index']);
Route::get('/exercise/generateExam/', ['as' => 'exercise', 'uses' => 'ExerciseController@index']);
Route::get('/exercise/generateExam/{id}', ['as' => 'exercise', 'uses' => 'ExerciseController@generateExam']);
Route::get('/exercise/generateExam/{id}/', ['as' => 'exercise', 'uses' => 'ExerciseController@generateExam']);

/**
* Attachment routing
*/
Route::get('/attachment', ['as' => 'attachment', 'uses' => 'AttachmentController@index']);
Route::get('/attachment', ['as' => 'attachment', 'uses' => 'AttachmentController@index']);
Route::get('/attachment/index', ['as' => 'attachment', 'uses' => 'AttachmentController@index']);
Route::get('/attachment/index/', ['as' => 'attachment', 'uses' => 'AttachmentController@index']);
Route::get('/attachment/view', ['as' => 'attachment', 'uses' => 'AttachmentController@index']);
Route::get('/attachment/view/', ['as' => 'attachment', 'uses' => 'AttachmentController@index']);
Route::get('/attachment/view/{id}', ['as' => 'attachment', 'uses' => 'AttachmentController@view']);
Route::get('/attachment/view/{id}/', ['as' => 'attachment', 'uses' => 'AttachmentController@view']);
Route::get('/attachment/edit', ['as' => 'attachment', 'uses' => 'AttachmentController@index']);
Route::get('/attachment/edit/', ['as' => 'attachment', 'uses' => 'AttachmentController@index']);
Route::get('/attachment/edit/{id}', ['as' => 'attachment', 'uses' => 'AttachmentController@edit']);
Route::get('/attachment/edit/{id}/', ['as' => 'attachment', 'uses' => 'AttachmentController@edit']);
Route::get('/attachment/new', ['as' => 'attachment', 'uses' => 'AttachmentController@newOne']);
Route::get('/attachment/new/', ['as' => 'attachment', 'uses' => 'AttachmentController@newOne']);
Route::get('/attachment/delete', ['as' => 'attachment', 'uses' => 'AttachmentController@delete']);
Route::get('/attachment/delete/', ['as' => 'attachment', 'uses' => 'AttachmentController@delete']);
Route::get('/attachment/delete/{id}', ['as' => 'attachment', 'uses' => 'AttachmentController@delete']);
Route::get('/attachment/delete/{id}/', ['as' => 'attachment', 'uses' => 'AttachmentController@delete']);

/**
* Student routing
*/
Route::get('/student', ['as' => 'student', 'uses' => 'StudentController@index']);
Route::get('/student', ['as' => 'student', 'uses' => 'StudentController@index']);
Route::get('/student/index', ['as' => 'student', 'uses' => 'StudentController@index']);
Route::get('/student/index/', ['as' => 'student', 'uses' => 'StudentController@index']);
Route::get('/student/view', ['as' => 'student', 'uses' => 'StudentController@index']);
Route::get('/student/view/', ['as' => 'student', 'uses' => 'StudentController@index']);
Route::get('/student/view/{id}', ['as' => 'student', 'uses' => 'StudentController@view']);
Route::get('/student/view/{id}/', ['as' => 'student', 'uses' => 'StudentController@view']);
Route::get('/student/delete', ['as' => 'student', 'uses' => 'StudentController@delete']); //do poprawy
Route::get('/student/delete/', ['as' => 'student', 'uses' => 'StudentController@delete']);//do poprawy
Route::get('/student/delete/{id}', ['as' => 'student', 'uses' => 'StudentController@delete']);
Route::get('/student/delete/{id}/', ['as' => 'student', 'uses' => 'StudentController@delete']);

/**
* tag routing
*/
Route::get('/tag', ['as' => 'tag', 'uses' => 'TagController@index']);
Route::get('/tag', ['as' => 'tag', 'uses' => 'TagController@index']);
Route::get('/tag/index', ['as' => 'tag', 'uses' => 'TagController@index']);
Route::get('/tag/index/', ['as' => 'tag', 'uses' => 'TagController@index']);
Route::get('/tag/view', ['as' => 'tag', 'uses' => 'TagController@index']);
Route::get('/tag/view/', ['as' => 'tag', 'uses' => 'TagController@index']);
Route::get('/tag/view/{id}', ['as' => 'tag', 'uses' => 'TagController@view']);
Route::get('/tag/view/{id}/', ['as' => 'tag', 'uses' => 'TagController@view']);
Route::get('/tag/edit', ['as' => 'tag', 'uses' => 'TagController@index']);
Route::get('/tag/edit/', ['as' => 'tag', 'uses' => 'TagController@index']);
Route::get('/tag/edit/{id}', ['as' => 'tag', 'uses' => 'TagController@edit']);
Route::get('/tag/edit/{id}/', ['as' => 'tag', 'uses' => 'TagController@edit']);
Route::get('/tag/new', ['as' => 'tag', 'uses' => 'TagController@newOne']);
Route::get('/tag/new/', ['as' => 'tag', 'uses' => 'TagController@newOne']);
Route::get('/tag/delete', ['as' => 'tag', 'uses' => 'TagController@delete']);
Route::get('/tag/delete/', ['as' => 'tag', 'uses' => 'TagController@delete']);
Route::get('/tag/delete/{id}', ['as' => 'tag', 'uses' => 'TagController@delete']);
Route::get('/tag/delete/{id}/', ['as' => 'tag', 'uses' => 'TagController@delete']);
