<!DOCTYPE html>
<html lang = "en">

<?php $title = 'Programme Info Page'; include('templates/header.php'); ?>


    <div class="container">
        <div class="row" id="row">
            <div class="col-md-12">
                <div class="card" id="card-container">
                    <div class="card-body" id="card">
                        <?php
                        include 'db_connection.php';
                        $conn = OpenCon();
                        $id = $_GET['id'];
                        $query = "SELECT pr.title, p.title
                        from programme pr INNER JOIN project p
                        ON p.prog_id = pr.prog_id
                        WHERE pr.prog_id = $id";
                        
                        $result = mysqli_query($conn, $query);
                        
                        if(mysqli_num_rows($result) == 0){
                            echo '<h1 style="margin-top: 5rem;">No Projects found!</h1>';
                        }
                        else{

                            echo '<div class="table-responsive">';
                                echo '<table class="table">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th>Programme</th>';
                                            echo '<th>Project</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    $temp = '';
                                    while($row = mysqli_fetch_row($result)) {
                                        if ($temp != $row[0]) {
                                            echo '<tr>';
                                                echo '<td>' . $row[0] . '</td>';
                                                echo '<td>' . $row[1] . '</td>';
                                            echo '</tr>';
                                        } else {
                                            echo '<tr>';
                                                echo '<td></td>';
                                                echo '<td>' . $row[1] . '</td>';
                                            echo '</tr>';
                                        }
                                        $temp = $row[0];
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                            echo '</div>';
                        }
                        ?>          
                    </div>
                    <a action></a>
                </div>
            </div>
        </div>
    </div>

    <script src = "{{ url_for('static', filename = 'bootstrap/js/bootstrap.min.js') }}"></script>
    
</body>

</html>