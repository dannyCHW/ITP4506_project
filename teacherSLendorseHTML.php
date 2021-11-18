<!<!DOCTYPE html>
    <html>

    <head>
        <?php include 'teacherCheckSession.php'; ?>
        <title>Teacher Endorse</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">

        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
        <style>
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
        <script type="text/javascript" language="javascript">
            $(document).ready(function() {
                $.ajax({
                    type: "POST",
                    url: 'teacherSLendorseGetClass.php',
                    datatype: 'json',
                    cache: false,
                    success: function(data) {

                        const myJSON = data;
                        //alert(myJSON);
                        const myObjarr = JSON.parse(myJSON);
                        //alert(myObjarr[0].attanenceID);

                        var content = "";

                        for (let i in myObjarr) {

                            content += "&nbsp&nbsp<button id='btnClasses' class='btnClasses'>" + "ID:" + "<div id='classID'>" + myObjarr[i].classID + "</div>" + "<h2><b id='classCode'>" + myObjarr[i].classCode + "</b></h2></button>";
                        }

                        $('#theBtns').replaceWith(content);
                    }
                });
            });

            $(document).on('click', '#btnClasses', function() {
                classID = $(this).children('#classID').text();
                classCode = $(this).children().siblings().children('#classCode').text();
                var passdata = {
                    classID: classID
                };
                $.ajax({
                    type: "POST",
                    url: 'teacherSLendorseGetRecord.php',
                    data: passdata,
                    datatype: 'json',
                    cache: false,
                    success: function(data) {
                        if(data = "[]"){
                            $('#noSL').replaceWith('<h3>No Sick Leave Record</h3>');
                        }
                        const myJSON = data;
                        //alert(myJSON);
                        const myObjarr = JSON.parse(myJSON);
                        //alert(myObjarr[0].attanenceID + myObjarr[0].fileName);

                        var content = "";
                        var btnWithdraw = "";

                        content += "<table class='styled-table'><thead id='TBtitle'><tr><th>attanence ID</th><th>Stdeunt Name</th><th>attanence Status</th><th>attanence Date</th><th>Uploaded File</th><th>Withdraw Sick Leave<br />(Change to ABS)</th></tr></thead><tbody id='TBbody'>";
                        for (let i in myObjarr) {

                            if (myObjarr[i].attanence_status == 'SickLeave') {
                                btnWithdraw = "<button class='btnWithdraw' id='btnWithdraw'>Withdraw Sick Leave</button>";
                            } else {
                                btnWithdraw = "";
                            }

                            content += "<tr><td id='attID'>" +
                                myObjarr[i].attanenceID + "</td><td>" +
                                myObjarr[i].studentName + "</td><td>" +
                                myObjarr[i].attanence_status + "</td><td>" +
                                myObjarr[i].attanence_date + "</td><td>" +
                                '<a href = "http://127.0.0.1/uploads/' +
                                myObjarr[i].attanenceID + '/' + myObjarr[i].fileName +
                                '" download="' + myObjarr[i].fileName + '">' + myObjarr[i].fileName + '</a>' + "</td><td>" +
                                btnWithdraw +
                                "</td></tr>";
                        }
                        content += "</tbody></table>";

                        $('table').replaceWith(content);
                    }
                });
            });

            $(document).on('click', '#btnWithdraw', function() {
                attRecordID = $(this).parent().siblings('#attID').text();

                var passdata = {
                    attID: attRecordID,
                };

                $.ajax({
                    type: "POST",
                    url: 'teacherSLChangeStatus.php',
                    data: passdata,
                    datatype: 'text',
                    cache: false,
                    success: function(data) {
                        alert(data);
                        location.reload();
                    }
                });
            });
        </script>
    </head>

    <body>
        <?php include 'teacherMenuBar.html'; ?>
        <br /><br />
        <center>
            <div id="theBtns"></div>
            <table class='styled-table'>
                <thead id='TBtitle'>
                    <tr>
                        <th>attanence ID</th>
                        <th>Stdeunt Name</th>
                        <th>attanence Status</th>
                        <th>attanence Date</th>
                        <th>Uploaded File</th>
                        <th>Withdraw Sick Leave<br />(Change to ABS)</th>
                    </tr>
                </thead>
                <tbody id='TBbody'>
                </tbody>
            </table>
            <div id="noSL"><div>
        </center>
    </body>

    </html>