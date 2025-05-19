def main():
    infile = open("Python_projects.txt", "r")
    print("\n(2) Using read(number): ")
    s1 = infile.read(4)  # read till the 4th character
    print(s1)
    s2 = infile.read(10)  # read from 4th till 4th+10th
    print(repr(s2))  # a new line is also a character \n
    infile.close()  # Close the input file

main()  # Call the main function
