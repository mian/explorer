# Explorer

A console based RPG game to explore the spots

Explorer is a console based game written in PHP to find through the spots and go to the exit gate.

To Run the Explore you need 

PHP >= 7

## Setup

Clone the repository and install the dependencies

```
git@github.com:mianmohammad/explorer.git
```

```
composer install
```

To start the Explorer you need to run 

```
php index.php
```

once you start the explorer it will start up with the welcome screen

(http://imgur.com/a/r8BiW)

Enter your name here

Then the explorer will start and you will be at the first gate/spot

(http://imgur.com/a/ohfVy)

From any gate you can go to the directions or you can give up and exit the game if you don't
want to explore and win

Given Directions :
```
north
east
west
south
```
To Exit:

```
exit
```

Please check the video for the demo 

(http://www.giphy.com/gifs/26xBHMYgVvbnjxKQE)

## Details

- `/src` the directory where all the functionality of the explorer happens
- `/src/Exceptions` all the exception classes which are thrown
- `/src/Entities` it contains the classes for the all the entities of the explorer
- `/src/Contracts` it has all the interfaces for the explorer entities
- `/src/Game.php` This file contains functionality to execute the game
- `/src/Map.php` It has all the map specific details.
- `/src/Explorer.php` It contains all the functionality to explore using explorer
- `/data/map.json` contains all the data about the map of the spots to explore
- `/index.php` is the file that bootstraps of explorer


## License
 
 MIT &copy; [Mian Muhammad Asif Akhtar](http://mianasif.info)
