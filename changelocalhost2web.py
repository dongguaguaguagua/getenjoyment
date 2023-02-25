# import os
# import sys


def change(data):
    data = data.replace('localhost', 'fdb24.awardspace.net').replace('root', '3330419_wpress8d3d497c').replace(',"",', ',"ftXqhkvScP5ifksgRVkpilCxbveo600Y",').replace(',"resources",', ',"3330419_wpress8d3d497c",')
    data = data.replace('/resources/', '')
    return data


with open('variety_show.php', 'r') as file:
    data = file.read()

print(change(data))
