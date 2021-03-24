# API End Points

## `GET` /recommendations
Returns games based on filter criteria
Request body format:
`{
    "difficulty" : integer,
    "time" : integer,
    "players" : integer
}`

Response:
`{
    data: [
        {
            "id" : integer,
            "title" : string,
            "min_players" : integer,
            "max_players" : integer,
            "difficulty" : integer,
            "time" : integer,
            "description" : string,
            "img_url" :  string,
            "genre" : array of strings
        }
    ]
}`

## `GET` /games
Gets all games in database
Response:
`{
    data: [
        {
            "id" : integer,
            "title" : string,
            "min_players" : integer,
            "max_players" : integer,
            "difficulty" : integer,
            "time" : integer,
            "description" : string,
            "img_url" :  string,
            "genre" : array of strings
        }
    ]`
}`


## `GET` /games/{game_id}
Returns individual game
Response: 
`{
    "id" : integer,
    "title" : string,
    "min_players" : integer,
    "max_players" : integer,
    "difficulty" : integer,
    "time" : integer,
    "description" : string,
    "img_url" :  string
}`

## `GET` /games/{game_id}/reviews
Returns reviews for individual game
Response:
`{
    "data": [
        {
            "id": integer,
            "name": string,
            "review": string,
            "rating": integer
        }
    ]
}`

## `POST` /games/{game_id}/reviews
Post review for game
Request body format:
`{
    "name": string,
    "review": string,
    "rating": integer
}`