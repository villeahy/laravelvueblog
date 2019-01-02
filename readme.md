## How to get this working

Setup a virtual host
Set up db and laravel passport variables called
PASSPORT_LOGIN_ENDPOINT,
PASSPORT_CLIENT_ID=3,
PASSPORT_CLIENT_SECRET=
in .env file
for auth i use laravel passport password type https://laravel.com/docs/5.7/passport#creating-a-password-grant-client
so after running php aritsan migrate run php artisan passport:client --password to get client id and secret you can also run php artisan db:seed to generate 10 random post
Login end point for this env variable is "vhost-name"/oauth/token
then api end point should be

/ to get index GET

/api/login to log in to user POST

/api/register to register new user POST

/api/posts to get latest 4 posts GET

/api/post POST to make post / PUT to edit post

## Current status

Backend works pretty well now but i still need to add a websocket.

Front-end have some of basic functionalities like login and register but they are not completely done and need to still add a post filtering functionality and creating a post and stuff
