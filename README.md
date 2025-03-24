# Petstore Laravel Application

This is a simple Laravel application for managing a pet store.

## Installation Instructions

### Prerequisites

- PHP >= 8.2
- Composer
- MySQL
- Node.js & npm

### Steps

1. **Clone the repository:**
    ```bash
    git clone https://github.com/janko8403/petstore.git
    cd petstore
    ```

2. **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3. **Copy the `.env.example` file to `.env`:**
    ```bash
    cp .env.example .env
    ```

4. **Generate the application key:**
    ```bash
    php artisan key:generate
    ```

5. **Set up the database:**
    - Create a new MySQL database.
    - Update the `.env` file with your database credentials.

6. **Run the migrations:**
    ```bash
    php artisan migrate
    ```

7. **Seed the database (optional):**
    ```bash
    php artisan db:seed
    ```

8. **Run the development server:**
    ```bash
    php artisan serve
    ```

9. **Compile the assets:**
    ```bash
    npm run dev
    ```

Your Laravel application should now be up and running. Open your browser and navigate to `http://localhost:8000` to see the application.

### Additional Commands

- **Run tests:**
    ```bash
    php artisan test
    ```

- **Compile assets for production:**
    ```bash
    npm run production
    ```

For more information, please refer to the [Laravel documentation](https://laravel.com/docs).
