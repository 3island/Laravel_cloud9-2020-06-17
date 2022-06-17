// app/routes/web.php

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\FavoriteController;

// コメントは省略

// 🔽 ここを編集
Route::group(['middleware' => 'auth'], function () {
  Route::post('tweet/{tweet}/favorites', [FavoriteController::class, 'store'])->name('favorites');
  Route::post('tweet/{tweet}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');
  Route::get('/tweet/mypage', [TweetController::class, 'mydata'])->name('tweet.mypage');
  Route::resource('tweet', TweetController::class);
});

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

