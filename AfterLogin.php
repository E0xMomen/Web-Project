<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/home.css">
    <title>Book Planet</title>
</head>

<?php require_once "conect.php";
$name = $_SESSION["name"];
?>

<body>
    <header>
        <img src="./images/logo.png" alt="not found">
        <span>Book Planet</span>
        <ul>
            <?php
            if ($_SESSION["type"] == "super" || $_SESSION["type"] == "admin") {
                echo '<li><a href="Dashboard.php">DashBoard</a></li>';
            } else {
                echo '<li><a href="#">Home</a></li>';
            }
            ?>
            <li><a href="#AboutUs">About Website</a></li>
            <li><a href="#Category">Category</a></li>
            <li><a href="#Cont_US">Contact Us</a></li>
            <li><a href="Personal.php"><label for="" style="cursor: pointer;"><?php echo "$name" ?></label></a>
            <li><a href="logout.php">Logout</a></li>
            </li>
        </ul>
    </header>

    <section class="banner">

        <pre>   Welcome
     to our
Book Planet
    </pre>
    </section>

    <script type="text/javascript">
        window.addEventListener("scroll", function () {
            var header = document.querySelector("header")
            header.classList.toggle("sticky", window.scrollY > 0)
        })
    </script>

    <div id="AboutUs">
        <div class="calam">

            <p>
                <span>About Website</span>
                Welcome to SecureReads, your ultimate destination for cybersecurity books, resources, and roadmaps.
                In an era where digital threats are constantly evolving,
                staying informed and equipped with the right knowledge is paramount.
                SecureReads offers a curated collection of books, guides
                and mind maps tailored to both beginners and seasoned professionals in the cybersecurity field.
                Whether you're just starting your journey in cybersecurity or looking to deepen your expertise, we have
                a diverse range of books to suit your needs. From introductory primers to advanced topics like ethical
                hacking, cryptography, and network security, our collection covers it all.
                oin a vibrant community of cybersecurity enthusiasts and professionals. Participate in discussions,
                share insights, and collaborate on projects to enhance your learning experience. Our forums provide a
                platform for networking and knowledge exchange among like-minded individuals.
            </p>

        </div>
        <div class="photo">
            <img src="https://cdn.dribbble.com/userupload/4297768/file/original-1f9df4fa87c28b1efa186b213f275772.jpg?resize=752x"
                alt="">

        </div>

    </div>

    <div id="Category" style="text-align: center;">
        <h2>Category</h2>
        <p>This is our collection of books with root maps</p>
        <div class="booksPhoto" style="cursor: alias;">

            <a href="pentest.php"> <img
                    src="https://raw.githubusercontent.com/CATReloaded/CATReloaded-Circles-Roadmaps-2024/main/CyberSecurity/img/pt1.png"
                    alt=""> </a>
            <a href="network security.php"> <img
                    src="https://raw.githubusercontent.com/CATReloaded/CATReloaded-Circles-Roadmaps-2024/main/CyberSecurity/img/nw.jpg"
                    alt=""> </a>
            <a href="cryptography.php"> <img
                    src="https://as2.ftcdn.net/v2/jpg/00/89/97/39/1000_F_89973923_0lfduzsXEqiKKGN71ruGQ4kdf0dgnQid.jpg"
                    alt=""> </a>

        </div>

        <div class="topphotobref">

            <div class="pen">
                <p style="margin-top: 5px;"><span style="color: #007bb6;">Category</span>: Pentration Testing</p>
                <p>Description: Understand how a web server works, how it is hacked, and how you can identify the most
                    important and powerful vulnerabilities that may lead to (control, taking sensitive information,
                    etc.) and protect your site from all of these vulnerabilities.</p>

            </div>
            <div class="net">
                <p style="margin-top: 5px;"><span style="color: #007bb6;">Category</span>: Network Security</p>
                <p>Description: Understand how the network is built and the protocols that the network relies on to send
                    and receive messages, how to open a conversation with the server, how the network is manipulated and
                    hacked, how data flow is controlled, and how to protect your network from any hacking.</p>

            </div>
            <div class="Crypt">
                <p style="margin-top: 5px;"><span style="color: #007bb6;">Category</span>: Cryptography</p>
                <p>Description: Cryptography is the practice and study of techniques for secure communication in the
                    presence of third parties. It involves creating and analyzing protocols that prevent third parties
                    from reading private information.</p>

            </div>

        </div>

        <div class="booksPhotodow">

            <a href="soc.php"> <img
                    src="https://i0.wp.com/mycloudwiki.com/wp-content/uploads/2020/04/security-operations-center-e1587142945245.png"
                    alt=""> </a>


        </div>

        <div class="topphotobrefdown">

            <div class="soc"
                style="background-color: #f4f4f4; width: 400px;margin-left: auto; margin-right: auto; border-bottom-left-radius: 10px;border-bottom-right-radius:10px ;margin-top: -5px; margin-bottom: 80px; ">
                <p style="margin-top: 5px;"><span style="color: #007bb6;">Category</span>:SOC</p>
                <p style="width: 400px;margin-left: auto; margin-right: auto;">Description: SOC stands for Security
                    Operations Center. It's a centralized unit within an organization responsible for monitoring,
                    detecting, analyzing, and responding to cybersecurity incidents in real-time.</p>
            </div>
        </div>



        <div style="margin-top: 100px; margin-bottom: 150px;" id="Cont_US">
            <h2>Contact Us</h2>
            <p>This is our team</p>
            <section class="team">
                <div class="team-card" onmouseover="showInfo(this)" onmouseout="hideInfo(this)">
                    <img src="./images/my pic.jpg" alt="Team Member">
                    <div class="info">
                        <h3>Abdul Rhman Amr</h3>
                        <p style="margin-bottom: -1px">Front End</p>
                        <p><a style="text-decoration: none; color: rgb(78, 78, 245);"
                                href="https://www.linkedin.com/in/abdulrhman-amr-aa3891261/">Linkedin</a></p>
                    </div>
                </div>
                <div class="team-card" onmouseover="showInfo(this)" onmouseout="hideInfo(this)">
                    <img src="./images/Badr.jpg" alt="Team Member">
                    <div class="info">
                        <h3 style="color: #d1d6a7;">Badr Elwogood </h3>
                        <p style="margin-bottom: -1px;">Front End</p>
                        <p><a style="text-decoration: none; color: rgb(78, 78, 245);"
                                href="https://www.linkedin.com/in/badr-elwgod-42a1b7247/">Linkedin</a></p>
                    </div>
                </div>
                <div class="team-card" onmouseover="showInfo(this)" onmouseout="hideInfo(this)">
                    <img src="./images/Amr.jpg" alt="Team Member">
                    <div class="info">
                        <h3 style="color: #a6dffd;">Amr Khaled</h3>
                        <p style="margin-bottom: -1px;">Front End</p>
                        <p><a style="text-decoration: none; color: rgb(78, 78, 245);"
                                href="https://www.linkedin.com/in/amr-khaled-073b9a229/">Linkedin</a></p>
                    </div>
                </div>
            </section>

            <section class="team">
                <div class="team-card" onmouseover="showInfo(this)" onmouseout="hideInfo(this)">
                    <img src="./images/Momen.jpg" alt="Team Member">
                    <div class="info">
                        <h3>Momen Ameer</h3>
                        <p style="margin-bottom: -1px">Back End</p>
                        <p><a style="text-decoration: none; color: rgb(78, 78, 245);"
                                href="https://www.linkedin.com/in/momen-ameer-7b3032233/">Linkedin</a></p>
                    </div>
                </div>
                <div class="team-card" onmouseover="showInfo(this)" onmouseout="hideInfo(this)">
                    <img src="./images/Ahmedjpg.jpg" alt="Team Member">
                    <div class="info">
                        <h3 style="color: #d1d6a7;">Ahmed Ismaeel </h3>
                        <p style="margin-bottom: -1px;">Back End</p>
                        <p><a style="text-decoration: none; color: rgb(78, 78, 245);"
                                href="https://www.linkedin.com/in/ahmed-aldarawy-318a28246/">Linkedin</a></p>
                    </div>
                </div>
                <div class="team-card" onmouseover="showInfo(this)" onmouseout="hideInfo(this)">
                    <img src="./images/Abdo.jpg" alt="Team Member">
                    <div class="info">
                        <h3 style="color: #a6dffd;">Abdul Rhman Khaled</h3>
                        <p style="margin-bottom: -1px;">Back End</p>
                        <p><a style="text-decoration: none; color: rgb(78, 78, 245);"
                                href="https://www.linkedin.com/in/abdulrhman-al-maghraby-87a355284/">Linkedin</a></p>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <footer>
        <div class="footer-bottom">
            &copy; Book Planet. All Rights Reserved.
        </div>
    </footer>
</body>

</html>