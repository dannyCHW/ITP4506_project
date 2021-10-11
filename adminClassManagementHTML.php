<!DOCTYPE html>
<html>

<head>
    <title>Class Management Page</title>
    <?php include 'adminCheckSession.php'; ?>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <link rel="stylesheet" type="text/css" href="adminClassManagement.css">
    <script>

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" language="javascript">
        function getClassFromPHP(receive) {

            var passData = {
                status: receive
            };

            $.ajax({
                type: "POST",
                url: 'adminClassManagement.php',
                data: passData,
                datatype: 'json',
                cache: false,
                success: function(data) {

                    const myJSON = data;
                    //alert(myJSON);
                    const myObjarr = JSON.parse(myJSON);
                    //alert(isEmpty(myObjarr));
                    //alert(myObjarr[0].adminID);

                    var content = "";

                    if (isEmpty(myObjarr)) {

                        content += "<table class='ustyled-table'><thead id='TBtitle'><tr>" +
                            "<th>There is not unverified class.</th>" +
                            "</tr></thead><tbody id='TBbody'><tr><td></td></tr>";
                            
                    } else {

                        if (receive == 'nonVerify') {

                            content += "<table class='ustyled-table'><thead id='TBtitle'><tr>" +
                                "<th>classID</th><th>classCode</th><th>schoolYear</th><th>classInfo</th><th>verify</th>" +
                                "</tr></thead><tbody id='TBbody'>";

                            for (let i in myObjarr) {
                                content += "<tr><td id='theid'>" + myObjarr[i].classID + "</td><td>" + myObjarr[i].classCode + "</td><td>" +
                                    myObjarr[i].schoolYear + "</td><td>" + myObjarr[i].classInfo + "</td><td><button id='accept'>Accept</button>";

                                content += "</td></tr>";
                            }

                        } else {

                            content += "<table class='styled-table'><thead id='TBtitle'><tr>" +
                                "<th>classID</th><th>classCode</th><th>schoolYear</th><th>classInfo</th>" +
                                "</tr></thead><tbody id='TBbody'>";

                            for (let i in myObjarr) {
                                content += "<tr><td id='theid'>" + myObjarr[i].classID + "</td><td>" + myObjarr[i].classCode + "</td><td>" +
                                    myObjarr[i].schoolYear + "</td><td>" + myObjarr[i].classInfo;

                                content += "</td></tr>";
                            }

                        }

                    }

                    content += "</tbody></table>";
                    $("table").replaceWith(content);
                    content = "";
                }
            });

        }

        $(document).ready(function() {

            $(".btnUnV").click(function() {
                getClassFromPHP('nonVerify');
            });

            $(".btnVd").click(function() {
                getClassFromPHP('active');
            });

        });

        $(document).on('click', '#accept', function() {
            var classValID = $(this).parent().siblings("#theid").text();

            var passData = {
                classID: classValID
            };

            $.ajax({
                type: "POST",
                url: 'adminClassManagementVerify.php',
                data: passData,
                datatype: 'text',
                cache: false,
                success: function(data) {
                    alert(data);
                    location.reload();
                }
            });
        });

        function isEmpty(obj) {
            return Object.keys(obj).length === 0;
        }
    </script>


</head>

<body>
    <?php
    include 'adminMenuBar.html';
    ?>
    <center>
        <br />
        <button class="btnUnV">Un Verify</button>
        <button class="btnVd">Existing</button>
        <table class="styled-table">
            <thead id="TBtitle">
                <tr>
                    <th>Click the button on top to select class type.</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="TBbody">

                <tr id="replaceMent">
                    <th></th>
                </tr>

            </tbody>
        </table>
    </center>
</body>

</html>