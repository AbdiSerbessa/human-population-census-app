<div class="dashboard p-1">
                    <div class="total">
                        <div class="row">
                            
                            <div class="col-3">
                                <div class="total__box text-center">
                                    <h1>
                                        <?php
                                            $query = "SELECT COUNT(*) totalSupervisor FROM supervisors;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalSupervisor = mysqli_fetch_assoc( $result );
                                                echo $totalSupervisor['totalSupervisor'];
                                            ?>
                                    </h1>
                                    <h2>Supervisor</h2>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="total__box text-center">
                                    <h1>
                                        <?php
                                            $query = "SELECT COUNT(*) totalEnumerator FROM enumerators;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalEnumerator = mysqli_fetch_assoc( $result );
                                                echo $totalEnumerator['totalEnumerator'];
                                            ?>

                                    </h1>
                                    <h2>Enumerator</h2>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="total__box text-center">
                                    <h1><?php
                                            $query = "SELECT COUNT(*) totalPerson FROM person;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalPerson = mysqli_fetch_assoc( $result );
                                            echo $totalPerson['totalPerson'];
                                            ?></h1>
                                    <h2>population</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>