# weather-test

TODO:
- Exception handling
- tests
- Loader for waiting ajax to finish

USAGE:

You need docker compose (or docker-compose if you are using old version).
You can build containers with:
```
docker compose up --d --build
```

If you have already built containers, you can start with 
```
docker compose up --d
```

After starting, point your browser to an url:
```
http://localhost:8110/
```

Database sql file is in. 
```
./storage/weather.sql
```
