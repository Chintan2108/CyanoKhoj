# CyanoKhoj

## Affiliation
#### Geoinformatics Department, Indian Institute of Remote Sensing, ISRO, Dehradun
#### April 2020 - May 2020

## Summary

CyanoKhoj is a web-app which employs the citizen science program by tracking their tweets and subsequent data analysis on Google Earth Engine, aimed at effective CyanoHAB detection and monitoring in water bodies around the world. The objective is to identify potential CyanoHAB infested locations based on Twitter data analysis and location extraction and further analyze these locations using satellite data in Google Earth Engine.
* [Web-app Link](http://34.67.7.17/cyanokhoj/)
  * Username: admin
  * Password: admin
 * [Google Earth Engine Dashboard Link](https://chintanmaniyar.users.earthengine.app/view/cyanokhoj)
 * [Project Poster](https://docs.google.com/presentation/d/e/2PACX-1vQ9rbuXLe4Ga_1BsF5sj_-rRUBOJvv5pcW5d0HjJfu5JBLIXkWefIR7O75EfQw_PyBVa5lEw2LfH-7O/pub?start=false&loop=false&delayms=3000)

## Modules

### Built With/Libraries Used/Tools & Technology

* Tweepy
* URL Libs
* Google Maps
* Google Earth Engine
* PHP
* GCP Deployment

### Tweet Analysis and Location Extraction

This is done by scraping tweets real-time feed and filtering them based on the project specific keywords and hashtags which help in identifying tweets about algal bloom infested waterbodies. Thereafter the location tags are extracted from the filtered tweets and are geocoded. These locations are sent to Google Map and Google Earth Engine and a map highlighting the potential cyanobloom locations.

The following repositories contain detailed workflow and information the tweet analysis and location extraction task:
[1. Location Fetcher v1.8](https://github.com/Chintan2108/LocationFetcher-v1.8)
[2. Location Fetcher v2.1](https://github.com/Chintan2108/LocationFetcher-v2.1)

###
