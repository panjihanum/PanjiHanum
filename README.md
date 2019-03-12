### Akun Login
 
    ID : 1001
    Password : panji555
  
### Software Yang dibutuhkan
  * Browser(Google Chrome, Mozila, atau yang lainnya)
  * [XAMPP](https://www.apachefriends.org/download.html)(untuk menjalankan XAMPP)
  * [Visual Studio](https://visualstudio.microsoft.com/downloads/)(Editor)

### Panduan Menjalankan Program
  1. Install XAMPP
  2. Clone atau download [repository ini](https://github.com/panjihanum/PanjiHanum/archive/master.zip) 
  3. Pindahkan repository folder ke *`/Application/XAMPP/htdocs`* folder pada Local Drive anda.
  4. Mulai Aplikasi XAMPP, Hidupkan Apache dan MySQL
  5. Di browser, navigate to  `https://localhost:8888/PanjiHanum-master`


  
### Sebelum Menjalankan Program Install SQL Terlabih dahulu
   1. Buka *`Application/PanjiHanum-master/sql/dbarkademy.sql`* menggunakan Visual Studio atau Notepad
   2. Select All dan Copy 
   3. Buka `https://localhost:8888/phpmyadmin`
   4. pilih Menu SQL
   5. Paste Semua
   6. Tekan Go
   7. Data Selesai disimpan.
  
### Pemrograman  yang dipakai :
   * HTML
   * CSS
   * JavaScript
   * Bootstrap
   * PHP
   
### Database yang dipakai :
   * MySQLi
 
### Stack yang digunakan:
   * *`login.php`* -> Adalah controller agar mengatur masuk login atau tidaknya (mengecek)
   * *`Controller.php`* -> Adalah Controller untuk Data Daerah
   * *`ControllerPenduduk.php`* -> Adalah Controller untuk Data Penduduk
   * *`Config.php`* -> Didalamnya ada function rupiah yang digunakan untuk mengubah nilai menjadi Rupiah , dan didalamnya juga ada *`$koneksi`* untuk Mengkoneksikan Database
