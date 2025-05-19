line = input('Enter a string: ')

is_palindrome = True

for i in range(0, len(line) // 2):
    if line[i] != line[len(line) - 1 - i]:
        is_palindrome = False
        break

if is_palindrome:
    print(line, "is a palindrome")
else:
    print(line, "is not a palindrome")
