<?php

use App\Http\Controllers\ItemController;
use App\Models\Item;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::resource('items', ItemController::class);

Route::post('labels', function(Request $request){
    if(Auth::user()->is_admin == false)
    {
        abort(401);
    }

    $validated = $request->validate([
        'name' => 'required|string',
        'color' => 'required|regex:/\#[a-zA-Z0-9]{6}/',
    ]);
    // $label = Label::create($validated);

    Label::create([
        'name' => $validated['name'],
        'display' => $request->has('display'),
        'color' => $validated['color'],
    ]);

    return redirect()->route('items.index');

})->middleware('auth')->name('newlabel');

Route::get('labels/create', function(){
    return view('site.label_form');
})->middleware('auth')->name('toform');

Route::get('labels', function(){
    $labels = Label::all();
    return view('site.label_modify', ['labels' => $labels]);
})->middleware('auth')->name('labeloperations');

Route::get('/', function () {
    return redirect()->route('items.index');
});

Route::get('labels/{id}', function ($id) {
    $label = Label::findOrFail($id);
    $items = $label->items;
    return view('site.items', ['items' => $items]);
})->name('listItems');

Route::get('labelmodify/{id}', function ($id) {
    $label = Label::findOrFail($id);
    return view('site.label_form', ['label' => $label]);
})->middleware('auth')->name('changeItems');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::put('labels/{id}', function(Request $request, $id){
    if(Auth::user()->is_admin == false)
    {
        abort(401);
    }

    $validated = $request->validate([
        'name' => 'required|string',
        'color' => 'required|regex:/\#[a-zA-Z0-9]{6}/',
    ]);
    $label = Label::findOrFail($id);

    $label->update([
        'name' => $validated['name'],
        'display' => $request->has('display'),
        'color' => $validated['color'],
    ]);

    return redirect()->route('items.index');
})->name('change');


require __DIR__.'/auth.php';
