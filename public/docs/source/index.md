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
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_0151899c6cc8923a22b32cbfb1d662aa -->
## Get paginated faculties

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/faculties" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/faculties",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "faculties": {
        "total": 0,
        "per_page": 5,
        "current_page": 1,
        "last_page": 0,
        "next_page_url": null,
        "prev_page_url": null,
        "from": null,
        "to": null,
        "data": []
    }
}
```

### HTTP Request
`GET api/faculties`

`HEAD api/faculties`


<!-- END_0151899c6cc8923a22b32cbfb1d662aa -->

<!-- START_5602809358594eb8c507f439f99dc895 -->
## Get random faculties

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/faculties/random" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/faculties/random",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "faculties": []
}
```

### HTTP Request
`GET api/faculties/random`

`HEAD api/faculties/random`


<!-- END_5602809358594eb8c507f439f99dc895 -->

<!-- START_81ed220a7e8f733c1b8ef9150c0eea2b -->
## Get faculty by slug

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/faculties/{faculty}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "faculty": {
        "directions": [],
        "avatar": null
    }
}
```

### HTTP Request
`GET api/faculties/{faculty}`

`HEAD api/faculties/{faculty}`


<!-- END_81ed220a7e8f733c1b8ef9150c0eea2b -->

<!-- START_6e36daa7bbf3962e31c48d219b2065cb -->
## api/teachers/random

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/teachers/random" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/teachers/random",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
[]
```

### HTTP Request
`GET api/teachers/random`

`HEAD api/teachers/random`


<!-- END_6e36daa7bbf3962e31c48d219b2065cb -->

<!-- START_bf7363cb31a8a494d8dccfde0131adbe -->
## api/teachers

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/teachers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/teachers",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
[]
```

### HTTP Request
`GET api/teachers`

`HEAD api/teachers`


<!-- END_bf7363cb31a8a494d8dccfde0131adbe -->

<!-- START_054f9a4189841624fa94314942f3aa94 -->
## api/teachers/{user}

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/teachers/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/teachers/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{}
```

### HTTP Request
`GET api/teachers/{user}`

`HEAD api/teachers/{user}`


<!-- END_054f9a4189841624fa94314942f3aa94 -->

<!-- START_fb920057f74453f77582c96c4d20b749 -->
## Get user profile information

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/account" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/account",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/account`

`HEAD api/account`


<!-- END_fb920057f74453f77582c96c4d20b749 -->

<!-- START_0bd4190251828d6e9b56e51674a56db7 -->
## Logout user

TODO need move this method in AuthController

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/account/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/account/logout",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/account/logout`

`HEAD api/account/logout`


<!-- END_0bd4190251828d6e9b56e51674a56db7 -->

<!-- START_88046412929544b86bd2b88a93a4bc7a -->
## Update information about user

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/account/update" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/account/update",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/account/update`


<!-- END_88046412929544b86bd2b88a93a4bc7a -->

<!-- START_274b09976ea85e2b86553f97997d3769 -->
## Update user password

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/account/reset-password" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/account/reset-password",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/account/reset-password`


<!-- END_274b09976ea85e2b86553f97997d3769 -->

<!-- START_23673ebf3dc30b0bb1f84cebaed65c16 -->
## Upload user avatar

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/account/image" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/account/image",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/account/image`


<!-- END_23673ebf3dc30b0bb1f84cebaed65c16 -->

<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Method that authenticate user

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/auth/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/auth/login",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/auth/login`


<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_ade88ee476755a9706337cdabd78339b -->
## Method that authenticate user

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/auth/registration" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/auth/registration",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/auth/registration`


<!-- END_ade88ee476755a9706337cdabd78339b -->

<!-- START_bee4c3298d5e5aa2acddb5486921e94b -->
## Get user by slug

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/auth/reset-password" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/auth/reset-password",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/auth/reset-password`


<!-- END_bee4c3298d5e5aa2acddb5486921e94b -->

<!-- START_431fabb355a5f16109e932c9060db57c -->
## Get user by slug

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/auth/reset-password/{token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/auth/reset-password/{token}",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/auth/reset-password/{token}`


<!-- END_431fabb355a5f16109e932c9060db57c -->

<!-- START_303cc98db719e55f67a621a352a52d54 -->
## api/auth/faculties

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/auth/faculties" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/auth/faculties",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "faculties": []
}
```

### HTTP Request
`GET api/auth/faculties`

`HEAD api/auth/faculties`


<!-- END_303cc98db719e55f67a621a352a52d54 -->

<!-- START_02a9084a815c8b5386324ae172ab700b -->
## api/modules

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/modules" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/modules",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/modules`


<!-- END_02a9084a815c8b5386324ae172ab700b -->

<!-- START_76e9c79e52ceea8a88021ceaeb50212b -->
## api/modules/groups

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/modules/groups" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/modules/groups",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/modules/groups`


<!-- END_76e9c79e52ceea8a88021ceaeb50212b -->

<!-- START_82c1b5abc98623819e6c0bb430767f97 -->
## api/modules/groups/{moduleGroup}

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/modules/groups/{moduleGroup}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/modules/groups/{moduleGroup}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/modules/groups/{moduleGroup}`


<!-- END_82c1b5abc98623819e6c0bb430767f97 -->

<!-- START_e375b4a886f0574093507b0d19e97865 -->
## api/modules/{module}

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/modules/{module}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/modules/{module}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/modules/{module}`


<!-- END_e375b4a886f0574093507b0d19e97865 -->

<!-- START_e85112b0ac03a240eb2880c88d7b0de3 -->
## api/modules/{module}

> Example request:

```bash
curl -X DELETE "http://distance-learning.local//api/modules/{module}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/modules/{module}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/modules/{module}`


<!-- END_e85112b0ac03a240eb2880c88d7b0de3 -->

<!-- START_d493a74888274eb7ae3f7062ffb92428 -->
## Get user tasks

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/account/tasks" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/account/tasks",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/account/tasks`

`HEAD api/account/tasks`


<!-- END_d493a74888274eb7ae3f7062ffb92428 -->

<!-- START_60aeb4556720f1687a6baf048fba326b -->
## Get user courses

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/account/courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/account/courses",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/account/courses`

`HEAD api/account/courses`


<!-- END_60aeb4556720f1687a6baf048fba326b -->

<!-- START_e289c08314ab9cee73c68290a560b785 -->
## Get teacher subjects

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/account/subjects" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/account/subjects",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/account/subjects`

`HEAD api/account/subjects`


<!-- END_e289c08314ab9cee73c68290a560b785 -->

<!-- START_61b817fcc2bbbf287b322e268c28fca5 -->
## Get teacher modules and tests

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/account/modules" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/account/modules",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/account/modules`

`HEAD api/account/modules`


<!-- END_61b817fcc2bbbf287b322e268c28fca5 -->

<!-- START_3a7b9a3bc68c8dd5cfa87924e729a55b -->
## Get teacher tests

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/account/tests" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/account/tests",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/account/tests`

`HEAD api/account/tests`


<!-- END_3a7b9a3bc68c8dd5cfa87924e729a55b -->

<!-- START_76ea9fef595d52c4df8c383227b7b454 -->
## Get subject tasks

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/account/subjects/{subject}/tasks" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/account/subjects/{subject}/tasks",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/account/subjects/{subject}/tasks`

`HEAD api/account/subjects/{subject}/tasks`


<!-- END_76ea9fef595d52c4df8c383227b7b454 -->

<!-- START_4da0d9b378428dcc89ced395d4a806e7 -->
## api/tasks

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/tasks" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/tasks",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/tasks`


<!-- END_4da0d9b378428dcc89ced395d4a806e7 -->

<!-- START_239857a50f9632e1812cee0cde2e51e8 -->
## api/tasks/groups

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/tasks/groups" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/tasks/groups",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/tasks/groups`


<!-- END_239857a50f9632e1812cee0cde2e51e8 -->

<!-- START_be0b2f56cb8593408bc3c3d3978a0ad1 -->
## api/tasks/{task}

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/tasks/{task}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/tasks/{task}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "attachment": null
}
```

### HTTP Request
`GET api/tasks/{task}`

`HEAD api/tasks/{task}`


<!-- END_be0b2f56cb8593408bc3c3d3978a0ad1 -->

<!-- START_ce067abafaef89501dd63eb93f7eb8fc -->
## api/tasks/{task}

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/tasks/{task}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/tasks/{task}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/tasks/{task}`


<!-- END_ce067abafaef89501dd63eb93f7eb8fc -->

<!-- START_9c47c523a55e20b2e4fd5dbad027e30c -->
## api/tasks/{task}/files

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/tasks/{task}/files" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/tasks/{task}/files",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
[]
```

### HTTP Request
`GET api/tasks/{task}/files`

`HEAD api/tasks/{task}/files`


<!-- END_9c47c523a55e20b2e4fd5dbad027e30c -->

<!-- START_b1040431b616c6148c3056aca8c2e4b8 -->
## api/tasks/{task}/files/{file}

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/tasks/{task}/files/{file}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/tasks/{task}/files/{file}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/tasks/{task}/files/{file}`


<!-- END_b1040431b616c6148c3056aca8c2e4b8 -->

<!-- START_8b8069956f22facfa8cdc67aece156a8 -->
## api/tasks/{task}

> Example request:

```bash
curl -X DELETE "http://distance-learning.local//api/tasks/{task}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/tasks/{task}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/tasks/{task}`


<!-- END_8b8069956f22facfa8cdc67aece156a8 -->

<!-- START_da5727be600e4865c1b632f7745c8e91 -->
## api/users

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/users",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "total": 0,
    "per_page": 15,
    "current_page": 1,
    "last_page": 0,
    "next_page_url": null,
    "prev_page_url": null,
    "from": null,
    "to": null,
    "data": []
}
```

### HTTP Request
`GET api/users`

`HEAD api/users`


<!-- END_da5727be600e4865c1b632f7745c8e91 -->

<!-- START_8f99b42746e451f8dc43742e118cb47b -->
## Get user by slug

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/users/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
[]
```

### HTTP Request
`GET api/users/{user}`

`HEAD api/users/{user}`


<!-- END_8f99b42746e451f8dc43742e118cb47b -->

<!-- START_616c5f9dcc8e79266fae2f2b2cb19240 -->
## api/users/{user}/tasks

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/users/{user}/tasks" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/users/{user}/tasks",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/{user}/tasks`

`HEAD api/users/{user}/tasks`


<!-- END_616c5f9dcc8e79266fae2f2b2cb19240 -->

<!-- START_38f650806a828403a7b131016b537617 -->
## Get

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/courses",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "courses": {
        "total": 1,
        "per_page": 15,
        "current_page": 1,
        "last_page": 1,
        "next_page_url": null,
        "prev_page_url": null,
        "from": 1,
        "to": 1,
        "data": [
            {
                "id": 1,
                "subject_id": null,
                "teacher_id": null,
                "group_id": null,
                "deleted_at": null,
                "is_active": true,
                "name": null,
                "group": null,
                "subject": null,
                "teacher": null
            }
        ]
    }
}
```

### HTTP Request
`GET api/courses`

`HEAD api/courses`


<!-- END_38f650806a828403a7b131016b537617 -->

<!-- START_8689ce8f09e81fcaee386cfbd8e265cd -->
## api/courses/{course}

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/courses/{course}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "course": {
        "group": null,
        "subject": null,
        "teacher": null
    }
}
```

### HTTP Request
`GET api/courses/{course}`

`HEAD api/courses/{course}`


<!-- END_8689ce8f09e81fcaee386cfbd8e265cd -->

<!-- START_7adfcfdea10d30f89cf1c74a69c31361 -->
## api/courses

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/courses",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/courses`


<!-- END_7adfcfdea10d30f89cf1c74a69c31361 -->

<!-- START_bab2a2d3673b30ee6a63da7cc0a6009b -->
## api/courses/{course}

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/courses/{course}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/courses/{course}`


<!-- END_bab2a2d3673b30ee6a63da7cc0a6009b -->

<!-- START_ddc71fecb200b23443e0cfaad85d4241 -->
## api/courses/{course}

> Example request:

```bash
curl -X DELETE "http://distance-learning.local//api/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/courses/{course}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/courses/{course}`


<!-- END_ddc71fecb200b23443e0cfaad85d4241 -->

<!-- START_60442444e451c322aa7e14ff3d19a9d4 -->
## api/subjects/{subject_id}/courses

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/subjects/{subject_id}/courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/subjects/{subject_id}/courses",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/subjects/{subject_id}/courses`

`HEAD api/subjects/{subject_id}/courses`


<!-- END_60442444e451c322aa7e14ff3d19a9d4 -->

<!-- START_46bcb10ee304afd9b63a4d0f8c2ba6a1 -->
## api/admin/subjects

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/subjects" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/subjects",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "subjects": {
        "total": 0,
        "per_page": 10,
        "current_page": 1,
        "last_page": 0,
        "next_page_url": null,
        "prev_page_url": null,
        "from": null,
        "to": null,
        "data": []
    }
}
```

### HTTP Request
`GET api/admin/subjects`

`HEAD api/admin/subjects`


<!-- END_46bcb10ee304afd9b63a4d0f8c2ba6a1 -->

<!-- START_3a0c72e7f75a59216e9402c1473811ed -->
## api/admin/subjects/search

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/subjects/search" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/subjects/search",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "subjects": []
}
```

### HTTP Request
`GET api/admin/subjects/search`

`HEAD api/admin/subjects/search`


<!-- END_3a0c72e7f75a59216e9402c1473811ed -->

<!-- START_5abdd51e15baf4da9cfef4f0e39eec87 -->
## api/admin/subjects/{subject}

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/subjects/{subject}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/subjects/{subject}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "subject": []
}
```

### HTTP Request
`GET api/admin/subjects/{subject}`

`HEAD api/admin/subjects/{subject}`


<!-- END_5abdd51e15baf4da9cfef4f0e39eec87 -->

<!-- START_4c556d3731080d031468aa79865a8dfd -->
## api/admin/subjects

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/admin/subjects" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/subjects",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/admin/subjects`


<!-- END_4c556d3731080d031468aa79865a8dfd -->

<!-- START_fee835957dce349d909f5503334924a3 -->
## api/admin/subjects/{subject}

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/admin/subjects/{subject}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/subjects/{subject}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/admin/subjects/{subject}`


<!-- END_fee835957dce349d909f5503334924a3 -->

<!-- START_e500522f56f76676fe1fe1488fbbdad6 -->
## api/admin/subjects/{subject}

> Example request:

```bash
curl -X DELETE "http://distance-learning.local//api/admin/subjects/{subject}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/subjects/{subject}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/admin/subjects/{subject}`


<!-- END_e500522f56f76676fe1fe1488fbbdad6 -->

<!-- START_54c46566acd4bb5ea319ddffb06238df -->
## api/admin/groups

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/groups" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/groups",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "groups": {
        "total": 0,
        "per_page": 15,
        "current_page": 1,
        "last_page": 0,
        "next_page_url": null,
        "prev_page_url": null,
        "from": null,
        "to": null,
        "data": []
    }
}
```

### HTTP Request
`GET api/admin/groups`

`HEAD api/admin/groups`


<!-- END_54c46566acd4bb5ea319ddffb06238df -->

<!-- START_2bb8d27dd4cc137a9f1e86bb710471d6 -->
## api/admin/groups

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/admin/groups" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/groups",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/admin/groups`


<!-- END_2bb8d27dd4cc137a9f1e86bb710471d6 -->

<!-- START_628ba87ffff6ec5315aa47dc3aaa5c52 -->
## api/admin/groups/{group}

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/groups/{group}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/groups/{group}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "group": {
        "students": []
    }
}
```

### HTTP Request
`GET api/admin/groups/{group}`

`HEAD api/admin/groups/{group}`


<!-- END_628ba87ffff6ec5315aa47dc3aaa5c52 -->

<!-- START_7a25473832b3728f5d819ec3f9af69f8 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/admin/groups/{group}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/groups/{group}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/admin/groups/{group}`


<!-- END_7a25473832b3728f5d819ec3f9af69f8 -->

<!-- START_e4d4d7fb4ae896fde38ceed5b1927fc4 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://distance-learning.local//api/admin/groups/{group}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/groups/{group}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/admin/groups/{group}`


<!-- END_e4d4d7fb4ae896fde38ceed5b1927fc4 -->

<!-- START_6a39b3c1e2b4d93672ff3cf3a15aa30c -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/admin/groups/{group}/students" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/groups/{group}/students",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/admin/groups/{group}/students`


<!-- END_6a39b3c1e2b4d93672ff3cf3a15aa30c -->

<!-- START_e2d7b8776e542096ab68e2f3b285871a -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://distance-learning.local//api/admin/groups/{group}/students" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/groups/{group}/students",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/admin/groups/{group}/students`


<!-- END_e2d7b8776e542096ab68e2f3b285871a -->

<!-- START_a51ca0f9c19594b28a49b6d696a9fd53 -->
## api/admin/groups/{group}/students/{user}

> Example request:

```bash
curl -X DELETE "http://distance-learning.local//api/admin/groups/{group}/students/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/groups/{group}/students/{user}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/admin/groups/{group}/students/{user}`


<!-- END_a51ca0f9c19594b28a49b6d696a9fd53 -->

<!-- START_25e1cf7ab0f24186b0b8528018396106 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/faculties" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/faculties",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "faculties": {
        "total": 0,
        "per_page": 10,
        "current_page": 1,
        "last_page": 0,
        "next_page_url": null,
        "prev_page_url": null,
        "from": null,
        "to": null,
        "data": []
    }
}
```

### HTTP Request
`GET api/admin/faculties`

`HEAD api/admin/faculties`


<!-- END_25e1cf7ab0f24186b0b8528018396106 -->

<!-- START_5b57d9ac6316f2d7b5d34eb854fedd25 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/admin/faculties" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/faculties",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/admin/faculties`


<!-- END_5b57d9ac6316f2d7b5d34eb854fedd25 -->

<!-- START_852fbbe80a7b4a89890989d84f988398 -->
## api/admin/faculties/search

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/faculties/search" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/faculties/search",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "faculties": []
}
```

### HTTP Request
`GET api/admin/faculties/search`

`HEAD api/admin/faculties/search`


<!-- END_852fbbe80a7b4a89890989d84f988398 -->

<!-- START_81e667df6323eb1317c59a7db4bade25 -->
## api/admin/faculties/{faculty}

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/faculties/{faculty}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "faculty": {
        "directions": [],
        "avatar": null
    }
}
```

### HTTP Request
`GET api/admin/faculties/{faculty}`

`HEAD api/admin/faculties/{faculty}`


<!-- END_81e667df6323eb1317c59a7db4bade25 -->

<!-- START_56dc63d2697847ca4af6e81d866b9a35 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/admin/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/faculties/{faculty}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/admin/faculties/{faculty}`


<!-- END_56dc63d2697847ca4af6e81d866b9a35 -->

<!-- START_28a91c9556766927f43910c80f758072 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://distance-learning.local//api/admin/faculties/{faculty}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/faculties/{faculty}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/admin/faculties/{faculty}`


<!-- END_28a91c9556766927f43910c80f758072 -->

<!-- START_57e445a78425afe25bba66c577f26b9c -->
## api/admin/faculties/{faculty}/image

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/admin/faculties/{faculty}/image" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/faculties/{faculty}/image",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/admin/faculties/{faculty}/image`


<!-- END_57e445a78425afe25bba66c577f26b9c -->

<!-- START_46ac194cc38e8a4dca37b193acf87b0a -->
## api/admin/directions

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/directions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/directions",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "directions": {
        "total": 0,
        "per_page": 10,
        "current_page": 1,
        "last_page": 0,
        "next_page_url": null,
        "prev_page_url": null,
        "from": null,
        "to": null,
        "data": []
    }
}
```

### HTTP Request
`GET api/admin/directions`

`HEAD api/admin/directions`


<!-- END_46ac194cc38e8a4dca37b193acf87b0a -->

<!-- START_97da7bf70d5cc4cab565f643ef15ea78 -->
## api/admin/directions/{direction}

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/directions/{direction}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/directions/{direction}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "direction": []
}
```

### HTTP Request
`GET api/admin/directions/{direction}`

`HEAD api/admin/directions/{direction}`


<!-- END_97da7bf70d5cc4cab565f643ef15ea78 -->

<!-- START_9bb767c98026ff5f3b99bb85fcd0a317 -->
## api/admin/directions

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/admin/directions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/directions",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/admin/directions`


<!-- END_9bb767c98026ff5f3b99bb85fcd0a317 -->

<!-- START_6a3d468433799db2cda0e667ebe036ef -->
## api/admin/directions/{direction}

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/admin/directions/{direction}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/directions/{direction}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/admin/directions/{direction}`


<!-- END_6a3d468433799db2cda0e667ebe036ef -->

<!-- START_79bae1263fe07a101b9c14ca4b013890 -->
## api/admin/directions/{direction}

> Example request:

```bash
curl -X DELETE "http://distance-learning.local//api/admin/directions/{direction}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/directions/{direction}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/admin/directions/{direction}`


<!-- END_79bae1263fe07a101b9c14ca4b013890 -->

<!-- START_13271657736b181913183ac37a77854f -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/directions/{direction}/groups" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/directions/{direction}/groups",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "directions": {
        "total": 0,
        "per_page": 10,
        "current_page": 1,
        "last_page": 0,
        "next_page_url": null,
        "prev_page_url": null,
        "from": null,
        "to": null,
        "data": []
    }
}
```

### HTTP Request
`GET api/admin/directions/{direction}/groups`

`HEAD api/admin/directions/{direction}/groups`


<!-- END_13271657736b181913183ac37a77854f -->

<!-- START_286e09289889f7028c8e368cd72343bc -->
## api/admin/teachers

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/teachers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/teachers",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "teachers": {
        "total": 0,
        "per_page": 15,
        "current_page": 1,
        "last_page": 0,
        "next_page_url": null,
        "prev_page_url": null,
        "from": null,
        "to": null,
        "data": []
    }
}
```

### HTTP Request
`GET api/admin/teachers`

`HEAD api/admin/teachers`


<!-- END_286e09289889f7028c8e368cd72343bc -->

<!-- START_49b8a9a7a541db7d7e92931f3bdb7c6f -->
## api/admin/teachers/{user}

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/teachers/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/teachers/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "teacher": []
}
```

### HTTP Request
`GET api/admin/teachers/{user}`

`HEAD api/admin/teachers/{user}`


<!-- END_49b8a9a7a541db7d7e92931f3bdb7c6f -->

<!-- START_caf663fe42a98ad0c24890d4e723413a -->
## api/admin/teachers

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/admin/teachers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/teachers",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/admin/teachers`


<!-- END_caf663fe42a98ad0c24890d4e723413a -->

<!-- START_682503c7e2ce61cc06b00c65c55ef2ec -->
## api/admin/teachers/{user}

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/admin/teachers/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/teachers/{user}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/admin/teachers/{user}`


<!-- END_682503c7e2ce61cc06b00c65c55ef2ec -->

<!-- START_45f441d8326f6d0bbaea4cea785a1663 -->
## api/admin/teachers/{user}

> Example request:

```bash
curl -X DELETE "http://distance-learning.local//api/admin/teachers/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/teachers/{user}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/admin/teachers/{user}`


<!-- END_45f441d8326f6d0bbaea4cea785a1663 -->

<!-- START_e878b62784d8be27c1e06c9d5b3213d9 -->
## api/admin/users

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/users",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "students": {
        "total": 0,
        "per_page": 10,
        "current_page": 1,
        "last_page": 0,
        "next_page_url": null,
        "prev_page_url": null,
        "from": null,
        "to": null,
        "data": []
    }
}
```

### HTTP Request
`GET api/admin/users`

`HEAD api/admin/users`


<!-- END_e878b62784d8be27c1e06c9d5b3213d9 -->

<!-- START_db3e44510084088c16e55210a2a5e79b -->
## api/admin/users/search

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/users/search" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/users/search",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
[]
```

### HTTP Request
`GET api/admin/users/search`

`HEAD api/admin/users/search`


<!-- END_db3e44510084088c16e55210a2a5e79b -->

<!-- START_102a75955da07017f5b83f93ad8669b6 -->
## api/admin/users/{user}

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/users/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "user": {
        "avatar": null
    }
}
```

### HTTP Request
`GET api/admin/users/{user}`

`HEAD api/admin/users/{user}`


<!-- END_102a75955da07017f5b83f93ad8669b6 -->

<!-- START_dc2d86108b3ba680c4c4c02f4f766df8 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/admin/users" \
-H "Accept: application/json" \
    -d "user.name"="esse" \
    -d "user.surname"="esse" \
    -d "user.email"="esse" \
    -d "user.password"="esse" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/users",
    "method": "POST",
    "data": {
        "user.name": "esse",
        "user.surname": "esse",
        "user.email": "esse",
        "user.password": "esse"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/admin/users`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user.name | string |  required  | 
    user.surname | string |  required  | 
    user.email | string |  required  | Maximum: `255`
    user.password | string |  required  | Minimum: `6`

<!-- END_dc2d86108b3ba680c4c4c02f4f766df8 -->

<!-- START_5ec72a5dc6d8dc379b09c0dec3c7a074 -->
## api/admin/users/{user}

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/admin/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/users/{user}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/admin/users/{user}`


<!-- END_5ec72a5dc6d8dc379b09c0dec3c7a074 -->

<!-- START_7d625b15e5b59cfac2c9129fa450c5f5 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://distance-learning.local//api/admin/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/users/{user}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/admin/users/{user}`


<!-- END_7d625b15e5b59cfac2c9129fa450c5f5 -->

<!-- START_5891ab32fbe0d6806ad4710300c7083d -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/students" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/students",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "students": {
        "total": 0,
        "per_page": 10,
        "current_page": 1,
        "last_page": 0,
        "next_page_url": null,
        "prev_page_url": null,
        "from": null,
        "to": null,
        "data": []
    }
}
```

### HTTP Request
`GET api/admin/students`

`HEAD api/admin/students`


<!-- END_5891ab32fbe0d6806ad4710300c7083d -->

<!-- START_ef33fe8d9ad3fb6fbc05355ee0df1f5e -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/students/search" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/students/search",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "students": []
}
```

### HTTP Request
`GET api/admin/students/search`

`HEAD api/admin/students/search`


<!-- END_ef33fe8d9ad3fb6fbc05355ee0df1f5e -->

<!-- START_521935b4f03fbd304202390fe63cb432 -->
## Get

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/courses",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "courses": {
        "total": 2,
        "per_page": 15,
        "current_page": 1,
        "last_page": 1,
        "next_page_url": null,
        "prev_page_url": null,
        "from": 1,
        "to": 2,
        "data": [
            {
                "id": 1,
                "subject_id": null,
                "teacher_id": null,
                "group_id": null,
                "deleted_at": null,
                "is_active": true,
                "name": null,
                "group": null,
                "subject": null,
                "teacher": null
            },
            {
                "id": 2,
                "subject_id": null,
                "teacher_id": null,
                "group_id": null,
                "deleted_at": null,
                "is_active": true,
                "name": null,
                "group": null,
                "subject": null,
                "teacher": null
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/courses`

`HEAD api/admin/courses`


<!-- END_521935b4f03fbd304202390fe63cb432 -->

<!-- START_6ec129d1bf51b7723dc2a2e416494054 -->
## api/admin/courses/search

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/courses/search" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/courses/search",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "courses": []
}
```

### HTTP Request
`GET api/admin/courses/search`

`HEAD api/admin/courses/search`


<!-- END_6ec129d1bf51b7723dc2a2e416494054 -->

<!-- START_2e0a62ea696e4b9677c600b671810df8 -->
## api/admin/courses/{course}

> Example request:

```bash
curl -X GET "http://distance-learning.local//api/admin/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/courses/{course}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "course": {
        "group": null,
        "subject": null,
        "teacher": null
    }
}
```

### HTTP Request
`GET api/admin/courses/{course}`

`HEAD api/admin/courses/{course}`


<!-- END_2e0a62ea696e4b9677c600b671810df8 -->

<!-- START_e9a51811de0cdef7572a90bb2dd2f99a -->
## api/admin/courses

> Example request:

```bash
curl -X POST "http://distance-learning.local//api/admin/courses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/courses",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/admin/courses`


<!-- END_e9a51811de0cdef7572a90bb2dd2f99a -->

<!-- START_683eab12bb63fb96649364be06d23aab -->
## api/admin/courses/{course}

> Example request:

```bash
curl -X PUT "http://distance-learning.local//api/admin/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/courses/{course}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/admin/courses/{course}`


<!-- END_683eab12bb63fb96649364be06d23aab -->

<!-- START_d582d6bda712ea4b8265e214e09bd99c -->
## api/admin/courses/{course}

> Example request:

```bash
curl -X DELETE "http://distance-learning.local//api/admin/courses/{course}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://distance-learning.local//api/admin/courses/{course}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/admin/courses/{course}`


<!-- END_d582d6bda712ea4b8265e214e09bd99c -->

