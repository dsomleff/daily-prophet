# Daily Prophet

# Spec
Blog website with login functionality.
Users with contributor access should be able to post new blog posts, edit their posts and delete their posts.
There should be and admin account with email admin@admin.sk .
This account should be able to see all the posts and manage them – CRUD.
Admin user should be also able to assign roles (contributor role) in the system to other users.
Regular users should be able to view other users blog posts and post comments and like or dislike the posts.

# Technologies
- Languages: PHP 7.3, JavaScript
- Frameworks: Laravel 8.0, VueJS 2.6, Bootstrap 4.5
- Database: MySQL
- ORM: Eloquent
- VCS: GIT, GitHub

# Installation
>!!! CAUTION : you should take care of .env file. There is example with all needed fields. You should put there your DB
configs. !!!

```sh
$ composer install
$ php artisan migrate
$ php artisan db:seed
$ npm install
$ npm run dev
```

# Database
Check the DBStructure.png to review DB tables with relations and foreign keys.
Project contains migration files for creating tables, factories with Faker-generated-data and one DatabaseSeeder file.

# User / Auth / Role
According to my understanding of specification, our system has 4 types of users:
- _**Guest**_ - may only read the posts (like, comment function - not available). After registration become a Regular.
- _**Regular**_ - able to read, like and comment posts (no publish functions). Can edit personal info (change name, email,
  password, delete own account).
- _**Contributor**_ - able to CRUD action on own posts, like and comment any posts. May edit personal info (change name, email,
  password, delete own account).
- _**Admin**_ - almost god level🙂. Able to CRUD all posts and comments, change users roles and delete users include himself.

>Auth logic and routes taken from Laravel Jetstream.
> 
>Access for Users regulated by UserPolicy and Laravel Auth functionality.
> 
>All Users share the same password, which is - password.

# Post
Posts can be managed by CRUD functions.

**Create** <br />
Post can be created by admin or registered user with contributor role. There is validation on front (HTML5) and back
(Laravel) levels. Each field is required and should be in a given size. User with related privileges can find link for
post creation in navigation menu->dropdown->create new post.

**Read** <br />
Everybody can see every post on main page/author’s posts page/post page itself. There are no restrictions for this.

**Edit** <br />
Post can be edited only by admin or its author. Validation rules are the same as for creation. User can find link for
post editing (only if allowed) on post page or on page with all author’s posts.

**Delete** <br />
Post can be deleted only by admin or its author. On delete should be cascade deleting of post dependencies (likes, comments).

Post model has configured relationships with all connected instances (user, like, comment) and basic database
configuration (fillable/guarded fields explanation).
All fields for Post have StorePostRequest for validation purposes.

Access to Post CRUD regulated by PostPolicy.

Post controller has all needed CRUD functions plus additional.
>Method index is responsible for collecting all posts, pagination and direction this data to connected view (posts/index).
> 
>Method show is responsible for single post display. It receives post and returns view (posts/show) with compact.
> 
>Method edit is responsible for edit post page display. It receives post and returns view (posts/edit) with compact.
> 
>Method update is responsible for post updating.

# Comments
Registered Users able to do CRUD operations on own comments.
Comment model has configured relationships with all connected instances (user, post) and basic database
configuration (fillable/guarded fields explanation).
Field for Comment has StoreCommentRequest for validation purposes.
Access to Comment CRUD regulated by CommentPolicy.

# Likes
Registered Users able to like or dislike specific post.
Each post can be liked/dislike only once by each user.
Likes and Dislikes have own counter.
If some post was liked/disliked by mistake user can take it back.

# Vue.js
- Flash component responsible for displaying successful messages all over the app.
- Likeable component responsible for like/dislike logic with counter in a real time.
- Comment component allows edit and delete comment by author/admin, without reloading page.

# Routing
**App** <br />
``/`` and ``/posts`` - main page with posts, likes and pagination (5 posts on page). Post body has limited preview (500
symbols). <br />
``/post/{postID}`` - Page with whole Post with comments and likes. <br />
``/posts/create`` - Create new post page. <br />
``/posts/{postID}/edit/`` - Edit specific post page. <br />
``/about`` - Page with Dummy Data for UX integrity. <br />
``/contacts`` - Page with Dummy Data for UX consistency. <br />

**User section** <br />
``/users`` - Page where Admin able to change users roles or delete users. <br />
``/users/{userId}`` - Personal area where user able to see all own posts, edit or delete them. Also contains list of all users comments with a link to corresponding post. <br />
``/user/profile`` - Page for managing user account. (Check User section for more info)

**Auth** <br />
``/login`` - for registered users access <br />
``/register`` - use to join Daily Prophet community <br />
``/logout`` - User leave the building:)
