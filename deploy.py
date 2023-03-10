import os

fileDir = os.path.dirname(os.path.abspath(__file__))

# Domain = input("Domain:")
DBdomain = input("DataBase Domain:")
DBname = input("DataBase Name:")
DBuser = input("DataBase User:")
DBpassword = input("DataBase Password:")

def change(data,DBdomain,DBname,DBuser,DBpassword):
    data = data.replace('localhost', DBdomain).replace(DBuser, DBname).replace(',"",', ',"'+DBpassword+'",').replace(',"resources",', ',"'+DBname+'",')
    data = data.replace('resources/', '').replace('/resources"', 'index.html"')
    return data

def write(filename):
    with open(f'{fileDir}/'+filename, 'r') as file:
        data = file.read()
        data = change(data,DBdomain,DBname,DBuser,DBpassword)
        with open(f'{fileDir}/'+filename, 'w') as file:
            file.write("")
            file.write(data)

write("books.php")
# write("movies.php")
# write("serial.php")
# write("variety_show.php")
# write("index.php")
# write("index.html")
# with open(f'{fileDir}/movies.php', 'r') as file:
# with open(f'{fileDir}/serial.php', 'r') as file:
# with open(f'{fileDir}/variety_show.php', 'r') as file:
# with open(f'{fileDir}/index.html', 'r') as file:
# with open(f'{fileDir}/chat.html', 'r') as file:
# with open(f'{fileDir}/js/search.js', 'r') as file:
    # data = file.read()

print("deploy success")
