
# CyanoKhoj *|* [![Gitter](https://badges.gitter.im/CyanoKhoj/community.svg)](https://gitter.im/CyanoKhoj/community?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge)




## Affiliations
#### 1. Centre of Geospatial Research, Department of Geography, University of Georgia, Athens (GA)
#### 2. Geoinformatics Department, Indian Institute of Remote Sensing, ISRO, Dehradun
#### April 2020 - May 2020

## Summary

CyanoKhoj is a web-app which employs the citizen science program by tracking their tweets and subsequent data analysis on Google Earth Engine, aimed at effective CyanoHAB detection and monitoring in water bodies around the world. The objective is to identify potential CyanoHAB infested locations based on Twitter data analysis and location extraction and further analyze these locations using satellite data in Google Earth Engine.
* [Web-app Link](http://34.67.7.17/CyanoKhoj/)
  * Email ID: admin@email.com
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
* GCP for Deployment

### Tweet Analysis and Location Extraction

This is done by scraping tweets real-time feed and filtering them based on the project specific keywords and hashtags (using NLP techniques) which help in identifying tweets about algal bloom infested waterbodies. Thereafter the location tags are extracted from the filtered tweets and are geocoded. These locations are sent to Google Map and Google Earth Engine and a map highlighting the potential cyanobloom locations.

The following repositories contain detailed workflow and information the tweet analysis and location extraction task:
* [Location Fetcher v1.8](https://github.com/Chintan2108/LocationFetcher-v1.8)
* [Location Fetcher v2.1](https://github.com/Chintan2108/LocationFetcher-v2.1)

### Comparative Analysis of Different distance metrics to filter Tweets

| _Tweets_      |  _Cosine_     | _Soft Cosine_|    _WMD_      | _WMD-Relax_  |
| :------------:| :------------:|:------------:|:------------: |:------------:|
| You can see two of the toxic water plumes and what looks like an algae bloom in the middle from space. https://t.co/WQsHykYio4  | 0.0012850764  | 0.04648514  | 0.57122673946974  |0.594367796798155|
|@JulianaMWatson @bergsham @HKrassenstein @realDonaldTrump Oh crap the red algae bloom wave the toxic one thanks for the info I’ll get the bleach| 0.0012786512 | 0.046485145 | 0.525980177763364 | 0.514069031544577 |
|@realDonaldTrump Toxic red algae bloom is more like it| 0.007476028 | 0.04648514 | 0.68321624849994 | 0.451862241456097 |
| @gwsuperfan @realDonaldTrump Like a toxic algae bloom. | 0.008209193 | 0.04648514 | 0.747027618034671 | 0.474957523799558 |
| Israeli scientists who specialize in cleaning algae from large bodies of water were brought in to help curb toxic algae in Florida's Lake Okeechobee. Via @Jerusalem_Post. https://t.co/AtdGg6JrES | 0.00074861257 | 0.013163705 | 0.55591127109817 | 0.489181017595289 |

**Inference :** The tweets are first preprocessed by tokenizing, removing stop words, hastags, user names etc and embedded to vectors using the **glove twitter-25** embedding. Four similarities - Cosine, Soft Cosine, WMD (Word Mover Distance ) and WMD Relax are calculated between the tweets and the [query](https://github.com/Chintan2108/CyanoKhoj/blob/9d134b73a8458b3d0c41a51cac5d0c80cc52f4be/tweet_tracker.py#L30) containing the filter keywords. As it could be seen the similarity increases between the [query](https://github.com/Chintan2108/CyanoKhoj/blob/9d134b73a8458b3d0c41a51cac5d0c80cc52f4be/tweet_tracker.py#L30) and the tweets in case of WMD and WMD-Relax in comparison to the cosine and soft similarity metrics. 


### Geospatial Analysis on Google Earth Engine

The suspected locations are then analyzed using the Sentinel-3 satellite data to determine whether the flagged waterbodies are suffering from an algal bloom. Various image processing techniques and indices are implemented to quantify the data indications in each pixel of the image.

### Deoplyment

This webapp has been deployed on GCP in the Apache server. Technicalities include in-house python function calls from PHP core environment, managing API requests and maintaining the deployment with timely feature updates.

## Contribution


Join the project channel here: <br>
[![Gitter](https://badges.gitter.im/CyanoKhoj/community.svg)](https://gitter.im/CyanoKhoj/community?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge)

Please feel free to raise issues and fix any existing ones. 
Further details can be found in our [code of conduct](https://github.com/Chintan2108/CyanoKhoj/blob/master/CODE_OF_CONDUCT.md).

### While making a PR, please make sure you:
- [ ] Always start your PR description with "Fixes #issue_number", if you're fixing an issue.
- [ ] Briefly mention the purpose of the PR, along with the tools/libraries you have used. It would be great if you could be version specific.
- [ ] Briefly mention what logic you used to implement the changes/upgrades.
- [ ] Provide in-code review comments on GitHub to highlight specific LOC if deemed necessary.
- [ ] Please provide snapshots if deemed necessary.
- [ ] Update readme if required.
