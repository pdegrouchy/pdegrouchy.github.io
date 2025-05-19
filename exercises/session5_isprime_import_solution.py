from PrimeNumberFunction import isPrime

def main():
    count = 0
    N = 10000
    for number in range(2, N):
        if isPrime(number):
            count += 1

    print("The number of prime number <", 10000, "is", count)

main()
