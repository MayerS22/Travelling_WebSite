<?php

$conn = mysqli_connect('localhost', 'root', '', 'user_db');

?>
<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Travelopedia</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="trips-travels.css">





</head>

<body>

    <header>
        <div id="menu-bar" class="fas fa-bars"></div>
        <a href="../admin_page.php" class="logo"><span>T</span>ravelopedia</a>

        <nav class="navbar">
            <i>Welcome Admin</i>
            
            <a href="../admin_trips_page/trips.php">Trips</a>
            <a href="../admin_travels_page/travels.php">Travels</a>
            <a href="../logOut.php" >Log out</a>
        </nav>
    </header>
    <section class="home">
        <div class="container">
            <br />
            <div class="table-responsive">
                <br />
                <div align="right">
                    <button type="button" name="add" id="add" class="btn btn-info">Add</button>
                </div>
                <br />
                <div id="alert_message"></div>
                <table id="user_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width='5%'>ID</th>
                            <th width='15%'>User</th>
                            <th width='15%'>destination</th>
                            <th width='15%'>number</th>
                            <th width='15%'>arrival</th>
                            <th width='15%'>leaving</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
    <script src="js.js"></script>

</body>

</html>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        fetch_data();

        function fetch_data() {
            var dataTable = $('#user_data').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "fetch.php",
                    type: "POST"
                }
            });
        }

        function update_data(id, column_name, value) {
            $.ajax({
                url: "update.php",
                method: "POST",
                data: {
                    id: id,
                    column_name: column_name,
                    value: value
                },
                success: function(data) {
                    $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                    $('#user_data').DataTable().destroy();
                    fetch_data();
                }
            });
            setInterval(function() {
                $('#alert_message').html('');
            }, 5000);
        }

        $(document).on('blur', '.update', function() {
            var id = $(this).data("id");
            var column_name = $(this).data("column");
            var value = $(this).text();
            update_data(id, column_name, value);
        });

        $('#add').click(function() {
            var html = '<tr>';
            html += '<td contenteditable id="data1"></td>';
            html += '<td contenteditable id="data2"></td>';
            html += '<td contenteditable id="data3"></td>';
            html += '<td contenteditable id="data4"></td>';
            html += '<td contenteditable id="data5"></td>';
            html += '<td contenteditable id="data6"></td>';
            html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
            html += '</tr>';
            $('#user_data tbody').prepend(html);
        });

        $(document).on('click', '#insert', function() {
            var id = $('#data1').text();
            var user = $('#data2').text();
            var destination = $('#data3').text();
            var num = $('#data4').text();
            var arrival = $('#data5').text();
            var leaving = $('#data6').text();
            if (id != '' && user != '' && destination != '' && num != '' && arrival != '' && leaving != '') {
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: {
                        id: id,
                        user: user ,
                        destination : destination ,
                        num : num ,
                        arrival:arrival,
                        leaving:leaving,
                    },
                    success: function(data) {
                        $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                        $('#user_data').DataTable().destroy();
                        fetch_data();
                    }
                });
                setInterval(function() {
                    $('#alert_message').html('');
                }, 5000);
            } else {
                alert("all Fields is required");
            }
        });

        $(document).on('click', '.delete', function() {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to remove this?")) {
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                        $('#user_data').DataTable().destroy();
                        fetch_data();
                    }
                });
                setInterval(function() {
                    $('#alert_message').html('');
                }, 5000);
            }
        });
    });
</script>