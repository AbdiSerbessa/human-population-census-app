<script src="assets/js/anychart-core.min.js"></script>
<script src="assets/js/anychart-pie.min.js"></script>
<?php
$attrib = $_GET['attrib'];
$arr = array();
$subcity = ["Abbaa Gadaa", "Dambalaa", "Boolee", "Luugoo", "Daabee", "Bokkuu"];
//$query = "SELECT distinct subcity FROM kebele";
//$result = mysqli_query( $connection, $query );

foreach ($subcity as $w_id) {


    if ($attrib == 'gender') {
        $query2 = "SELECT COUNT(*) totalMale FROM person  inner join house on house.house_id=person.house_id  where sex='m' and subcity='$w_id';";

        $result2 = mysqli_query($connection, $query2);

        $totalMale = $result2 ? mysqli_fetch_assoc($result2) : 0;
        $totalMale = $totalMale['totalMale'];
        $query2 = "SELECT COUNT(*) totalFemale FROM person inner join house on house.house_id=person.house_id  where sex='f' and subcity='$w_id';";

        $result2 = mysqli_query($connection, $query2);
        $totalFemale = $result2 ? mysqli_fetch_assoc($result2) : 0;
        $totalFemale = $totalFemale['totalFemale'];
        $total = ($totalMale) + ($totalFemale);




?>
        <div id="allPerson">
            <div class="main__table">
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">subcity</th>
                            <th scope="col">Male</th>
                            <th scope="col">Female</th>
                            <th scope="col">Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $w_id . " " ?>
                            <td><?php echo $totalMale ?></td>
                            <td><?php echo $totalFemale ?></td>
                            <td><?php echo $total ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </br></br></br></br>




        <?php
        $graph_title = "Graphical representation for total Gender Report";
        $arr = array();
        $jsquery = "SELECT distinct sex FROM person;";

        $jsresult = mysqli_query($connection, $jsquery);
        while ($jsrow = mysqli_fetch_assoc($jsresult)) {

            $sx = $jsrow['sex'];

            $jsquery2 = "SELECT COUNT(*) {$sx} FROM person where sex='{$sx}';";

            $jsresult2 = mysqli_query($connection, $jsquery2);

            $total = $jsresult2 ? mysqli_fetch_assoc($jsresult2) : 0;
            $arr = array_merge($arr, [$jsrow['sex'] => $total["{$sx}"]]);
        }
    } else if ($attrib == 'religion') {
        $query2 = "SELECT COUNT(*) totalOrthodox FROM person inner join house on house.house_id=person.house_id  where religion='Orthodox' and subcity='$w_id';";
        $result2 = mysqli_query($connection, $query2);
        $totalOrthodox = $result2 ? mysqli_fetch_assoc($result2) : 0;
        $totalOrthodox = $totalOrthodox['totalOrthodox'];
        $query2 = "SELECT COUNT(*) totalProtestant FROM person inner join house on house.house_id=person.house_id  where religion='Protestant' and subcity='$w_id';";
        $result2 = mysqli_query($connection, $query2);
        $totalProtestant = $result2 ? mysqli_fetch_assoc($result2) : 0;
        $totalProtestant = $totalProtestant['totalProtestant'];
        $query2 = "SELECT COUNT(*) totalMuslim FROM person inner join house on house.house_id=person.house_id  where religion='Muslim' and subcity='$w_id';";
        $result2 = mysqli_query($connection, $query2);
        $totalMuslim = $result2 ? mysqli_fetch_assoc($result2) : 0;
        $totalMuslim = $totalMuslim['totalMuslim'];
        $total = ($totalOrthodox) + ($totalProtestant) + ($totalMuslim);
        $query2 = "SELECT COUNT(*) totalWaaqeffannaa FROM person inner join house on house.house_id=person.house_id  where religion='Waaqeffannaa' and subcity='$w_id';";
        $result2 = mysqli_query($connection, $query2);
        $totalWaaqeffannaa = $result2 ? mysqli_fetch_assoc($result2) : 0;
        $totalWaaqeffannaa = $totalWaaqeffannaa['totalWaaqeffannaa'];
        $total = ($totalWaaqeffannaa) + ($totalWaaqeffannaa) + ($totalWaaqeffannaa);


        ?>
        <div class="allPerson">
            <div class="main__table">
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">subcity</th>
                            <th scope="col">Orthodox</th>
                            <th scope="col">Protestant</th>
                            <th scope="col">Muslim</th>
                            <th scope="col">Waaqeffannaa</th>
                            <th scope="col">Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $w_id . " " ?>
                            <td><?php echo $totalOrthodox ?></td>
                            <td><?php echo $totalProtestant ?></td>
                            <td><?php echo $totalMuslim ?></td>
                            <td><?php echo $totalWaaqeffannaa ?></td>
                            <td><?php echo $total ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <?php
        $arr = array();
        $jsquery = "SELECT distinct religion FROM person;";
        $graph_title = "Graphical representation for total Religion Report";
        $jsresult = mysqli_query($connection, $jsquery);
        while ($jsrow = mysqli_fetch_assoc($jsresult)) {

            $sx = $jsrow['religion'];

            $jsquery2 = "SELECT COUNT(*) {$sx} FROM person where religion='{$sx}';";

            $jsresult2 = mysqli_query($connection, $jsquery2);

            $total = $jsresult2 ? mysqli_fetch_assoc($jsresult2) : 0;
            $arr = array_merge($arr, [$jsrow['religion'] => $total["{$sx}"]]);
        }
    } else if ($attrib == 'education') {
        $query2 = "SELECT COUNT(*) totalIlletrate FROM person inner join house on house.house_id=person.house_id  where education='illitrate' and subcity='$w_id';";
        $result2 = mysqli_query($connection, $query2);
        $totalIlletrate = $result2 ? mysqli_fetch_assoc($result2) : 0;
        $totalIlletrate = $totalIlletrate['totalIlletrate'];
        $query2 = "SELECT COUNT(*) totalCertificate FROM person inner join house on house.house_id=person.house_id  where education='certificate' and subcity='$w_id';";
        $result2 = mysqli_query($connection, $query2);
        $totalCertificate = $result2 ? mysqli_fetch_assoc($result2) : 0;
        $totalCertificate = $totalCertificate['totalCertificate'];
        $query2 = "SELECT COUNT(*) totalDegree FROM person inner join house on house.house_id=person.house_id  where education='degree' and subcity='$w_id';";
        $result2 = mysqli_query($connection, $query2);
        $totalDegree = $result2 ? mysqli_fetch_assoc($result2) : 0;
        $totalDegree = $totalDegree['totalDegree'];
        $query2 = "SELECT COUNT(*) totalMasters FROM person inner join house on house.house_id=person.house_id  where education='masters' and subcity='$w_id';";
        $result2 = mysqli_query($connection, $query2);
        $totalMasters = $result2 ? mysqli_fetch_assoc($result2) : 0;
        $totalMasters = $totalMasters['totalMasters'];
        $query2 = "SELECT COUNT(*) totalPHD FROM person inner join house on house.house_id=person.house_id  where education='phd' and subcity='$w_id';";
        $result2 = mysqli_query($connection, $query2);
        $totalPHD = $result2 ? mysqli_fetch_assoc($result2) : 0;
        $totalPHD = $totalPHD['totalPHD'];
        $total = ($totalIlletrate) + ($totalCertificate) + ($totalDegree) + ($totalMasters) + ($totalPHD);

        ?>
        <div class="allPerson">
            <div class="main__table">
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">subcity</th>
                            <th scope="col">Illetrate</th>
                            <th scope="col">Certificate</th>
                            <th scope="col">Degree</th>
                            <th scope="col">Masters</th>
                            <th scope="col">PHD</th>
                            <th scope="col">Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $w_id . " " ?>
                            <td><?php echo $totalIlletrate ?></td>
                            <td><?php echo $totalCertificate ?></td>
                            <td><?php echo $totalDegree ?></td>
                            <td><?php echo $totalMasters ?></td>
                            <td><?php echo $totalPHD ?></td>
                            <td><?php echo $total ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <?php
        $arr = array();
        $jsquery = "SELECT distinct education FROM person;";
        $graph_title = "Graphical representation for total Education Report";
        $jsresult = mysqli_query($connection, $jsquery);
        while ($jsrow = mysqli_fetch_assoc($jsresult)) {

            $sx = $jsrow['education'];

            $jsquery2 = "SELECT COUNT(*) {$sx} FROM person where education='{$sx}';";

            $jsresult2 = mysqli_query($connection, $jsquery2);

            $total = $jsresult2 ? mysqli_fetch_assoc($jsresult2) : 0;
            //echo "{$jsrow['education']}==>{$total["{$sx}"]}\n";

            // var_dump($total);
            $arr = array_merge($arr, [$jsrow['education'] => $total["{$sx}"]]);
        }
    } else if ($attrib == 'house') {
        $query2 = "SELECT COUNT(*) totalhouse FROM house where subcity='$w_id';";

        $result2 = mysqli_query($connection, $query2);
        $totalHouse = $result2 ? mysqli_fetch_assoc($result2) : 0;
        $totalHouse = $totalHouse['totalhouse'];

        ?>
        <div class="allPerson">
            <div class="main__table">
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">subcity</th>

                            <th scope="col">Number of Houses</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="display:fixed"><?php echo $w_id . " " ?></td>
                            <td><?php echo $totalHouse ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    <?php

    } else if ($attrib == 'age') {
        $totalBaby = $totalAdult = $totalElder = $totalYoung = $totalchildren = 0;
        $query2 = "select age from person inner join house on person.house_id=house.house_id where house.subcity='$w_id';";
        $result2 = mysqli_query($connection, $query2);
        while ($row2 = mysqli_fetch_assoc($result2)) {

            $age = $row2['age'];
            $date = strtotime($age);

            $date_input = getDate($date);

            $age = $date_input['year'];


            $crdate = strtotime("now");
            $crdate_input = getDate($crdate);
            $crage = $crdate_input['year'];

            $diff = $crage - $age;

            if ($diff > 56) {
                $totalElder += 1;
            } else if ($diff > 36) {
                $totalAdult += 1;
            } else if ($diff > 19) {
                $totalYoung += 1;
            } else if ($diff > 7) {
                $totalchildren += 1;
            } else {
                $totalBaby += 1;
            }
        }







        $total = ($totalBaby) + ($totalchildren) + ($totalYoung) + ($totalAdult) + ($totalElder);

    ?>
        <div class="allPerson">
            <div class="main__table">
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">subcity</th>
                            <th scope="col">Baby</th>
                            <th scope="col">children</th>
                            <th scope="col">Young</th>
                            <th scope="col">Adult</th>
                            <th scope="col">Elder</th>
                            <th scope="col">Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $w_id . " " ?></td>
                            <td><?php echo $totalBaby ?></td>
                            <td><?php echo $totalchildren ?></td>
                            <td><?php echo $totalYoung ?></td>
                            <td><?php echo $totalAdult ?></td>
                            <td><?php echo $totalElder ?></td>
                            <td><?php echo $total ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

<?php }
}
?>
<div id="graph" style="display:block;">

</div>
<script>
    var data = [
        <?php


        foreach ($arr as $key => $value) {
            echo "{x: \"$key\", value: $value},";
        }

        ?>

    ];

    // create the chart
    var chart = anychart.pie();

    // set the chart title
    chart.title("<?php echo "{$graph_title}"; ?>");

    // add the data
    chart.data(data);

    // display the chart in the container
    chart.container('graph');
    chart.draw();
</script>