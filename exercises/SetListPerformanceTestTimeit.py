import timeit

NUMBER_OF_ELEMENTS = 10000

# Create a list
lst = list(range(NUMBER_OF_ELEMENTS))


setup_statement = "s = set(%s); nb_of_elt=%s" % (lst, range(NUMBER_OF_ELEMENTS))
t = timeit.Timer("""
for i in nb_of_elt:
    i in s
""",
                 setup_statement)

print(t.timeit(1))
