import random
random_list = [random.choice(list(range(1, 100))) for _ in range(10)]
def get_min_index(any_list):
    min = 100
    index = 0
    for i in any_list:
        if i <= min:
            min = i
            min_index = index
        index += 1
    print("the min is", min)
    print("its index is", min_index)

print(random_list)
get_min_index(random_list)
