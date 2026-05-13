# CLT Toolbox Backend Feature Test

Backend technical test submission for PT. CLT Toolbox Indonesia.

---

# Completed Features

## Core Features

- [x] CRUD Suppliers
- [x] CRUD CLT Layups
- [x] CRUD CLT Layers

Hierarchy:
Supplier → Layups → Layers

---

## Import / Export

- [x] Export Supplier with related Layups and Layers
- [x] Import Supplier JSON data

Format used:
- JSON

---

## Conflict Resolution

Implemented strategy:

- [x] Overwrite Existing

Rules:
- Existing layer detected by:
  - same layup
  - same layer_order
- If thickness/width/angle differs:
  - existing data will be overwritten

---

# Tech Stack

- Laravel 12
- SQLite
- Tailwind CSS

---

# Database Structure

Supplier
- hasMany Layups

Layup
- belongsTo Supplier
- hasMany Layers

Layer
- belongsTo Layup

---

# Installation

## Clone Repository

```bash
git clone <repository-url>
```

## Install Dependencies

```bash
composer install
npm install
```

## Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

## SQLite Setup

Create file:

```text
database/database.sqlite
```

Update `.env`:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

## Run Migration

```bash
php artisan migrate
```

## Run Application

```bash
php artisan serve
npm run dev
```

---

# Export Feature

Export includes:
- Supplier
- Related Layups
- Related Layers

---

# Import Feature

Import supports:
- create layups
- create layers
- overwrite existing layer conflicts

---

# Demo

Demo video:
(Add demo video link here)
