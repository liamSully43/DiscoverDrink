# Discover Drink

## Purpose
This is a back-up copy of the code used to build the Discover Drink project. The current [live version](http://discoverdrink.org/) is the old version of the project built with Node.js, this version is/will be built with PHP & MongoDB.

## Features
 - PHP Router
 - Home page
 - Search page
 - Drinks page
 - Bars page
 - 404 page
 - DB with drinks & bars

## Known Issues
None

## Notes
The item type filtering has been reversed - If cider is selected, then $cider is set to "cider" and then all items with type "cider" are then excluded from the results. This is because the normal way refused to work once the search by name filter/condition was added.
