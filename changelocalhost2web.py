import os

fileDir = os.path.dirname(os.path.abspath(__file__))


def change(data):
    data = data.replace('localhost', 'fdb24.awardspace.net').replace('root', '3330419_wpress8d3d497c').replace(',"",', ',"ftXqhkvScP5ifksgRVkpilCxbveo600Y",').replace(',"resources",', ',"3330419_wpress8d3d497c",')
    data = data.replace('resources/', '').replace('/resources"', 'index.html"')

    return data


# with open(f'{fileDir}/books.php', 'r') as file:
# with open(f'{fileDir}/movies.php', 'r') as file:
# with open(f'{fileDir}/serial.php', 'r') as file:
# with open(f'{fileDir}/variety_show.php', 'r') as file:
# with open(f'{fileDir}/index.html', 'r') as file:
with open(f'{fileDir}/chat.html', 'r') as file:
# with open(f'{fileDir}/js/search.js', 'r') as file:
    data = file.read()

print(change(data))
