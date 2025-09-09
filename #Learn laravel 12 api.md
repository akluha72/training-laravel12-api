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
    -- Eager loaded to prevent N+1 query problems. 

## [05] Web Client with VUE.js
### Definition: 
    -- Testing out the real-world use case when consuming the API that we just created. 

### Objective: 
    -- To create a web client to test the API. 
    -- Using axios and vue.js
    

## [06] Data Pagination via API
### Definition:
    -- In non API ways, the way we would do this is. we use pagination() in controllers. and links() in the blade. 

    -- But when we use API. The consumer might not use laravel right? 
    -- So when we use "API resources" and "pagination()" then it will give a somekind of meta data of the entire response body structure that the non-laravel consumer can use to create a pagination. 

### Objective 
    -- Understanding pagination metadata in API response
    -- using laravel vue pagination package for front-end implementation.
    -- how to consume pagination data in the front-end. 

## [07] Create a new record: POST from HTML form
### Useful Links:
    - https://http.cat/
    - https://httpstatuses.io/


## [08] Validation, Erros and status codes
### Definition: 
### Objectives: 
    - To make sure that the user that make a POST request to our API endpoint are authN and authN
    - To add some rules that on the Backend side to filter/sanitize the data that will be submitted into our database. 
### Steps:
    - php artisan make:request StoreCategoryRequest
    - public function store(StoreCategoryRequest $request) 

