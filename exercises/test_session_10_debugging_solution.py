import unittest


from session_10_debugging_solution import sort_list

class SortListTest(unittest.TestCase):

    def test_sort_list(self):
        self.assertEqual(sort_list([1, 5, 2, 3]), [1, 2, 3, 5])

if __name__ == '__main__':
    unittest.main()
