### Akun Login
 
    ID : 1001
    Password : panji555
  
### Software Yang dibutuhkan
  * Browser(Google Chrome, Mozila, atau yang lainnya)
  * XAMPP(untuk menjalankan XAMPP)
  * Visual Studio(Editor)

### Panduan Menjalankan Program
  1. Install XAMPP
  2. Clone atau download this repository
  3. Pindahkan repository folder to `/Application/XAMPP/htdocs` folder pada Local Drive anda.
  4. Mulai Aplikasi XAMPP, nyalakan Apache dan MySQL
  5. di browser, navigate to  [PanjiHanum](https://localhost:8888/PanjiHanum)


  
### Sebelum Menjalankan Program Install SQL Terlabih dahulu
   1. Buka `Application/PanjiHanum/sql/dbarkademy.sql` menggunakan Visual Studio atau Notepad
   2. Select All dan Copy 
   3. Buka [PanjiHanum](https://localhost:8888/PanjiHanum)
   4. pilih Menu SQL
   5. Paste Semua
   6. Tekan Go
   7. Data Sudah tersimpan
  
### Pemrograman  yang dipakai :
    * HTML
    * CSS
    * JavaScript
    * Bootstrap
    * PHP
 
### Stack yang digunakan:
   * login.php -> Adalah controller agar mengatur masuk login atau tidaknya (mengecek)
   * Controller.php -> Adalah Controller untuk Data Daerah
   * ControllerPenduduk.php -> Adalah Controller untuk Data Penduduk
   * Config.php -> Didalamnya ada function rupiah yang digunakan untuk mengubah nilai menjadi Rupiah , dan didalamnya juga ada $koneksi untuk Mengkoneksikan Database
