from string import ascii_lowercase
from pprint import pprint

def main():
    filename = input("Enter a filename: ").strip()
    dict_of_letter = {}
    f = open(filename)
    for line in f:
        for letter in line.lower():
            if letter in ascii_lowercase:
                if letter in dict_of_letter:
                    dict_of_letter[letter] += 1
                else:
                    dict_of_letter[letter] = 1
    f.close()
    pprint(dict_of_letter)

main()
