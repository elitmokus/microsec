
## Alkalmazás telepítése

Laravel 11 keretrendszert használok (Inertia.js és Vue.js). 

#### Előfeltételek

- [Laravelt futtató környezet](https://laravel.com/docs/11.x/deployment) (pl.: XAMPP, [Herd](https://herd.laravel.com/windows), Laragon)
- NodeJs NPM
- Composer
- MySQL kapcsolat
  - adatbázis név: microsec
  - adatbázis hozzáférés: dbadmini / secret_password

#### Telepítés

Le kell futtatni az install.sh scriptet.

## App működése

- Login: Be lehet jelentkezni
- SignUp: Regisztrálni lehet
- Home: Üdvözli a belépett felhasználót
- Profile: A belépett felhasználó adatait lehet módosítani

Ha nem elérhető a MySQL adatbázis (app/AppServiceProvider.php-ban szimulált),<br> 
akkor írni nem lehet, csak olvasni a lokális SQLite adatbázisból.

Erről a problémáról a felhasználó kap visszajelzést.
