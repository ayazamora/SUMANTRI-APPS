<a name="readme-top"></a>
<br />
<div align="center">


<h3 align="center">SUMANTRI APPS</h3>
  <p align="center">
      Aplikasi Pengelolaan Laundry
    <br />
  ${\color{yellow}(Sistem \space Manajemen \space Proyek \space Akuntansi)}$
    <br />
    Akuntansi | Politeknik TEDC Bandung
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details open>
  <summary>Panduan Pengguna</summary>
  <ol>
    <li>
      <a href="#Tentang-SUMANTRI-APPS">Tentang Sumantri Apps</a>
      <ul>
        <li><a href="#Dibangun-dengan">Dibangun Dengan</a></li>
      </ul>
    </li>
    <li>
      <a href="#Pendahuluan">Pendahuluan</a>
      <ul>
        <li><a href="#Kebutuhan-Apps">Kebutuhan Apps</a></li>
        <li><a href="#Installasi-Apps">Installasi Apps</a></li>
      </ul>
    </li>
    <li><a href="#Cara-Pengunaan">Cara Pengunaan</a></li>
    <li><a href="#Member">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## Tentang SUMANTRI APPS

SUMANTRI APPS merupakan project yang dibuat untuk mengelola usaha laundry agar lebih efisien dan praktis.

Fitur-Fitur yang tersedia:
<br /><br />
*** FITUR ADMIN ***
* Melihat Keseluruhan Jumlah Orderan Cucian, Uang Terkumpul, dan Pelanggan
* Daftar Pelanggan dan Dafar Karyawan
* Menambahkan Karyawan Baru
* Mengedit Jabatan/Posisi serta dapat menghapus karyawan yang ada.

*** FITUR KARYAWAN ***
* Melihat Jumlah Orderan Cucian, Uang Terkumpul, dan Pelanggan yang telah didapatkan (Pencapaian)
* Daftar Pelanggan
* Mengedit Status Orderan dan dapat menghapus Orderan
* Menambahkan Pelanggan Baru

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Dibangun dengan

Aplikasi ini dibuat dengan bantuan framework dan alat bantu lainnya seperti yang tertera berikut:

* [![Laravel][Laravel.com]][Laravel-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* [![JQuery][JQuery.com]][JQuery-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Pendahuluan

Pastikan kamu sudah menginstall Laragon/Xampp untuk webserver menjalankan aplikasi, selain itu pastikan juga kamu sudah menginstall NodeJS dan Composer ya!
Dan juga jangan lupa download dan install juga aplikasi GIT ya wajib! <a href="https://git-scm.com/downloads">Download GIT (klik disini)</a> 

### Kebutuhan Apps

+ Download terlebih dahulu kebutuhan apps yaitu file  ${\color{green} requirements.zip}$, agar aplikasi berjalan
```sh
https://github.com/ayazamora/sumantri-apps-support/blob/main/requirements.zip
```

### Installasi Apps

_Ikuti langkah demi langkah jangan diskip agar tidak error atau bermasalah._

1. Buka Command Line (CMD) atau Terimal di dalam folder _www_ atau _htdocs_ (sesuaikan kamu pakainya laragon atau xampp) dan sejenisnya
2. Pastikan path pada CMD atau Terminal sudah berada dalam folder lalu Clone Repository dengan menggunakan GIT, ketik :
   ```sh
   git clone https://github.com/ayazamora/SUMANTRI-APPS.git
   ```
3. Ketika sudah beres proses kloningnya, masuk ke folder hasil clone dan ekstrak file ${\color{green} requirements.zip}$ di dalam folder tersebut
4. Setelah proses ekstrak beres, buka CMD dan ketikan dan arahkan CMD ke _path_ folder hasil klonning, misal kamu menggunakan laragon pathnya _"(Disk C:\D:\E) \laragon\www\SUMANTRI-APPS"_
   ```sh
   cd SUMANTRI-APPS
   ```
   atau
   <br />
   ```sh
   cd (Disk C:\D:\E) \laragon\www\SUMANTRI-APPS
   ```
  
   contoh:
   <br />
   ```sh
   cd D:\laragon\www\SUMANTRI-APPS
   ```
   <br />
   <h4>Preview Contoh: </h4>
   
   ![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/97e00132-ee7d-4146-87aa-00e43daef531)

6. Kemudian di CMD tersebut ketik :
   ```sh
   npm install && npm run build
   ```
8. Setelah prosess install dan build tersebut selesai, masih di CMD yang barusan kita lakukan migrasi database laravel (PASTIKAN JIKA MENGGUNAKAN LARAGON/XAMPP, nyalakan MySQL), untuk melakukan migrasi ketik :
   ```sh
   php artisan migrate
   ```
9. Prosess migrasi database beres langsung lakukan seeder untuk membuat akun Admin (default), dengan ketik :
    ```sh
    php artisan db:seed
    ```
10. Jika sudah seperti itu tinggal jalankan Apps dengan membuka dibrowser (JIKA MNEGGUNAKAN LARAGON/XAMPP) "http://localhost/SUMANTRI-APPS/Public" atau perintah dengan ketik :
```sh
php artisan serve
```


<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Cara Pengunaan

Cara menggunakan aplikasi ini sangatlah sederhana, berikut cara menggunakannya :

1. Buka di web browser/chrome/firefox (JIKA MNEGGUNAKAN LARAGON/XAMPP) "http://localhost/SUMANTRI-APPS/Public"
2. Kemudian Login dengan akun Admin (default) berikut:
 ```sh
 Email: ayaapriyanti16@gmail.com
 Password: 12345678
```
<br />

![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/3cb8f7fa-0840-431f-a844-c8bc76d8ead6)

3. Setelah login, kamu akan diarahkan ke halaman dashboard Admin
   
   ![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/6c0302a5-aebb-4952-836a-765f3bdc6aae)

5. Di dashboard Admin, selain kamu bisa mendapatkan laporan laundry, kamu juga bisa menambahkan Karyawan

   ![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/d0800252-2b60-415f-82a2-e686a5a174de)

   ![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/51f1ca5b-3e09-4473-8a6d-bb568387f077)

7. Selain Menambahkan Karyawan, admin juga bisa mengedit informasi bahkan menghapus karyawan

   ![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/ec2f010a-6882-4ca0-9317-75f37e228eb1)

![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/0a34f8ba-f1a8-411f-a679-4b2578ba92eb)

8. Setelah akun karyawan terbuat, logout dulu kemudian login dengan menggunakan akun karyawan yang telah kamu buat
9. Maka akan langsung diarahkan ke dashboard karyawan

![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/9277ca4c-af99-4301-89ea-66754616b3cc)

![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/10b4f172-a564-4d5c-9828-8a6086d597dd)

![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/d43254eb-0667-4f0c-9bfa-2d2ff4b94864)

10. Di Dashboard Karyawam kamu dapat melihat progress kamu sendiri, serta kamu juga dapat menambahkan customer/pelanggan baru

![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/4cd83c65-232b-4a78-aca7-7d90bf257dfd)

11. Selain itu kamu juga dapat melihat laporan customer dan mengedit statusnya sesuai dengan progress cucian

    ![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/d8aa338f-b870-4ec7-a572-3fb78074ca87)

![image](https://github.com/ayazamora/SUMANTRI-APPS/assets/158838638/9d19e199-4720-4343-a5e2-db4c635014c6)

12. Nah, itu dia cara penggunaan aplikasi, simple dan efektif! Selamat Mencoba!
    
<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Member

<h4>KELOMPOK 7</h4>
-SUMANTRI APPS-
<br />
Siti Nurhayati Apriyanti (Admin Laundry) - NIM

Fathia (Karyawan Laundry) - NIM

Luthfia (Karyawan Laundry) - NIM

Anwar (Karyawan Laundry) - NIM



<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=for-the-badge
[contributors-url]: https://github.com/othneildrew/Best-README-Template/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/othneildrew/Best-README-Template/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=for-the-badge
[stars-url]: https://github.com/othneildrew/Best-README-Template/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://github.com/othneildrew/Best-README-Template/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/othneildrew/Best-README-Template/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/othneildrew
[product-screenshot]: images/screenshot.png
[Next.js]: https://img.shields.io/badge/next.js-000000?style=for-the-badge&logo=nextdotjs&logoColor=white
[Next-url]: https://nextjs.org/
[React.js]: https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB
[React-url]: https://reactjs.org/
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Angular.io]: https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-url]: https://angular.io/
[Svelte.dev]: https://img.shields.io/badge/Svelte-4A4A55?style=for-the-badge&logo=svelte&logoColor=FF3E00
[Svelte-url]: https://svelte.dev/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 



