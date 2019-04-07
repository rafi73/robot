# Dillinger

[![N|Solid](https://cldup.com/dTxpPi9lDf.thumb.png)](https://nodesource.com/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Dillinger is a cloud-enabled, mobile-ready, offline-storage, AngularJS powered HTML5 Markdown editor.

  - Type some Markdown on the left
  - See HTML in the right
  - Magic

# New Features!

  - Import a HTML file and watch it magically convert to Markdown
  - Drag and drop images (requires your Dropbox account be linked)


# Development

Want to contribute? Great!

Dillinger uses Gulp + Webpack for fast developing.
Make a change in your file and instantanously see your updates!

For testing using POSTMAN application, please use the following settings,
Header: 
| KEY | VALUE |
| ------ | ------ |
| X-Requested-With | XMLHttpRequest |
| Content-Type | application/json |
| Accept | application/json |


# Register 
Request Type : [POST] 
URL : http://robot.work/api/auth/register

Please use the following info into `body` -> `raw` and select `JSON (application/json)` section in postman
```sh
{
	"name": "Golam Mahmud Rafi",
	"email": "test@gmail.com",
	"password": "123456",
	"password_confirmation": "123456"
}
```
After registration, system will return a `token` like following : 
```sh
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yb2JvdC53b3JrXC9hcGlcL2F1dGhcL3JlZ2lzdGVyIiwiaWF0IjoxNTU0NjQ2NDk1LCJleHAiOjE1NTQ2NTM2OTUsIm5iZiI6MTU1NDY0NjQ5NSwianRpIjoidk9uSkg3cFV2cjF0eGZ3RSIsInN1YiI6MSwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.fW09NpK-yQM5cjX8dXwcOx3s_jcGPZJBfoD-UyxndvA"
}
```

If someone try to use any of the routes where authentication is needed, they will get this as response
```sh
{
    "message": "Token not provided",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\UnauthorizedHttpException"
}
```
`Token` has a validity, currently it's set to 120 min and can be changed. If 120 min passed since generation of `token`, the user will be logged out. `refresh token api` is available if user wants to continue the smooth operation.


```sh
{
    "message": "Token has expired",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\UnauthorizedHttpException"
}
```
# Login 
Request Type : [POST] 
URL : http://robot.work/api/auth/login

To Login into the system, simple use the following info into `body` -> `raw` and select `JSON (application/json)` section in postman or you can use `form-data` as well:
For production release:
```sh
{
	"email": "test@gmail.com",
	"password": "123456"
}
```
If the login credentials are correct, you will get the following response:
```sh
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yb2JvdC53b3JrXC9hcGlcL2F1dGhcL2xvZ2luIiwiaWF0IjoxNTU0NjQ3MzA4LCJleHAiOjE1NTQ2NTQ1MDgsIm5iZiI6MTU1NDY0NzMwOCwianRpIjoiQVc3RVJzQXlRNkprVDFBTyIsInN1YiI6MiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.5VnGmwXjtH9j5m64h126gOjMuIhs8IVizU_B51DCfA8",
    "user": {
        "id": 2,
        "name": "Golam Mahmud Rafi",
        "email": "test@gmail.com",
        "email_verified_at": null,
        "created_at": "2019-04-07 23:27:58",
        "updated_at": "2019-04-07 23:27:58"
    },
    "token_type": "bearer",
    "expires_in": 7200
}
```

Please set the `token` in `Authorization` of postman. It's needed on every API request that requires auth.

# Robot 
Robot has the following routes to manage the robot. 
    

##### Create new Robot
Request type :[POST]
URL : `http://robot.work/api/v1/robot`
Simply use the following info into `body` -> `raw` and select `JSON (application/json)` section in postman or you can use `form-data` as well:
```sh
{
    "name": "Nick",
    "speed": 5,
    "weight": 6,
    "power": 7,
}
```

##### Edit existing Robot
Request type :[PUT]
URL : http://robot.work/api/v1/robot/{robotId}
Simply use the following info into `body` -> `raw` and select `JSON (application/json)` section in postman or you can use `form-data` as well:
```sh
{
    "name": "Karl",
    "speed": 9,
    "weight": 5,
    "power": 5,
}
```

### Docker
Dillinger is very easy to install and deploy in a Docker container.

By default, the Docker will expose port 8080, so change this within the Dockerfile if necessary. When ready, simply use the Dockerfile to build the image.

```sh
cd dillinger
docker build -t joemccann/dillinger:${package.json.version} .
```
This will create the dillinger image and pull in the necessary dependencies. Be sure to swap out `${package.json.version}` with the actual version of Dillinger.

Once done, run the Docker image and map the port to whatever you wish on your host. In this example, we simply map port 8000 of the host to port 8080 of the Docker (or whatever port was exposed in the Dockerfile):

```sh
docker run -d -p 8000:8080 --restart="always" <youruser>/dillinger:${package.json.version}
```

Verify the deployment by navigating to your server address in your preferred browser.

```sh
127.0.0.1:8000
```

#### Kubernetes + Google Cloud

See [KUBERNETES.md](https://github.com/joemccann/dillinger/blob/master/KUBERNETES.md)


### Todos

 - Write MORE Tests
 - Add Night Mode

License
----

MIT


**Free Software, Hell Yeah!**

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [dill]: <https://github.com/joemccann/dillinger>
   [git-repo-url]: <https://github.com/joemccann/dillinger.git>
   [john gruber]: <http://daringfireball.net>
   [df1]: <http://daringfireball.net/projects/markdown/>
   [markdown-it]: <https://github.com/markdown-it/markdown-it>
   [Ace Editor]: <http://ace.ajax.org>
   [node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [@tjholowaychuk]: <http://twitter.com/tjholowaychuk>
   [express]: <http://expressjs.com>
   [AngularJS]: <http://angularjs.org>
   [Gulp]: <http://gulpjs.com>

   [PlDb]: <https://github.com/joemccann/dillinger/tree/master/plugins/dropbox/README.md>
   [PlGh]: <https://github.com/joemccann/dillinger/tree/master/plugins/github/README.md>
   [PlGd]: <https://github.com/joemccann/dillinger/tree/master/plugins/googledrive/README.md>
   [PlOd]: <https://github.com/joemccann/dillinger/tree/master/plugins/onedrive/README.md>
   [PlMe]: <https://github.com/joemccann/dillinger/tree/master/plugins/medium/README.md>
   [PlGa]: <https://github.com/RahulHP/dillinger/blob/master/plugins/googleanalytics/README.md>
