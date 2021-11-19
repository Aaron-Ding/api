API sample

* clone the repo
 ```bash
git clone https://github.com/Aaron-Ding/api.git
git checkout origin/master

 * Create database api in mysql (user root and no password)
   > CREATE DATABASE api_canada_drive;
 * cp .env.example to .env in project
   > cp .env.example .env
 * Run composer to install laravel packages
   > composer install
 * Run migration and seed (seeding done inside the migrations)
   > php artisan migrate
 * Generate application key
   > php artisan key:generate
 * Complie Frontend VueJs code
   > npm install
   > npm run dev 


 * Run Unit Test (under root directory) 
 > ./vendor/bin/phpunit



API DOCUMETATION

# REST API

The REST API Documentation.

## Get list of Guests

### Request

`GET /api/leaderboard/users`

### Response

    HTTP/1.1 200 OK
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

   {
    "data": [
        {
            "id": 3,
            "name": "Rogelio",
            "point": 30,
            "address": "963 Clemmie Gardens Suite 378\nStacymouth, OK 91904-0871",
            "age": 18
        },
        {
            "id": 1,
            "name": "Frances",
            "point": 20,
            "address": "6166 Labadie Fall\nNorth Frankie, OH 30810-9313",
            "age": 34
        },
        {
            "id": 2,
            "name": "Jazlyn",
            "point": 10,
            "address": "1923 Myrl Fords Apt. 656\nCleoberg, DE 73460-1908",
            "age": 27
        },
        {
            "id": 4,
            "name": "Joanny",
            "point": 0,
            "address": "700 Trantow Manors Apt. 995\nJadeburgh, MD 96984-7974",
            "age": 57
        }
    ]
   }

## Create a new Guest

### Request
        {
           "name": "qingyang",
           "address": "1 Ave Des Flandres",
           "age": 20
           }

`POST api/leaderboard/user`

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 201 Created
    Connection: close
    Content-Type: application/json
    Location: /thing/1
    Content-Length: 36

            {
            "id": 6,
            "name": "qingyang",
            "point": 0,
            "address": "1 Ave Des Flandres",
            "age": 20
        }

## Get a User by Id

### Request

`GET api/leaderboard/user/id`

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 36

            {
            "id": 6,
            "name": "qingyang",
            "point": 0,
            "address": "1 Ave Des Flandres",
            "age": 20
        }
        
## Update User Point

### Request
{'point': 10}

`POST api/leaderboard/user/id`

### Response

    HTTP/1.1 404 Not Found
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 404 Not Found
    Connection: close
    Content-Type: application/json
    Content-Length: 35

        {
            "id": 6,
            "name": "qingyang",
            "point": 10,
            "address": "1 Ave Des Flandres",
            "age": 20
        }

## delete a user

### Request

`DELETE api/leaderboard/user/id`

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 201 Created
    Connection: close
    Content-Type: application/json
    Location: /thing/2
    Content-Length: 35

    {true}
