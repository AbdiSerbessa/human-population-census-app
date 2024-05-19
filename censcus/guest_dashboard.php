<h1>Report on:</h1>
<div class="dashboard p-1">
                    <div class="total">
                        <div class="row">
                            <div class="col-3">
                                <a href="cms.php?id=report_table&attrib=gender"><div class="total__box text-center">
                                <h1>Gender</h1>
                                    
                                </div></a>
                            </div>
                            <div class="col-3">
                                <a href="cms.php?id=report_table&attrib=religion"><div class="total__box text-center">
                                    <h1>
                                        <?php
                                            $query = "SELECT COUNT(*) totalSupervisor FROM supervisors;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalSupervisor = mysqli_fetch_assoc( $result );
                                                echo $totalSupervisor['totalSupervisor'];
                                            ?>
                                    </h1>
                                    <h2>Religion</h2>
                                </div>
                            </div>
                            <div class="col-3">
                                <a href="cms.php?id=report_table&attrib=education"><div class="total__box text-center">
                                    <h1>
                                        <?php
                                            $query = "SELECT COUNT(*) totalEnumerator FROM enumerators;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalEnumerator = mysqli_fetch_assoc( $result );
                                                echo $totalEnumerator['totalEnumerator'];
                                            ?>

                                    </h1>
                                    <h2>Iliteracy</h2>
                                </div>
                            </div>
                            
                            </div>

                        </div>
                        <div class="row" style="margin-top:20px">
                            <div class="col-3">
                                <a href="cms.php?id=report_table&attrib=house"><div class="total__box text-center">
                                <h1>Houses</h1>
                                    
                                </div>
                            </div>
                            
                            <div class="col-3">
                                <a href="cms.php?id=report_table&attrib=age"><div class="total__box text-center">
                                    <h1><?php
                                            $query = "SELECT COUNT(*) totalPerson FROM person;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalPerson = mysqli_fetch_assoc( $result );
                                            echo $totalPerson['totalPerson'];
                                            ?></h1>
                                    <h2>Age</h2>
                                </div>
                        </div>
                    </div>
                </div>