## Laravel miscroservice with Docker Setup

To set up the project,

- Clone the repository from source control.
- Navigate to the cloned repo on your computer using the CLI and do the following
    - Copy example env file to env `cp .env.example .env`.
    - cd into main-service and admin service 
    - Install composer packages using `composer install`.
    - Generate application key using `php artisan key:generate`.
    - Copy .env.example to .env
    - run composer install
    - docker compose build
    - docker compose up
