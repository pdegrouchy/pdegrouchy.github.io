def main():
    # Open file for output
    outfile = open("Python_projects.txt", "w")
    # Write data to the file
    outfile.write("Django\n")
    outfile.write("Flask\n")
    outfile.write("Ansible")
    outfile.close() # Close the output file

main()
