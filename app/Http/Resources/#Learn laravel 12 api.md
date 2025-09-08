# Learn laravel 12 api 

## Laravel API resources
- Definition: 
    -- Transformation layer that sists between your Eloquent models and the JSON responses. 
    -- We can do this with convert the eloquent models. or JSON by converting the data from model into JSON and defined what are the data should be displayed to the user. 

- Objective: 
    -- To displayed only selected field to the user from your own Eloquent Models
    -- Eloquent Resources provide more granular and robust control over the JSON serialization of your models and their relationships
    -- We can use API Resources to hide or modify fields


## Why 404 page? setting correct headers 
### Definition:
    -- For API, when error handling shouldn't return 404 page. user are expecting some kind of information. in this case we should return JSON
    
### Objective:
    -- To make sure that it return JSON error message/status. instead of 404 page.
    -- With this method. On the client side. will always get JSON response doesn't matter if they set the [Accept: Application/json] or not.
    -- Customizing Error Message

### Steps: 
    -- Set headers using Middleware.
    -- Prepend the Middleware to the API routes. 

### Side Notes: 
    -- Middleware not just for preventing for something to happens. We can add something to that request and pass that to the next request.
    -- This is a bad error message: "No query results for model [App\\Models\\Category] 13". 
    -- 

## List inside of List: Multi-level data
### Definition: 
    -- Creating a nested data? 

### Objective: 
    -- Using API resources other API resource
    -- Managing eager loading
    -- Creating a nested data in one single response. 
    -- Using different resources in different resources. 
### Side Notes: 
    --  everytime need to create a new models usel this artisan command
    --  `php artisan make:model Product -mf`
    --  this will include migration, model, factory
        --- Migration -> Models -> Factory -> DatabaseSeeder -> `php artisan migrate:fresh --seed`
    --  Once Controller are created always create a API resouce for the controller.  
