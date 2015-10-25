# API
## version 0.1.1
### veglaravel/API.md

* GET */api/map/{cityname}* - get markers list of *cityname* city

* GET */api/map/{cityname}/{markerid}* - get marker with id *markerid* from city *cityname*

* POST */api/map* add new location with/without new marker

* PUT */api/map/{cityname}/{markerid}/{locationid}* update existing location with id *locationid*

* DELETE */api/map/{cityname}/{markerid}/{locationid}* delete existing location with id *locationid*

* GET */api/comments/{locationid}* - get all comments for *locationid* location

* POST */api/comments/{locationid}* - add new comment for *locationid* location 

* PUT */api/comments/{locationid}* - update existing comment of *locationid* location 

* DELETE */api/comments/{locationid}* - delete existing comment of *locationid* location 

* GET */api/users* - get list of all users

* GET */api/users/{id}* - get info for user with *id* id

* PUT */api/users/{id}* - update existing user with *id* id

* DELETE */api/users/{id}* - delete existing user with *id* id
