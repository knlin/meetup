import urllib
import re
from bs4 import BeautifulSoup, SoupStrainer, NavigableString, Tag

def get_titles():
    content = urllib.urlopen('http://www.rottentomatoes.com/search/json/?q=ty')
    soup = BeautifulSoup(content, "html.parser")

    return soup.prettify()

def main():
    print get_titles()

if __name__ == '__main__':
    main()