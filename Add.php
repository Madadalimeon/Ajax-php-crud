<?php include "config.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Add Student</title>

    <style>
        body {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            font-family: 'Poppins', sans-serif;
        }

        .form-box {
            background: #fff;
            width: 450px;
            border-radius: 15px;
            padding: 30px 35px;
            box-shadow: 0 0 30px rgba(0, 0, 0, .1);
        }

        button {
            background: #4473b9ff;
            border: none;
            padding: 12px;
            border-radius: 5px;
            color: #fff;
            font-size: 18px;
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
            <h2>Add Form</h2>

            <form id="Add_form">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="Name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Father Name</label>
                    <input type="text" name="Father_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="Email" class="form-control" required>
                </div>

                <button type="submit" class="w-100 mt-3">Submit</button>
            </form>

            <div id="msg" class="mt-3"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#Add_form").on("submit", function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.trim() == "success") {
                            $("#msg").html("<div class='alert alert-success'>Data Inserted Successfully </div>");
                            $("#Add_form")[0].reset();
                        } else {
                            $("#msg").html("<div class='alert alert-danger'>Something went wrong </div>");
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>