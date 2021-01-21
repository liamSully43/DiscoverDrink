# Discover Drink

## Purpose
This is a back-up copy of the code used to build the Discover Drink project. The current [live version](http://discoverdrink.org/) is the old version of the project built with Node.js, this version is/will be built with PHP & MySQL. This project will help me to practice using PHP & to learn how to use MySQL.

## Features
 - PHP Router
 - Home page
 - Search page
 - Drinks page
 - Bars page
 - 404 page
 - DB with drinks & bars

## Known Issues
Unable to get a bearer token from Oracle to make API calls to the database - also tried connecting it to MongoDB but the MongoDB PHP extension doesn't want to work.

## Notes
Setup the database with Oracle, added minimal items just for testing & setup api endpoints with slugs to use for searching. Although the OAuth client settings doesn't want to provide a token to use to get the bearer token.
