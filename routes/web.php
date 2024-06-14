<?php
Route::group(['middleware' => ['guest']], function () {
    Route::get("/" , "PageController@login")->name('login');
    Route::post("/login","AuthController@ceklogin");
});
Route::group(['middleware' => ['auth']], function () {

Route::get("/logout","AuthController@ceklogout");
Route::get("/user","PageController@edituser");
Route::post("/updateuser","PageController@updateuser");
Route::get("/home" , "PageController@home");
Route::get("/jadwal", "PageController@jadwal");
Route::get("/jadwal/form-add", "PageController@addjadwal");
Route::post("/savejadwal", "PageController@savejadwal");
Route::get("/form-edit/{id}", "PageController@editjadwal");
Route::put("/update/{id}", "PageController@updatejadwal");
Route::get("/delete/{id}", "PageController@deletejadwal");
Route::get("/about", "PageController@about");
Route::get("/faq", "PageController@faq");
});