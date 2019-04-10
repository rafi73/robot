# Robot Wars API

##### Application is hosted on http://robot.uh-oh.jp
##### Detailed documentation is available @ http://robot.uh-oh.jp/docs 
##### POSTMAN Collection is available @ http://robot.uh-oh.jp/docs/collection.json


###### * To use, Open Postman > File > Import > Import From Link > use "http://robot.uh-oh.jp/docs/collection.json" > Import

### Available Endpoints
1. Guest registration system based on JWT

    | Name | Endpoint|
    |--------------|----------------------------------------|
    | Registration | http://robot.uh-oh.jp/api/auth/register|
    | Login        | http://robot.uh-oh.jp/api/auth/login|
    | Logout       | http://robot.uh-oh.jp/api/auth/logout|
    | Refresh Token | http://robot.uh-oh.jp/api/auth/refresh|
    | Get logged in User |http://robot.uh-oh.jp/api/auth/me|



2. Users can manage their Robot own robots (Create, read Update, Delete)

    | Name | Endpoint|
    |--------------|----------------------------------------|
    | Create | http://robot.uh-oh.jp/api/v1/robot|
    | Read        | http://robot.uh-oh.jp/api/v1/robot/{id}|
    | Update       | http://robot.uh-oh.jp/api/v1/robot/{id}|
    | Delete | http://robot.uh-oh.jp/api/v1/robot/{id}|

3. User can add rotots can be added through CSV file

    | Name | Endpoint|
    |--------------|----------------------------------------|
    | Import CSV | http://robot.uh-oh.jp/api/v1/robot-bulk|

    ##### Following CSV structure is needed for the action

    | Name | Weight | Power | Speed |
    | ------ | ------ | ------ | ------ |
    | Tom | 89 | 50 | 45 |
    | Jack | 87 | 98 | 47 |
    | Harry | 87 | 95 | 85 |
    | David | 34 | 35 | 23 |

4. User can start fight by selecting one of his own and one other's Robot

    | Name | Endpoint|
    |--------------|----------------------------------------|
    | Robots for fight | http://robot.uh-oh.jp/api/v1/fight-robots|
    | Start Fight | http://robot.uh-oh.jp/api/v1/start-fight|

5. The Top 10 and Latest 5 fight result is available at homepage

    | Name | Endpoint|
    |--------------|----------------------------------------|
    | Result  |http://robot.uh-oh.jp/api/v1/home|


### Postman Setting
For testing using POSTMAN application, please use the following Header settings: 
| KEY | VALUE |
| ------ | ------ |
| Content-Type | application/json |
| Accept | application/json |

### Endpoints tests are available. (development environment)
```
$ git clone https://github.com/rafi73/robot.git
$ cd robot
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan jwt:secret
$ mysql -u [USER] -p
$ create database [DATABASE];
$ exit
$ vendor/bin/phpunit
```

