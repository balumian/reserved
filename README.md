# Project Technical Documentation

## Project description
A Laravel-based web application providing restaurant discovery, menus, reservations and ordering with an admin panel to manage content, users and reports.  

#### Demo Link: https://re-served.ae

## Prerequisites (Windows)
- PHP (match composer.json required version; common requirement: PHP >= 8.1)
- Composer
- Node.js + npm
- MySQL / PostgreSQL (or other DB configured in .env)
- Git (optional)

## How to run (PowerShell)
1. Clone and open project root (d:\personal).
2. Install PHP dependencies:
   ```powershell
   composer install
   ```
3. Copy environment and generate key:
   ```powershell
   copy .env.example .env
   php artisan key:generate
   ```
4. Configure `.env` (DB, mail, storage driver, app URL).
5. Run migrations and optional seeders:
   ```powershell
   php artisan migrate
   php artisan db:seed
   ```
6. Install frontend deps and build:
   ```powershell
   npm install
   npm run dev      # for development
   npm run build    # for production
   ```
7. Serve locally:
   ```powershell
   php artisan serve
   ```



## Application modules (features)
- User Authentication & Profiles — register, login, password reset and profile management.
- Restaurant Listing & Management — create, edit and list restaurants with metadata and hours.
- Menu Management — categories, menu items, pricing, images and modifiers.
- Reservation / Booking — table reservations with time slots, capacity checks and confirmations.
- Orders & Checkout — place and track orders (dine-in / takeaway / delivery).
- Payments & Billing — payment gateway integration, transactions and refunds.
- Reviews & Ratings — user reviews, star ratings and moderation.
- Search & Filters — search by name, cuisine, filters and sorting.
- Geolocation & Maps — address lookup, distance calculations and map view.
- Admin Panel & Roles — dashboard, role-based access control and management tools.
- Content Management (CMS) — static pages, banners and promo content editing.
- Notifications & Emails — email/SMS/push for confirmations and status updates.
- File Uploads & Media — image upload, resizing and storage/CDN support.
- Reporting & Analytics — sales, reservations and usage reports/dashboards.
- Promotions & Coupons — coupon creation, validation and discount mechanics.
- API & Integrations — public/internal APIs, webhooks and third-party integrations.
- Settings & Configuration — global app settings and feature toggles.

## Code modules (folders) 
- app/ — application logic: Controllers, Models, Services, Notifications.
- routes/ — web and API route definitions.
- resources/views/ — Blade templates for front-end & admin.
- public/ — compiled assets, vendor JS/CSS and images.
- config/ — runtime configuration files (mail, queue, database).
- database/ — migrations and seeders.
- storage/ — logs, cache and compiled views (must be writable).
- bootstrap/ — framework bootstrap and cache.
- vendor/ — Composer dependencies.

## Directory structure 
- Reserved System
  - .env.example
  - artisan
  - composer.json
  - package.json
  - phpunit.xml
  - app/
  - bootstrap/
  - config/
  - database/
  - public/
    - admin/
      - assets/
      - vendors/
    - error_log
  - resources/
    - views/
  - storage/
  - vendor/

## Environment variables to check 
- APP_ENV, APP_URL, APP_KEY
- DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
- MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_FROM_ADDRESS
