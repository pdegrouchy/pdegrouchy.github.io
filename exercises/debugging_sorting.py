import random

def sort_list(my_list):
    my_list = my_list.sort()
    return my_list

if __name__ == '__main__':
    # create and shuffle a list
    my_list = list(range(9))
    random.shuffle(my_list)

    # sort the list, should be [0, 1, 2, 3, 4, 5, 6, 7, 8]
    my_list = sort_list(my_list)
    print(my_list)
