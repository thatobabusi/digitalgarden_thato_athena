# DigitalGarden Project Athena

A demo project showing my Laravel skills. This initially started off as 
a learning process of the new Laravel 6 standards, then Laravel 7.9.2 came out and 
I just had to get on to that ASAP. Although they say its not the LTS, it's a good 
start. The migration from 6-7 showed me a lot... 

*(This is a work in progress, It is in no way complete and I am making updates every evening)

## Laravel 7 Thato Babusi - Project

Currently my company uses an older version that I am refactoring, 
leaving very little room for me to learn on implement more up-to-date technologies, 
therefore this is my personal project to illustrate my understanding of said tech. 

Hopefully upon seeing how easy it is to get it done right this will motivate scrapping 
of their project and we can use this as a more modern skeleton base for the next version.

 
I took the concept of roles-permissions (students, teachers, admins), gates and
Eloquent Query Scopes from LaravelDaily QuickAdminPanel.
Purpose of this project was to create a CMS with modules.
The primary module for this purpose was a Blog Management Module. 
Still developing other modules that I will list here as we proceed.

Note the use of repositories here.
- - - - -

## Components
- Frontend
    - Blog List as landing page
        - Blog Categories
        - Blog Tags
        - Blog Archives
        - Blog Recommended
        - Blog Search
        - Blog Disqus Commenting
    - Embedded Twitter feed
    - Embedded Instagram feed
- Backend
    - Admin Dashboard
    - Access Control
    - Activity Log
    - Blog Management
    - Developer Tools
        - Log Viewer
        - Migration Manager
        - Module Manager
        - Route Browser
        - Telescope
        - Terminal
    - User Management

    
- - - - -

## Requirements

- PHP 7.4 (ideally) but should work on 7.3
- MySQL
- Composer / Vagrant / Homestead
- Environment that can run Laravel 7.6 (preferably from Homestead, I have not tested on default WAMP)
- If you have multiple PHP Versions installed make sure you enable 7.4 (__sudo update-alternatives --config php__ on homestead)

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL. 
- Admin's credentials: __admin@admin.com__ - __password__

- - - - -

## Commands

- php artisan nubian (runs my special command that lists all the commands I made and encorperated)
- php artisan self-diagnosis (runs a diagnosis of the project)
- php artisan backup:run (runs a back up and stores it in storage/app/certainfolder)

- - - - -

## License

Basically, feel free to use and re-use any way you want.

- - - - -

## Credits
- This was initially forked and based off LaravelDaily Team's School Time Table Calendar project. Removed what I didn't need
and merged my own code that was already in progress from my Project Atlas.
- Check out our adminpanel generator [QuickAdminPanel](https://quickadminpanel.com)
