def main():
    year = int(input("Enter a year: "))
    animals = ["monkey", "rooster", "dog", "pig", "rat", "ox",
               "tiger", "rabbit", "dragon", "snake", "horse", "sheep"]
    print(year, "is", animals[year % 12])

main()
