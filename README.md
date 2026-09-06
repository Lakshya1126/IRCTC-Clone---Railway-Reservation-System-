<div align="center">

# 🚆 IRCTC-Clone---Railway-Reservation-System- — IRCTC-Style Ticket Booking Platform

**A web-based system for searching trains, booking tickets, and managing railway operations**

[![PHP](https://img.shields.io/badge/PHP-Server--Side-777BB4?style=flat-square&logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=flat-square&logo=mysql)](https://www.mysql.com/)
[![HTML5](https://img.shields.io/badge/HTML5-Structure-E34F26?style=flat-square&logo=html5)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-Styling-1572B6?style=flat-square&logo=css3)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-Interactivity-F7DF1E?style=flat-square&logo=javascript)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![XAMPP](https://img.shields.io/badge/XAMPP-Local%20Server-FB7A24?style=flat-square)](https://www.apachefriends.org/)

</div>

---

## 📋 Table of Contents

1. [What is this Project?](#-what-is-this-project)
2. [Key Features](#-key-features)
3. [How it Works — End-to-End Flow](#-how-it-works--end-to-end-flow)
4. [Architecture Overview](#-architecture-overview)
5. [Project Structure](#-project-structure)
6. [Database Design](#-database-design)
7. [Page / Endpoint Reference](#-page--endpoint-reference)
8. [Installation & Running](#-installation--running)
9. [Tech Stack Summary](#-tech-stack-summary)
10. [User Roles](#-user-roles)
11. [Limitations](#-limitations)
12. [Future Scope](#-future-scope)

---

## 🎯 What is this Project?

The **Railway Reservation System** is a dynamic, web-based application built to simplify and automate the process of booking train tickets and managing railway services. Traditional manual booking is slow and error-prone; this system replaces it with a digital platform that gives passengers a smoother booking experience while giving railway staff centralized control over trains, fares, and bookings.

The system has two clearly separated sides:

- 🧍 **Passenger side** — search trains, check seat availability, book tickets, choose berth preferences, make payments, and manage bookings.
- 🛠️ **Admin side** — manage train schedules, monitor bookings, update fares, and review system-wide activity.

Built with **PHP** on the backend and **MySQL** for data storage, with a responsive **HTML/CSS/JavaScript** frontend.

---

## ✨ Key Features

| Feature | Details |
|---|---|
| 🔐 **Authentication** | Separate login flows for passengers (`Login.php`) and admins (`Admin_login.php`), with session handling via `Session.php` |
| 🔎 **Train Search** | Search by source, destination, and travel date with real-time seat availability |
| 🎟️ **Ticket Booking** | End-to-end booking flow — `Submit_booking.php` → `View_booking.php` → `View_ticket.php` |
| ❌ **Cancellation** | Passengers can cancel a booked ticket (`Cancel.php`), which removes the booking record |
| 💳 **Payments** | Dedicated payment step (`Payment.php`) tied to each booking |
| 📜 **Booking History** | Passengers can view all their past and current bookings (`My_booking.php`) |
| 👤 **Passenger Dashboard** | Profile management and journey overview (`Dashboard.php`, `Profile.php`, `Register.php`) |
| 🛠️ **Admin Train Management** | Add, update, and delete trains (`Add_train.php`, `Update_train.php`, `Delete_train.php`, `Train_details.php`) |
| 📊 **Reporting** | Generates booking summaries and passenger reports for admin use |
| 🔒 **Data Integrity** | Primary/foreign key constraints, `NOT NULL` and `UNIQUE` rules, and seat-availability checks at the database level |

---

## 🔄 How it Works — End-to-End Flow

```
┌─────────────────────────────────────────────────────────────────────────┐
│                        PASSENGER BOOKING FLOW                           │
└─────────────────────────────────────────────────────────────────────────┘

1. LOGIN / REGISTER
   ├── Register.php  — new passenger sign-up
   └── Login.php      — existing passenger login (session started via Session.php)
         │
         ▼
2. SEARCH TRAINS (Index.php / Dashboard.php)
   ├── Enter source, destination, travel date
   └── System checks live seat availability against the Trains table
         │
         ▼
3. BOOK TICKET
   ├── Submit_booking.php — creates a Booking record (BookingID, UserID, TrainID, seats)
   └── Payment.php        — processes payment, creates linked Payment record
         │
         ▼
4. CONFIRMATION
   ├── View_booking.php — shows booking confirmation
   └── View_ticket.php  — generates/display the e-ticket
         │
         ▼
5. MANAGE BOOKINGS
   ├── My_booking.php — view all past & upcoming bookings
   └── Cancel.php      — cancel an existing booking

┌─────────────────────────────────────────────────────────────────────────┐
│                          ADMIN MANAGEMENT FLOW                          │
└─────────────────────────────────────────────────────────────────────────┘

1. Admin_login.php — admin authentication
         │
         ▼
2. Train_details.php — view all trains in the system
         │
         ├── Add_train.php     — add a new train (schedule, route, seats)
         ├── Update_train.php  — edit an existing train's details
         └── Delete_train.php  — remove a train
         │
         ▼
3. Monitor bookings, payments, and generate reports across all passengers
```

---

## 🏗️ Architecture Overview

The system follows a classic **client-server, page-based PHP architecture** — each feature is its own PHP script that talks directly to a shared MySQL database, rather than a REST API layer.

```
┌──────────────────────────────────────────────────────────────────────┐
│                   BROWSER (HTML + CSS + JavaScript)                  │
│         Login / Search / Booking / Dashboard / Admin pages           │
└───────────────────────────┬──────────────────────────────────────────┘
                            │ HTTP (form submissions / page requests)
                            ▼
┌──────────────────────────────────────────────────────────────────────┐
│                      APACHE + PHP (XAMPP)                            │
│                                                                      │
│  Passenger pages          Admin pages           Shared               │
│  ─────────────────        ────────────────      ─────────────        │
│  Login.php                Admin_login.php        db_connection.php   │
│  Register.php             Train_details.php       Session.php        │
│  Dashboard.php            Add_train.php                              │
│  Profile.php              Update_train.php                           │
│  Submit_booking.php       Delete_train.php                           │
│  Payment.php                                                        │
│  View_booking.php                                                    │
│  View_ticket.php                                                     │
│  My_booking.php                                                      │
│  Cancel.php                                                          │
│  Logout.php                                                          │
└───────────────────────────┬──────────────────────────────────────────┘
                            │ mysqli
                            ▼
┌──────────────────────────────────────────────────────────────────────┐
│                          MySQL DATABASE                              │
│        Users · Trains · Bookings · Payments · Admins                 │
└──────────────────────────────────────────────────────────────────────┘
```

---

## 📁 Project Structure

```
railway-reservation-system/
│
├── Index.php                # Landing page / entry point
├── Login.php                # Passenger login
├── Register.php             # Passenger sign-up
├── Session.php               # Session handling helpers
├── Logout.php                # Ends the active session
│
├── Dashboard.php             # Passenger dashboard (search, overview)
├── Profile.php                # Passenger profile management
├── Submit_booking.php         # Creates a new booking
├── Payment.php                # Handles payment for a booking
├── View_booking.php           # Booking confirmation view
├── View_ticket.php            # E-ticket display
├── My_booking.php             # List of a passenger's bookings
├── Cancel.php                 # Cancels a booking
│
├── Admin_login.php            # Admin authentication
├── Train_details.php          # Admin: view all trains
├── Add_train.php               # Admin: add a new train
├── Update_train.php            # Admin: edit train details
├── Delete_train.php            # Admin: remove a train
│
└── db_connection.php           # Shared MySQL connection (mysqli)
```

---

## 🗄️ Database Design

| Table | Description | Key Fields |
|---|---|---|
| **Users** | Stores passenger login and profile data | `UserID`, `Username`, `Password` |
| **Trains** | Stores train schedules and availability | `TrainID`, `Source`, `Destination`, `Seats` |
| **Bookings** | Passenger booking data | `BookingID`, `UserID`, `TrainID`, `BookingDate` |
| **Payments** | Payment details for bookings | `PaymentID`, `BookingID`, `Amount` |
| **Admins** | Admin login data | `AdminID`, `Password` |

**Relationships**

- **Admin → Train**: one-to-many (an admin manages many trains)
- **User → Booking**: one-to-many (a user can make many bookings)
- **Train → Booking**: one-to-many (a train can have many bookings)
- **Booking → Payment**: one-to-one (each booking has exactly one payment record)

**Integrity rules**: primary keys on all major tables, foreign keys linking `UserID`/`TrainID` across tables, `NOT NULL` on required fields, `UNIQUE` constraints on login credentials, and `CHECK`-style validation to keep seat availability above zero and travel dates valid.

---

## 🌐 Page / Endpoint Reference

### Passenger

| Page | Purpose |
|---|---|
| `Login.php` | Passenger login |
| `Register.php` | New passenger sign-up |
| `Dashboard.php` | Search trains, view overview |
| `Profile.php` | View/update passenger profile |
| `Submit_booking.php` | Submit a new ticket booking |
| `Payment.php` | Pay for a booking |
| `View_booking.php` | View a booking's confirmation |
| `View_ticket.php` | View/print the e-ticket |
| `My_booking.php` | List all bookings for the logged-in user |
| `Cancel.php` | Cancel a booking |
| `Logout.php` | End the session |

### Admin

| Page | Purpose |
|---|---|
| `Admin_login.php` | Admin login |
| `Train_details.php` | View all trains |
| `Add_train.php` | Add a new train |
| `Update_train.php` | Edit an existing train |
| `Delete_train.php` | Delete a train |

---

## 🚀 Installation & Running

### Prerequisites

| Tool | Purpose |
|---|---|
| XAMPP (Apache + PHP + MySQL) | Local server environment |
| phpMyAdmin / MySQL Workbench | Managing the database visually |
| VS Code or Notepad++ | Editing the project files |

### Steps

```bash
# 1. Place the project folder inside your XAMPP htdocs directory
#    e.g. C:\xampp\htdocs\railway-reservation-system

# 2. Start Apache and MySQL from the XAMPP control panel

# 3. Create the database
#    Open phpMyAdmin (http://localhost/phpmyadmin) and create a database named:
#    irctc_clone

# 4. Import the Users, Trains, Bookings, Payments, and Admins tables
#    (using the Database Design section above as a reference)

# 5. Confirm the connection settings in db_connection.php match your local setup:
#    host = localhost, user = root, password = "", dbname = irctc_clone

# 6. Open the app in your browser
#    http://localhost/railway-reservation-system/Index.php
```

---

## 🛠️ Tech Stack Summary

| Layer | Technology | Purpose |
|---|---|---|
| **Frontend** | HTML, CSS, JavaScript | Page structure, styling, and interactivity |
| **Backend** | PHP | Server-side processing and dynamic functionality |
| **Database** | MySQL (via `mysqli`) | Storing and managing train, user, booking, and payment data |
| **Local Server** | XAMPP | Apache + PHP + MySQL local development environment |
| **Database Tooling** | phpMyAdmin / MySQL Workbench | Visual database management |
| **Editor** | VS Code / Notepad++ | Development environment |

---

## 👥 User Roles

### Passenger
- Registers and logs in with username/password
- Searches trains by source, destination, and date
- Books tickets, selects berth preferences, and pays
- Views booking history and cancels tickets when needed

### Admin
- Logs in through a separate admin login page
- Adds, updates, and deletes train schedules
- Monitors all bookings and payments across the platform
- Reviews reports on ticket sales and train occupancy

---

## ⚠️ Limitations

- Requires continuous internet connectivity — no offline booking support
- Fixed modules; adding new routes or booking rules needs backend changes
- Built for a single railway network, not multiple zones or international routes
- No dedicated mobile app — desktop/laptop optimized only
- Limited payment gateway options
- No regional language support
- No real-time GPS train tracking

---

## 🔮 Future Scope

- AI-based train recommendations from passenger history and preferences
- Dedicated mobile app with e-tickets and real-time notifications
- Dynamic, demand-based fare pricing
- Voice assistant integration (Google Assistant, Siri, Alexa)
- Biometric ticket verification at stations
- Real-time GPS train tracking
- Bundled food, cab, and hotel booking alongside tickets
- Multilingual interface support
- Automated refunds and cancellations
- Advanced admin analytics dashboard

<div align="center">

Developed by Lakshya Kansal

</div>
