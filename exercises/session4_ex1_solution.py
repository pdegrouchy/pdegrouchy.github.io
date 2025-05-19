data = []
num = input("Enter an integer ('q' to quit): ")
while num != 'q':
    data.append(int(num))
    num = input("Enter an integer ('q' to quit): ")
data.sort()
print("The values, sorted into ascending order are:")
for element in data:
    print(element)
