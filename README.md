# NewOrgzr

<p align="center">
  <strong>Een moderne Laravel applicatie voor lesvoorbereiding en organisatie</strong>
</p>

## Over NewOrgzr

NewOrgzr is een web-applicatie gebouwd met Laravel die docenten helpt bij het organiseren en voorbereiden van hun lessen. De applicatie biedt een intuïtieve interface voor het beheren van schooljaren, vakken, lesvoorbereidingen en lesversies.

## Functies

-   **Gebruikersbeheer**: Volledig authenticatiesysteem met registratie en login
-   **Schooljaren**: Beheer van verschillende schooljaren
-   **Vakken**: Organisatie van vakken per schooljaar
-   **Lesvoorbereidingen**: Maak en beheer gedetailleerde lesvoorbereidingen
-   **Lesversies**: Versiebeheer voor lesmateriaal
-   **Dashboard**: Overzichtelijk dashboard met alle belangrijke informatie
-   **Profielbeheer**: Persoonlijke profielinstellingen

## Technische Stack

-   **Backend**: Laravel 11 (PHP)
-   **Frontend**: Blade templates met Tailwind CSS
-   **Database**: MySQL/PostgreSQL
-   **Authentication**: Laravel Breeze
-   **Styling**: Tailwind CSS

## Installatie

### Vereisten

-   PHP 8.2 of hoger
-   Composer
-   Node.js en npm
-   MySQL of PostgreSQL database

### Stappen

1. **Kloon de repository**

    ```bash
    git clone [repository-url]
    cd NewOrgzr
    ```

2. **Installeer PHP dependencies**

    ```bash
    composer install
    ```

3. **Kopieer environment bestand**

    ```bash
    cp .env.example .env
    ```

4. **Configureer database instellingen in `.env`**

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=neworgzr
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

5. **Genereer applicatie sleutel**

    ```bash
    php artisan key:generate
    ```

6. **Voer database migraties uit**

    ```bash
    php artisan migrate
    ```

7. **Installeer frontend dependencies**

    ```bash
    npm install
    ```

8. **Bouw assets**

    ```bash
    npm run build
    ```

9. **Start de development server**
    ```bash
    php artisan serve
    ```

De applicatie is nu beschikbaar op `http://localhost:8000`

## Database Structuur

De applicatie bevat de volgende hoofdtabellen:

-   **users**: Gebruikersaccounts
-   **schooljaren**: Schooljaren
-   **vakken**: Vakken per schooljaar
-   **lesvoorbereidingen**: Lesvoorbereidingen per vak
-   **lesversies**: Versies van lesmateriaal

## Ontwikkeling

### Code Style

Dit project volgt de PSR-12 coding standards voor PHP.

### Testing

Voer tests uit met:

```bash
php artisan test
```

### Database Seeding

Voor testdata:

```bash
php artisan db:seed
```

## Deployment

Voor productie deployment:

1. Zet `APP_ENV=production` in `.env`
2. Zet `APP_DEBUG=false` in `.env`
3. Voer `php artisan config:cache` uit
4. Voer `php artisan route:cache` uit
5. Voer `php artisan view:cache` uit

## Licentie

Dit project is open source software onder de [MIT licentie](https://opensource.org/licenses/MIT).

## Support

Voor vragen of problemen, neem contact op via de project issues of stuur een email naar het development team.
