# Corporate
Add Annual Reports, Tenders and Vacancies to your laravel admin project.
This will allow you to add the corporate items to your laravel project.
Each resource with an active from and to with a pdf.

## Installation
Update your project's `composer.json` file.

```bash
composer require bpocallaghan/corporate
```

## Usage

Register the routes in the `routes/vendor.php` file.
- Website
```bash
Route::group(['prefix' => 'corporate', 'namespace' => 'Corporate\Controllers\Website'], function () {
    Route::get('/tenders', 'CorporateController@tenders');
    Route::get('/vacancies', 'CorporateController@vacancies');
    Route::get('/annual-reports', 'CorporateController@annualReports');
    Route::post('/tenders/{tender}/download', 'CorporateController@downloadTender');
    Route::post('/vacancies/{vacancy}/download', 'CorporateController@downloadVacancy');
    Route::post('/annual-reports/{annual_report}/download', 'CorporateController@downloadAnnualReport');
});
```
- Admin
```bash
Route::group(['prefix' => 'corporate', 'namespace' => 'Corporate\Controllers\Admin'], function () {
	Route::resource('tenders', 'TendersController');
	Route::resource('vacancies', 'VacanciesController');
	Route::resource('annual-reports', 'AnnualReportsController');
});
```

## Commands
```bash
php artisan corporate:publish
```
This will copy the `database/seeds` and `database/migrations` to your application.
Remember to add `$this->call(TenderTableSeeder::class); $this->call(VacancyTableSeeder::class); $this->call(AnnualReportTableSeeder::class);` in the `DatabaseSeeder.php`

```bash
php artisan corporate:publish --files=all
```
This will copy the `model, views and controller` to their respective directories. 
Please note when you execute the above command. You need to update your `routes`.
```bash 
// website
Route::get('/corporate/tenders', 'CorporateController@tenders');
Route::get('/corporate/vacancies', 'CorporateController@vacancies');
Route::get('/corporate/annual-reports', 'CorporateController@annualReports');
Route::post('/corporate/tenders/{tender}/download', 'CorporateController@downloadTender');
Route::post('/corporate/vacancies/{vacancy}/download', 'CorporateController@downloadVacancy');
Route::post('/corporate/annual-reports/{annual_report}/download', 'CorporateController@downloadAnnualReport');

// admin
Route::group(['prefix' => 'corporate', 'namespace' => 'Corporate'], function () {
	Route::resource('tenders', 'TendersController');
	Route::resource('vacancies', 'VacanciesController');
	Route::resource('annual-reports', 'AnnualReportsController');
});
```

## Demo
Package is being used at [Laravel Admin Starter](https://github.com/bpocallaghan/laravel-admin-starter) project.

### TODO
- add the navigation seeder information (to create the navigation/urls)