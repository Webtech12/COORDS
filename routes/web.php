<?php
use App\Events\StatusLiked;


Auth::routes();

Route::get('/{any}', 'AppController@index')->where('any', '.*');
Route::get('test', function () {
    event(new StatusLiked('Someone'));
    return "Event has been sent!";
});

// event(new MyEvent('hello world'));