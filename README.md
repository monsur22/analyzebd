
# Project Setup with Laravel Sail in Docker

This guide will help you set up and run a this  project using Laravel Sail in Docker.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

- Docker
- Docker Compose
- Git

## Setup Instructions

1. **Clone the Project Repository:**
   ```bash
   git clone https://github.com/monsur22/analyzebd.git
   ```

2. **Start Docker Containers:**
   - Navigate to the project directory.
   - Run the `up.sh` script to start the Docker containers:
     ```bash
     ./up.sh
     ```

3. **Check Docker Containers:**
   - After running the `up.sh` script, check the status of Docker containers by running:
     ```bash
     docker ps -a
     ```

4. **Enter Docker Container:**
   - Once the containers are running, enter the Laravel Sail container by running:
     ```bash
     docker exec -it <sail-8.3/app container id> bash
     ```

5. **Install or Update Composer Dependencies:**
   - Inside the Docker container, run either of the following commands based on your requirements:
     - To install dependencies:
       ```bash
       composer install
       ```
     - To update dependencies:
       ```bash
       composer update
       ```

6. **Migrate Database and Seed:**
   - While still inside the Docker container, run the following command to migrate the database and seed it with sample data:
     ```bash
     php artisan migrate:fresh --seed
     ```

7. **Access the Project:**
   - Once the migration and seeding are complete, you can access the project in your web browser by navigating to `http://localhost`.
   - Login using the following credentials:
     - **Email:** admin@admin.com
     - **Password:** 12345678
8. **Access the Project:**
   - For test the PHP Unit test
     ```bash
    php artisan test --filter UserServiceTest
     ```

## Additional Notes

- If you encounter any issues during setup or while running the project, refer to the [Laravel Sail documentation](https://laravel.com/docs/11.x/sail) for troubleshooting and additional information.
