""" Program to add 2 binary numbers"""

def binary_adder(num1, num2):
    """
    input - num1 type(integer) - the first binary number to add
            num2 type(integer) - the second binary number to add

    output - type(integer) - the sum of both numbers in binary form
    """

    def base_2_converter(num):
        """ function to convert a binary number to base 10"""
        # This works by using the mathematical formula (x * (2 ** 2)) + (y * (2 ** 1)) + (z * (2 ** 0)) where xyz are digits of a binary number
        base_10 = sum((int(j) * (2 ** i) for i, j in enumerate(str(num)[::-1])))
        return base_10

    def base_10_converter(num):
        """ function to convert base 10 number to binary"""
        # this works by dividing the number by 2 and storing it's remainder and reversing that to get the binary number
        base_raw = ""
        while num != 1:
            base_raw += str(num % 2)
            num //= 2
        return int((base_raw + "1")[::-1])

    # first convert both numbers to base 10
    num1 = base_2_converter(num1)
    num2 = base_2_converter(num2)

    # add both numbers in base 10
    num = num1 + num2

    # convert back to base 2
    binary = base_10_converter(num)

    return binary

print(binary_adder(10, 1))
