<!DOCTYPE html>
<html>

<head>
    <?php include 'adminCheckSession.php'; ?>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <link rel="stylesheet" type="text/css" href="adminClassManagementEditHTML.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php include 'adminMenuBar.html'; ?>
    <?php
    $classID = $_GET['classID'];
    echo "<div id='classID' hidden>" . $classID . "</div>";
    ?>
    <script>
        $(document).ready(function() {
            //alert($('#classID').text());

            var passData = {
                classID: $('#classID').text()
            };

            $.ajax({
                type: "POST",
                url: 'adminClassManagementEditSqlGetData.php',
                data: passData,
                datatype: 'json',
                cache: false,
                success: function(data) {

                    const myJSON = data;
                    //alert(myJSON);
                    const myObjarr = JSON.parse(myJSON);
                    //alert(myObjarr[0].classID);

                    var content = "";

                    content += "<form action='adminClassManagementEditSubmit.php' method='post'><div class='container'>";
                    content += "<br /><br /><h1 class='r_text'>Edit Class Information</h1>";
                    content += "<p class='r_text'>Please fill in this form to edit class info.</p><br /><hr><br /><label><b></b></label>";

                    content += "<br><label><b>classID:</b></label><br>";
                    content += "<input type='text' value='" + myObjarr[0].classID + "' disabled required>";
                    content += "<input type='hidden' value='" + myObjarr[0].classID + "' name='classID' id='classID' required>";

                    content += "<br><label><b>classCode:</b></label><br>";
                    content += "<input type='text' value='" + myObjarr[0].classCode + "' name='classCode' id='classCode' disabled required>";

                    content += "<br><label><b>schoolYear:</b></label><br>";
                    content += "<input type='text' value='" + myObjarr[0].schoolYear + "' name='schoolYear' id='schoolYear' disabled required>";

                    content += "<br><label><b>classInfo:</b></label><br>";
                    content += "<input type='text' value='" + myObjarr[0].classInfo + "' name='classInfo' id='classInfo' disabled required>";

                    content += "<br><label><b>teacherID:</b></label><br>";
                    content += "<input type='text' value='" + myObjarr[0].teacherID + "' name='teacherID' id='teacherID' disabled required>";

                    content += "<br /><hr><br />";
                    content += "<button type='button' class='btnEdit' id='btnEdit'>Edit</button>&nbsp&nbsp";
                    //content += "<input type='submit' name='submits' value='submit' class='submitClass' id='submitbtn'/>";

                    content += "</div></form>";

                    $("form").replaceWith(content);
                }
            });

        });

        $(document).on('click', '#btnEdit', function() {

            if ($('#classCode').prop('disabled')) {
                $('#classCode').removeAttr('disabled').css("background-color", "yellow");
                $('#schoolYear').removeAttr('disabled').css("background-color", "yellow");
                $('#classInfo').removeAttr('disabled').css("background-color", "yellow");
                $('#teacherID').removeAttr('disabled').css("background-color", "yellow");
                $('#btnEdit').parent().append("<input type='submit' name='submits' value='submit' class='submitClass' id='submitbtn'/>")
            } else {
                $('#classCode').attr('disabled', 'disabled').css("background-color", "#f1f1f1");
                $('#schoolYear').attr('disabled', 'disabled').css("background-color", "#f1f1f1");
                $('#classInfo').attr('disabled', 'disabled').css("background-color", "#f1f1f1");
                $('#teacherID').attr('disabled', 'disabled').css("background-color", "#f1f1f1");
                $("#submitbtn").remove();
            }

        });
    </script>
</head>

<body>

    <center>
        <div class="main">
            <form action='adminClassManagementEditSubmit.php' method='post'>
                <!-- <div class='container'>
                    <br /><br />
                    <h1 class='r_text'>Edit Class Information</h1>
                    <p class='r_text'>Please fill in this form to edit class info.</p><br />
                    <hr><br /><label><b></b></label>
                    <br><label><b>classID:</b></label><br>
                    <input type='text' value='' name='classIDs' id='classID' disabled required>
                    <br><label><b>classCode:</b></label><br>
                    <input type='text' value='' name='classCodes' id='classCode' disabled required>
                    <br><label><b>schoolYear:</b></label><br>
                    <input type='text' value='' name='schoolYears' id='schoolYear' disabled required>
                    <br><label><b>classInfo:</b></label><br>
                    <input type='text' value='' name='classInfos' id='classInfo' disabled required>
                    <br />
                    <hr><br />
                    <button type='button' class='btnEdit' id='btnEdit'>Edit</button>&nbsp&nbsp
                    <input type='submit' name='submits' value='submit' class='submitClass' id='submitbtn' />
                </div> -->
            </form>
        </div>
    </center>
</body>

</html>