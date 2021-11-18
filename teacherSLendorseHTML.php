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

                        const myJSON = data;
                        //alert(myJSON);
                        const myObjarr = JSON.parse(myJSON);
                        alert(myObjarr[0].attanenceID + myObjarr[0].fileName);

                        var content = "";

                        content += "<table class='styled-table'><thead id='TBtitle'><tr><th>Stdeunt Name</th><th>attanence Status</th><th>attanence Date</th><th>Uploaded File</th></tr></thead><tbody id='TBbody'>";
                        for (let i in myObjarr) {

                            content += "<tr><td>" +
                                myObjarr[0].studentName + "</td><td>" +
                                myObjarr[0].attanence_status + "</td><td>" +
                                myObjarr[0].attanence_date + "</td><td>" +
                                '<a href = "http://127.0.0.1/uploads/' 
                                + myObjarr[0].attanenceID + '/' + myObjarr[0].fileName 
                                + '" download="' + myObjarr[0].fileName +'">' + myObjarr[0].fileName + '</a>' +
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
        <?php include 'teacherMenuBar.html'; ?>
        <br /><br />
        <center>
            <div id="theBtns"></div>
            <table class='styled-table'>
                <thead id='TBtitle'>
                    <tr>
                        <th>Stdeunt Name</th>
                        <th>attanence Status</th>
                        <th>attanence Date</th>
                        <th>Uploaded File</th>
                    </tr>
                </thead>
                <tbody id='TBbody'>
                </tbody>
            </table>
        </center>
    </body>

    </html>