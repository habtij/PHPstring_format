# PHPstring_format

### It formats a sentence by replacing any fword with *, total number of asterisk will be equavalent to total length of fword use.

## Example

fuck = ****

fucking = *******

shit = ****

# List of supported fword
['fuck', 'fucked', 'fuck3d', 'fucker', '4ck', '4rk', 'fucking', 'fack', 'fnck', 'fncking', 'shit', 'damn', 'motherfucker', 'motherfuck3r', 'damnit', 'damit', 'dammit']

# Modify the fword list
### You can modify the fword by changing the value of array
$fword_arr = ['fuck', 'fucked', 'fuck3d', 'fucker', '4ck', '4rk', 'fucking', 'fack', 'fnck', 'fncking', 'shit', 'damn', 'motherfucker', 'motherfuck3r', 'damnit', 'damit', 'dammit'];

# Longest length of fword supported
Longest length = 12

Note: It can always be modify by adding a "key => value" of the length to the $length_arr,
where key = 'length in digit' e.g key = 20,
value = 'asterisk equivalent to number of key' e.g value = ********************
