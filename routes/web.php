<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/logout",[UserController::class,"logout"]);
Route::get("/admin_dashboard", [PostController::class, "admin_dashboard"]);

Route::get("/", [PostController::class, "admin_create_post"]);

Route::get("/upload_post", [PostController::class, "upload_post"]);

Route::post("/send_post", [PostController::class, "send_post"]);


Route::get("/create_user", [UserController::class, "create_user"]);
Route::post("/register_user", [UserController::class, "register_user"]);

Route::get("/user_login", [UserController::class, "user_login"]);
Route::post("/send_user_login", [UserController::class, "send_user_login"]);


Route::get("/create_category", [PostController::class, "create_category"]);

Route::post("/register_category", [PostController::class, "register_category"]);

Route::get("/read-article/{id}/{slug}", [PostController::class, "read_article"]);

Route::get("/search_post", [PostController::class, "search_post"]);
Route::get("/tag_search/{tag}", [PostController::class, "tag_search"]);
Route::get("/edit_post/{id}", [PostController::class, "edit_post"]);
Route::post("/update_post", [PostController::class, "update_post"]);
Route::get("/view_all_post", [PostController::class, "view_all_post"]);

Route::get("/post_ads", [PostController::class, "post_ads"]);
Route::post("/send_ads", [PostController::class, "send_ads"]);
Route::get("/all_ads", [PostController::class, "all_ads"]);

Route::get("/edit_ads/{id}", [PostController::class, "edit_ads"]);
Route::post("/update_ads", [PostController::class, "update_ads"]);

Route::get("/delete_category/{id}", [PostController::class, "delete_category"]);
Route::get("/delete_post/{id}", [PostController::class, "delete_post"]);
Route::get("/delete_ads/{id}", [PostController::class, "delete_ads"]);


Route::get("/edit_category/{id}", [PostController::class, "edit_category"]);
Route::post("/update_category", [PostController::class, "update_category"]);
Route::get("/view_all_category", [PostController::class, "view_all_category"]);
Route::get("/contact", [PostController::class, "contact"]);
Route::post("/send_contact", [PostController::class, "send_contact"]);
Route::get("/user_message", [PostController::class, "user_message"]);
Route::get("/delete_message/{id}", [PostController::class, "delete_message"]);
