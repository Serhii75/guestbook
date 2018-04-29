# guestbook
Simple MVC Guestbook

How to install:
1. Clone or download the repository
2. Create virtual host
3. Reload your local server
4. Create DB and edit config file (guestbook/app/config/config.php)

What is done:
1.	Simple routing. Redirect to 404 page, if url is not found
2.	Parent controller and model, CRUD in the parent model
3.	Authrorization (login/register), editing profile. Check uniqueness of login and email
4.	Comments adding / editing / deleting.
5.	User can edit and delete onlyhis own comments. Admin can edit and delete all the comments.
7.	Simple adaptive design based on Bootstrap 4.
