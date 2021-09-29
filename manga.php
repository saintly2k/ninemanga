<?php

include("core.php");
$manga_title = $_GET["m"];
$manga_cover = $_GET["c"];

?>

<!doctype html>
<html lang="en">

<head>
    <title><?php echo $read_before; echo $manga_title; echo $read_after; echo $site_trenner; echo $site_title; ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body onload="clearChapters()">

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2><?php echo $manga_title; echo " - "; echo "<a href='index.php'>"; echo $site_title; echo "</a>"; ?>
                    </h2>
                </div>

                <img src="covers/<?php echo $manga_cover; ?>">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">Volume</th>
                            <th scope="col" width="10%">Chapter</th>
                            <th scope="col" width="50%">Title</th>
                            <th scope="col" width="10%">Released</th>
                            <th scope="col" width="20%">Group</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'retrieve-data.php'; ?>

                        <?php if ($c_result->num_rows > 0): ?>

                        <?php while($array=mysqli_fetch_row($c_result)): ?>

                        <input id="searchbar" type="text" style="display: none" class="form-control" name="search"
                            onkeyup="clearChapters()" value="<?php echo $manga_title; ?>" aria-label="Searchbar"
                            aria-describedby="basic-addon1">

                        <tr class="chapter">
                            <td style="display: none"><?php echo $array[0]; ?></td>
                            <th scope="row">Vol.<?php echo $array[2];?></th>
                            <th scope="row">Ch.<?php echo $array[1];?></th>
                            <td><?php echo $array[3];?></td>
                            <td><?php echo $array[4];?></td>
                            <td><?php echo $array[6];?></td>
                            <script>
                            function clearChapters() {
                                let input = document.getElementById('searchbar').value
                                input = input.toLowerCase();
                                let x = document.getElementsByClassName('chapter');

                                for (i = 0; i < x.length; i++) {
                                    if (!x[i].innerHTML.toLowerCase().includes(input)) {
                                        x[i].style.display = "none";
                                    } else {
                                        x[i].style.display = "";
                                    }
                                }
                            }
                            </script>
                        </tr>

                        <?php endwhile; ?>

                        <?php else: ?>
                        <tr>
                            <td colspan="3" rowspan="1" headers="">No Chapters Found For This Manga</td>
                        </tr>
                        <?php endif; ?>

                        <?php mysqli_free_result($result); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>