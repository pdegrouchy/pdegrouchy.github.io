from tkinter import * # Import tkinter
    
root = Tk() # Create a root window
root.title("Pack Manager Demo 2") # Set title

Label(root, text = "Blue", bg = "blue").pack(side = LEFT)
Label(root, text = "Red", bg = "red").pack(
    side = LEFT, fill = BOTH, expand = 1)
Label(root, text = "Green", bg = "green").pack(
    side = LEFT, fill = BOTH)

root.mainloop() # Create an event loop
