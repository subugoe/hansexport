# Exporting HANS data into a database.

A small article can be found on [lab.sub](https://subugoe.pages.gwdg.de/lab.sub/webscraping-with-symfony.html).

## Installation

Install the dependencies with `composer install`, add the `LIST_VIEW_URL` and `DETAIL_VIEW_URL` environment variables and start 
the export with `./bin/console app:import `.

Another method is to build it with docker `docker build -t hansexport .`.
The environment variables `LIST_VIEW_URL` and `DETAIL_VIEW_URL` need to be exported to the container and started
with `docker run -it --rm -e "LIST_VIEW_URL=https://example.com" -e "DETAIL_VIEW_URL=https://example.com/detail" hansexport`. 
