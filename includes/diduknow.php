<?php 
                    $echos = array(
                        "Le mixeur de crypto-monnaie, ou cryptocurrency tumbler, est un service qui permet de mélanger des fonds de crypto-monnaies afin de réduire la traçabilité de l'origine des fonds.",
                        "Le mixeur contourne la transparence des transactions inscrites dans la blockchain et de ce fait protège la vie privée des possesseurs de crypto-monnaies.",
                        "Certaines crypto-monnaies comme Zcash ou Monero ne nécessitent pas de mixeur car elles sont axées sur la confidentialité et la vie privée de leurs possesseurs.",
                        "Le mixeur est aussi utilisé pour blanchir des fonds obtenus illégalement, ce qui incite l'Union européenne à la création d'une Autorité de lutte contre le blanchiment d'argent (ou AML, « Anti Money Laundering ») dédiée au secteur.",
                    );

                    $random_echo = array_rand($echos);
                    echo $echos[$random_echo];
                    ?>