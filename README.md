Installing
----------
1. Ubah nama file .env.example menjadi .env
2. Apabila belum menginstall composer, maka download disini -> https://getcomposer.org/download/
3. Jalankan perintah pada terminal/cmd -> composer install
4. Jalankan perintah pada terminal/cmd -> php artisan key:generate
5. Atur variable (DB_DATABASE=namadb, DB_USERNAME=username, DB_PASSWORD=password) pada file .env, sesuaikan dengan pengaturan database yang ada
6. Jalankan perintah pada terminal/cmd -> php artisan migrate
7. Jalankan perintah pada terminal/cmd -> php artisan serve
