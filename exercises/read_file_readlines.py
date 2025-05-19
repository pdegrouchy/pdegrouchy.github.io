def main():
    # Open file for input
    infile = open("Python_projects.txt", "r")
    print("\n(4) Using readlines(): ")
    print(infile.readlines())
    infile.close()  # Close the input file

main()  # Call the main function
