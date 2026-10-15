# Laravel Blog App

A simple Laravel application for creating, viewing, editing, and deleting blog posts. Each post can optionally be associated with a user as its creator.

## Features

- List all posts and view an individual post
- Create, edit, and delete posts
- Assign a user as the post creator, or leave the post unassigned
- SQLite database configuration for local development

## Requirements

- PHP 8.3 or later
- Composer
- Node.js and npm

## Getting started

1. Install the PHP dependencies:

   ```bash
   composer install
   ```

2. Create your local environment file and application key:

   **Windows PowerShell:**

   ```powershell
   Copy-Item .env.example .env
   php artisan key:generate
   ```

   **macOS/Linux:**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. Create the SQLite database file if it does not exist:

   ```bash
   php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
   ```

4. Run the database migrations and seed the example user:

   ```bash
   php artisan migrate --seed
   ```

5. Install frontend dependencies and build the assets:

   ```bash
   npm install
   npm run build
   ```

6. Start the Laravel development server:

   ```bash
   php artisan serve
   ```

Open [http://localhost:8000](http://localhost:8000) and use the **All Posts** navigation link, or go directly to [http://localhost:8000/posts](http://localhost:8000/posts).

For live frontend asset rebuilding during development, run `npm run dev` in a second terminal instead of building once.

## Database and sample data

The default configuration uses SQLite. The database file is `database/database.sqlite`, which is excluded from Git. Migrations create the users and posts tables; a post's `user_id` is nullable, so posts can have no assigned creator. The database seeder creates a sample user:

- Name: `Test User`
- Email: `test@example.com`

## Main routes

| Method | Path | Purpose |
| --- | --- | --- |
| GET | `/posts` | List posts |
| GET | `/posts/create` | Show the create form |
| POST | `/posts` | Save a post |
| GET | `/posts/{post}` | Show one post |
| GET | `/posts/{post}/edit` | Show the edit form |
| PUT | `/posts/{post}` | Update a post |
| DELETE | `/posts/{post}` | Delete a post |

## Running tests

```bash
php artisan test
```
