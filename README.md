# Job Tracker - Laravel + Inertia.js Application

A modern job application tracking system built with Laravel and Inertia.js, featuring a Vue.js frontend with Tailwind CSS styling.

## 🛠️ Tech Stack

### Backend

- **Laravel 12.x**: PHP framework for robust backend functionality
- **PHP 8.x**: Modern PHP features and performance
- **MySQL**: Database for development
- **Inertia.js**: Modern monolith approach connecting Laravel and Vue

### Frontend

- **Vue.js 3**: Progressive JavaScript framework with Composition API
- **Inertia.js**: Client-side routing and state management
- **Tailwind CSS**: Utility-first CSS framework

## 🖥️ Screenshots

_Screenshot of the main job applications listing page_
![Dashboard](/public/screenshots/Screenshot%202025-07-31%20at%208.28.27 PM.png)
![Dashboard](/public/screenshots/Screenshot%202025-07-31%20at%208.29.23 PM.png)

### Create New Application

_Screenshot of the job application creation form_
![Create Application](/public/screenshots/Screenshot%202025-07-31%20at%208.28.50 PM.png)

### Mobile View

_Screenshot of responsive mobile interface_
![Mobile View](public/screenshots/Screenshot%202025-07-31%20at%208.43.54 PM.png)

## 🏗️ Project Structure

```
laraInertia/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── JobApplicationController.php
│   │   └── Resources/
│   │       └── JobApplicationResource.php
│   └── Models/
│       ├── User.php
│       └── JobApplication.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── js/
│   │   ├── Components/
│   │   ├── Layouts/
│   │   │   └── AuthenticatedLayout.vue
│   │   └── Pages/
│   │       ├── Auth/
│   │       └── JobApplications/
│   │           ├── Index.vue
│   │           ├── Create.vue
│   │           ├── Show.vue
│   │           └── Edit.vue
│   └── css/
│       └── app.css
├── routes/
│   └── web.php
└── public/
```

## 🔍 What is Laravel + Inertia.js?

### Laravel

Laravel is a web application framework with expressive, elegant syntax. It provides:

- Robust routing system
- Powerful ORM (Eloquent)
- Built-in authentication
- Artisan command-line tool
- Comprehensive testing support

### Inertia.js

Inertia.js allows you to quickly build modern single-page applications using classic server-side routing and controllers. It works as a glue between your Laravel backend and Vue.js frontend:

- **No API required**: Use your existing Laravel controllers
- **Server-side routing**: Leverage Laravel's powerful routing
- **Automatic code splitting**: Only load the JavaScript needed for each page
- **Seamless navigation**: SPA-like experience without the complexity

### Benefits of This Stack

1. **Developer Experience**: Familiar Laravel patterns with modern frontend
2. **Performance**: Optimized asset loading and minimal JavaScript
3. **SEO Friendly**: Server-side rendering capabilities
4. **Maintainable**: Single codebase for full-stack application
5. **Rapid Development**: Less boilerplate than traditional API + SPA approach

## 📚 Key Concepts Demonstrated

### Inertia.js Integration

- **Page Components**: Vue components rendered by Laravel controllers
- **Shared Data**: Global data available to all components
- **Form Handling**: Inertia form helpers for seamless form submission
- **Route Generation**: Ziggy for using Laravel routes in JavaScript

### Laravel Features

- **Resource Controllers**: RESTful controller pattern
- **API Resources**: Data transformation layer
- **Form Validation**: Request validation with error handling
- **Eloquent Relationships**: User-JobApplication relationship
- **Route Model Binding**: Automatic model resolution

### Vue.js Implementation

- **Composition API**: Modern Vue.js patterns
- **Component Architecture**: Reusable UI components
- **Reactive Data**: Real-time UI updates
- **Event Handling**: User interaction management

## 🆘 Support

If you encounter any issues or have questions:

1. Check the [Laravel documentation](https://laravel.com/docs)
2. Review [Inertia.js documentation](https://inertiajs.com/)
3. Search existing issues or create a new one

---

Built with ❤️ using Laravel, Inertia.js, and Vue.js
