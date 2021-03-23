# API End Points

## `GET` /games
- Request body format:
{
    "difficulty" : integer,
    "time" : integer,
    "players" : integer
}

- Response:
{
    data: [
        {
            "id" : integer,
            "title" : string,
            "min_players" : integer,
            "max_players" : integer,
            "difficulty" : integer,
            "time" : integer
        }
    ]
}

## `GET` /games/{game_id}
- Response: 
{
    "id" : integer,
    "title" : string,
    "min_players" : integer,
    "max_players" : integer,
    "difficulty" : integer,
    "time" : integer
}

## `GET` /games/{game_id}/reviews

- Response:
{
    "data": [
        {
            "id": integer,
            "name": string,
            "review": string,
            "rating": integer
        }
    ]
}

## `POST` /games/{game_id}/reviews
- Request body format:
{
    "name": string,
    "review": string,
    "rating": integer
}