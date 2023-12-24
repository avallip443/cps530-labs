<%
dim bgcolour
bgcolour = Request.QueryString("bgcolour")

if bgcolour = "" then
    bgcolour = "#ffffff"
end if

dim bgcolourstyle
bgcolourstyle = "background-color: " & bgcolour & ";"

dim lastVisit
lastVisit = Request.Cookies("LastVisit")

if lastVisit = "" then
    Response.Cookies("LastVisit") = Now()
    Response.Cookies("LastVisit").Expires = DateAdd("m", 1, Now()) 
    lastVisit = "This is your first visit!"
else
    lastVisit = "Welcome back! Your last visit was on " & lastVisit
end if
%>

<html>
<head>
    <title>Lab10a - Classic ASP</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            <%= bgcolourstyle %>
        }
    </style>
</head>
<body>
    <h1>Welcome!</h1>
    <p>In the URL, enter a colour to display as the background.</p>
    <p>Append either ?bgcolour=colourName OR ?bgcolour=%23hexCode at the end of the URL</p>
    <br>
    <h3><%= lastVisit %></h3>
</body>
</html>
