class P:
    def __init__(self, x):
        self.x = x

    @property
    def x(self):
        print("printing x")
        return self.__x

    @x.setter
    def x(self, x):
        if x < 0:
            print("cannot be below zero")
            self.__x = 0
        elif x > 1000:
            print("max is 1000")
            self.__x = 1000
        else:
            self.__x = x


if __name__ == '__main__':
    p = P(12)
    print(p.x)
    p.x = 20
    print(p.x)
    p.x = -10
    print(p.x)
    p.x = 2000
    print(p.x)
