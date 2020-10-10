from tweepy import OAuthHandler
from tweepy import API
from tweepy import Cursor
from datetime import datetime
from dateutil import parser
import csv, json
import requests
import pandas as pd

secret = pd.read_csv('./local/secret.csv')

def fetchTweets(info=False):
    '''
    This function tracks the the twitter stream and scrapes tweets and related metadata which contain
    a specific set of keywords relating to Cyanobacterial blooms.
    '''

    access_token = secret['twitter_access_token'][0]
    access_token_secret = secret['twitter_access_secret'][0]
    consumer_key = secret['consumer_key'][0]
    consumer_secret = secret['consumer_secret'][0]

    auth = OAuthHandler(consumer_key, consumer_secret)
    auth.set_access_token(access_token, access_token_secret)
    api = API(auth)

    tweets_data = {'id':[], 'text':[], 'place':[], 'time':[], 'url':[]}

    for tweet in Cursor(api.search, 
                         q = 'BlueGreenAlgae OR CyanoBacteria OR cyanotracker OR anabaena OR microcystis OR cyanotoxins OR toxic algae OR algae bloom OR algal bloom OR #CyanoBacteria OR #AlgaeBloom OR #CyanoBacteriaBlooms OR #CyanoHABs OR #HABs',
                         count = 20,
                         result_type = 'recent',
                         include_entities = True,
                         monitor_rate_limit = True,
                         wait_on_rate_limit = True,
                         lang="en").items():
        try:
            if ((datetime.now() - parser.parse(str(tweet.created_at))).days < 7) and (not tweet.retweeted) and ('RT @' not in tweet.text):
                #webbrowser.open_new_tab(url+str(tweet.id))
                tweets_data['id'].append(str(tweet.id))
                tweets_data['text'].append(str(tweet.text))
                if(tweet.user.location is None):
                    tweets_data['place'].append("00")
                tweets_data['place'].append(str(tweet.user.location))
                tweets_data['time'].append(str(tweet.created_at))
                tweets_data['url'].append('https://twitter.com/' + str(tweet.user.screen_name) + '/status/' + str(tweet.id))
        except:
            continue
    '''
    try:
        with open('prod.csv', 'w', encoding='utf-8') as file:
            writer = csv.writer(file, delimiter=',')
            writer.writerow(tweets_data.keys())
            writer.writerows(zip(*tweets_data.values()))
    except IOError as e:
        print(e)
    '''

    if info:
        f = open('tweet_info.txt','w')
        for i in range(len(tweets_data['text'])):
            f.write("\nTweet no %d" %i)
            f.write("Time of origin: " + tweets_data['time'][i])
            f.write("Text : " + tweets_data['text'][i])
            f.write("Place: ", end="")
            if(tweets_data['place'][i]!=None):
                f.write(tweets_data['place'][i])
            else:
                f.write("Not available for this tweet")
    return tweets_data

def generateGeocodes(df):
    '''
    This function geocodes a location --> eg: Athes GA will be converted into respective latitude and longitude
    with the help of Google Geocode API
    '''
    GEOCODE_URL = 'https://maps.googleapis.com/maps/api/geocode'

    api_key = secret['geocode_api_secret'][0]
    coordinates = []

    for address, url in zip(df['place'],df['url']):
        row = []
        if address != "00":
            api_response = requests.get(GEOCODE_URL + '/json?address={0}&key={1}'.format(address, api_key))
            api_response_dict = api_response.json()
        
        if api_response_dict['status'] == 'OK':
            row.append(address)
            #coordinates['loc'].append(address)
            row.append(api_response_dict['results'][0]['geometry']['location']['lat'])
            row.append(api_response_dict['results'][0]['geometry']['location']['lng'])

        
        if len(row) > 0:
            row.append(url)
            coordinates.append(row)
        
    '''
    try:
        with open('coordinates.csv', 'w', encoding='utf-8') as file:
            writer = csv.writer(file, delimiter=',')
            writer.writerow(coordinates.keys())
            writer.writerows(zip(*coordinates.values()))
    except IOError as e:
        print(e)
    '''

    return json.dumps(coordinates)

print(generateGeocodes(fetchTweets()))
    

