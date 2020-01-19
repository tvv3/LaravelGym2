<?php



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


Route::get('/', function () {
    return view('index');
});

Route::get('/mesaj', function () {
    return view('mesaj');
});

/*
Route::get('/test', function () {
    return view('test');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/antrenori','AntrenoriPageController@index')->name('antrenori');

Route::get('/clientpage','ClientPageController@index')->name('clientpage');


Route::post('detaliiclient/create', 'DetaliiClientController@create'); //va afisa view-ul cu formul

Route::delete('detaliiclient/delete', 'DetaliiClientController@delete');

Route::post('detaliiclient/store', 'DetaliiClientController@store'); // va stoca efectiv detaliile clientului in baza de date

Route::get('detaliiclient/create', 'DetaliiClientController@create');


Route::get('/administrare','AdministrareController@index')->name('administrare');



Route::get('/register2',function(){ return view('register2');});
Route::post('/register2/create','Register2Controller@create'); //and back to administrare

Route::post('detaliiangajat/create', 'DetaliiAngajatController@create'); //va afisa view-ul cu formul

Route::delete('detaliiangajat/delete', 'DetaliiAngajatController@delete');

Route::post('detaliiangajat/store', 'DetaliiAngajatController@store'); // va stoca efectiv detaliile clientului in baza de date

Route::get('detaliiangajat/create', 'DetaliiAngajatController@create');


Route::get('/administrareangajati','AdministrareAngajatiController@index')
       ->name('administrareangajati');

