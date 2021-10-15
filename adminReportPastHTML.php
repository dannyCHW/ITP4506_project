<!DOCTYPE html>
<html>

<head>
    <?php include 'adminCheckSession.php'; ?>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 70%;
            text-align: center;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 2px 16px;
        }

        /*  */

        .search {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            background: #f1f1f1;
            border-radius: 10px;
            width: 30%;
        }

        /*  */

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            width: 50%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        /*  */

        .btnClass {
            border: none;
            color: #e8edf2;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition-duration: 0.4s;
            cursor: pointer;
            width: 150px;
            border-radius: 5px;
        }


        .btnClass {

            color: black;
            border: 2px solid #483cb4;
        }

        .btnClass:hover {
            background-color: #483cb4;
            color: #e8edf2;
        }
    </style>
    <script>
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {

            $('#logOut').click(function() {
                window.location = "logoutSession.php";
            });

            $.ajax({
                type: "POST",
                url: 'adminReportAttendancePast.php',
                datatype: 'json',
                cache: false,
                success: function(data) {

                    const myJSON = data;
                    //alert(myJSON);
                    const myObjarr = JSON.parse(myJSON);
                    //alert(myObjarr[0].attanenceID);

                    var content = "";

                    content += "<table class='styled-table'><thead id='TBtitle'><tr><th>attanenceID</th><th>attanence_status</th><th>attanence_date</th><th>updateTime</th><th>classID</th><th>studentID</th></tr></thead><tbody id='TBbody'>";
                    for (let i in myObjarr) {
                        content += "<tr><td id='theid'>" + myObjarr[i].attanenceID + "</td><td>" +
                            myObjarr[i].attanence_status + "</td><td>" + myObjarr[i].attanence_date + "</td><td>" +
                            myObjarr[i].updateTime + "</td><td>" + myObjarr[i].classID + "</td><td>" + myObjarr[i].studentID +
                            "</td></tr>";
                    }
                    content += "</tbody></table>";

                    $('table').replaceWith(content);
                }
            });

        });
    </script>


</head>

<body>
    <?php
    include 'adminMenuBar.html';
    ?>

    <br /><br />
    <center>
        <h1>Past Records</h1>
        <br />
        <input type="text" class="search" placeholder="Search.." name="search">
        <br /><br />
        <br /><br />
        <hr />
        <h3 id="titleS"></h3>
        <table></table>
    </center>

</body>

</html>