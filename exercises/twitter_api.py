import tweepy

consumer_key = 'get_your_own'
consumer_secret = 'get_your_own'
access_token = 'get_your_own'
access_secret = 'get_your_own'

def main():
    auth = tweepy.auth.OAuthHandler(consumer_key, consumer_secret)
    auth.set_access_token(access_token, access_secret)
    api = tweepy.API(auth)

    tweets = api.search(q='#pythonbot_')
    for t in tweets:
        print(t.created_at, t.text, '\n')
main()

# import tweepy
# from pprint import pprint
#
# consumer_key = 'get_your_own'
# consumer_secret = 'get_your_own'
# access_token = 'get_your_own'
# access_secret = 'get_your_own'
#
# def authenticate():
#     auth = tweepy.auth.OAuthHandler(consumer_key, consumer_secret)
#     auth.set_access_token(access_token, access_secret)
#     return tweepy.API(auth)
#
# def get_trends():
#     api = authenticate()
#     trends = api.trends_available()
#     country = input('Enter a country: ')
#     for elt in trends:
#         if isinstance(elt, dict):
#             if 'country' in elt:
#                 if elt['country'].lower() == country.lower():
#                     woeid = elt['woeid']
#                     break
#     # else in a for loop is reached only
#     # if it has been exhausted without going to the break
#     else:
#         return 'No data for %s. \nAvailable countries are %s' % (
#             country, set([x['country'] for x in trends if isinstance(x, dict) and x.get('country')]))
#     return api.trends_place(woeid)
#
# def main():
#     pprint(get_trends())
#
# main()
