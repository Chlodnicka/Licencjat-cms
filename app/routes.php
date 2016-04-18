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
Route::get('/owner', ['as' => 'owner.index', 'uses' => 'OwnerController@index']);
Route::get('/owner/index', ['uses' => 'OwnerController@index']);
Route::get('/owner/index/', ['uses' => 'OwnerController@index']);
Route::match(array('GET','POST'), '/owner/edit', ['as' => 'owner.edit', 'uses' => 'OwnerController@edit']);
Route::match(array('GET','POST'), '/owner/edit/', ['uses' => 'OwnerController@edit']);
Route::match(array('GET','POST'), '/owner/new', ['as' => 'owner.new', 'uses' => 'OwnerController@newOne']);
Route::match(array('GET','POST'), '/owner/new/', ['uses' => 'OwnerController@newOne']);

/**
* News routing
*/
Route::get('/news', ['as' => 'news.index', 'uses' => 'NewsController@index']);
Route::get('/news/index', ['uses' => 'NewsController@index']);
Route::get('/news/index/', ['uses' => 'NewsController@index']);
Route::get('/news/view', ['as' => 'news.view', 'uses' => 'NewsController@view']);//do poprawy
Route::get('/news/view/', ['uses' => 'NewsController@view']);//do poprawy
Route::get('/news/view/', ['uses' => 'NewsController@view']);//id
Route::get('/news/view/{id}/', ['uses' => 'NewsController@view']);
Route::get('/news/edit', ['uses' => 'NewsController@edit']);//do poprawy
Route::get('/news/edit/', ['uses' => 'NewsController@edit']); //do poprawy
Route::match(array('GET','POST'),'/news/edit/{id}', ['as' => 'news.edit', 'uses' => 'NewsController@edit']);
Route::match(array('GET','POST'),'/news/edit/{id}/', ['uses' => 'NewsController@edit']);
Route::match(array('GET','POST'),'/news/new', ['as' => 'news.new', 'uses' => 'NewsController@newOne']);
Route::match(array('GET','POST'),'/news/new/', ['uses' => 'NewsController@newOne']);
Route::get('/news/delete', ['uses' => 'NewsController@delete']);
Route::get('/news/delete/', ['uses' => 'NewsController@delete']);
Route::match(array('GET','POST'),'/news/delete/{id}', ['as' => 'news.delete', 'uses' => 'NewsController@delete']);
Route::match(array('GET','POST'),'/news/delete/{id}/', ['uses' => 'NewsController@delete']);

/**
* Course routing
*/
Route::get('/course', ['as' => 'course.index', 'uses' => 'CourseController@index']);
Route::get('/course', ['uses' => 'CourseController@index']);
Route::get('/course/index', ['uses' => 'CourseController@index']);
Route::get('/course/index/', ['uses' => 'CourseController@index']);
Route::get('/course/view', ['uses' => 'CourseController@index']);
Route::get('/course/view/', ['uses' => 'CourseController@index']);
Route::get('/course/view/{id}', ['as' => 'course.view', 'uses' => 'CourseController@view']);
Route::get('/course/view/{id}/', ['uses' => 'CourseController@view']);
Route::get('/course/edit', ['uses' => 'CourseController@edit']);
Route::get('/course/edit/', ['uses' => 'CourseController@edit']);
Route::get('/course/edit/{id}', ['as' => 'course.edit', 'uses' => 'CourseController@edit']);
Route::get('/course/edit/{id}/', ['uses' => 'CourseController@edit']);
Route::get('/course/new', ['as' => 'course', 'uses.new' => 'CourseController@newOne']);
Route::get('/course/new/', ['uses' => 'CourseController@newOne']);
Route::get('/course/delete', ['uses' => 'CourseController@delete']);
Route::get('/course/delete/', ['uses' => 'CourseController@delete']);
Route::get('/course/delete/{id}', ['as' => 'course.delete', 'uses' => 'CourseController@delete']);
Route::get('/course/delete/{id}/', ['uses' => 'CourseController@delete']);

/**
* Lecture routing
*/
Route::get('/lecture', ['as' => 'lecture.index', 'uses' => 'LectureController@index']);
Route::get('/lecture', ['uses' => 'LectureController@index']);
Route::get('/lecture/index', ['uses' => 'LectureController@index']);
Route::get('/lecture/index/', ['uses' => 'LectureController@index']);
Route::get('/lecture/view', ['uses' => 'LectureController@view']);//do poprawy
Route::get('/lecture/view/', ['uses' => 'LectureController@view']);//do poprawy
Route::get('/lecture/view/', ['as' => 'lecture.view', 'uses' => 'LectureController@view']);//id
Route::get('/lecture/view/{id}/', ['uses' => 'LectureController@view']);
Route::get('/lecture/edit', ['uses' => 'LectureController@edit']);
Route::get('/lecture/edit/', ['uses' => 'LectureController@edit']);
Route::get('/lecture/edit/{id}', ['as' => 'lecture.edit', 'uses' => 'LectureController@edit']);
Route::get('/lecture/edit/{id}/', ['uses' => 'LectureController@edit']);
Route::get('/lecture/new', ['as' => 'lecture.new', 'uses' => 'LectureController@newOne']);
Route::get('/lecture/new/', ['uses' => 'LectureController@newOne']);
Route::get('/lecture/delete', ['uses' => 'LectureController@delete']);
Route::get('/lecture/delete/', ['uses' => 'LectureController@delete']);
Route::get('/lecture/delete/{id}', ['as' => 'lecture.delete', 'uses' => 'LectureController@delete']);
Route::get('/lecture/delete/{id}/', ['uses' => 'LectureController@delete']);

/**
* Exercise routing
*/
Route::get('/exercise', ['as' => 'exercise.index', 'uses' => 'ExerciseController@index']);
Route::get('/exercise', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/index', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/index/', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/view', ['uses' => 'ExerciseController@view']);//do poprawy
Route::get('/exercise/view/', ['uses' => 'ExerciseController@view']);//do poprawy
Route::get('/exercise/view/{id}', ['as' => 'exercise.view', 'uses' => 'ExerciseController@view']);
Route::get('/exercise/view/{id}/', ['uses' => 'ExerciseController@view']);
Route::get('/exercise/edit', ['uses' => 'ExerciseController@edit']);
Route::get('/exercise/edit/', ['uses' => 'ExerciseController@edit']);
Route::get('/exercise/edit/{id}', ['as' => 'exercise.edit', 'uses' => 'ExerciseController@edit']);
Route::get('/exercise/edit/{id}/', ['uses' => 'ExerciseController@edit']);
Route::get('/exercise/new', ['as' => 'exercise.new', 'uses' => 'ExerciseController@newOne']);
Route::get('/exercise/new/', ['uses' => 'ExerciseController@newOne']);
Route::get('/exercise/delete', ['uses' => 'ExerciseController@delete']);
Route::get('/exercise/delete/', ['uses' => 'ExerciseController@delete']);
Route::get('/exercise/delete/{id}', ['as' => 'exercise.delete', 'uses' => 'ExerciseController@delete']);
Route::get('/exercise/delete/{id}/', ['uses' => 'ExerciseController@delete']);
Route::get('/exercise/generateExam', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/generateExam/', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/generateExam/{id}', ['as' => 'exercise.generate', 'uses' => 'ExerciseController@generateExam']);
Route::get('/exercise/generateExam/{id}/', ['uses' => 'ExerciseController@generateExam']);

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
Route::get('/student', ['as' => 'student.index', 'uses' => 'StudentController@index']);
Route::get('/student', ['uses' => 'StudentController@index']);
Route::get('/student/index', ['uses' => 'StudentController@index']);
Route::get('/student/index/', ['uses' => 'StudentController@index']);
Route::get('/student/view', ['uses' => 'StudentController@view']); //do poprawy
Route::get('/student/view/', ['uses' => 'StudentController@view']); //do poprawy
Route::get('/student/view/{id}', ['as' => 'student.view', 'uses' => 'StudentController@view']);
Route::get('/student/view/{id}/', ['uses' => 'StudentController@view']);
Route::get('/student/new', ['as' => 'student.new', 'uses' => 'StudentController@newOne']);
Route::get('/student/new/', ['uses' => 'StudentController@newOne']);
Route::get('/student/delete', ['uses' => 'StudentController@delete']); //do poprawy
Route::get('/student/delete/', ['uses' => 'StudentController@delete']);//do poprawy
Route::get('/student/delete/{id}', ['as' => 'student.delete', 'uses' => 'StudentController@delete']);
Route::get('/student/delete/{id}/', ['uses' => 'StudentController@delete']);

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
