#!/usr/bin/ruby -w

require 'cgi'

cgi = CGI.new

city = cgi['city'].capitalize
province = cgi['province'].capitalize
country = cgi['country'].capitalize
image_url = cgi['image']

if !province.nil? && !province.empty?
  location = city + ", " + province + ", " + country
else
  location = city + ", " + country
end

puts "Content-type: text/html\n\n"
puts <<~HTML
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>City Information</title>
  </head>
  <body style="text-align: center; background-color: #F7F7F7; margin: 0;">
    <div style="display: flex; justify-content: center;">
      <h1 style="color: #143109; border: #AAAE7F 10px double; border-radius: 20px; padding: 15px 40px; width: fit-content;">#{location}</h1>
    </div>
  <img src="#{image_url}" style="width: 100%; height: auto;">
  </body>
  </html>
HTML
