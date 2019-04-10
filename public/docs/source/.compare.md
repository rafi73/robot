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
<!-- START_4b90f657df4927ac7a249b99226ea7e1 -->
## Get the index of a given version.

> Example request:

```bash
curl -X GET -G "http://robot.work/docs/search-index/{version}" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/docs/search-index/{version}");

let headers = {
    "Authorization": "Bearer {token}",
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

> Example response (403):

```json
{
    "message": "",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\HttpException",
    "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php",
    "line": 985,
    "trace": [
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\helpers.php",
            "line": 46,
            "function": "abort",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\helpers.php",
            "line": 66,
            "function": "abort"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\binarytorch\\larecipe\\src\\Http\\Controllers\\SearchController.php",
            "line": 53,
            "function": "abort_if"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\binarytorch\\larecipe\\src\\Http\\Controllers\\SearchController.php",
            "line": 34,
            "function": "authorizeAccessSearch",
            "class": "BinaryTorch\\LaRecipe\\Http\\Controllers\\SearchController",
            "type": "->"
        },
        {
            "function": "__invoke",
            "class": "BinaryTorch\\LaRecipe\\Http\\Controllers\\SearchController",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "call_user_func_array"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 219,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 176,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 680,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 75,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 56,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 66,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 682,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 657,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 623,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 612,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 276,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 260,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 36,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\Generator.php",
            "line": 57,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 201,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 59,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 32,
            "function": "call_user_func_array"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 90,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 34,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 580,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\symfony\\console\\Application.php",
            "line": 908,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\symfony\\console\\Application.php",
            "line": 269,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\symfony\\console\\Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 90,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET docs/search-index/{version}`


<!-- END_4b90f657df4927ac7a249b99226ea7e1 -->

<!-- START_568f07577ee68f8b1116e97fd4a5d842 -->
## docs/styles/{style}
> Example request:

```bash
curl -X GET -G "http://robot.work/docs/styles/{style}" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/docs/styles/{style}");

let headers = {
    "Authorization": "Bearer {token}",
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

> Example response (500):

```json
{
    "message": "Undefined offset: 1",
    "exception": "ErrorException",
    "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\binarytorch\\larecipe\\src\\Http\\Controllers\\StyleController.php",
    "line": 18,
    "trace": [
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\binarytorch\\larecipe\\src\\Http\\Controllers\\StyleController.php",
            "line": 18,
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "function": "__invoke",
            "class": "BinaryTorch\\LaRecipe\\Http\\Controllers\\StyleController",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "call_user_func_array"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 219,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 176,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 680,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 75,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 56,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 66,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 682,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 657,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 623,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 612,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 276,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 260,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 36,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\Generator.php",
            "line": 57,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 201,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 59,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 32,
            "function": "call_user_func_array"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 90,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 34,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 580,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\symfony\\console\\Application.php",
            "line": 908,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\symfony\\console\\Application.php",
            "line": 269,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\symfony\\console\\Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 90,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET docs/styles/{style}`


<!-- END_568f07577ee68f8b1116e97fd4a5d842 -->

<!-- START_7cdb95077f4d2842f8268003be0400e6 -->
## docs/scripts/{script}
> Example request:

```bash
curl -X GET -G "http://robot.work/docs/scripts/{script}" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/docs/scripts/{script}");

let headers = {
    "Authorization": "Bearer {token}",
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

> Example response (500):

```json
{
    "message": "Undefined offset: 1",
    "exception": "ErrorException",
    "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\binarytorch\\larecipe\\src\\Http\\Controllers\\ScriptController.php",
    "line": 18,
    "trace": [
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\binarytorch\\larecipe\\src\\Http\\Controllers\\ScriptController.php",
            "line": 18,
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "function": "__invoke",
            "class": "BinaryTorch\\LaRecipe\\Http\\Controllers\\ScriptController",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "call_user_func_array"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 219,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 176,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 680,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 75,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 56,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 66,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 682,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 657,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 623,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 612,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 276,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 260,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 36,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\Generator.php",
            "line": 57,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 201,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 59,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 32,
            "function": "call_user_func_array"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 90,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 34,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 580,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\symfony\\console\\Application.php",
            "line": 908,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\symfony\\console\\Application.php",
            "line": 269,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\symfony\\console\\Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 90,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Bitnami\\wampstack-7.1.22-0\\apache2\\htdocs\\robot\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET docs/scripts/{script}`


<!-- END_7cdb95077f4d2842f8268003be0400e6 -->

<!-- START_b49197dda1e390d1c17aa2d177702247 -->
## Redirect the index page of docs to the default version.

> Example request:

```bash
curl -X GET -G "http://robot.work/docs" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/docs");

let headers = {
    "Authorization": "Bearer {token}",
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

> Example response (302):

```json
null
```

### HTTP Request
`GET docs`


<!-- END_b49197dda1e390d1c17aa2d177702247 -->

<!-- START_9befedf0e2960c8902af7f03e63fbcb2 -->
## Show a documentation page.

> Example request:

```bash
curl -X GET -G "http://robot.work/docs/{version}/{page?}" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/docs/{version}/{page?}");

let headers = {
    "Authorization": "Bearer {token}",
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

> Example response (404):

```json
null
```

### HTTP Request
`GET docs/{version}/{page?}`


<!-- END_9befedf0e2960c8902af7f03e63fbcb2 -->

<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Get a JWT via given credentials.

> Example request:

```bash
curl -X POST "http://robot.work/api/auth/login" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/api/auth/login");

let headers = {
    "Authorization": "Bearer {token}",
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


### HTTP Request
`POST api/auth/login`


<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_19ff1b6f8ce19d3c444e9b518e8f7160 -->
## Log the user out (Invalidate the token).

> Example request:

```bash
curl -X POST "http://robot.work/api/auth/logout" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/api/auth/logout");

let headers = {
    "Authorization": "Bearer {token}",
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


### HTTP Request
`POST api/auth/logout`


<!-- END_19ff1b6f8ce19d3c444e9b518e8f7160 -->

<!-- START_994af8f47e3039ba6d6d67c09dd9e415 -->
## Refresh a token.

> Example request:

```bash
curl -X POST "http://robot.work/api/auth/refresh" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/api/auth/refresh");

let headers = {
    "Authorization": "Bearer {token}",
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


### HTTP Request
`POST api/auth/refresh`


<!-- END_994af8f47e3039ba6d6d67c09dd9e415 -->

<!-- START_a47210337df3b4ba0df697c115ba0c1e -->
## Get the authenticated User.

> Example request:

```bash
curl -X POST "http://robot.work/api/auth/me" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/api/auth/me");

let headers = {
    "Authorization": "Bearer {token}",
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


### HTTP Request
`POST api/auth/me`


<!-- END_a47210337df3b4ba0df697c115ba0c1e -->

<!-- START_2e1c96dcffcfe7e0eb58d6408f1d619e -->
## Register user

> Example request:

```bash
curl -X POST "http://robot.work/api/auth/register" \
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"name":"ZHhizDQyYv1BUH5S","email":"h1UWDoLXdEkc9FbW","password":"5uzjCLXF1cfanD2B","password_confirmation":"iHpXJvkrZA9mX9tR"}'

```

```javascript
const url = new URL("http://robot.work/api/auth/register");

let headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "ZHhizDQyYv1BUH5S",
    "email": "h1UWDoLXdEkc9FbW",
    "password": "5uzjCLXF1cfanD2B",
    "password_confirmation": "iHpXJvkrZA9mX9tR"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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

<!-- START_c90279e42064149b7989f5b48f490f09 -->
## Display a list of all Robots

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://robot.work/api/v1/robots" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/api/v1/robots");

    let params = {
            "id": "miQ63vYuMHhuRpCz",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {token}",
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

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  required  | Robot id

<!-- END_c90279e42064149b7989f5b48f490f09 -->

<!-- START_ad87098cddc039c127433b7dc4d12e0f -->
## Display a Robot

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://robot.work/api/v1/robot/{id}" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/api/v1/robot/{id}");

    let params = {
            "id": "kUcoo7YANBzonHRZ",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {token}",
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
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"name":"Oio0MKPHggtuFrVF","speed":2572.2232294,"weight":43068377.843268216,"power":38}'

```

```javascript
const url = new URL("http://robot.work/api/v1/robot");

let headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "Oio0MKPHggtuFrVF",
    "speed": 2572.2232294,
    "weight": 43068377.843268216,
    "power": 38
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
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"name":"I9If9WCGIKJQzioQ","speed":2057.660182269,"weight":317021.5640263,"power":7418278.50034548}'

```

```javascript
const url = new URL("http://robot.work/api/v1/robot/{id}");

    let params = {
            "id": "0adz2AUcnzUA9d0U",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "I9If9WCGIKJQzioQ",
    "speed": 2057.660182269,
    "weight": 317021.5640263,
    "power": 7418278.50034548
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
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/api/v1/robot/{id}");

let headers = {
    "Authorization": "Bearer {token}",
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
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"file":"F3mzBE9Lx6dn0qez"}'

```

```javascript
const url = new URL("http://robot.work/api/v1/robot-bulk");

let headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "file": "F3mzBE9Lx6dn0qez"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/api/v1/fight-robots");

    let params = {
            "id": "ayWeGvO4WWpIAC3T",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {token}",
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

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  required  | Robot id

<!-- END_f8e5c39679a782bfe5749a0955e78565 -->

<!-- START_758ebc52a6fd73ab50881461212dd4b2 -->
## Start fight between self and other Robot

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://robot.work/api/v1/start-fight" \
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"contestant_robot_id":19,"opponent_robot_id":7}'

```

```javascript
const url = new URL("http://robot.work/api/v1/start-fight");

let headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "contestant_robot_id": 19,
    "opponent_robot_id": 7
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
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("http://robot.work/api/v1/home");

let headers = {
    "Authorization": "Bearer {token}",
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


