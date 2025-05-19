import random

from list_of_countries import COUNTRIES

def main():
    countries = list(COUNTRIES.keys())
    country_to_guess = random.choice(countries)
    capital = input("What is the capital of "
                    + country_to_guess + "? ").strip()

    if capital.lower() == COUNTRIES[country_to_guess]\
            .lower():
        print("Your answer is correct")
    else:
        print("The correct answer should be "
              + COUNTRIES[country_to_guess])

main()
