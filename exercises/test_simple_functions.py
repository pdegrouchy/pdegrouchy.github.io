import unittest

from simple_function import sum_two_numbers

class SimpleTestClass(unittest.TestCase):

    def test_sum_two_numbers(self):
        self.assertEqual(sum_two_numbers(1, 2), 3)

if __name__ == '__main__':
    unittest.main()
