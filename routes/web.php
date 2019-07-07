<?php
/*
|--------------------------------------------------------------------------
| Web Application Default Language
|--------------------------------------------------------------------------
|
*/
use Illuminate\Support\Facades\Session;
session(['locale'=> 'en']);
Route::get('locale/{locale}', function ($locale) {
    session(['locale'=> $locale]);
    return redirect()->back() ;
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('clear-cache', function() {
     Artisan::call('cache:clear');
     Artisan::call('config:clear');
    // return what you want
});

use App\Country;
Route::get('/cities/{id}', function($id){
    $country_cities = Country::find($id)->cities;
    return Response::json($country_cities);
});


Route::group([ 'middleware' =>  ['locale'] ], function() {
    Route::get('/','SharedControllers\HomeController@index');

    Route::get('{name}-page','SharedControllers\HomeController@page');
    Route::post('newsletter','SharedControllers\NewsLetterController@store');

    #/Event WebSite Routs /#
    Route::get('/online-events','SharedControllers\HomeController@online_events');
    Route::get('/offline-events','SharedControllers\HomeController@offline_events');
    Route::get('/event-details/{id}','SharedControllers\HomeController@event_details');

    #/Post WebSite Routs /#
    Route::get('/artical','SharedControllers\HomeController@articals');
    Route::get('/news','SharedControllers\HomeController@news');
    Route::get('/post-details/{id}','SharedControllers\HomeController@post_details');

    #/Courses WebSite Routs /#
    Route::get('/courses/{category?}','SharedControllers\HomeController@courses');
    Route::get('/course-details/{id}','SharedControllers\HomeController@course_details');
    Route::get('/course-enroll/{id}','SharedControllers\HomeController@course_enroll')->middleware('user');

    #/ videos #/
    Route::get('/videos','SharedControllers\HomeController@videos');


    #/ Comment #/
    Route::POST('post-comment/{post}','SharedControllers\CommentController@post_comment');
    Route::POST('event-comment/{event}','SharedControllers\CommentController@event_comment');
    Route::POST('course-comment/{course}','SharedControllers\CommentController@course_comment');

    #/Review #/
    Route::post('course/review','SharedControllers\HomeController@review_course');

    Route::get('error',function (){
        return view('error.ban');
    })->name('');



});

Route::group(['prefix' => 'admin'], function () {
    #/ Auth Routes/#
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout');
    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

    #/ Dashboard & Profile Routes/#
    Route::get('/','AdminControllers\DashboardController@index');
    Route::get('/profile','AdminControllers\DashboardController@profile');
    Route::post('/profile/update-personal-info','AdminControllers\DashboardController@updatePersonalInfo');
    Route::post('/profile/update-image','AdminControllers\DashboardController@updateImage');
    Route::post('/profile/update-password','AdminControllers\DashboardController@changePassword');
    Route::get('/profile/messages','AdminControllers\DashboardController@messages');
    Route::get('/profile/messages/chat/{message}','AdminControllers\DashboardController@chat');
    Route::post('/profile/messages/send-reply','AdminControllers\DashboardController@sendReply');
    Route::get('/profile/my-courses','AdminControllers\DashboardController@myCourses');
    Route::get('/profile/my-courses/course-topics/{course}','AdminControllers\DashboardController@myCourseDetails');
    Route::get('/profile/my-articles','AdminControllers\DashboardController@myArticles');
    Route::get('/profile/my-articles/{article}','AdminControllers\DashboardController@myArticleDetails');

    #/ Message Routes/#
    /* You can show this on index list [admin,instructor,user]*/
    Route::post('/admin-new-message','AdminControllers\DashboardController@newMessage')->middleware(['auth:admin','permission:Send Message To Admin']);
    Route::post('/admin-new-email','AdminControllers\DashboardController@newEmail')->middleware(['auth:admin','permission:Send Email To Admin']);
    Route::post('/instructor-new-message','AdminControllers\DashboardController@newMessage')->middleware(['auth:admin','permission:Send Message To Instructor']);
    Route::post('/instructor-new-email','AdminControllers\DashboardController@newEmail')->middleware(['auth:admin','permission:Send Email To Instructor']);
    Route::post('/student-new-message','AdminControllers\DashboardController@newMessage')->middleware(['auth:admin','permission:Send Message To Student']);
    Route::post('/student-new-email','AdminControllers\DashboardController@newEmail')->middleware(['auth:admin','permission:Send Email To Student']);
    /* You can show this on seperate page to select receiver email then send */
    Route::get('message/new','SharedControllers\MessageController@admin_new_message')->middleware(['auth:admin','permission:Send Message To Anyone']);
    Route::get('message/email','SharedControllers\MessageController@admin_email_message')->middleware(['auth:admin','permission:Send Email To Anyone']);
    Route::post('message/send-message','SharedControllers\MessageController@store')->middleware(['auth:admin','permission:Send Message To Anyone']);
    Route::post('message/send-email','SharedControllers\MessageController@new_email')->middleware(['auth:admin','permission:Send Email To Anyone']);


    #/ Export To Excel Routes/#
    Route::get('export', 'AdminControllers\AdminController@export')->middleware(['auth:admin','permission:Export Admin List']);
    Route::get('user/export', 'AdminControllers\UserController@export')->middleware(['auth:admin','permission:Export User List']);
    Route::get('course/export', 'AdminControllers\CourseController@export')->middleware(['auth:admin','permission:Export Courses List']);
    Route::get('instructor/export', 'AdminControllers\InstructorController@export')->middleware(['auth:admin','permission:Export Instructor List']);
    
    
    #/ NewsLetter /#
    Route::get('newsletter-subscribers','SharedControllers\NewsLetterController@index')->middleware(['auth:admin','permission:Show Newsletter Subscribers']);
    Route::get('unsubscribe/{email}','SharedControllers\NewsLetterController@unsubscribe')->middleware(['auth:admin','permission:Show Newsletter Subscribers']);

    #/ Ban Routes/#
    Route::get('/ban-{type}-{id}','AdminControllers\DashboardController@ban')->middleware(['auth:admin','permission:Ban Users']);
    Route::get('/unban-{type}-{id}','AdminControllers\DashboardController@unban')->middleware(['auth:admin','permission:Remove Ban']);

    #/ AdminRoutes/#
//    Route::resource('admin','AdminControllers\AdminController');
    Route::get('/admin', 'AdminControllers\AdminController@index')->middleware(['auth:admin','permission:show All Admin']);
    Route::get('/admin/create', 'AdminControllers\AdminController@create')->middleware(['auth:admin','permission:Add Admin']);
    Route::post('/admin', 'AdminControllers\AdminController@store')->middleware(['auth:admin','permission:Add Admin']);
    Route::get('/admin/{id}/edit', 'AdminControllers\AdminController@edit')->middleware(['auth:admin','permission:Edit Admin']);
    Route::post('/admin/{id}', 'AdminControllers\AdminController@update')->middleware(['auth:admin','permission:Edit Admin']);
    Route::get('/admin/{id}', 'AdminControllers\AdminController@destroy')->middleware(['auth:admin','permission:Delete Admin']);


    #/ InstructorRoutes/#
//    Route::resource('instructor','AdminControllers\InstructorController');
    Route::get('/instructor', 'AdminControllers\InstructorController@index')->middleware(['auth:admin','permission:Show All Instructors']);
    Route::get('/instructor/{id}', 'AdminControllers\InstructorController@destroy')->middleware(['auth:admin','permission:Delete Instructor']);


    #/ UserRoutes/#
//    Route::resource('user','AdminControllers\UserController');
    Route::get('/user', 'AdminControllers\UserController@index')->middleware(['auth:admin','permission:Show All Students']);
    Route::get('/user/{id}', 'AdminControllers\UserController@destroy')->middleware(['auth:admin','permission:Delete Student']);


    #/ Country Routes/#
//    Route::resource('countries','AdminControllers\CountryController');
    Route::get('/countries', 'AdminControllers\CountryController@index')->middleware(['auth:admin','permission:Show All Countries']);
    Route::get('/countries/create', 'AdminControllers\CountryController@create')->middleware(['auth:admin','permission:Add Country']);
    Route::post('/countries', 'AdminControllers\CountryController@store')->middleware(['auth:admin','permission:Add Country']);
    Route::get('/countries/{id}/edit', 'AdminControllers\CountryController@edit')->middleware(['auth:admin','permission:Edit Country']);
    Route::post('/countries/{id}', 'AdminControllers\CountryController@update')->middleware(['auth:admin','permission:Edit Country']);
    Route::get('/countries/{id}', 'AdminControllers\CountryController@destroy')->middleware(['auth:admin','permission:Delete Country']);

    Route::get('country-cities/{id}','AdminControllers\CountryController@show')->middleware(['auth:admin','permission:Show Country Cities']);
    Route::get('cities/country-{country}/create','AdminControllers\CityController@create')->middleware(['auth:admin','permission:Create City']);
    Route::post('cities/store','AdminControllers\CityController@store')->middleware(['auth:admin','permission:Create City']);
    Route::get('cities/country-{country}/edit/city-{city}','AdminControllers\CityController@edit')->middleware(['auth:admin','permission:Edit City']);
    Route::post('cities/update','AdminControllers\CityController@update')->middleware(['auth:admin','permission:Edit City']);
//    Route::resource('cities','AdminControllers\CityController', ['only' => ['destroy']]);
    Route::get('/cities/{id}', 'AdminControllers\CityController@destroy')->middleware(['auth:admin','permission:Delete City']);



    #/ Category Routes/#
//    Route::resource('category','AdminControllers\CategoryController');
    Route::get('/category', 'AdminControllers\CategoryController@index')->middleware(['auth:admin','permission:Show All Categories']);
    Route::get('/category/create', 'AdminControllers\CategoryController@create')->middleware(['auth:admin','permission:Add Category']);
    Route::post('/category', 'AdminControllers\CategoryController@store')->middleware(['auth:admin','permission:Add Category']);
    Route::get('/category/{id}/edit', 'AdminControllers\CategoryController@edit')->middleware(['auth:admin','permission:Edit Category']);
    Route::get('/category/{id}/show', 'AdminControllers\CategoryController@show')->middleware(['auth:admin','permission:Edit Category']);
    Route::post('/category/{id}', 'AdminControllers\CategoryController@update')->middleware(['auth:admin','permission:Edit Category']);
    Route::get('/category/{id}', 'AdminControllers\CategoryController@destroy')->middleware(['auth:admin','permission:Delete Category']);

    #/ TagRoutes/#
//    Route::resource('tag','AdminControllers\TagController');
    Route::get('/tag', 'AdminControllers\TagController@index')->middleware(['auth:admin','permission:Show All Tags']);
    Route::get('/tag/create', 'AdminControllers\TagController@create')->middleware(['auth:admin','permission:Add Tag']);
    Route::post('/tag', 'AdminControllers\TagController@store')->middleware(['auth:admin','permission:Add Tag']);
    Route::get('/tag/{id}/edit', 'AdminControllers\TagController@edit')->middleware(['auth:admin','permission:Edit Tag']);
    Route::post('/tag/{id}', 'AdminControllers\TagController@update')->middleware(['auth:admin','permission:Edit Tag']);
    Route::get('/tag/{id}', 'AdminControllers\TagController@destroy')->middleware(['auth:admin','permission:Delete Tag']);


    #/ CourseRoutes/#
//    Route::resource('course','AdminControllers\CourseController');
    Route::get('/course', 'AdminControllers\CourseController@index')->middleware(['auth:admin','permission:Show All Courses']);
    Route::get('/course/create', 'AdminControllers\CourseController@create')->middleware(['auth:admin','permission:Add Course']);
    Route::post('/course', 'AdminControllers\CourseController@store')->middleware(['auth:admin','permission:Add Course']);
    Route::get('/course/{id}/edit', 'AdminControllers\CourseController@edit')->middleware(['auth:admin','permission:Edit Course']);
    Route::post('/course/{id}', 'AdminControllers\CourseController@update')->middleware(['auth:admin','permission:Edit Course']);
    Route::get('/course/{id}', 'AdminControllers\CourseController@destroy')->middleware(['auth:admin','permission:Delete Course']);
    Route::get('course/courseStatus/{id}/{status}','AdminControllers\CourseController@courseStatus')->middleware(['auth:admin','permission:Accept/Reject Course']);
    Route::post('add-course-attachment','AdminControllers\CourseController@addAttachment')->middleware(['auth:admin','permission:Add Course Attachment']);
    Route::get('delete-course-attachment/{id}','AdminControllers\CourseController@destroyAttachment')->middleware(['auth:admin','permission:Delete Course Attachment']);
    #/ Course Topics Routes/#
    Route::get('course-topics/{id}','AdminControllers\CourseController@show')->middleware(['auth:admin','permission:Show Course Topics']);
    Route::get('topic/{country}/create','AdminControllers\TopicController@create')->middleware(['auth:admin','permission:Create Course Topic']);
    Route::post('topic/store','AdminControllers\TopicController@store')->middleware(['auth:admin','permission:Create Course Topic']);
    Route::get('topic/{course}/edit/topic-{topic}','AdminControllers\TopicController@edit')->middleware(['auth:admin','permission:Edit Course Topic']);;
    Route::post('topic/update','AdminControllers\TopicController@update')->middleware(['auth:admin','permission:Edit Course Topic']);;
//    Route::resource('topic','AdminControllers\TopicController', ['only' => ['destroy']]);
    Route::get('/topic/{id}', 'AdminControllers\TopicController@destroy')->middleware(['auth:admin','permission:Delete Course Topic']);


    #/ PostRoutes/#
    Route::get('post/postStatus/{id}/{status}','AdminControllers\PostController@postStatus')->middleware(['auth:admin','permission:Accept/Reject Articles and News']);
    Route::get('posts/{type}','AdminControllers\PostController@index')->middleware(['auth:admin','permission:Show Article and News']);
    Route::get('posts/{type}/create','AdminControllers\PostController@create')->middleware(['auth:admin','permission:Create Article or News']);
    Route::post('posts','AdminControllers\PostController@store')->middleware(['auth:admin','permission:Create Article or News']);
    Route::get('posts/{id}/edit','AdminControllers\PostController@edit')->middleware(['auth:admin','permission:Edit Article or News']);
    Route::post('posts/{id}','AdminControllers\PostController@update')->middleware(['auth:admin','permission:Edit Article or News']);
    Route::get('delete-posts/{id}','AdminControllers\PostController@destroy')->middleware(['auth:admin','permission:Delete Article or News']);

    #/ Requests Routes /#
    Route::get('requests/courses','AdminControllers\CourseController@requests')->middleware(['auth:admin','permission:Show Courses Requests']);
    Route::get('requests/articles','AdminControllers\PostController@requests')->middleware(['auth:admin','permission:Show Articles Requests']);;
    Route::get('requests/videos','AdminControllers\VideoController@requests')->middleware(['auth:admin','permission:Show Videos Requests']);;

    #/ EventRoutes/#
//    Route::resource('event','AdminControllers\EventController');
    Route::get('/event', 'AdminControllers\EventController@index')->middleware(['auth:admin','permission:Show All Events']);
    Route::get('/event/create', 'AdminControllers\EventController@create')->middleware(['auth:admin','permission:Add Event']);
    Route::post('/event', 'AdminControllers\EventController@store')->middleware(['auth:admin','permission:Add Event']);
    Route::get('/event/{id}/edit', 'AdminControllers\EventController@edit')->middleware(['auth:admin','permission:Edit Event']);
    Route::post('/event/{id}', 'AdminControllers\EventController@update')->middleware(['auth:admin','permission:Edit Event']);
    Route::get('/event/{id}', 'AdminControllers\EventController@destroy')->middleware(['auth:admin','permission:Delete Event']);

    #/ Currency Routes/#
//    Route::resource('currencies','AdminControllers\CurrencyController');
    Route::get('/currencies', 'AdminControllers\CurrencyController@index')->middleware(['auth:admin','permission:Show All Currencies']);
    Route::get('/currencies/create', 'AdminControllers\CurrencyController@create')->middleware(['auth:admin','permission:Add Currency']);
    Route::post('/currencies', 'AdminControllers\CurrencyController@store')->middleware(['auth:admin','permission:Add Currency']);
    Route::get('/currencies/{id}/edit', 'AdminControllers\CurrencyController@edit')->middleware(['auth:admin','permission:Edit Currency']);
    Route::post('/currencies/{id}', 'AdminControllers\CurrencyController@update')->middleware(['auth:admin','permission:Edit Currency']);
    Route::get('/currencies/{id}', 'AdminControllers\CurrencyController@destroy')->middleware(['auth:admin','permission:Delete Currency']);

    #/ Status Routes/#
//    Route::resource('status','AdminControllers\StatusController');
    Route::get('/status', 'AdminControllers\StatusController@index')->middleware(['auth:admin','permission:Show All Status']);
    Route::get('/status/create', 'AdminControllers\StatusController@create')->middleware(['auth:admin','permission:Add Status']);
    Route::post('/status', 'AdminControllers\StatusController@store')->middleware(['auth:admin','permission:Add Status']);
    Route::get('/status/{id}/edit', 'AdminControllers\StatusController@edit')->middleware(['auth:admin','permission:Edit Status']);
    Route::post('/status/{id}', 'AdminControllers\StatusController@update')->middleware(['auth:admin','permission:Edit Status']);
    Route::get('/status/{id}', 'AdminControllers\StatusController@destroy')->middleware(['auth:admin','permission:Delete Status']);

    #/ Page Routes/#
//    Route::resource('page','AdminControllers\PageController');
    Route::get('/page', 'AdminControllers\PageController@index')->middleware(['auth:admin','permission:Show All Pages']);
    Route::get('/page/create', 'AdminControllers\PageController@create')->middleware(['auth:admin','permission:Add Page']);
    Route::post('/page', 'AdminControllers\PageController@store')->middleware(['auth:admin','permission:Add Page']);
    Route::get('/page/{id}/edit', 'AdminControllers\PageController@edit')->middleware(['auth:admin','permission:Edit Page']);
    Route::post('/page/{id}', 'AdminControllers\PageController@update')->middleware(['auth:admin','permission:Edit Page']);
    Route::get('/page/{id}', 'AdminControllers\PageController@destroy')->middleware(['auth:admin','permission:Delete Page']);

    #/ Slider Routes/#
//    Route::resource('slider','AdminControllers\SliderController');
    Route::get('/slider', 'AdminControllers\SliderController@index')->middleware(['auth:admin','permission:Show All Slides']);
    Route::get('/slider/create', 'AdminControllers\SliderController@create')->middleware(['auth:admin','permission:Add Slide']);
    Route::post('/slider', 'AdminControllers\SliderController@store')->middleware(['auth:admin','permission:Add Slide']);
    Route::get('/slider/{id}/edit', 'AdminControllers\SliderController@edit')->middleware(['auth:admin','permission:Edit Slide']);
    Route::post('/slider/{id}', 'AdminControllers\SliderController@update')->middleware(['auth:admin','permission:Edit Slide']);
    Route::get('/slider/{id}', 'AdminControllers\SliderController@destroy')->middleware(['auth:admin','permission:Delete Slide']);

    #/ Setting Routes/#
//    Route::resource('setting','AdminControllers\SettingController');
    Route::get('/setting', 'AdminControllers\SettingController@index')->middleware(['auth:admin','permission:Show Settings']);
    Route::post('/setting', 'AdminControllers\SettingController@store')->middleware(['auth:admin','permission:Edit Setting']);


    #/ Section Routes/#
//    Route::resource('section','AdminControllers\SectionController');
    Route::get('/section', 'AdminControllers\SectionController@index')->middleware(['auth:admin','permission:Show All Sections']);
    Route::get('/section/create', 'AdminControllers\SectionController@create')->middleware(['auth:admin','permission:Add Section']);
    Route::post('/section', 'AdminControllers\SectionController@store')->middleware(['auth:admin','permission:Add Section']);
    Route::get('/section/{id}/edit', 'AdminControllers\SectionController@edit')->middleware(['auth:admin','permission:Edit Section']);
    Route::post('/section/{id}', 'AdminControllers\SectionController@update')->middleware(['auth:admin','permission:Edit Section']);
    Route::get('/section/{id}', 'AdminControllers\SectionController@destroy')->middleware(['auth:admin','permission:Delete Section']);

    #/ Section Routes/#
//    Route::resource('video','AdminControllers\VideoController');
    Route::get('video/change-status/{id}/{status}','AdminControllers\VideoController@changeStatus')->middleware(['auth:admin','permission:Accept/Reject Videos']);
    Route::get('/video', 'AdminControllers\VideoController@index')->middleware(['auth:admin','permission:Show All Videos']);
    Route::get('/video/create', 'AdminControllers\VideoController@create')->middleware(['auth:admin','permission:Add Video']);
    Route::post('/video', 'AdminControllers\VideoController@store')->middleware(['auth:admin','permission:Add Video']);
    Route::get('/video/{id}/edit', 'AdminControllers\VideoController@edit')->middleware(['auth:admin','permission:Edit Video']);
    Route::post('/video/{id}', 'AdminControllers\VideoController@update')->middleware(['auth:admin','permission:Edit Video']);
    Route::get('/video/{id}', 'AdminControllers\VideoController@destroy')->middleware(['auth:admin','permission:Delete Video']);


    #/ Service Routes/#
//    Route::resource('service','AdminControllers\ServiceController');
    Route::get('/service', 'AdminControllers\ServiceController@index')->middleware(['auth:admin','permission:Show All Services']);
    Route::get('/service/create', 'AdminControllers\ServiceController@create')->middleware(['auth:admin','permission:Add Service']);
    Route::post('/service', 'AdminControllers\ServiceController@store')->middleware(['auth:admin','permission:Add Service']);
    Route::get('/service/{id}/edit', 'AdminControllers\ServiceController@edit')->middleware(['auth:admin','permission:Edit Service']);
    Route::post('/service/{id}', 'AdminControllers\ServiceController@update')->middleware(['auth:admin','permission:Edit Service']);
    Route::get('/service/{id}', 'AdminControllers\ServiceController@destroy')->middleware(['auth:admin','permission:Delete Service']);


    #/ Support Routes /#
    Route::get('support','SharedControllers\SupportController@index')->middleware(['auth:admin','permission:Show Support Tickets']);
    Route::get('support/{action}/{id}','SharedControllers\SupportController@chaneStatus')->middleware(['auth:admin','permission:close/reopent Support Ticket']);
    Route::post('support/send-reply','SharedControllers\SupportController@reply')->middleware(['auth:admin','permission:Reply Service']);
    
    
     #/ Roles Routes /#
    Route::get('roles','AdminControllers\RoleController@index')/*->middleware(['permission:Show Roles'])*/;
    Route::get('role/create','AdminControllers\RoleController@create');
    Route::post('role/store','AdminControllers\RoleController@store');
    Route::get('role/edit/{id}','AdminControllers\RoleController@edit');
    Route::post('role/update/{id}','AdminControllers\RoleController@update');

    #/ Permissions Routes /#
    Route::get('permissions','AdminControllers\PermissionController@index');
    Route::get('permission/create','AdminControllers\PermissionController@create');
    Route::post('permission/store','AdminControllers\PermissionController@store');
    Route::get('permission/edit/{id}','AdminControllers\PermissionController@edit');
    Route::post('permission/update/{id}','AdminControllers\PermissionController@update');

    #/ Assign Roles Routes /#
    Route::get('admin-role','AdminControllers\RoleController@admin_role');
    Route::get('admin-role-permissions/{id}','AdminControllers\RoleController@admin_role_permissions');
    Route::post('update-admin-role-permissions', 'AdminControllers\RoleController@update_admin_role_permissions');

    Route::post('assign-admin-role','AdminControllers\RoleController@assign_role');
    Route::get('revoke-role/{id}','AdminControllers\RoleController@revoke_role');
});




Route::group(['prefix' => 'student', 'middleware' =>  ['locale'] ], function () {
    #/ Dashboard Routes/#
    Route::get('/','UserControllers\DashboardController@profile');
    Route::get('/account','UserControllers\DashboardController@profile');
    Route::get('/account/show-personal-info','UserControllers\DashboardController@showprofile');
    Route::POST('/account/update-personal-info','UserControllers\DashboardController@updatePersonalInfo');
    Route::post('/account/update-image','UserControllers\DashboardController@updateImage');
    Route::post('/account/update-password','UserControllers\DashboardController@changePassword');
    Route::get('/course/topics/{course_id}','UserControllers\DashboardController@show_topic');
    Route::get('/profile/messages','UserControllers\DashboardController@messages');
    Route::get('/profile/messages/chat/{message}','UserControllers\DashboardController@chat');
    Route::post('/profile/messages/send-reply','UserControllers\DashboardController@send_reply');

    #/ SMS & Email Routes /#
    Route::post('message/new-message','SharedControllers\MessageController@newMessage'); // send sms depend on user
    Route::post('message/new-email','SharedControllers\MessageController@new_email');


    #/ Support Routes /#
    Route::post('support/send-ticket','SharedControllers\SupportController@ticket');
    Route::get('support/send-reply/{id}','SharedControllers\SupportController@showreply');
    Route::post('support/send-reply/','SharedControllers\SupportController@reply');

    Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'UserAuth\LoginController@login');
    Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'UserAuth\RegisterController@register');

    Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});


Route::group(['prefix' => 'instructor'], function () {
    Route::get('/','InstructorControllers\DashboardController@index');

    Route::get('/login', 'InstructorAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'InstructorAuth\LoginController@login');
    Route::post('/logout', 'InstructorAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'InstructorAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'InstructorAuth\RegisterController@register');

    Route::post('/password/email', 'InstructorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'InstructorAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'InstructorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'InstructorAuth\ResetPasswordController@showResetForm');

    #/Profile Routes #/
    Route::get('/profile','InstructorControllers\DashboardController@profile');
    Route::post('/profile/update-personal-info','InstructorControllers\DashboardController@updatePersonalInfo');
    Route::post('/profile/update-image','InstructorControllers\DashboardController@updateImage');
    Route::post('/profile/update-password','InstructorControllers\DashboardController@changePassword');
    Route::get('/profile/messages','InstructorControllers\DashboardController@messages');
    Route::get('/profile/messages/chat/{message}','InstructorControllers\DashboardController@chat');
    Route::post('/profile/messages/send-reply','InstructorControllers\DashboardController@sendReply');
    Route::get('/profile/my-courses','InstructorControllers\DashboardController@myCourses');
    Route::get('/profile/my-courses/course-topics/{course}','InstructorControllers\DashboardController@myCourseDetails');
    Route::get('/profile/my-articles','InstructorControllers\DashboardController@myArticles');
    Route::get('/profile/my-articles/{article}','InstructorControllers\DashboardController@myArticleDetails');


    #/ CourseRoutes/#
    Route::resource('course','InstructorControllers\CourseController');
    Route::get('course/course-{id}/students','InstructorControllers\CourseController@course_students');
    Route::post('add-course-attachment','InstructorControllers\CourseController@addAttachment');
    Route::delete('delete-course-attachment/{id}','InstructorControllers\CourseController@destroyAttachment');
    #/ Course Topics Routes/#
    Route::get('course-topics/{id}','InstructorControllers\CourseController@show');
    Route::get('topic/{country}/create','InstructorControllers\TopicController@create');
    Route::post('topic/store','InstructorControllers\TopicController@store');
    Route::get('topic/course-{course}/edit/topic-{topic}','InstructorControllers\TopicController@edit');
    Route::post('topic/update','InstructorControllers\TopicController@update');
    Route::resource('topic','InstructorControllers\TopicController', ['only' => ['destroy']]);


    #/ PostRoutes/#
    Route::get('posts/articles','InstructorControllers\PostController@index');
    Route::get('posts/articles/create','InstructorControllers\PostController@create');
    Route::post('posts','InstructorControllers\PostController@store');
    Route::get('posts/{id}/edit','InstructorControllers\PostController@edit');
    Route::patch('posts/{id}','InstructorControllers\PostController@update');
    Route::delete('posts/{id}','InstructorControllers\PostController@destroy');

    #/ Requests Routes /#
    Route::get('requests/courses','InstructorControllers\CourseController@requests');
    Route::get('requests/articles','InstructorControllers\PostController@requests');

    #/ Support Routes /#
    Route::get('support/instructor-support-ticket','SharedControllers\SupportController@instructor_tickets')->middleware('instructor');
    Route::get('support/instructor-support-ticket/create','SharedControllers\SupportController@create')->middleware('instructor');
    Route::post('support/send-ticket','SharedControllers\SupportController@ticket')->middleware('instructor');
    Route::get('support/reply/{id}','SharedControllers\SupportController@instructor_reply_view')->middleware('instructor');
    Route::post('support/send-reply/','SharedControllers\SupportController@reply')->middleware('instructor');

    Route::get('message/new','SharedControllers\MessageController@instructor_new_message');
    Route::get('message/email','SharedControllers\MessageController@instructor_email_message');
    Route::post('message/send-message','SharedControllers\MessageController@store'); // send sms depend on user email
    Route::post('message/new-message','SharedControllers\MessageController@newMessage'); // send sms depend on user
    Route::post('message/new-email','SharedControllers\MessageController@newEmail');
    Route::post('message/send-email','SharedControllers\MessageController@new_email');


    Route::resource('video','InstructorControllers\VideoController');

});
