# Droplet
A `docker-compose` project for quickly building develop environment. At present, only nginx+php+postgres+redis environment is supported. Other environments may be added one after another.

## Structure
```C
droplet/
|- config/                 # All services` configuration files.
|    |- nginx/
|    |...
|
|- env/                    # Custom images and all services` logs.
|    |- image/
|    |- log/
|
|- etc/
|    |- other-compose.yml  # Other environment startup files, following docker-compose syntax.
|
|- src/                    # Application source code
|    |- http/
|    |- https/
|    |- yourAppSrc/
|
|- docker-compose.yml      # Default Environment startup file, following docker-compose syntax.
|
|- init.sh                 # Initialization script, responsible for removing old unused containers
|                           # and performing some initialization operations on the application, such as migrating the database.
```

