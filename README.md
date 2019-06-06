## Fuel Inventory API
Simple API to manage Fuel Station Inventory. The API has endpoints to CRUD Dispensers and Tanks, to save closing stock volume of each tank and to save daily sales volume of each dispenser.

To test it: Clone the repo, run `composer install` to get the dependencies, run the migrations, open *routes/api.php* to see available endpoints.

Also, if you wish to get dummy data into the database to test the API, go to *database/seeds/DatabaseSeeder.php*, uncomment the lines in the *run* method except `$this->call(UsersTableSeeder::class)`, then run `php artisan db:seed`

#### Improvements
The API is fairly simple, improvements to it could be:

* Pagination of results
* Filters
* Validation to ensure that *created_at* field is unique in *DispenserSale* and *TankStock* to avoid having multiple dispenser sales volume and closing stock data registered for the same day.
