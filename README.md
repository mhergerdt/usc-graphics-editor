# Graphics Editor

## Setup

Run `composer install`

If you want to use the docker container you need following requirements:  
docker >= 1.13.0  
docker-compose >= 1.10.0  

Run `docker-compose build php`  
Run `docker-compose run php composer install`   

## Usage
Run the `main.php` file or if you use the docker container run `docker-compose run php php main.php`.

There is one optional argument to choose the desired exporter. Possible values are:

* **caculations** (Default): To print the calculation results for each shape on the console output
* **png**: To export the image as png
* **points**: To print the points for each shape on the console output
