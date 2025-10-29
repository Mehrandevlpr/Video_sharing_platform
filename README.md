# 🎥 Video Sharing Platform

This is a **Video Sharing Platform** built using **Laravel**, following multiple **Laravel best practice concepts**.  
It’s designed to demonstrate scalable, maintainable, and clean Laravel architecture — perfect for learning and real-world development.

---

## 🚀 Features

- 🔐 **User Authentication** (Register, Login, Logout)
- 🎞️ **Video Upload & Processing**
- 💬 **Comment System**
- 👍 **Like / Dislike System**
- 🧭 **Advanced Routing Structure**
- 🧩 **Service Container & Dependency Injection**
- 🏗️ **Repository & Service Pattern**
- 🧵 **Job Queues & Events**
- 📡 **Real-time Notifications (Broadcasting with Pusher / Laravel Echo)**
- 📁 **Media Management (Storage & File Handling)**
- 📊 **Dashboard for Users and Admins**
- 🧰 **RESTful API Structure**
- 🧪 **Unit & Feature Tests**

---

## 🧱 Tech Stack

- **Framework:** Laravel (Latest version)
- **Database:** MySQL 
- **Front-end:** Blade
- **Styling:** Tailwind CSS
- **Storage:** Laravel Filesystem (Local)
- **Queue:** Redis / Database Queue
- **Broadcasting:** Pusher / Laravel Echo

---

## 🧭 Laravel Best Practices Implemented

| Concept | Description |
|----------|--------------|
| **Service Container** | Dependency injection to reduce coupling |
| **Repository Pattern** | Abstracted database layer for clean querying |
| **Service Pattern** | Business logic separated from controllers |
| **Observer Pattern** | Automatic handling of model events |
| **Event & Listener** | Decoupled, asynchronous event flow |
| **Queue & Job System** | Background video processing and email sending |
| **Form Request Validation** | Centralized validation logic |
| **API Resource Transformation** | Clean and consistent API responses |
| **Custom Middleware** | Layered request handling |
| **Policy & Gate Authorization** | Role-based access control |
| **Exception Handling** | Centralized error management |

---

## 🏗️ Project Structure
<pre>
app/
├── Console/
├── Events/
├── Exceptions/
├── Http/
│ ├── Controllers/
│ ├── Middleware/
│ └── Requests/
├── Jobs/
├── Listeners/
├── Models/
├── Policies/
├── Providers/
└── Services/
</pre>
