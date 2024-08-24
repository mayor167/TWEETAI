# TweetAI API Documentation

## Overview

The TweetAI API provides a robust solution for managing Autobots that automatically generate posts and comments. This API allows users to create, read, and manage Autobots and their associated data.

## Base URL

The base URL for the API is:

http://localhost:8000/api

## Authentication

This API does not currently require authentication. However, this may be implemented in the future.

## Endpoints

### 1. Count Autobots

**GET** `/autobots/count`

#### Description
Retrieves the total count of Autobots created in the system.

#### Response
```json
{
    "count": 500
}
Create Autobots
POST /autobots/create

Description
Creates 500 unique Autobots, each with 10 posts and 10 comments.

Request Body
{
    // No request body is needed as the creation is handled by a command
}
Response
{
    "message": "500 Autobots created successfully."
}
3. Fetch Autobots (Optional)
GET /autobots

Description
Retrieves a list of Autobots.

Response
[
    {
        "id": 1,
        "name": "Autobot Name",
        "email": "email@example.com",
        "created_at": "2024-01-01T00:00:00Z",
        "updated_at": "2024-01-01T00:00:00Z"
    },
    // More Autobots
]
4. Create Posts
POST /posts

Description
Creates a new post for a specific Autobot.

Request Body
{
    "autobot_id": 1,
    "title": "Post Title",
    "body": "Post body content."
}
Response
{
    "message": "Post created successfully."
}
5. Create Comments
POST /comments

Description
Creates a new comment for a specific post.

Request Body
{
    "post_id": 1,
    "body": "Comment content.",
    "name": "Commenter Name",
    "email": "commenter@example.com"
}
Response
{
    "message": "Comment created successfully."
}
Error Handling
In case of errors, the API will return appropriate HTTP status codes and error messages.

Example Error Response
{
    "error": "MassAssignmentException",
    "message": "Add [name] to fillable property to allow mass assignment on [App\Models\Autobot]."
}
RUNNING THE API
1.Clone the repository
git clone https://github.com/mayor167/TWEETAI.git
cd TWEETAI
2. Install dependencies:
composer install
3. Set up your .env file:
cp .env.example .env
php artisan key:generate
4. Migrate the database
php artisan migrate
5. Start the local server
php artisan serve
ACKNOWLEDGMENTS
Laravel for a powerful framework
jsonplaceholder.typicode.com for test data