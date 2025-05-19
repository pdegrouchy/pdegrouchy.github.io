class C:
    def __init__(self,x):
        self.__x = x

class A(C):
    def __init__(self):
        super().__init__(2)
        # Does not override C.__x
        self.__x = 1

a = A()
print(a._A__x)
print(a._C__x)
