import os

fileDir = os.path.dirname(os.path.abspath(__file__))

# Domain = input("Domain:")
DBdomain = input("DataBase Domain:")
DBname = input("DataBase Name:")
DBuser = input("DataBase User:")
DBpassword = input("DataBase Password:")
apikey = input("APIkey:")


def change(data, DBdomain, DBname, DBuser, DBpassword):
    data = data.replace('localhost', DBdomain).replace('root', DBuser).replace(',"",', ',"'+DBpassword+'",').replace(',"resources",', ',"'+DBname+'",')
    data = data.replace('resources/', '').replace('/resources"', 'index.html"').replace("sk-***", apikey)
    return data


def write(filename):
    with open(f'{fileDir}/'+filename, 'r') as file:
        data = file.read()
        data = change(data, DBdomain, DBname, DBuser, DBpassword)
        with open(f'{fileDir}/'+filename, 'w') as file:
            file.write("")
            file.write(data)


write("books.php")
write("movies.php")
write("serial.php")
write("variety_show.php")
write("index.php")
write("index.html")
write("gpt.html")
write("request.php")
write("js/chat.js")
print("deploy success")
