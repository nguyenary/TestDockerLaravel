# Environment Setup

### Run docker
```
docker-compose up -d
```

### Composer

```
composer install
```

You need to configure the `.env` file

### Finally, Import Database

```
php artisan make:migration
```

### API Test

#### Create user

```
curl --request POST \
--url http://localhost:8088/api/users \
--header 'Content-Type: application/json' \
--data '{
"first_name":"Nguyen",
"last_name":"Hoang",
"phone":"0123456798",
"email":"hoangvan1234@gmail.com",
"address":"Thanh Xuan, Ha Noi",
"gender":"male"
}'
```

#### Update user

```
curl --request PUT \
--url http://localhost:8088/api/users/5 \
--header 'Content-Type: application/json' \
--data '{
"first_name":"Nguyen 222"
}'
```

#### Get user

```
curl --request GET \
--url http://localhost:8088/api/users/3 \
--header 'Content-Type: application/json'
```

#### Delete user

```
curl --request DELETE \
--url http://localhost:8088/api/users/5 \
--header 'Content-Type: application/json'
```
