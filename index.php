<!DOCTYPE HTML>
<html>
    <head>
        <title>หน้าหลัก</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    </head>
    <body class="landing">
        <div id="page-wrapper">

            <!-- Header -->
            <header id="header" class="alt">
                <h1><a href="#">COMPUTERSCI</h1>
                <nav id="nav">
                    <ul>
                        <li><a href="index.php" title="หน้าหลัก">Home</a></li>
                        <li><a href="tableindex.php" title="ตารางกิจกรรม">Activity Table</a></li>
                        <li><a href="regis_table.php" title="ลงทะเบียนกิจกรรม">Regis Activity</a></li>
                        <li><a href="_login.php" title="เข้าสู่ระบบ">Sign In</a></li>

                    </ul>
                    </li>
                    </ul>
                    </li>
            </header>
            <!-- Banner -->
            <section id="banner">
                <h2>Activity System of Computer Science Students</h2>
                <p>ระบบบันทึกการเข้ากิจกรรมของนักศึกษาสาขาวิชาวิทยาการคอมพิวเตอร์</p>
                <ul class="actions">
                    <li><a href="index.php" class="button special">หน้าหลัก</a></li>
                    <li><a href="#" class="button">ตารางกิจกรรม</a></li>
                </ul>
            </section>

            <!-- Main -->
            <section id="main" class="container">

                <section class="box special">
                    <header class="major">
                        <img src="images/sc.png" width="70" height="70"><h2>ประชาสัมพันธ์กิจกรรม</h2>
                        <h5></h5>
                        <h5></h5>
                    </header>
                </section>
                <section class="box special features">
                    <?php
                    include_once 'config/config.php';
                $strsql0 = "SELECT rela_id FROM relations_act order by rela_id desc limit 4";
                $result = mysqli_query($conn, $strsql0);
                    while ($rs1 = mysqli_fetch_array($result)) {
                        $his_id[] = $rs1['rela_id'];
                    }
                    $count = ceil(count($his_id) / 2);
                    $I = 0;
                    for ($i = 1; $i <= $count; $i++) {
                        ?>
                        <div class="features-row">
                            <?php
                            for ($ii = 0; $ii <= 1; $ii++) {
                                $strsql = "SELECT topic,descrip,image,des_act FROM relations_act where rela_id=$his_id[$I]";
                                $result1 = mysqli_query($conn, $strsql);
                                $rs = mysqli_fetch_array($result1)
                                ?>
                                <section>
                                    <img src="photo/<?= $rs['image'] ?>" width="250">
                                    <h4><?= $rs['topic'] ?></h4>
                                    <p><?= $rs['descrip'] . ' ' . $rs['des_act'] ?> </p>
                                </section>
                                <?php
                                if ($I == (count($his_id) - 1)) {
                                    break;
                                }
                                $I++;
                            }
                            ?>
                        </div>
                    <?php } ?>
                </section>
        </div>
    </div>
</section>



<!-- Footer -->
<footer id="footer">
    <ul class="copyright">
        <li>&copy; 234 ถนนเลย-เชียงคาน ตำบลเมือง อำเภอเมืองเลย จังหวัเลย ห้อง 323 อาคาร 3 โทรศัพท์ 042-835223-8 ต่อ 42128</a></li>
        <p><p>สงวนสิขสิทธิ์ © พ.ศ.2556, มหาวิทยาลัยราชภัฏเลย พัฒนาโดย คณะวิทยาศาสตร์และเทคโนโลยี สาขาวิชาวิทยาการคอมพิวเตอร์</p></p>
    </ul>
</footer>
</div>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/jquery.scrollgress.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>