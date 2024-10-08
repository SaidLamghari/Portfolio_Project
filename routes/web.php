<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| This file defines the web routes for your application. Routes are 
| loaded by the RouteServiceProvider within a group that contains the
| "web" middleware group. These routes handle the application's HTTP
| requests and responses.
|
*/

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| These routes are accessible without authentication. They provide 
| the entry points for login, registration, and the welcome page.
|
*/

// Route to display the login view
Route::get('/', function () {
    return view('auth.login');
});

// Route to display the registration view
Route::get('/register', function () {
    return view('auth.register');
});

// Route to display the welcome dashboard view
Route::get('/bienvenue', function () {
    return view('dashboard');
});

// Routes for authentication (login, register, password reset, etc.)
Auth::routes();

/*
|--------------------------------------------------------------------------
| Prelevements Routes
|--------------------------------------------------------------------------
|
| These routes manage the 'Prelevements' resource, including viewing, 
| searching, and performing CRUD operations. These routes require
| authentication.
|
*/

// Route to view all prelevements
Route::get('/Prelevements', [App\Http\Controllers\PrelevementsController::class, 'all'])->name('all')->middleware('auth');

// Route to search prelevements
Route::get('/Prelevements/search', [App\Http\Controllers\PrelevementsController::class, 'search'])->name('Prelevement.search')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Blocs and Decals Routes
|--------------------------------------------------------------------------
|
| These routes handle the 'Blocs' and 'Decals' resources, including 
| import, search, and CRUD operations. Access requires authentication.
|
*/

// Route to import blocs by ID
Route::any('/Blocs/import/{id}', [App\Http\Controllers\BlocsController::class, 'import'])->name('blocs.import')->middleware('auth');

// Route to search blocs
Route::get('/Blocs/search', [App\Http\Controllers\BlocsController::class, 'search'])->name('blocs.search')->middleware('auth');

// Route to search decals
Route::get('/Blocs/search/decals', [App\Http\Controllers\BlocsController::class, 'decal_search'])->name('decals.search')->middleware('auth');

// Route to view all decals
Route::get('/Blocs/decals', [App\Http\Controllers\BlocsController::class, 'decals'])->name('blocs.decals')->middleware('auth');

// Route to store a new decal by ID
Route::any('/Blocs/decals/{id}', [App\Http\Controllers\BlocsController::class, 'store'])->name('decals')->middleware('auth');

// Route to list decals by ID
Route::any('/Blocs/decals_list/{id}', [App\Http\Controllers\BlocsController::class, 'list'])->name('decalslist')->middleware('auth');

// Route to manage block positions
Route::any('/Blocs/pos/{id}', [App\Http\Controllers\BlocsController::class, 'pos'])->name('blocs.pos')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Sous-Blocs Routes
|--------------------------------------------------------------------------
|
| These routes handle 'Sous-Blocs' including viewing, searching, 
| importing, and CRUD operations. Access requires authentication.
|
*/

// Route to view all sous-blocs
Route::get('/Sous-Blocs', [App\Http\Controllers\DecalsController::class, 'sb_index'])->name('Sous-Blocs')->middleware('auth');

// Route to search sous-blocs
Route::get('/S_Blocs/search', [App\Http\Controllers\DecalsController::class, 'sb_search'])->name('sous_blocs.search')->middleware('auth');

// Route to import sous-blocs by ID
Route::any('/S_Blocs/import/{id}', [App\Http\Controllers\DecalsController::class, 'sb_import'])->name('sous_blocs.import')->middleware('auth');

// Route to manage sous-bloc positions
Route::any('/S_Blocs/pos/{id}', [App\Http\Controllers\DecalsController::class, 'sb_pos'])->name('sous_blocs.pos')->middleware('auth');

// Route to delete a sous-bloc
Route::any('/S_Blocs/{decal}/delete', [App\Http\Controllers\DecalsController::class, 'sb_destroy'])->name('sous_blocs.destroy')->middleware('auth');

/*
|--------------------------------------------------------------------------
| PO Routes
|--------------------------------------------------------------------------
|
| These routes manage 'Prelevement Orders' (PO) including viewing, 
| creating, and CRUD operations. Access requires authentication and
| specific roles (tech).
|
*/

// Route to view all prelevement orders
Route::get('/Po', [App\Http\Controllers\PrelevementsController::class, 'index'])->name('PO.index')->middleware('auth');

// Route to search prelevement orders
Route::get('/Po/search', [App\Http\Controllers\PrelevementsController::class, 'search_p'])->name('PO.search')->middleware('auth');

// Route to display the form for creating a new prelevement order
Route::get('/Po/create', [App\Http\Controllers\PrelevementsController::class, 'create'])->name('PO.create')->middleware(['auth', 'tech']);

// Route to store a new prelevement order
Route::post('/Po/store', [App\Http\Controllers\PrelevementsController::class, 'store'])->name('Prelevements.store')->middleware(['auth', 'tech']);

// Route to view a specific prelevement order by ID
Route::get('/Po/{id}', [App\Http\Controllers\PrelevementsController::class, 'show'])->name('Prelevements.show')->middleware(['auth', 'tech']);

// Route to display the form for editing a prelevement order by ID
Route::get('/Po/{id}/edit', [App\Http\Controllers\PrelevementsController::class, 'edit'])->name('Prelevements.edit')->middleware(['auth', 'tech']);

// Route to update a prelevement order
Route::put('/Po/{prv}/update', [App\Http\Controllers\PrelevementsController::class, 'update'])->name('Prelevements.update')->middleware(['auth', 'tech']);

// Route to delete a prelevement order
Route::any('/Po/{prv}/destroy', [App\Http\Controllers\PrelevementsController::class, 'destroy'])->name('Prelevements.destroy')->middleware(['auth', 'tech']);

/*
|--------------------------------------------------------------------------
| Bio Routes
|--------------------------------------------------------------------------
|
| These routes manage 'Bio' (biological samples) including viewing, 
| creating, and CRUD operations. Access requires authentication and
| specific roles (med).
|
*/

// Route to view all biological samples
Route::get('/Bio', [App\Http\Controllers\PrelevementsController::class, 'index_bio'])->name('Bio.index')->middleware('auth');

// Route to search biological samples
Route::get('/Bio/search', [App\Http\Controllers\PrelevementsController::class, 'search_b'])->name('Bio.search')->middleware('auth');

// Route to display the form for creating a new biological sample
Route::get('/Bio/create', [App\Http\Controllers\PrelevementsController::class, 'create_bio'])->name('Bio.create')->middleware(['auth', 'med']);

// Route to store a new biological sample
Route::post('/Bio/store', [App\Http\Controllers\PrelevementsController::class, 'store_bio'])->name('Bio.store')->middleware(['auth', 'med']);

// Route to view a specific biological sample by ID
Route::get('/Bio/{id}', [App\Http\Controllers\PrelevementsController::class, 'show_bio'])->name('Bio.show')->middleware(['auth']);

// Route to display the form for editing a biological sample by ID
Route::get('/Bio/{id}/edit', [App\Http\Controllers\PrelevementsController::class, 'edit_bio'])->name('Bio.edit')->middleware(['auth', 'med']);

// Route to update a biological sample
Route::put('/Bio/{prv}/update', [App\Http\Controllers\PrelevementsController::class, 'update_bio'])->name('Bio.update')->middleware(['auth', 'med']);

// Route to delete a biological sample
Route::any('/Bio/{prv}/destroy', [App\Http\Controllers\PrelevementsController::class, 'destroy_bio'])->name('Bio.destroy')->middleware(['auth', 'med']);

/*
|--------------------------------------------------------------------------
| Repr Routes
|--------------------------------------------------------------------------
|
| These routes manage 'Repr' (representative samples) including viewing, 
| creating, and CRUD operations. Access requires authentication and
| specific roles (tech).
|
*/

// Route to view all representative samples
Route::get('/Repr', [App\Http\Controllers\PrelevementsController::class, 'index_repr'])->name('Repr.index')->middleware('auth');

// Route to search representative samples
Route::get('/Repr/search', [App\Http\Controllers\PrelevementsController::class, 'search_r'])->name('Repr.search')->middleware('auth');

// Route to display the form for creating a new representative sample
Route::get('/Repr/create', [App\Http\Controllers\PrelevementsController::class, 'create_repr'])->name('Repr.create')->middleware(['auth', 'tech']);

// Route to store a new representative sample
Route::post('/Repr/store', [App\Http\Controllers\PrelevementsController::class, 'store_repr'])->name('Repr.store')->middleware(['auth', 'tech']);

// Route to view a specific representative sample by ID
Route::get('/Repr/{id}', [App\Http\Controllers\PrelevementsController::class, 'show_repr'])->name('Repr.show')->middleware(['auth', 'tech']);

// Route to display the form for editing a representative sample by ID
Route::get('/Repr/{id}/edit', [App\Http\Controllers\PrelevementsController::class, 'edit_repr'])->name('Repr.edit')->middleware(['auth', 'tech']);

// Route to update a representative sample
Route::put('/Repr/{prv}/update', [App\Http\Controllers\PrelevementsController::class, 'update_repr'])->name('Repr.update')->middleware(['auth', 'tech']);

// Route to delete a representative sample
Route::any('/Repr/{prv}/destroy', [App\Http\Controllers\PrelevementsController::class, 'destroy_repr'])->name('Repr.destroy')->middleware(['auth', 'tech']);

/*
|--------------------------------------------------------------------------
| Extp Routes
|--------------------------------------------------------------------------
|
| These routes manage 'Extp' (external prelevements) including viewing, 
| creating, and CRUD operations. Access requires authentication and
| specific roles (tech).
|
*/

// Route to view all external prelevements
Route::get('/Extp', [App\Http\Controllers\PrelevementsController::class, 'index_extp'])->name('Extp.index')->middleware('auth');

// Route to search external prelevements
Route::get('/Extp/search', [App\Http\Controllers\PrelevementsController::class, 'search_extp'])->name('Extp.search')->middleware('auth');

// Route to display the form for creating a new external prelevement
Route::get('/Extp/create', [App\Http\Controllers\PrelevementsController::class, 'create_extp'])->name('Extp.create')->middleware(['auth', 'tech']);

// Route to store a new external prelevement
Route::post('/Extp/store', [App\Http\Controllers\PrelevementsController::class, 'store_extp'])->name('Extp.store')->middleware(['auth', 'tech']);

// Route to view a specific external prelevement by ID
Route::get('/Extp/{id}', [App\Http\Controllers\PrelevementsController::class, 'show_extp'])->name('Extp.show')->middleware(['auth', 'tech']);

// Route to display the form for editing an external prelevement by ID
Route::get('/Extp/{id}/edit', [App\Http\Controllers\PrelevementsController::class, 'edit_extp'])->name('Extp.edit')->middleware(['auth', 'tech']);

// Route to update an external prelevement
Route::put('/Extp/{prv}/update', [App\Http\Controllers\PrelevementsController::class, 'update_extp'])->name('Extp.update')->middleware(['auth', 'tech']);

// Route to delete an external prelevement
Route::any('/Extp/{prv}/destroy', [App\Http\Controllers\PrelevementsController::class, 'destroy_extp'])->name('Extp.destroy')->middleware(['auth', 'tech']);


Route::get('/recoupes', [App\Http\Controllers\DemandesController::class, 'index_RECOUPE'])->name('RECOUPE.index')->middleware('auth');
Route::get('/demande/recoupe/create', [App\Http\Controllers\DemandesController::class, 'create_RECOUPE'])->name('RECOUPE.create')->middleware(['auth', 'tech']);
Route::post('/demande/recoupe/store', [App\Http\Controllers\DemandesController::class, 'store_RECOUPE'])->name('RECOUPE.store')->middleware(['auth', 'tech']);
Route::get('/recoupe/{bloc}', [App\Http\Controllers\DemandesController::class, 'show_RECOUPE'])->name('RECOUPE.show')->middleware(['auth', 'tech']);
Route::get('/demande/recoupe/{id}/edit', [App\Http\Controllers\DemandesController::class, 'edit_RECOUPE'])->name('RECOUPE.edit')->middleware(['auth', 'tech']);
Route::put('/demande/recoupe/{prv}/update', [App\Http\Controllers\DemandesController::class, 'update_RECOUPE'])->name('RECOUPE.update')->middleware(['auth', 'tech']);
Route::any('/demande/recoupe/{de}/destroy', [App\Http\Controllers\DemandesController::class, 'destroy_RECOUPE'])->name('RECOUPE.destroy')->middleware(['auth', 'tech']);
Route::get('/demande/recoupe/valide', [App\Http\Controllers\DemandesController::class, 'valide_RECOUPE'])->name('RECOUPE.valide')->middleware('auth');
Route::get('/demande/recoupe/attente', [App\Http\Controllers\DemandesController::class, 'attente_RECOUPE'])->name('RECOUPE.attente')->middleware('auth');


//COLORATION ROUTES

Route::get('/COLORATION', [App\Http\Controllers\DemandesController::class, 'index_COLORATION'])->name('COLORATION.index')->middleware('auth');
Route::get('/demande/coloration/create', [App\Http\Controllers\DemandesController::class, 'create_COLORATION'])->name('COLORATION.create')->middleware(['auth', 'tech']);
Route::post('/demande/coloration/store', [App\Http\Controllers\DemandesController::class, 'store_COLORATION'])->name('COLORATION.store')->middleware(['auth', 'tech']);
Route::get('/coloration/{id}', [App\Http\Controllers\DemandesController::class, 'show_COLORATION'])->name('COLORATION.show')->middleware(['auth', 'tech']);
Route::get('demande/coloration/{id}/edit', [App\Http\Controllers\DemandesController::class, 'edit_COLORATION'])->name('COLORATION.edit')->middleware(['auth', 'tech']);
Route::put('demande/coloration/{prv}/update', [App\Http\Controllers\DemandesController::class, 'update_COLORATION'])->name('COLORATION.update')->middleware(['auth', 'tech']);
Route::any('/demande/coloration/{de}/destroy', [App\Http\Controllers\DemandesController::class, 'destroy_COLORATION'])->name('COLORATION.destroy')->middleware(['auth', 'tech']);
Route::get('/demande/coloration/valide', [App\Http\Controllers\DemandesController::class, 'valide_COLORATION'])->name('COLORATION.valide')->middleware('auth');
Route::get('/demande/coloration/attente', [App\Http\Controllers\DemandesController::class, 'attente_COLORATION'])->name('COLORATION.attente')->middleware('auth');
//IHC ROUTES

Route::get('/IHC', [App\Http\Controllers\DemandesController::class, 'index_IHC'])->name('IHC.index')->middleware('auth');
Route::get('demande/IHC/create', [App\Http\Controllers\DemandesController::class, 'create_IHC'])->name('IHC.create')->middleware(['auth', 'tech']);
Route::post('/demande/IHC/store', [App\Http\Controllers\DemandesController::class, 'store_IHC'])->name('IHC.store')->middleware(['auth', 'tech']);
Route::get('/IHC/{id}', [App\Http\Controllers\DemandesController::class, 'show_IHC'])->name('IHC.show')->middleware(['auth', 'tech']);
Route::get('/IHC/{id}/edit', [App\Http\Controllers\DemandesController::class, 'edit_IHC'])->name('IHC.edit')->middleware(['auth', 'tech']);
Route::put('/IHC/{prv}/update', [App\Http\Controllers\DemandesController::class, 'update_IHC'])->name('IHC.update')->middleware(['auth', 'tech']);
Route::any('/demande/IHC/{de}/destroy', [App\Http\Controllers\DemandesController::class, 'destroy_IHC'])->name('IHC.destroy')->middleware(['auth', 'tech']);
Route::get('/demande/IHC/valide', [App\Http\Controllers\DemandesController::class, 'valide_IHC'])->name('IHC.valide')->middleware('auth');
Route::get('/demande/IHC/attente', [App\Http\Controllers\DemandesController::class, 'attente_IHC'])->name('IHC.attente')->middleware('auth');

//BIOMOL FUNCTIONS
Route::get('/BIOMOL', [App\Http\Controllers\DemandesController::class, 'index_BIOMOL'])->name('BIOMOL.index')->middleware('auth');
Route::get('/demande/BIOMOL/create', [App\Http\Controllers\DemandesController::class, 'create_BIOMOL'])->name('BIOMOL.create')->middleware(['auth', 'tech']);
Route::post('/demande/BIOMOL/store', [App\Http\Controllers\DemandesController::class, 'store_BIOMOL'])->name('BIOMOL.store')->middleware(['auth', 'tech']);
Route::get('/BIOMOL/{id}', [App\Http\Controllers\DemandesController::class, 'show_BIOMOL'])->name('COLORATION.show')->middleware(['auth', 'tech']);
Route::get('demande/BIOMOL/{id}/edit', [App\Http\Controllers\DemandesController::class, 'edit_BIOMOL'])->name('BIOMOL.edit')->middleware(['auth', 'tech']);
Route::put('demande/BIOMOL/{prv}/update', [App\Http\Controllers\DemandesController::class, 'update_BIOMOL'])->name('BIOMOL.update')->middleware(['auth', 'tech']);
Route::any('/demande/BIOMOL/{de}/destroy', [App\Http\Controllers\DemandesController::class, 'destroy_BIOMOL'])->name('BIOMOL.destroy')->middleware(['auth', 'tech']);
Route::get('/demande/BIOMOL/valide', [App\Http\Controllers\DemandesController::class, 'valide_BIOMOL'])->name('BIOMOL.valide')->middleware('auth');
Route::get('/demande/BIOMOL/attente', [App\Http\Controllers\DemandesController::class, 'attente_BIOMOL'])->name('BIOMOL.attente')->middleware('auth');











//BLOCS ROUTES

Route::get('/Blocs', [App\Http\Controllers\BlocsController::class, 'index'])->name('Blocs')->middleware('auth');
Route::get('/Blocs/{id}', [App\Http\Controllers\BlocsController::class, 'show'])->name('Blocs.show')->middleware('auth');
Route::get('/Blocs/{id}/details', [App\Http\Controllers\BlocsController::class, 'details'])->name('Blocs.details')->middleware('auth');
Route::post('/Bloc/store', [App\Http\Controllers\BlocsController::class, 'store'])->name('Blocs.store')->middleware('auth');
Route::get('/Bloc/{id}/edit', [App\Http\Controllers\BlocsController::class, 'edit'])->name('Blocs.edit')->middleware('auth');
Route::put('/Blocs/{bloc}/update', [App\Http\Controllers\BlocsController::class, 'update'])->name('Blocs.update')->middleware('auth');
Route::any('/Blocs/{bloc}/delete', [App\Http\Controllers\BlocsController::class, 'destroy'])->name('Blocs.destroy')->middleware('auth');






//DEMANDES ROUTES
Route::get('/Mes_demandes/', [App\Http\Controllers\DemandesController::class, 'mine'])->name('M_Demandes')->middleware(['auth', 'tech']);
Route::get('/Demandes/search', [App\Http\Controllers\DemandesController::class, 'search'])->name('demandes.search')->middleware('auth');
Route::any('/demande/{de}', [App\Http\Controllers\DemandesController::class, 'status'])->name('status.update')->middleware('auth');
Route::get('/Demandes/search/recoupe', [App\Http\Controllers\DemandesController::class, 'search_r'])->name('demandes.search_r')->middleware('auth');
Route::get('/Demandes/search/coloration', [App\Http\Controllers\DemandesController::class, 'search_c'])->name('demandes.search_c')->middleware('auth');
Route::get('/Demandes/search/ihc', [App\Http\Controllers\DemandesController::class, 'search_i'])->name('demandes.search_i')->middleware('auth');


//SE routes
Route::get('/SE', [App\Http\Controllers\PrelevementsController::class, 'index_SE'])->name('SE.index')->middleware('auth');
Route::get('/SE/search', [App\Http\Controllers\PrelevementsController::class, 'search_SE'])->name('SE.search')->middleware('auth');
Route::get('/SE/create', [App\Http\Controllers\PrelevementsController::class, 'create_SE'])->name('SE.create')->middleware(['auth', 'tech']);
Route::post('/SE/store', [App\Http\Controllers\PrelevementsController::class, 'store_SE'])->name('SE.store')->middleware(['auth', 'tech']);
Route::get('/SE/{id}', [App\Http\Controllers\PrelevementsController::class, 'show_SE'])->name('SE.show')->middleware(['auth', 'tech']);
Route::get('/SE/{id}/edit', [App\Http\Controllers\PrelevementsController::class, 'edit_SE'])->name('SE.edit')->middleware(['auth', 'tech']);
Route::put('/SE/{prv}/update', [App\Http\Controllers\PrelevementsController::class, 'update_SE'])->name('SE.update')->middleware(['auth', 'tech']);
Route::any('/SE/{prv}/destroy', [App\Http\Controllers\PrelevementsController::class, 'destroy_SE'])->name('SE.destroy')->middleware(['auth', 'tech']);



//BC routes

Route::get('/BC', [App\Http\Controllers\PrelevementsController::class, 'index_BC'])->name('BC.index')->middleware('auth');
Route::get('/BC/search', [App\Http\Controllers\PrelevementsController::class, 'search_BC'])->name('BC.search')->middleware('auth');
Route::get('/BC/create', [App\Http\Controllers\PrelevementsController::class, 'create_BC'])->name('BC.create')->middleware(['auth', 'med']);
Route::post('/BC/store', [App\Http\Controllers\PrelevementsController::class, 'store_BC'])->name('BC.store')->middleware(['auth', 'med']);
Route::get('/BC/{id}', [App\Http\Controllers\PrelevementsController::class, 'show_BC'])->name('BC.show')->middleware(['auth']);
Route::get('/BC/{id}/edit', [App\Http\Controllers\PrelevementsController::class, 'edit_BC'])->name('BC.edit')->middleware(['auth', 'med']);
Route::put('/BC/{prv}/update', [App\Http\Controllers\PrelevementsController::class, 'update_BC'])->name('BC.update')->middleware(['auth', 'med']);
Route::any('/BC/{prv}/destroy', [App\Http\Controllers\PrelevementsController::class, 'destroy_BC'])->name('BC.destroy')->middleware(['auth', 'med']);



Route::post('/SE/store', [App\Http\Controllers\PrelevementsController::class, 'store_SE']);
//Route::post('/Importblocs',[App\Http\Controllers\BlocsController::class,'Importblocs'])->name('blocs.ImportBlocs');
Route::post('/selected-blocs',[App\Http\Controllers\BlocsController::class,'deletecheckboxSelected'])->name('blocs.deleteSelected');


Route::any('/Blocs/import', [App\Http\Controllers\BlocsController::class, 'Importblocs'])->name('ImportBlocs')->middleware('auth');


Route::post('/delete-blocs', 'App\Http\Controllers\BlocsController@deleteBlocs');



Route::delete('/myproducts/{id}', [BlocsController::class, 'destroy']);
Route::delete('/myproductsDeleteAll', [BlocsController::class, 'deleteAll']);




//USERS

Route::get('/User/create', [App\Http\Controllers\UsersController::class, 'create'])->name('User.create');



//REGISTRATION
Route::get('/register1', 'App\Http\Controllers\RegistrationController@create')->middleware(['auth']);
Route::post('register1', 'App\Http\Controllers\RegistrationController@store')->middleware(['auth']);
Route::any('/registration/{prv}/destroy','App\Http\Controllers\RegistrationController@destroy')->middleware(['auth']);

