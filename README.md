# Discover Drink

## Purpose
This is a back-up copy of the code used to build the Discover Drink project. The current [live version](http://discoverdrink.org/) is the old version of the project built with Node.js, this version is/will be built with PHP & MongoDB.

## Features
 - Advanced search bar - filter in/out types of drinks & venues, search by name or search by descriptive tags
 - Interactive maps to view where a venue is located - with information about the venue included
 - Links from the search page to the venues page to quickly & easily view the venues
 - Links to more information about each drink & venue

## Known Issues
None

## Notes
The item type filtering has been reversed - If cider is selected, then $cider is set to "cider" and then all items with type "cider" are then excluded from the results. This is because the normal way refused to work once the search by name filter/condition was added.
