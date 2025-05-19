import sqlite3

connection = sqlite3.connect("test_database.db")
cursor = connection.cursor()
cursor.execute("DROP TABLE IF EXISTS People")
# And we create our first TABLE People that will
# store the field FirstName, LastName and Age
cursor.execute(
    "CREATE TABLE People("
    "FirstName TEXT, "
    "LastName TEXT, "
    "AGE INT)")

cursor.execute("INSERT INTO People "
               "VALUES ('Ron', 'Obvious', 42)")
# we have to commit to actually
# save the record in database
connection.commit()


first_name, last_name, age = 'John', 'Doe', 21
with sqlite3.connect("test_database.db") as connection:
    cursor = connection.cursor()
    cursor.execute(
        "INSERT INTO People VALUES"
        "('"+ first_name + "', '" + last_name + "', " + str(age) + ")")


first_name, last_name, age = 'John', 'O\'Connor', 21
with sqlite3.connect("test_database.db") as connection:
    cursor = connection.cursor()
    cursor.execute(
        "INSERT INTO People VALUES"
        "(?, ?, ?)", (first_name, last_name, age))
    cursor.execute("SELECT * FROM People")
    rows = cursor.fetchall()
    print(rows)

