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
        /* menu open & close */
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" language="javascript">

        $(document).ready(function() {

            $('#logOut').click(function() {
                window.location = "logoutSession.php";
            });

            $.ajax({
                type: "POST",
                url: 'adminReport.php',
                datatype: 'json',
                cache: false,
                success: function(data) {

                    var myJSON = JSON.parse(data);
                    //alert(myJSON[0].total);

                    var total = myJSON[0].total;
                    var onTime = myJSON[1].onTime;
                    var Late = myJSON[2].Late;
                    var SickLeave = myJSON[3].SickLeave;
                    var Absent = myJSON[4].Absent;

                    var onTimeRate = (onTime / total) * 100;
                    var LateRate = (Late / total) * 100;
                    var SickLeaveRate = (SickLeave / total) * 100;
                    var AbsentRate = (Absent / total) * 100;

                    var content = "";

                    content += "<b>Total Record : " + myJSON[0].total + " | On-time Rate : " + onTimeRate + "%" +
                        " | Late Rate : " + LateRate + "%" + " | SickLeave Rate : " + SickLeaveRate + "%" +
                        " | Absent Rate : " + AbsentRate + "%" + " | " + "<button id='Previous'>Previous Record</button>" + "</b>";

                    $('#sd').replaceWith(content);
                }
            });

            $.ajax({
                type: "POST",
                url: 'adminReportSearchAttendance.php',
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

            $(".search").on("keyup", function() {
                var word = $(this).val();
                $("tr:gt(0)").hide().filter(':contains("' + word + '")').show();
            });

            $('.btnClass').click(function() {
                $("#titleS").replaceWith("<h3>Select Class</h3>");
                $.ajax({
                    type: "POST",
                    url: 'adminReportSearchClass.php',
                    datatype: 'json',
                    cache: false,
                    success: function(data) {

                        const myJSON = data;
                        //alert(myJSON);
                        const myObjarr = JSON.parse(myJSON);
                        //alert(myObjarr[0].attanenceID);

                        var content = "";

                        content += "<table class='styled-table'><thead id='TBtitle'><tr><th>classID</th><th>classCode</th><th>classInfo</th><th>schoolYear</th><th>teacherID</th><th></th></tr></thead><tbody id='TBbody'>";
                        for (let i in myObjarr) {
                            content += "<tr><td id='theid'>" + myObjarr[i].classID + "</td><td>" +
                                myObjarr[i].classCode + "</td><td>" + myObjarr[i].classInfo + "</td><td>" +
                                myObjarr[i].schoolYear + "</td><td>" + myObjarr[i].teacherID +
                                "</td><td>" + "<button id='goAttendance'>Check Attendance</button>" + "</td></tr>";
                        }
                        content += "</tbody></table>";

                        $('table').replaceWith(content);
                    }
                });
            });

        });

        $(document).on('click', '#goAttendance', function() {
            var valID = $(this).parent().siblings("#theid").text();
            var passdata = {
                classID: valID
            };
            $.ajax({
                type: "POST",
                url: 'adminReportClassAttendance.php',
                data: passdata,
                datatype: 'json',
                cache: false,
                success: function(data) {

                    const myJSON = data;
                    //alert(myJSON);
                    const myObjarr = JSON.parse(myJSON);
                    //alert(myObjarr[0].attanenceID);

                    var content = "";

                    content += "<table class='styled-table'><thead id='TBtitle'><tr><th>class   ID</th><th>attanenceID</th><th>attanence_status</th><th>attanence_date</th><th>updateTime</th><th>studentID</th></tr></thead><tbody id='TBbody'>";
                    for (let i in myObjarr) {
                        content += "<tr><td>" + valID + "</td><td>" + myObjarr[i].attanenceID + "</td><td>" +
                            myObjarr[i].attanence_status + "</td><td>" + myObjarr[i].attanence_date + "</td><td>" +
                            myObjarr[i].updateTime + "</td><td>" + myObjarr[i].studentID +
                            "</td></tr>";
                    }
                    content += "</tbody></table>";

                    $('table').replaceWith(content);
                }
            });
        });

        $(document).on('click', '#Previous', function() {
            window.location.href = "adminReportPastHTML.php";
        });

    </script>


</head>

<body>
    <?php
    include 'adminMenuBar.html';
    ?>
    <br /><br />
    <center>
        <div class="card">
            <div class="container">
                <br />
                <h3>Overall Status</h3>
                <br />
                <hr />
                <br />
                <h4><b id="sd"> </b></h4>
                <br />
            </div>
        </div>

        <br />
        <input type="text" class="search" placeholder="Search.." name="search">
        <br /><br />
        <button class="btnClass" id="btnClass">Class</button>
        <br /><br /><hr />
        <h3 id="titleS">Overall Attendance Status</h3>
        <table></table>
    </center>
</body>

</html>