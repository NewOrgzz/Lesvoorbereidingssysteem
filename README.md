# NewOrgzr

Een Laravel applicatie voor het beheren van lesvoorbereidingen.

## Beschrijving

NewOrgzr is een webapplicatie waarmee docenten lesvoorbereidingen kunnen maken, beheren en organiseren. De applicatie ondersteunt het beheer van schooljaren, vakken, lesvoorbereidingen en lesversies.

## Technologie Stack

-   **Backend**: Laravel 12
-   **PHP**: 8.2+
-   **Database**: PostgreSQL (via Docker) of SQLite
-   **Frontend**: Tailwind CSS, Alpine.js
-   **Build Tool**: Vite
-   **Authenticatie**: Laravel Breeze

## Vereisten

-   PHP 8.2 of hoger
-   Composer
-   Node.js en npm
-   Docker en Docker Compose (optioneel, voor containerized setup)

## Functies

-   **Authenticatie**: Registratie en inloggen via Laravel Breeze
-   **Schooljaren**: Beheer van schooljaren
-   **Vakken**: Beheer van vakken/subjecten
-   **Lesvoorbereidingen**: Maak en beheer lesvoorbereidingen met details zoals:
    -   Titel, datum, tijd, lokaal
    -   Groepssamenstelling
    -   Beginsituatie en leerdoelen
    -   Voorbereiding en werkvorm
    -   Materiaal type
-   **Lesversies**: Versiebeheer voor lesvoorbereidingen
-   **Dashboard**: Overzicht van alle lesvoorbereidingen
-   **Instellingen**: Gebruikersinstellingen

## Development

Run alle development services tegelijk:

```bash
composer dev
```

Dit start:

-   Laravel development server
-   Queue worker
-   Laravel Pail (logs)
-   Vite dev server

## Testing

Voer tests uit met:

```bash
php artisan test
```
