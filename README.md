
# RestauranteGPS

This is an API which connects to a data base loaded with restaurant locations, which functionality is to display information about the nearest restaurants within a radio of distance: restaurant count in the area, average rating of restaurants inside the area, and the standard deviation of rating of restaurants.




## Authors

- [@mapashhe](https://www.github.com/mapashhe)


## API Reference

### Fill the restaurants table with the csv data

```http
  GET /api/fillTable
```

### Get all restaurants

```http
  GET /api/restaurante
```

### Register new restaurant

```http
  POST /api/restaurante
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `rating`  | `int`    | **Required**. Raiting 0 - 4       |
| `name`    | `string` | **Required**. Name of the restaurant |
| `site`    | `string` | **Required**. Website |
| `email`   | `string` | **Required**. Email contact |
| `phone`   | `string` | **Required**. Phone contact |
| `street`  | `string` | **Required**. Address |
| `city`    | `string` | **Required**. Address city |
| `state`   | `string` | **Required**. Address state |
| `lat`     | `decimal(8,6)` | **Required**. Latitude of the location |
| `lng`     | `decimal(9,6)` | **Required**. Longitude of the location |

#### Example of request body
{
    "rating": 4,
    "name": "Sandwichito",
    "site": "https://sandwichito.mx",
    "email": "san@dwich.com",
    "phone": "6864459774",
    "street": "Altavista",
    "city": "Mexicali",
    "state": "Baja California",
    "lat": "19.4681",
    "lng":"-99.573000"
}


### Update restaurant

```http
  PUT /api/restaurante/{id}
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `rating`  | `int`    | **Required**. Raiting 0 - 4       |
| `name`    | `string` | **Required**. Name of the restaurant |
| `site`    | `string` | **Required**. Website |
| `email`   | `string` | **Required**. Email contact |
| `phone`   | `string` | **Required**. Phone contact |
| `street`  | `string` | **Required**. Address |
| `city`    | `string` | **Required**. Address city |
| `state`   | `string` | **Required**. Address state |
| `lat`     | `decimal(8,6)` | **Required**. Latitude of the location |
| `lng`     | `decimal(9,6)` | **Required**. Longitude of the location |

#### Example of request body
{
    "rating": 4,
    "name": "Sandwichito",
    "site": "https://sandwichito.mx",
    "email": "san@dwich.com",
    "phone": "6864459774",
    "street": "Altavista",
    "city": "Mexicali",
    "state": "Baja California",
    "lat": "19.4681",
    "lng":"-99.573000"
}

### View restaurant

```http
  GET /api/restaurante/{id}
```

### Delete restaurant

```http
  DELETE /api/restaurante/{id}
```

### Statistics
Shows the restaurants count, restaurants average raiting, and standard deviation of raiting within a radius (in meters) from a locations latitude and longitude
```http
  GET /api/restaurants/statistics/{latitude}/{longitude}/{radius}
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `latitude`  | `decimal(8,6)`    | **Required**. Latitude of location       |
| `longitude`    | `decimal(9,6)` | **Required**. Longitude of location |
| `radius`    | `int` | **Required**. Radius of the locacion (in meters) |

#### Request example
 ```http
  GET /api/restaurants/statistics/19.4381426/-99.1293633/200
```


#### Successful response
    HTTP/1.1 200
    Content-Type: application/json

    {
        "count": 12,
        "avg_raiting": "2.25",
        "std_dev": 1.47
    }


## Visual help
You can visualize the csv locations on a google map here:

https://www.google.com/maps/d/u/0/edit?mid=1z8cHtG_amAj43WjkdZnObFAtJTi1mu4&usp=sharing 