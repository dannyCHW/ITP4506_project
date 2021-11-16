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

        .btnClasses {
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


        .btnClasses {

            color: black;
            border: 2px solid #483cb4;
        }

        .btnClasses:hover {
            background-color: #483cb4;
            color: #e8edf2;
        }

        /*  */

        .theDate {
            width: 20%;
            height: 30px;
        }

        /*  */
        .btnSL {
            background-color: #f55b3d;
            width: 160px;
            height: 30px;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            text-align: center;
            text-decoration: none;
        }

        .btnWithdraw {
            background-color: #e8edf2;
            width: 160px;
            height: 30px;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            text-align: center;
            text-decoration: none;
        }
    </style>
    <script>
        /* menu open & close */
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" language="javascript">
        function searchAtt(dateis) {
            var passdata = {
                theDate: dateis
            };
            $.ajax({
                type: "POST",
                url: 'adminSLSearchAttendance.php',
                data: passdata,
                datatype: 'json',
                cache: false,
                success: function(data) {

                    const myJSON = data;
                    //alert(myJSON);
                    const myObjarr = JSON.parse(myJSON);
                    //alert(myObjarr[0].attanenceID);

                    var content = "";

                    content += "<table class='styled-table'><thead id='TBtitle'><tr><th>attanenceID</th><th>attanence_status</th><th>attanence_date</th><th>updateTime</th><th>classID</th><th>studentID</th><th>(Offer file slot will also change status to sick leave.)</th></tr></thead><tbody id='TBbody'>";
                    for (let i in myObjarr) {

                        var btnSlot = "";
                        if (myObjarr[i].attanence_status == "ABS") {
                            btnSlot = "<button id='btnSL' class='btnSL'><h4>File Slot for Sick Leave</h4></button>";
                        } else if (myObjarr[i].attanence_status == "SickLeave") {
                            btnSlot = "<button id='btnWithdraw' class='btnWithdraw'><h4>Withdraw File Slot</h4></button>";
                        }

                        content += "<tr><td id='theid'>" + myObjarr[i].attanenceID + "</td><td>" +
                            myObjarr[i].attanence_status + "</td><td>" + myObjarr[i].attanence_date + "</td><td>" +
                            myObjarr[i].updateTime + "</td><td>" + myObjarr[i].classID + "</td><td>" + myObjarr[i].studentID +
                            "</td><td>" + btnSlot +
                            "</td></tr>";
                    }
                    content += "</tbody></table>";

                    $('table').replaceWith(content);
                }
            });
        }

        $(document).ready(function() {
            theDateis = "";

            $.ajax({
                type: "POST",
                url: 'adminSLGetClass.php',
                datatype: 'json',
                cache: false,
                success: function(data) {

                    const myJSON = data;
                    //alert(myJSON);
                    const myObjarr = JSON.parse(myJSON);
                    //alert(myObjarr[0].attanenceID);

                    var content = "";

                    for (let i in myObjarr) {

                        content += "&nbsp&nbsp<button id='btnClasses' class='btnClasses'>" + "ID:" + myObjarr[i].classID + "<br /><h2><b>" + myObjarr[i].classCode + "</b></h2></button>";
                    }

                    $('#theBtns').replaceWith(content);

                }
            });

            $('#logOut').click(function() {
                window.location = "logoutSession.php";
            });

            const formatYmd = date => date.toISOString().slice(0, 10);
            theDateis = formatYmd(new Date());
            $("#theDate").attr("value", theDateis);
            searchAtt(theDateis);

            $('#theDate').change(function() {
                theDateis = $('#theDate').val()
                searchAtt(theDateis);
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
        <h3>Select a date</h3><br />
        <input type="date" lang="en" id="theDate" class="theDate" name="theDate" /><br /><br />
        <div id="theBtns"></div>
        <table class='styled-table'>
            <thead id='TBtitle'>
                <tr>
                    <th>attanenceID</th>
                    <th>attanence_status</th>
                    <th>attanence_date</th>
                    <th>updateTime</th>
                    <th>classID</th>
                    <th>studentID</th>
                </tr>
            </thead>
            <tbody id='TBbody'></tbody>
        </table>
    </center>
</body>

</html>