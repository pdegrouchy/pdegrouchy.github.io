import string

message = input("Enter the message: ")
shift = int(input("Enter the shift value: "))

existing_alphabet = string.ascii_lowercase
new_alphabet = ''

for i in range(26):
    if i + shift < 26:
        new_alphabet += existing_alphabet[i + shift]
    else:
        new_alphabet += existing_alphabet[26 - (shift + i)]


def find_index(char):
    index = 0
    for i in existing_alphabet:
        if i == char:
            return index
        index += 1

new_message = ''
for char in message:
    index_of_char = find_index(char)
    new_message += new_alphabet[index_of_char]

print(new_message)
