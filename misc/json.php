<?php

$jsonObject = json_decode('{
    "updatedAt": "2023-06-15T10:03:56+02:00",
    "id": "648ac5ecb64afa78790da63b",
    "formality": {
        "siren": "058503202",
        "content": {
            "natureCreation": {
                "dateCreation": "2009-08-05",
                "societeEtrangere": false,
                "microEntreprise": false,
                "etablieEnFrance": true,
                "salarieEnFrance": true,
                "relieeEntrepriseAgricole": false,
                "entrepriseAgricole": false,
                "eirl": false
            },
            "personneMorale": {
                "identite": {
                    "entreprise": {
                        "siren": "058503202",
                        "denomination": "LES CHARDONS BLEUS",
                        "formeJuridique": "Société civile immobilière",
                        "indicateurAssocieUnique": false,
                        "dateImmat": "2009-08-05T00:00:00+02:00"
                    },
                    "description": {
                        "objet": "Propriété, administration et exploitation par bail, location ou autrement de diverses parts et portions de tous immeubles bâtis ou non bâtis.",
                        "duree": 50,
                        "ess": false,
                        "capitalVariable": false,
                        "montantCapital": 68602.05,
                        "deviseCapital": "EUR",
                        "indicateurOrigineFusionScission": false,
                        "indicateurAssocieUnique": false,
                        "indicateurAssocieUniqueDirigeant": false
                    }
                },
                "composition": {
                    "pouvoirs": [
                        {
                            "typeDePersonne": "INDIVIDU",
                            "individu": {
                                "descriptionPersonne": {
                                    "dateDeNaissance": "1927-07",
                                    "nom": "GAUNA",
                                    "prenoms": [
                                        "ARMAND",
                                        "CHARLES"
                                    ],
                                    "nationalite": "Française",
                                    "situationMatrimoniale": "1"
                                },
                                "adresseDomicile": {
                                    "pays": "FRANCE",
                                    "codePays": "FRA",
                                    "codePostal": "38240",
                                    "commune": "Meylan",
                                    "codeInseeCommune": "38229"
                                }
                            },
                            "indicateurActifAgricole": false
                        },
                        {
                            "typeDePersonne": "INDIVIDU",
                            "individu": {
                                "descriptionPersonne": {
                                    "dateDeNaissance": "1927-07",
                                    "role": "30",
                                    "nom": "GAUNA",
                                    "prenoms": [
                                        "ARMAND",
                                        "CHARLES"
                                    ],
                                    "nationalite": "Française",
                                    "situationMatrimoniale": "1"
                                },
                                "adresseDomicile": {
                                    "pays": "FRANCE",
                                    "codePays": "FRA",
                                    "codePostal": "38240",
                                    "commune": "Meylan",
                                    "codeInseeCommune": "38229"
                                }
                            },
                            "indicateurActifAgricole": false
                        },
                        {
                            "typeDePersonne": "INDIVIDU",
                            "individu": {
                                "descriptionPersonne": {
                                    "dateDeNaissance": "1959-08",
                                    "nom": "GAUNA",
                                    "prenoms": [
                                        "JEAN-PAUL",
                                        "MARIUS"
                                    ],
                                    "nationalite": "Française",
                                    "situationMatrimoniale": "1"
                                },
                                "adresseDomicile": {
                                    "pays": "FRANCE",
                                    "codePays": "FRA",
                                    "codePostal": "24150",
                                    "commune": "Mauzac-et-Grand-Castang",
                                    "codeInseeCommune": "24260"
                                }
                            },
                            "indicateurActifAgricole": false
                        },
                        {
                            "typeDePersonne": "INDIVIDU",
                            "individu": {
                                "descriptionPersonne": {
                                    "dateDeNaissance": "1953-11",
                                    "nom": "GAUNA",
                                    "prenoms": [
                                        "JEAN-CLAUDE",
                                        "ROMEO"
                                    ],
                                    "nationalite": "Française",
                                    "situationMatrimoniale": "1"
                                },
                                "adresseDomicile": {
                                    "pays": "FRANCE",
                                    "codePays": "FRA",
                                    "codePostal": "69003",
                                    "commune": "Lyon",
                                    "codeInseeCommune": "69383"
                                }
                            },
                            "indicateurActifAgricole": false
                        },
                        {
                            "typeDePersonne": "INDIVIDU",
                            "individu": {
                                "descriptionPersonne": {
                                    "dateDeNaissance": "1925-08",
                                    "nom": "CASTELLI",
                                    "prenoms": [
                                        "DOLORES",
                                        "SEVERINA",
                                        "CERESINA"
                                    ],
                                    "nomUsage": "GAUNA",
                                    "nationalite": "Française",
                                    "situationMatrimoniale": "1"
                                },
                                "adresseDomicile": {
                                    "pays": "FRANCE",
                                    "codePays": "FRA",
                                    "codePostal": "38100",
                                    "commune": "Grenoble",
                                    "codeInseeCommune": "38185"
                                }
                            },
                            "indicateurActifAgricole": false
                        }
                    ]
                }
            },
            "registreAnterieur": {
                "raa": {
                    "estPresent": false
                },
                "rnm": {
                    "estPresent": false
                },
                "rncs": {
                    "estPresent": true,
                    "dateImmatriculation": "2009-08-05T00:00:00+02:00"
                }
            }
        },
        "diffusionCommerciale": true
    },
    "siren": "058503202"
}');

$file = "D:\Stockage\SCI_JSON\madeup.json";
$data = file_get_contents($file);
$obj = json_decode($data);

// $dir = scandir("D:\Stockage\SCI_JSON");
// echo '<pre>';
// var_dump($dir);
// echo '</pre>';

// echo '<pre>';
// var_dump(count($dir)-2);
// echo '</pre>';

echo '<pre>';
var_dump($obj);
echo '</pre>';

?>

<!-- <div>Numéro SIREN : <?= $jsonObject->formality->siren ?></div>

<div><?php for ($i = 2; $i<count($dir); $i++): ?>
    <p><?= $dir[$i] ?></p>
    <?php endfor ?>
</div> -->
