#!/usr/bin/env python

import cgi, cgitb

form = cgi.FieldStorage()

city = form.getvalue('city').upper()
province = form.getvalue('province')
country = form.getvalue('country').upper()
image_url = form.getvalue('image')

print ("Content-type:text/html\r\n\r\n")
print('<!DOCTYPE html>')
print('<html lang="en">')
print('<head>')
print('<meta charset="UTF-8">')
print('<meta name="viewport" content="width=device-width, initial-scale=1.0">')
print('<title>Lab10b - CGI/Python</title>')
print ('</head>')

print('<body style="text-align: center; background-color: #F7F7F7; margin: 0;">')

print('<div style="display: flex; justify-content: center;">')

if province:
    print('<h1 style="color: #143109; border: #AAAE7F 10px double; border-radius: 20px; padding: 15px 40px; width: fit-content;">%s, %s, %s</h1>' % (city, province.upper(), country))
else:
    print('<h1 style="color: #143109; border: #AAAE7F 10px double; border-radius: 20px; padding: 15px 40px; width: fit-content;">%s, %s</h1>' % (city, country))
print('</div>')

print('<img src="{}" style="width: 80%; height: auto; border: #AAAE7F 25px double; padding: 15px; border-radius: 20px;">'.format(image_url))

print('</body>')
print('</html>')