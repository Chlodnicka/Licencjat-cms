<?php

/**
 * Routing for application
 */

/**
* Main page
*/
Route::get('/', ['as' => 'homepage', 'uses' => 'HomeController@showMainPage']);


/**
* Owner routing
*/
Route::get('/owner', ['as' => 'owner.index', 'uses' => 'OwnerController@index']);
Route::get('/owner/index', ['uses' => 'OwnerController@index']);
Route::get('/owner/index/', ['uses' => 'OwnerController@index']);
Route::get('/owner/edit', ['as' => 'owner.edit', 'uses' => 'OwnerController@edit']);
Route::get('/owner/edit/', ['uses' => 'OwnerController@edit']);
Route::post('/owner/edit', ['as' => 'owner.update', 'uses' => 'OwnerController@update']);
Route::post('/owner/edit/', ['uses' => 'OwnerController@update']);

/**
* News routing
*/
Route::get('/news', ['as' => 'news.index', 'uses' => 'NewsController@index']);
Route::get('/news/', ['uses' => 'NewsController@index']);
Route::get('/news/index', ['uses' => 'NewsController@index']);
Route::get('/news/index/', ['uses' => 'NewsController@index']);
Route::get('/news/index/{id}', ['uses' => 'NewsController@indexByCourses']);
Route::get('/news/index/{id}/', ['uses' => 'NewsController@indexByCourses']);
Route::get('/news/view', ['uses' => 'NewsController@index']);
Route::get('/news/view/', ['uses' => 'NewsController@index']);
Route::get('/news/view/{id}', ['as' => 'news.view', 'uses' => 'NewsController@view']);
Route::get('/news/view/{id}/', ['uses' => 'NewsController@view']);
Route::get('/news/edit', ['uses' => 'NewsController@index']);
Route::get('/news/edit/', ['uses' => 'NewsController@index']);
Route::get('/news/edit/{id}', ['as' => 'news.edit', 'uses' => 'NewsController@edit']);
Route::get('/news/edit/{id}/', ['uses' => 'NewsController@edit']);
Route::post('/news/edit/{id}', ['as' => 'news.update', 'uses' => 'NewsController@update']);
Route::post('/news/edit/{id}/', ['uses' => 'NewsController@update']);
Route::get('/news/new', ['as' => 'news.new', 'uses' => 'NewsController@newOne']);
Route::get('/news/new/', ['uses' => 'NewsController@newOne']);
Route::post('/news/new', ['as' => 'news.create', 'uses' => 'NewsController@create']);
Route::post('/news/new/', ['uses' => 'NewsController@create']);
Route::get('/news/delete', ['uses' => 'NewsController@index']);
Route::get('/news/delete/', ['uses' => 'NewsController@index']);
Route::get('/news/delete/{id}', ['as' => 'news.delete', 'uses' => 'NewsController@delete']);
Route::get('/news/delete/{id}/', ['uses' => 'NewsController@delete']);
Route::post('/news/delete/{id}', ['as' => 'news.destroy', 'uses' => 'NewsController@destroy']);
Route::post('/news/delete/{id}/', ['uses' => 'NewsController@destroy']);

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
Route::get('/course/edit', ['uses' => 'CourseController@index']);
Route::get('/course/edit/', ['uses' => 'CourseController@index']);
Route::get('/course/edit/{id}', ['as' => 'course.edit', 'uses' => 'CourseController@edit']);
Route::get('/course/edit/{id}/', ['uses' => 'CourseController@edit']);
Route::post('/course/edit/{id}/', ['as' => 'course.update', 'uses' => 'CourseController@update']);
Route::post('/course/edit/{id}/', ['uses' => 'CourseController@update']);
Route::get('/course/new', ['as' => 'course.new', 'uses' => 'CourseController@newOne']);
Route::get('/course/new/', ['uses' => 'CourseController@newOne']);
Route::post('/course/new', ['as' => 'course.create', 'uses' => 'CourseController@create']);
Route::post('/course/new/', ['uses' => 'CourseController@create']);
Route::get('/course/delete', ['uses' => 'CourseController@delete']);
Route::get('/course/delete/', ['uses' => 'CourseController@delete']);
Route::get('/course/delete/{id}', ['as' => 'course.delete', 'uses' => 'CourseController@delete']);
Route::get('/course/delete/{id}/', ['uses' => 'CourseController@delete']);
Route::post('/course/delete/{id}', ['as' => 'course.destroy', 'uses' => 'CourseController@destroy']);
Route::post('/course/delete/{id}/', ['uses' => 'CourseController@destroy']);

/**
* Lecture routing
*/
Route::get('/lecture/new', ['as' => 'lecture.new', 'uses' => 'LectureController@newOne']);
Route::get('/lecture/new/', ['uses' => 'LectureController@newOne']);
Route::post('/lecture/new', ['as' => 'lecture.create', 'uses' => 'LectureController@create']);
Route::post('/lecture/new/', ['uses' => 'LectureController@create']);
Route::get('/lecture', ['as' => 'lecture.index', 'uses' => 'LectureController@index']);
Route::get('/lecture', ['uses' => 'LectureController@index']);
Route::get('/lecture/index', ['uses' => 'LectureController@index']);
Route::get('/lecture/index/', ['uses' => 'LectureController@index']);
Route::get('/lecture/{id}', [ 'as'=> 'lecture.indexCourse', 'uses' => 'LectureController@indexLecturesByCourses']);
Route::get('/lecture/{id}/', ['uses' => 'LectureController@indexLecturesByCourses']);
Route::get('/lecture/index/{id}', ['uses' => 'LectureController@indexLecturesByCourses']);
Route::get('/lecture/index/{id}/', ['uses' => 'LectureController@indexLecturesByCourses']);
Route::get('/lecture/view', ['uses' => 'LectureController@index']);//do poprawy
Route::get('/lecture/view/', ['uses' => 'LectureController@index']);//do poprawy
Route::get('/lecture/view/{id}', ['as' => 'lecture.view', 'uses' => 'LectureController@view']);//id
Route::get('/lecture/view/{id}/', ['uses' => 'LectureController@view']);
Route::get('/lecture/edit', ['uses' => 'LectureController@index']);
Route::get('/lecture/edit/', ['uses' => 'LectureController@index']);
Route::get('/lecture/edit/{id}', ['as' => 'lecture.edit', 'uses' => 'LectureController@edit']);
Route::get('/lecture/edit/{id}/', ['uses' => 'LectureController@edit']);
Route::post('/lecture/edit/{id}', ['as' => 'lecture.update', 'uses' => 'LectureController@update']);
Route::post('/lecture/edit/{id}/', ['uses' => 'LectureController@update']);
Route::get('/lecture/delete', ['uses' => 'LectureController@index']);
Route::get('/lecture/delete/', ['uses' => 'LectureController@index']);
Route::get('/lecture/delete/{id}', ['as' => 'lecture.delete', 'uses' => 'LectureController@delete']);
Route::get('/lecture/delete/{id}/', ['uses' => 'LectureController@delete']);
Route::post('/lecture/delete/{id}', ['as' => 'lecture.destroy', 'uses' => 'LectureController@destroy']);
Route::post('/lecture/delete/{id}/', ['uses' => 'LectureController@destroy']);


/**
* Exercise routing
*/
Route::get('/exercise/new', ['as' => 'exercise.new', 'uses' => 'ExerciseController@newOne']);
Route::get('/exercise/new/', ['uses' => 'ExerciseController@newOne']);
Route::post('/exercise/new/', ['as'=> 'exercise.create', 'uses' => 'ExerciseController@create']);
Route::post('/exercise/new/', ['uses' => 'ExerciseController@create']);
Route::get('/exercise/generate/{id}', ['as' => 'exercise.generate', 'uses' => 'ExerciseController@generate']);
Route::get('/exercise/generate/{id}/', ['uses' => 'ExerciseController@generate']);
Route::post('/exercise/generate/{id}', ['as' => 'exercise.generate', 'uses' => 'ExerciseController@generate']);
Route::post('/exercise/generate/{id}/', ['uses' => 'ExerciseController@generate']);
Route::post('/exercise/generateByInput', ['as' => 'exercise.generateByInput', 'uses' => 'ExerciseController@generateByInput']);
Route::post('/exercise/generateByInput/', ['uses' => 'ExerciseController@generateByInput']);
Route::post('/exercise/search', ['as'=>'exercise.search', 'uses' => 'ExerciseController@search']);
Route::post('/exercise/search/', ['uses' => 'ExerciseController@search']);
Route::get('/exercise/lecture', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/lecture/', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/lecture/{id}', ['as'=>'exercise.indexLecture', 'uses' => 'ExerciseController@indexExerciseByLecture']);
Route::get('/exercise/lecture/{id}/', ['uses' => 'ExerciseController@indexExerciseByLecture']);
Route::get('/exercise/difficulty', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/difficulty/', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/difficulty/{id}', ['as'=>'exercise.indexDifficulty', 'uses' => 'ExerciseController@indexExerciseByDifficulty']);
Route::get('/exercise/difficulty/{id}/', ['uses' => 'ExerciseController@indexExerciseByDifficulty']);
Route::get('/exercise/view', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/view/', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/view/{id}', ['as' => 'exercise.view', 'uses' => 'ExerciseController@view']);
Route::get('/exercise/view/{id}/', ['uses' => 'ExerciseController@view']);
Route::get('/exercise/edit', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/edit/', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/edit/{id}', ['as' => 'exercise.edit', 'uses' => 'ExerciseController@edit']);
Route::get('/exercise/edit/{id}/', ['uses' => 'ExerciseController@edit']);
Route::post('/exercise/edit/{id}/', ['as'=> 'exercise.update','uses' => 'ExerciseController@update']);
Route::post('/exercise/edit/{id}/', ['uses' => 'ExerciseController@update']);
Route::get('/exercise/delete', ['uses' => 'ExerciseController@delete']);
Route::get('/exercise/delete/', ['uses' => 'ExerciseController@delete']);
Route::get('/exercise/delete/{id}', ['as' => 'exercise.delete', 'uses' => 'ExerciseController@delete']);
Route::get('/exercise/delete/{id}/', ['uses' => 'ExerciseController@delete']);
Route::post('/exercise/delete/{id}', ['as' => 'exercise.destroy', 'uses' => 'ExerciseController@destroy']);
Route::post('/exercise/delete/{id}/', ['uses' => 'ExerciseController@destroy']);
Route::get('/exercise', ['as' => 'exercise.index', 'uses' => 'ExerciseController@index']);
Route::get('/exercise', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/index', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/index/', ['uses' => 'ExerciseController@index']);
Route::get('/exercise/{id}', ['as'=>'exercise.indexCourse', 'uses' => 'ExerciseController@indexExerciseByCourse']);
Route::get('/exercise/{id}/', ['uses' => 'ExerciseController@indexExerciseByCourse']);
Route::get('/exercise/index/{id}', ['uses' => 'ExerciseController@indexExerciseByCourse']);
Route::get('/exercise/index/{id}/', ['uses' => 'ExerciseController@indexExerciseByCourse']);

/**
* Attachment routing
*/
Route::get('/attachment', ['as' => 'attachment.index', 'uses' => 'AttachmentController@index']);
Route::get('/attachment', ['uses' => 'AttachmentController@index']);
Route::get('/attachment/index', ['uses' => 'AttachmentController@index']);
Route::get('/attachment/index/', ['uses' => 'AttachmentController@index']);
Route::get('/attachment/view', ['uses' => 'AttachmentController@index']);
Route::get('/attachment/view/', ['as' => 'attachment', 'uses' => 'AttachmentController@index']);
Route::get('/attachment/view/{id}', ['as' => 'attachment.view', 'uses' => 'AttachmentController@view']);
Route::get('/attachment/view/{id}/', ['uses' => 'AttachmentController@view']);
Route::get('/attachment/edit', ['uses' => 'AttachmentController@index']);
Route::get('/attachment/edit/', ['uses' => 'AttachmentController@index']);
Route::get('/attachment/edit/{id}', ['as' => 'attachment.edit', 'uses' => 'AttachmentController@edit']);
Route::get('/attachment/edit/{id}/', ['uses' => 'AttachmentController@edit']);
Route::post('/attachment/edit/{id}', ['as' => 'attachment.update', 'uses' => 'AttachmentController@update']);
Route::post('/attachment/edit/{id}/', ['uses' => 'AttachmentController@update']);
Route::get('/attachment/new', ['as' => 'attachment.new', 'uses' => 'AttachmentController@newOne']);
Route::get('/attachment/new/', ['uses' => 'AttachmentController@newOne']);
Route::post('/attachment/new', ['as' => 'attachment.create', 'uses' => 'AttachmentController@create']);
Route::post('/attachment/new/', ['uses' => 'AttachmentController@create']);
Route::get('/attachment/delete', ['uses' => 'AttachmentController@index']);
Route::get('/attachment/delete/', ['uses' => 'AttachmentController@index']);
Route::get('/attachment/delete/{id}', ['as' => 'attachment.delete', 'uses' => 'AttachmentController@delete']);
Route::get('/attachment/delete/{id}/', ['uses' => 'AttachmentController@delete']);
Route::post('/attachment/delete/{id}', ['as' => 'attachment.destroy', 'uses' => 'AttachmentController@destroy']);
Route::post('/attachment/delete/{id}/', ['uses' => 'AttachmentController@destroy']);

/**
* Student routing
*/
Route::get('/student/new', ['as' => 'student.new', 'uses' => 'StudentController@newOne']);
Route::get('/student/new/', ['uses' => 'StudentController@newOne']);
Route::post('/student/new', ['as' => 'student.create', 'uses' => 'StudentController@create']);
Route::post('/student/new/', ['uses' => 'StudentController@create']);
Route::get('/student', ['as' => 'student.index', 'uses' => 'StudentController@index']);
Route::get('/student', ['uses' => 'StudentController@index']);
Route::get('/student/index', ['uses' => 'StudentController@index']);
Route::get('/student/index/', ['uses' => 'StudentController@index']);
Route::get('/student/{id}', ['as' => 'student.indexByCourses', 'uses' => 'StudentController@indexByCourses']);
Route::get('/student/{id}/', ['uses' => 'StudentController@indexByCourses']);
Route::get('/student/view', ['uses' => 'StudentController@index']); //do poprawy
Route::get('/student/view/', ['uses' => 'StudentController@index']); //do poprawy
Route::get('/student/view/{id}', ['as' => 'student.view', 'uses' => 'StudentController@view']);
Route::get('/student/view/{id}/', ['uses' => 'StudentController@view']);
Route::get('/student/edit', ['uses' => 'StudentController@index']);
Route::get('/student/edit/', ['uses' => 'StudentController@index']);
Route::post('/student/edit', ['uses' => 'StudentController@index']);
Route::post('/student/edit/', ['uses' => 'StudentController@index']);
Route::get('/student/edit/{id}', ['as' => 'student.edit', 'uses' => 'StudentController@edit']);
Route::get('/student/edit/{id}/', ['uses' => 'StudentController@edit']);
Route::post('/student/edit/{id}', ['as' => 'student.update', 'uses' => 'StudentController@update']);
Route::post('/student/edit/{id}/', ['uses' => 'StudentController@update']);
Route::get('/student/delete', ['uses' => 'StudentController@index']); //do poprawy
Route::get('/student/delete/', ['uses' => 'StudentController@index']);//do poprawy
Route::get('/student/delete/{id}', ['as' => 'student.delete', 'uses' => 'StudentController@delete']);
Route::get('/student/delete/{id}/', ['uses' => 'StudentController@delete']);
Route::post('/student/destroy', ['uses' => 'StudentController@index']); //do poprawy
Route::post('/student/destroy/', ['uses' => 'StudentController@index']);//do poprawy
Route::post('/student/destroy/{id}', ['as' => 'student.destroy', 'uses' => 'StudentController@destroy']);
Route::post('/student/destroy/{id}/', ['uses' => 'StudentController@destroy']);

/**
* Tag routing
*/
Route::get('/tag', ['as' => 'tag.index', 'uses' => 'TagController@index']);
Route::get('/tag', ['uses' => 'TagController@index']);
Route::get('/tag/index', ['uses' => 'TagController@index']);
Route::get('/tag/index/', ['uses' => 'TagController@index']);
Route::get('/tag/view', ['uses' => 'TagController@index']);
Route::get('/tag/view/', ['uses' => 'TagController@index']);
Route::get('/tag/view/{id}', ['as' => 'tag.view', 'uses' => 'TagController@view']);
Route::get('/tag/view/{id}/', ['uses' => 'TagController@view']);
Route::get('/tag/edit', ['uses' => 'TagController@index']);
Route::get('/tag/edit/', ['uses' => 'TagController@index']);
Route::get('/tag/edit/{id}', ['as' => 'tag.edit', 'uses' => 'TagController@edit']);
Route::get('/tag/edit/{id}/', ['uses' => 'TagController@edit']);
Route::post('/tag/edit/{id}', ['as' => 'tag.update', 'uses' => 'TagController@update']);
Route::post('/tag/edit/{id}/', ['uses' => 'TagController@update']);
Route::get('/tag/new', ['as' => 'tag.new', 'uses' => 'TagController@newOne']);
Route::get('/tag/new/', ['uses' => 'TagController@newOne']);
Route::post('/tag/new', ['as' => 'tag.create', 'uses' => 'TagController@create']);
Route::post('/tag/new/', ['uses' => 'TagController@create']);
Route::get('/tag/delete', ['uses' => 'TagController@index']);
Route::get('/tag/delete/', ['uses' => 'TagController@index']);
Route::get('/tag/delete/{id}', ['as' => 'tag.delete', 'uses' => 'TagController@delete']);
Route::get('/tag/delete/{id}/', ['uses' => 'TagController@delete']);
Route::post('/tag/delete/{id}/', ['as' => 'tag.destroy', 'uses' => 'TagController@destroy']);
Route::post('/tag/delete/{id}/', ['uses' => 'TagController@destroy']);

/*
 * Search routing
 */

Route::post('/search', ['as' => 'search.index', 'uses' => 'SearchController@index']);
Route::post('/search/', ['uses' => 'SearchController@index']);


/*
 * Tree structure of service routing
 */

Route::get('/tree', ['as' => 'tree.index', 'uses' => 'TreeController@index']);
Route::get('/tree/', ['uses' => 'TreeController@index']);
Route::get('/tree/owner/{id}', ['as' => 'tree.owner', 'uses' => 'TreeController@show']);
Route::get('/tree/owner/{id}/', ['uses' => 'TreeController@show']);
Route::post('/tree/owner/{id}', ['as' => 'tree.owner', 'uses' => 'TreeController@edit']);
Route::post('/tree/owner/{id}/', ['uses' => 'TreeController@edit']);
Route::get('/tree/students/{id}', ['as' => 'tree.students', 'uses' => 'TreeController@show']);
Route::get('/tree/students/{id}/', ['uses' => 'TreeController@show']);
Route::post('/tree/students/{id}', ['as' => 'tree.students', 'uses' => 'TreeController@edit']);
Route::post('/tree/students/{id}/', ['uses' => 'TreeController@edit']);
Route::get('/tree/courses/{id}', ['as' => 'tree.courses', 'uses' => 'TreeController@show']);
Route::get('/tree/courses/{id}/', ['uses' => 'TreeController@show']);
Route::post('/tree/courses/{id}', ['as' => 'tree.courses', 'uses' => 'TreeController@edit']);
Route::post('/tree/courses/{id}/', ['uses' => 'TreeController@edit']);
Route::get('/tree/news/{id}', ['as' => 'tree.news', 'uses' => 'TreeController@show']);
Route::get('/tree/news/{id}/', ['uses' => 'TreeController@show']);
Route::post('/tree/news/{id}', ['as' => 'tree.news', 'uses' => 'TreeController@edit']);
Route::post('/tree/news/{id}/', ['uses' => 'TreeController@edit']);
Route::get('/tree/lectures/{id}', ['as' => 'tree.lectures', 'uses' => 'TreeController@show']);
Route::get('/tree/lectures/{id}/', ['uses' => 'TreeController@show']);
Route::post('/tree/lectures/{id}', ['as' => 'tree.lectures', 'uses' => 'TreeController@edit']);
Route::post('/tree/lectures/{id}/', ['uses' => 'TreeController@edit']);
Route::get('/tree/exercises/{id}', ['as' => 'tree.exercises', 'uses' => 'TreeController@show']);
Route::get('/tree/exercises/{id}/', ['uses' => 'TreeController@show']);
Route::post('/tree/exercises/{id}', ['as' => 'tree.exercises', 'uses' => 'TreeController@edit']);
Route::post('/tree/exercises/{id}/', ['uses' => 'TreeController@edit']);

/**
 * Dynamically loading menu settings
 */

View::composer('layouts.master', function($view){
    $tree = Tree::menu();
    $courses = Course::all();
    $coursesSide = $courses;
    $owner = Owner::findOrFail(1);
    $view->with(array(
        'tree' => $tree,
        'courses' => $courses,
        'coursesSide' => $coursesSide,
        'owner' => $owner,
    ));
});

/*
 * Ajax routes helpers
 */

Route::get('api/dropdown', function(){
    $id = Input::get('courses');
    $lectures = DB::table('lectures')->where('course_id', '=', $id)->get();
    return $lectures;
});