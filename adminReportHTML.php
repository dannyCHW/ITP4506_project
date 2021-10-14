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
                        " | Absent Rate : " + AbsentRate + "%" + "</b>";

                    $('#sd').replaceWith(content);
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
    </center>
</body>

</html>