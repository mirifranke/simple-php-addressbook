# Simple PHP Address Book

## Requirements
- php8
- MySql

## Installation Guide
1. Setup a MySQL database.
2. Rename the .env.example file to .env and configure your database connection.
3. Run the migration file in database/migrations/. If you want to start with some test data, use database/insert_testdata.sql.
4. Install the dependencies via command line:
   ```
   composer install
   ```
5. Start server via command line:
   ```
   php -S localhost:8080 -t public/
   ```
