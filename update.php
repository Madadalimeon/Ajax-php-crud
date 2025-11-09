<?php
include "config.php";
$id = intval($_GET['id']);
$sql = "SELECT * FROM studect_table WHERE id = $id LIMIT 1";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Update Form</title>

    <style>
        body {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            font-family: 'Poppins', sans-serif;
        }

        .form-box {
            background: #fff;
            width: 450px;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        }

        button {
            background: #0d6efd;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 18px;
            color: #fff;
        }

        button:hover {
            background: #084dbf;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">My Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Add.php">Add</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="form-box">
            <h2>Update Form</h2>

            <form id="updateForm">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" value="<?php echo $data['Name']; ?>" name="Name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Father Name</label>
                    <input type="text" class="form-control" value="<?php echo $data['FatherName']; ?>" name="Father_name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" value="<?php echo $data['Email']; ?>" name="Email">
                </div>

                <button type="submit" class="w-100 mt-3">Update</button>
            </form>

            <div id="msg" class="mt-3"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#updateForm").on("submit", function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "update_action.php",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.trim() == "success") {
                            $("#msg").html("<div class='alert alert-success'>Updated Successfully </div>");
                        } else {
                            $("#msg").html("<div class='alert alert-danger'>Update Failed </div>");
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>