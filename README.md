  ID : 1001
  
  Password : panji555
  
  Software Yang dibutuhkan
  1. Browser(google, Mozila, atau yang lainnya)
  2. XAMPP(untuk menjalankan XAMPP)
  3. Visual Studio(Editor)
  
  Panduan Menjalankan Program

  1. Install XAMPP
  2. Clone atau download this repository
  3. Pindahkan repository folder to /Application/XAMPP/htdocs folder pada Local Drive anda.
  4. Mulai Aplikasi XAMPP, nyalakan Apache dan MySQL
  5. di browser, navigate to https://localhost:8888/PanjiHanum
  
 Sebelum Menjalankan Program Install SQL Terlabih dahulu
  1. Buka Application/PanjiHanum/sql/dbarkademy.sql menggunakan Visual Studio atau Notepad
  2. Select All dan Copy 
  3. Buka localhost:8888/phpmyadmin
  4. pilih Menu SQL
  5. Paste Semua
  6. Tekan Go
  7. Data Sudah tersimpan
  
 Pemrograman  yang dipakai :
  1. HTML
  2. CSS
  3. JavaScript
  4. Bootstrap
  5. PHP
 
 Stack yang digunakan:
 login.php -> adalah controller agar mengatur masuk login atau tidaknya (mengecek)
 
 Controller.php -> adalah Controller untuk Data Daerah
 
 ControllerPenduduk.php -> adalah Controller untuk Data Penduduk
 
 config.php -> didalamnya ada function rupiah yang digunakan untuk mengubah nilai menjadi rupiah , dan didalamnya jga ada $koneksi untuk Mengkoneksikan Database
