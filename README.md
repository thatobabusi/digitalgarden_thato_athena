# Laravel 7 Thato Babusi - Project

A demo project showing my Laravel skills. This initially started off as 
a learning process of the new Laravel 6 standards, then Laravel 7.2 came out and 
I just had to get on to that ASAP. Although they say its not the LTS, it's a good 
start. The migration from 6-7 showed me a lot... 

Currently my company uses L5.1 with very complex sparghetti-code that I am refactoring, 
leaving very little room for me to learn on implement more up-to-date technologies, 
therefore this is my personal project to illustrate my understanding of said tech. 

Hopefully upon seeing how easy it is to get it done right this will motivate scrapping 
of their project and we can use this as a more modern skeleton base for the next version.

 
I took the concept of roles-permissions (students, teachers, admins), gates and
Eloquent Query Scopes from LaravelDaily QuickAdminPanel.
Purpose of this project was to create a CMS with modules.
The primary module for this purpose was a Blog Management Module. 
Still developing other modules that I will list here as we proceed.

Note the user of repositories here.
- - - - -

## Components
- Frontend
    - Blog List as landing page
        - Blog Categories
        - Blog Tags
        - Blog Archives
        - Blog Recommended
        - Blog Disqus Commenting
    - Embedded Twitter feed
- Backend
    - Admin Dashboard
    - Access Control
        - Permissions
        - Roles
    - Activity Log
    - Blog Management
        - Blog Posts
        - Blog Categories
        - Blog Tags
        - Blog Images
    - Developer Tools
        - Config
        - Code Editor
        - CRUD Generator
        - Module Manager
        - Uploads Manager
        - Telescope
        - Terminal
    - Menu Manager
    - Pages Manager
    - User Management
    
- 3rd Party Components
    - beyondcode/laravel-self-diagnosis
    - laravel/telescope
    - lorisleiva/laravel-deployer
    - mad-web/laravel-initializer
    - orangehill/iseed
    - rachidlaasri/laravel-installer
    - recca0120/terminal
    - spatie/laravel-activitylog
    - spatie/laravel-backup
    - spatie/laravel-menu (dont really need this as I am building my own)
    - xethron/migrations-generator
    - yajra/laravel-datatables
    - yajra/laravel-disqus
    
- - - - -

## TODO::Where we are heading with this...

- Module Manager
- CRUD Generation Manager
- Uploads Manager
- Menu Manager
- Configurations Manager
- Field Access Manager
- Code Editor Manager
- https://laraadmin.com/features

- - - - -

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL. 
- Admin's credentials: __admin@admin.com__ - __password__
- Teacher's credentials: __teacher@teacher.com__ - __password__
- Student's credentials: __student@student.com__ - __password__

- - - - -

## Commands

- php artisan app:install (runs everything needed to initiate the project)
- php artisan self-diagnosis (runs a diagnosis of the project)
- php artisan backup:run (runs a back up and stores it in storage/app/certainfolder)
- php artisan command:nubian (runs my special command that at the moment makes a backup and then runs diagnosis)

- - - - -

## Important System Links
- http://thatonew.test/ (frontend landing page)
- http://thatonew.test/login (login page)
- http://thatonew.test/admin (backend landing page if admin)
- http://thatonew.test/terminal (terminal page)
- http://thatonew.test/telescope (telescope dashboard)
- - - - -

## License

Basically, feel free to use and re-use any way you want.

- - - - -

## Credits
- This was initially forked and based off LaravelDaily Team's School Time Table Calendar project. Removed what I didn't need
and merged my own code that was already in progress from my Project Atlas.
- Check out our adminpanel generator [QuickAdminPanel](https://quickadminpanel.com)
- Enroll in our [Laravel Online Courses](https://laraveldaily.teachable.com/)
