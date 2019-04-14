---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://robot.work/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_2e1c96dcffcfe7e0eb58d6408f1d619e -->
## Register an User

> Example request:

```bash
curl -X POST "http://robot.work/api/auth/register" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json" \
    -d '{"name":"iEztM2QkZU3Wdewd","email":"ObZDZiIKqNnDd0SQ","password":"XhE27B02Y2kCaNb5","password_confirmation":"E7kbsYYqDcfeC20J"}'

```

```javascript
const url = new URL("http://robot.work/api/auth/register");

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

let body = {
    "name": "iEztM2QkZU3Wdewd",
    "email": "ObZDZiIKqNnDd0SQ",
    "password": "XhE27B02Y2kCaNb5",
    "password_confirmation": "E7kbsYYqDcfeC20J"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yb2JvdC53b3JrXC9hcGlcL2F1dGhcL3JlZ2lzdGVyIiwiaWF0Ij..."
}
```
> Example response (422):

```json
{
    "message": "The given data was invalid"
}
```

### HTTP Request
`POST api/auth/register`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name of the User.
    email | string |  required  | The email of the User.
    password | string |  required  | The password of the User.
    password_confirmation | string |  required  | The confirm password of the User.

<!-- END_2e1c96dcffcfe7e0eb58d6408f1d619e -->

<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Login and get JWT via given credentials

> Example request:

```bash
curl -X POST "http://robot.work/api/auth/login" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json" \
    -d '{"email":"oKStroE7L8jxaXw1","password":"U7LXSN0lVgsbltl7"}'

```

```javascript
const url = new URL("http://robot.work/api/auth/login");

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

let body = {
    "email": "oKStroE7L8jxaXw1",
    "password": "U7LXSN0lVgsbltl7"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yb2JvdC53b3JrXC9hcGlcL2F1dGhcL3JlZnJlc2giLCJpYXQi...",
    "user": {
        "id": 1,
        "name": "Antoher Person",
        "email": "rafi.aust1@live.com",
        "email_verified_at": null,
        "created_at": "2019-04-10 19:10:39",
        "updated_at": "2019-04-10 19:10:39"
    },
    "token_type": "bearer",
    "expires_in": 216000
}
```
> Example response (401):

```json
{
    "message": "The given data was invalid"
}
```

### HTTP Request
`POST api/auth/login`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | The email of the User.
    password | string |  required  | The password of the User.

<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_19ff1b6f8ce19d3c444e9b518e8f7160 -->
## Log the user out (Invalidate the token)

> Example request:

```bash
curl -X POST "http://robot.work/api/auth/logout" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://robot.work/api/auth/logout");

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "message": "Successfully logged out"
}
```
> Example response (422):

```json
{
    "message": "Unauthenticated"
}
```

### HTTP Request
`POST api/auth/logout`


<!-- END_19ff1b6f8ce19d3c444e9b518e8f7160 -->

<!-- START_994af8f47e3039ba6d6d67c09dd9e415 -->
## Refresh a token

> Example request:

```bash
curl -X POST "http://robot.work/api/auth/refresh" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://robot.work/api/auth/refresh");

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yb2JvdC53b3JrXC9hcGF1dGhcL3JlZnJlc2giLCJp...",
    "user": {
        "id": 1,
        "name": "Antoher Person",
        "email": "rafi.aust1@live.com",
        "email_verified_at": null,
        "created_at": "2019-04-10 19:10:39",
        "updated_at": "2019-04-10 19:10:39"
    },
    "token_type": "bearer",
    "expires_in": 216000
}
```
> Example response (401):

```json
{
    "message": "The given data was invalid"
}
```

### HTTP Request
`POST api/auth/refresh`


<!-- END_994af8f47e3039ba6d6d67c09dd9e415 -->

<!-- START_a47210337df3b4ba0df697c115ba0c1e -->
## Get the authenticated User

> Example request:

```bash
curl -X POST "http://robot.work/api/auth/me" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://robot.work/api/auth/me");

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "id": 1,
    "name": "Antoher Person",
    "email": "rafi.aust1@live.com",
    "email_verified_at": null,
    "created_at": "2019-04-10 19:10:39",
    "updated_at": "2019-04-10 19:10:39"
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated"
}
```

### HTTP Request
`POST api/auth/me`


<!-- END_a47210337df3b4ba0df697c115ba0c1e -->

<!-- START_c90279e42064149b7989f5b48f490f09 -->
## Display a list of all Robots

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://robot.work/api/v1/robots" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://robot.work/api/v1/robots");

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "CYOtmiDYgHqMGbvl",
            "speed": 45,
            "weight": 65,
            "power": 678,
            "user_id": 1
        },
        {
            "id": 2,
            "name": "ERgdfsgsgsgs",
            "speed": 45,
            "weight": 65,
            "power": 678,
            "user_id": 1
        }
    ],
    "links": {
        "first": "http:\/\/robot.work\/api\/v1\/robots?page=1",
        "last": "http:\/\/robot.work\/api\/v1\/robots?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/robot.work\/api\/v1\/robots",
        "per_page": 10,
        "to": 2,
        "total": 2
    }
}
```
> Example response (401):

```json
{
    "message": "Token not provided"
}
```
> Example response (401):

```json
{
    "message": "Token has Expired"
}
```
> Example response (401):

```json
{
    "message": "User not found"
}
```

### HTTP Request
`GET api/v1/robots`


<!-- END_c90279e42064149b7989f5b48f490f09 -->

<!-- START_ad87098cddc039c127433b7dc4d12e0f -->
## Display a Robot

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://robot.work/api/v1/robot/{id}" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://robot.work/api/v1/robot/{id}");

    let params = {
            "id": "QKxvBSpY8MfVgATD",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "id": 4,
    "name": "Jessica Jones",
    "roles": [
        "admin"
    ]
}
```
> Example response (500):

```json
{
    "message": "Robot not found with id"
}
```
> Example response (500):

```json
{
    "message": "Robot owner mismatched, you are not allowed to modify this robot"
}
```
> Example response (401):

```json
{
    "message": "Token not provided"
}
```
> Example response (401):

```json
{
    "message": "Token has Expired"
}
```
> Example response (401):

```json
{}
```

### HTTP Request
`GET api/v1/robot/{id}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  required  | Robot id

<!-- END_ad87098cddc039c127433b7dc4d12e0f -->

<!-- START_dfeb770204a62b87027afeba2b8fdbf8 -->
## Create a new Robot

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://robot.work/api/v1/robot" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json" \
    -d '{"name":"CtSd7IaNfr13HCN2","speed":43265632.49497,"weight":138999.176,"power":26278.870098}'

```

```javascript
const url = new URL("http://robot.work/api/v1/robot");

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

let body = {
    "name": "CtSd7IaNfr13HCN2",
    "speed": 43265632.49497,
    "weight": 138999.176,
    "power": 26278.870098
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (201):

```json
{
    "data": {
        "id": 1,
        "name": "CYOtmiDYgHqMGbvl",
        "speed": "45",
        "weight": "65",
        "power": "678",
        "user_id": 1
    },
    "version": "1.0.0"
}
```
> Example response (422):

```json
{
    "message": "The given data was invalid"
}
```
> Example response (401):

```json
{
    "message": "Token not provided"
}
```
> Example response (401):

```json
{
    "message": "Token has Expired"
}
```
> Example response (401):

```json
{}
```

### HTTP Request
`POST api/v1/robot`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name of the Robot.
    speed | float |  required  | The speed of the Robot.
    weight | float |  required  | The weight of the Robot.
    power | float |  required  | The power of the Robot.

<!-- END_dfeb770204a62b87027afeba2b8fdbf8 -->

<!-- START_65a74e83b92a3d95486a69d84cb14970 -->
## Update a Robot

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT "http://robot.work/api/v1/robot/{id}" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json" \
    -d '{"name":"sZ5Vf34Wl1MUeORa","speed":187321.01653083,"weight":206.594810477,"power":317936.37348288}'

```

```javascript
const url = new URL("http://robot.work/api/v1/robot/{id}");

    let params = {
            "id": "cX9KGBTeuCDQqiJr",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

let body = {
    "name": "sZ5Vf34Wl1MUeORa",
    "speed": 187321.01653083,
    "weight": 206.594810477,
    "power": 317936.37348288
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "CYOtmiDYgHqMGbvl",
        "speed": "45",
        "weight": "65",
        "power": "678",
        "user_id": 1
    },
    "version": "1.0.0"
}
```
> Example response (500):

```json
{
    "message": "Robot not found with id"
}
```
> Example response (500):

```json
{
    "message": "Robot owner mismatched, you are not allowed to modify this robot"
}
```
> Example response (401):

```json
{
    "message": "Token not provided"
}
```
> Example response (401):

```json
{
    "message": "Token has Expired"
}
```
> Example response (401):

```json
{}
```

### HTTP Request
`PUT api/v1/robot/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name of the Robot.
    speed | float |  required  | The speed of the Robot.
    weight | float |  required  | The weight of the Robot.
    power | float |  required  | The power of the Robot.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  required  | Robot id

<!-- END_65a74e83b92a3d95486a69d84cb14970 -->

<!-- START_8e0f1618c2f1ad7130ecb3cbff80c90c -->
## Delete a Robot

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://robot.work/api/v1/robot/{id}" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://robot.work/api/v1/robot/{id}");

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (204):

```json
{}
```
> Example response (500):

```json
{
    "message": "Robot not found with id"
}
```
> Example response (500):

```json
{
    "message": "Robot owner mismatched, you are not allowed to modify this robot"
}
```
> Example response (401):

```json
{
    "message": "Token not provided"
}
```
> Example response (401):

```json
{
    "message": "Token has Expired"
}
```
> Example response (401):

```json
{}
```

### HTTP Request
`DELETE api/v1/robot/{id}`


<!-- END_8e0f1618c2f1ad7130ecb3cbff80c90c -->

<!-- START_4b749bd7372fd460f6d6bc1a03a46494 -->
## Import Robots from CSV file

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://robot.work/api/v1/robot-bulk" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json" \
    -d '{"file":"qscQho7zCuGXe8FK"}'

```

```javascript
const url = new URL("http://robot.work/api/v1/robot-bulk");

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

let body = {
    "file": "qscQho7zCuGXe8FK"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{}
```
> Example response (422):

```json
{
    "message": "The given data was invalid"
}
```
> Example response (500):

```json
{
    "message": "The structure of CSV file is not applicable to import"
}
```
> Example response (500):

```json
{
    "message": "The data of CSV file is not applicable to import"
}
```
> Example response (401):

```json
{
    "message": "Token not provided"
}
```
> Example response (401):

```json
{
    "message": "Token has Expired"
}
```
> Example response (401):

```json
{}
```

### HTTP Request
`POST api/v1/robot-bulk`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    file | file |  required  | Import CSV of the Robots.

<!-- END_4b749bd7372fd460f6d6bc1a03a46494 -->

<!-- START_f8e5c39679a782bfe5749a0955e78565 -->
## Display list of self owned and others Robots accourding to User

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://robot.work/api/v1/fight-robots" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://robot.work/api/v1/fight-robots");

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "ownedRobots": [
        {
            "id": 17,
            "name": "GOtmiDYgHqMGbvl",
            "speed": 45,
            "weight": 65,
            "power": 678,
            "user_id": 2
        },
        {
            "id": 2,
            "name": "ROtmiDYgHqMGbvl",
            "speed": 45,
            "weight": 65,
            "power": 678,
            "user_id": 2
        }
    ],
    "otherRobots": [
        {
            "id": 3,
            "name": "NmiDYgHqMGbvl",
            "speed": 45,
            "weight": 65,
            "power": 678,
            "user_id": 1
        },
        {
            "id": 16,
            "name": "CYOtmiDYgHqMGbvl",
            "speed": 45,
            "weight": 65,
            "power": 678,
            "user_id": 1
        }
    ]
}
```
> Example response (401):

```json
{
    "message": "Token not provided"
}
```
> Example response (401):

```json
{
    "message": "Token has Expired"
}
```
> Example response (401):

```json
{}
```

### HTTP Request
`GET api/v1/fight-robots`


<!-- END_f8e5c39679a782bfe5749a0955e78565 -->

<!-- START_758ebc52a6fd73ab50881461212dd4b2 -->
## Start fight between self and other Robot

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://robot.work/api/v1/start-fight" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json" \
    -d '{"contestant_robot_id":18,"opponent_robot_id":5}'

```

```javascript
const url = new URL("http://robot.work/api/v1/start-fight");

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

let body = {
    "contestant_robot_id": 18,
    "opponent_robot_id": 5
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (201):

```json
{
    "data": {
        "id": 1,
        "user_id": 2,
        "fight_detail": [
            {
                "fight_id": 1,
                "robot_id": "2",
                "result": 0,
                "date": "2019-04-09T15:00:00.000000Z"
            },
            {
                "fight_id": 1,
                "robot_id": "17",
                "result": 1,
                "date": "2019-04-09T15:00:00.000000Z"
            }
        ]
    },
    "version": "1.0.0"
}
```
> Example response (422):

```json
{
    "message": "The given data was invalid"
}
```
> Example response (500):

```json
{
    "message": "Wrong Input!, Robot not found with id 20"
}
```
> Example response (500):

```json
{
    "message": "Wrong Input!, You dont own any of these Robots"
}
```
> Example response (401):

```json
{
    "message": "Token not provided"
}
```
> Example response (401):

```json
{
    "message": "Token has Expired"
}
```

### HTTP Request
`POST api/v1/start-fight`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    contestant_robot_id | integer |  required  | Contestant Robot id (Robot belongs to the current logged in User).
    opponent_robot_id | integer |  required  | Opponent Robot id (Robot belongs to the other User).

<!-- END_758ebc52a6fd73ab50881461212dd4b2 -->

<!-- START_e6d714913ebe48aa9b9b80e058fda3c3 -->
## Display Home Data

> Example request:

```bash
curl -X GET -G "http://robot.work/api/v1/home" \
    -H "Authorization: Bearer: {token}" \
    -H "Accept: application/json"
```

```javascript
const url = new URL("http://robot.work/api/v1/home");

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "latest": [
        {
            "id": 1,
            "robot_1_name": "Yertwtwt",
            "robot_2_name": "Sfgssfgsfg",
            "winner_robot_name": "Sfgssfgsfg"
        }
    ],
    "top": [
        {
            "fights": 1,
            "wins": "1",
            "looses": 0,
            "robot_name": "Sfgssfgsfg"
        },
        {
            "fights": 1,
            "wins": "0",
            "looses": 1,
            "robot_name": "Yertwtwt"
        }
    ]
}
```

### HTTP Request
`GET api/v1/home`


<!-- END_e6d714913ebe48aa9b9b80e058fda3c3 -->


