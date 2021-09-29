<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("core.php"); $current_page = "Home"; ?>
    <meta charset="UTF-8">
    <title><?php echo $site_title; echo " - "; echo $current_page; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2><?php echo $site_title; echo " - "; echo $current_page; ?></h2>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="15%">Latest Update</th>
                            <th scope="col" width="50%">Manga Title</th>
                            <th scope="col" width="10%">Chapter</th>
                            <th scope="col" width="15%">Total Chapters</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'retrieve-data.php'; ?>

                        <?php if ($result->num_rows > 0): ?>

                        <?php while($array=mysqli_fetch_row($result)): ?>

                        <tr>
                            <th scope="row"><?php echo $array[0];?></th>
                            <td><a href="manga.php?m=<?php echo $array[1]; ?>&c=<?php echo $array[4];?>"><?php echo $array[1];?></a></td>
                            <td><?php echo $array[2];?> Chapter(s)</td>
                            <td><?php echo $array[3];?> Chapter(s)</td>
                        </tr>

                        <?php endwhile; ?>

                        <?php else: ?>
                        <tr>
                            <td colspan="3" rowspan="1" headers="">No Manga Found</td>
                        </tr>
                        <?php endif; ?>

                        <?php mysqli_free_result($result); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>