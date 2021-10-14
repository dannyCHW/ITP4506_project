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

            $.ajax({
                type: "POST",
                url: 'adminClassManagement.php',
                datatype: 'json',
                cache: false,
                success: function(data) {

                    const myJSON = data;
                    //alert(myJSON);
                    const myObjarr = JSON.parse(myJSON);
                    //alert(isEmpty(myObjarr));
                    //alert(myObjarr[0].adminID);

                    var content = "";

                    content += "<table class='styled-table'><thead id='TBtitle'><tr>" +
                        "<th>archive</th><th>classID</th><th>classCode</th><th>schoolYear</th><th>classInfo</th><th> </th>" +
                        "</tr></thead><tbody id='TBbody'>";

                    for (let i in myObjarr) {
                        content += "<tr><td><input type='checkbox' name='goRecord' value='" + myObjarr[i].classID + "'></td><td id='theid'>" + myObjarr[i].classID + "</td><td>" + myObjarr[i].classCode + "</td><td>" +
                            myObjarr[i].schoolYear + "</td><td>" + myObjarr[i].classInfo + "</td><td>" + "<button id='edit'>Edit Info</button>";

                        content += "</td></tr>";
                    }

                    content += "</tbody></table>";
                    $("table").replaceWith(content);
                    content = "";
                }
            });

        }

        function getChecked() {
            var checkBoxs = new Array();
            $('input:checkbox[name=goRecord]').each(function() {
                if ($(this).is(':checked')) {
                    //alert($(this).val());
                    checkBoxs.push($(this).val());
                }
            });
            return checkBoxs;
        }

        $(document).ready(function() {

            // $(".btnUnV").click(function() {
            //     getClassFromPHP('nonVerify');
            // });

            // $(".btnVd").click(function() {
            //     getClassFromPHP('active');
            // });

            getClassFromPHP('active');

            $("#aci").click(function() {
                var checkBoxs = getChecked();

                if (checkBoxs.length == 0) {

                    alert("You did not select any record.");

                } else {

                    if (confirm('Are you sure to save these records into archive? This action cannot be reverse!')) {
                        // Save it!
                        //alert('Record was saved to the database.');
                        //checkBoxs.forEach(element => alert(element));

                        var jsonCheckeds = {
                            checkBoxs: JSON.stringify(checkBoxs)
                        }

                        $.ajax({
                            type: "POST",
                            url: 'adminSaveToArchive.php',
                            data: jsonCheckeds,
                            datatype: 'text',
                            cache: false,
                            success: function(data) {

                                //const myJSON = data;
                                //alert(myJSON);
                                //const myObjarr = JSON.parse(myJSON);
                                //alert(isEmpty(myObjarr));
                                //alert(myObjarr[0].adminID);

                                alert(data);
                            }
                        });

                    } else {
                        // Do nothing!
                        alert('Record was not saved to the database.');
                    }

                }

            });

        });

        $(document).on('click', '#edit', function() {
            var classID = $(this).parent().siblings('#theid').text();
            //alert(classID);
            window.location = 'adminClassManagementEditHTML.php?classID=' + classID;
        });

        function isEmpty(obj) {
            return Object.keys(obj).length === 0;
        }
    </script>


</head>

<body>
    <link rel="stylesheet" type="text/css" href="adminClassManagement.css">
    <?php
    include 'adminMenuBar.html';
    ?>


    <center>
        <br />
        <!-- <button class="btnUnV">Archive</button> -->
        <!-- <button class="btnVd">Existing</button> -->
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
        <br />
        <div></div>
        <br />
        <button id="aci">Save To Archive</button>
    </center>

</body>

</html>