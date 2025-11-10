<?php include "config.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Form Design</title>
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
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .form-box:hover {
            box-shadow: 0 0 45px rgba(0, 0, 0, 0.18);
        }

        button {
            background: #0d6efd;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 18px;
            color: #fff;
            transition: .3s;
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

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">fatherName</th>
                            <th scope="col">Email</th>
                            <th scope="col">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $sql = "SELECT * FROM studect_table";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($db = $result->fetch_assoc()) {

                            ?>
                                    <th><?php echo $db['id'];  ?></th>
                                    <td><?php echo $db['Name'];  ?></td>
                                    <td><?php echo $db['FatherName'];  ?></td>
                                    <td><?php echo $db['Email'];  ?></td>
                                    <td class="">
                                        <a href="#" class="deleteBtn" data-id="<?php echo $db['id']; ?>">
                                            <i class="fa-solid fa-user-xmark text-danger"></i>
                                        </a>

                                        <!-- <a href="update.php?id=<?php // echo $db['id']; 
                                                                    ?>">
                                            <i class="fa-solid fa-user-plus text-success"></i>
                                        </a> -->

                                    </td>
                        </tr>
                <?php
                                }
                            } else {
                                echo "0 row";
                            }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {

            $(document).on("click", ".deleteBtn", function() {
                var StudentId = $(this).data("id");
                var element = this;
                $.ajax({
                    url: "Delete.php",
                    type: "POST",
                    data: {
                        id: StudentId
                    },
                    success: function(data) {
                        if (data == 1) {
                            $(element).closest("tr").fadeOut();
                        }
                    }
                })

            })

        })
    </script>
</body>

</html>
