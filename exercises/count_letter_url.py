from pprint import pprint
from string import ascii_lowercase
import urllib.request

def count_each_letter(file):
    dict_of_letter = {}
    for line in file:
        for letter in line.lower():
            if letter in ascii_lowercase:
                if letter in dict_of_letter:
                    dict_of_letter[letter] += 1
                else:
                    dict_of_letter[letter] = 1
    pprint(dict_of_letter)

def main():
    url = input("Enter an URL for a file: ").strip()
    infile = urllib.request.urlopen(url)
    f = infile.read().decode() # Read the content as string
    count_each_letter(f)

main()
