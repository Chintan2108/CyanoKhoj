# CyanoKhoj

## Affiliations
#### 1. Centre of Geospatial Research, Department of Geography, University of Georgia, Athens (GA)
#### 2. Geoinformatics Department, Indian Institute of Remote Sensing, ISRO, Dehradun
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
* Javascript Core
* Frontend, backend, UI/UX
* GCP Deployment

### Tweet Analysis and Location Extraction

This is done by scraping tweets real-time feed and filtering them based on the project specific keywords and hashtags which help in identifying tweets about algal bloom infested waterbodies. Thereafter the location tags are extracted from the filtered tweets and are geocoded. These locations are sent to Google Map and Google Earth Engine and a map highlighting the potential cyanobloom locations.

The following repositories contain detailed workflow and information the tweet analysis and location extraction task:
* [Location Fetcher v1.8](https://github.com/Chintan2108/LocationFetcher-v1.8)
* [Location Fetcher v2.1](https://github.com/Chintan2108/LocationFetcher-v2.1)

### Geospatial Analysis on Google Earth Engine

The suspected locations are then analyzed using the Sentinel-3 satellite data to determine whether the flagged waterbodies are suffering from an algal bloom. Various image processing techniques and indices are implemented to quantify the data indications in each pixel of the image.

### Deoplyment

This webapp has been deployed on GCP in the Apache server. Technicalities include in-house python function calls from PHP core environment, managing API requests and maintaining the deployment with timely feature updates.

## Contribution

Please feel free to raise issues and fix any existing ones. Further details can be found in our [code of conduct](https://github.com/Chintan2108/Cloud-Removal-in-Satellite-Images-using-Conditional-Generative-Adversarial-Networks/blob/master/CODE_OF_CONDUCT.md).
