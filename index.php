<title>Safehouse</title>
<style>
    body {
        font-family: 'Calibri';
        background: linear-gradient(white 55%, pink);
    }

    font[color=red], p {
        padding-left: 5%;
    }
</style>

<?php
    spl_autoload_register(function ($class_name){
        include 'lib/' . $class_name . '.php';
    });

    $lockpin = new PinLock(1234);
    $lockpw = new PasswordLock("abcd");

    $safepin = new Safe($lockpin);
    $safepin->setName("PINLocked");
    $safepin->setProducer("dox");

    $safepw = new Safe($lockpw);
    $safepw->setName("PASSLocked");
    $safepw->setProducer("dox");
    

        /////////////////////////////
        echo "<h2>PINLocked</h2>";
        /////////////////////////////

            $safeName = $safepin->getName();
            $safeProducer = $safepin->getProducer();
            $mechanism = $safepin->getMechanism();
            $message = $safepin->getMessage();


                echo "<p><b>Trying to get safe's specs:</b><br/>";
                echo "Welcome to $safeName by $safeProducer. $message";

                echo "<br/><br/><b>Writing the PIN:</b><br/>";
                $safepin->unlock(1234);

                    //Secret - set & get when unlocked
                         echo "<br/><br/><b>Setting and getting secret (Safe's unlocked):</b><br/>";
                          echo "Setting secret: ";
                            $safepin->setSecret('SomeSecret');
                          echo "Getting secret: ";
                            echo $safepin->getSecret();

                    //Locking
                    echo "<br/></br><b>Locking:</b><br/>";
                        $safepin->lock();
                    echo "Trying to get the secret (safe's locked): <br/>";
                        echo $safepin->getSecret();

                    echo "<br/><b>Turning off the alarm with two PINs, invalid and valid.</b><br/>";
                        $safepin->turnOffAlarm(123);
                        echo "<br/>";
                        $safepin->turnOffAlarm(1234);
                        echo "<br/>";

                    echo "Still locked, trying to double lock: ";
                        $safepin->lock();
                        echo "<br/><br/></p>";


      // ************************************************************
      // ************************************************************


         echo "<h2>PASSLocked</h2>";

                echo "<p>Trying to show I'm  clone:<br/>";
                $safepw->unlock("abcd");
                     echo "<br/>";
                $safepw->lock();
                $safepw->lock();
                     echo "</p>";
                $safepw->unlock("abc");


        echo "<br/><hr><body><form action='index.php'>It's your time. Try your best unlocking the <u>PINLocked</u> safe! &nbsp;<input type=\"text\" name=\"pass\" size=\"4\" maxlength=\"4\"></form></body>";
        if (isset($_GET['pass'])) {
            $pass = $_GET['pass'];
            $safepin->unlock($pass);
        }

// __constructor ($password=null) - oznacza ze nie musimy go podawać
// tak by nic nie bylo na sztywno, klasa sejfu nie zna zamka
// enkapsulacja, wstrzykiwanie zaleznosci,

?>



