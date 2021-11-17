<!DOCTYPE html>
<html>

<head>
    <?php include 'studentCheckSession.php'; ?>
    <title>Student Certificate Upload</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    </style>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {

            $.ajax({
                type: "POST",
                url: 'studentSLGetAtt.php',
                cache: false,
                success: function(data) {

                    if (data == "[]") {
                        $('#recordIs0').replaceWith('No Record.');
                    }

                    const myJSON = data;
                    //alert(myJSON);
                    const myObjarr = JSON.parse(myJSON);
                    //alert(myObjarr[0].attanence_status);

                    var content = "";

                    content += "<table class='styled-table'><thead id='TBtitle'><tr><th>attanence status</th><th>attanence Date</th><th>Certificate Required</th></tr></thead><tbody id='TBbody'>";
                    for (let i in myObjarr) {

                        content += "<tr><td id='theid'>" +
                            myObjarr[i].attanence_status + "</td><td>" + myObjarr[i].attanence_date +
                            "</td><td>" + "<input type='file' id='fileCert' name='fileCert'/> <button id='btnUploads' name='btnUploads'>Upload</button>" +
                            "</td></tr>";
                    }
                    content += "</tbody></table>";

                    $('table').replaceWith(content);
                }
            });

        });

        $(document).on('click', '#btnUploads', function() {
            var file_data = $('#fileCert').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);

            
        });
    </script>
    <style></style>
</head>

<body>
    <?php include 'studentMenuBar.html'; ?>
    <center>
        <br />
        <table></table>
        <div id="recordIs0"></div>
    </center>
</body>

</html>