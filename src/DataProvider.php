<?php

namespace Vos;

class DataProvider
{
    public static function all()
    {
        return [
            "sun" => [
                "Sun",
                [
                    ["diameter", 1392700, "km"],
                ],
            ],
            "earth" => [
                "Earth",
                [
                    ["distance", 12742, "km"],
                    ["perihelion", 147095000, "km"],
                    ["aphelion", 152100000, "km"],
                ],
            ],
            "milky-way" => [
                "Milky Way",
                [
                    ["width", 105700, "ly"],
                ],
            ],
            'ceres' => [
                'Ceres',
                [
                    ['diameter', 946, 'km'],
                    ['perihelion', 382.6e6, 'km'],
                    ['aphelion', 445.4e6, 'km'],
                ],
            ],
            'quaoar' => [
                '50000 Quaoar',
                [
                    ['diameter', 1110, 'km'],
                    ['perihelion', 41.695, 'au'],
                    ['aphelion', 45.114, 'au'],
                ],
            ],
            'makemake' => [
                'Makemake',
                [
                    ['diameter', 1430, 'km'],
                    ['perihelion', 38.104, 'au'],
                    ['aphelion', 52.756, 'au'],
                ],
            ],
            "haumea" => [
                "Haumea",
                [
                    ["distance", 1632, "km"],
                    ["perihelion", 34.767, "au"],
                    ["aphelion", 51.598, "au"],
                ],
            ],
            "eris" => [
                "Eris",
                [
                    ["distance", 2326, "km"],
                    ["perihelion", 38.271, "au"],
                    ["aphelion", 97.457, "au"],
                ],
            ],
            "pluto" => [
                "Pluto",
                [
                    ["distance", 2376.6, "km"],
                    ["perihelion", 29.658, "au"],
                    ["aphelion", 49.305, "au"],
                ],
            ],
            "mercury" => [
                "Mercury",
                [
                    ["distance", 4879.4, "km"],
                    ["perihelion", 46001200, "km"],
                    ["aphelion", 69816900, "km"],
                ],
            ],
            "mars" => [
                "Mars",
                [
                    ["distance", 6779, "km"],
                    ["perihelion", 206700000, "km"],
                    ["aphelion", 249200000, "km"],
                ]
            ],
            "venus" => [
                "Venus",
                [
                    ["distance", 12104, "km"],
                    ["perihelion", 107477000, "km"],
                    ["aphelion", 108939000, "km"],
                ],
            ],
            "neptune" => [
                "Neptune",
                [
                    ["distance", 49244, "km"],
                    ["perihelion", 29.81, "au"],
                    ["aphelion", 30.33, "au"],
                ],
            ],
            "uranus" => [
                "Uranus",
                [
                    ["distance", 50724, "km"],
                    ["perihelion", 18.33, "au"],
                    ["aphelion", 20.11, "au"],
                ],
            ],
            "saturn" => [
                "Saturn",
                [
                    ["distance", 116460, "km"],
                    ["perihelion", 9.0412, "au"],
                    ["aphelion", 10.1238, "au"],
                ],
            ],
            "jupiter" => [
                "Jupiter",
                [
                    ["distance", 139820, "km"],
                    ["perihelion", 4.9501, "au"],
                    ["aphelion", 5.4588, "au"],
                ],
            ],
            "heliopause" => [
                "Heliopause",
                [
                    ["distance", 123, "au"],
                ],
            ],
            "sedna" => [
                "90377 Sedna",
                [
                    ["distance", 995, "km"],
                    ["perihelion", 76.257, "au"],
                    ["aphelion", 937, "au"],
                ],
            ],
            "proxima-centauri" => [
                "Proxima Centauri",
                [
                    ["diameter", 214550, "km"],
                    ["distance", 4.2441, "ly"],
                ],
            ],
            "alpha-centauri" => [
                "Alpha Centauri",
                [
                    ["distance", 4.365, "ly"],
                ],
            ],
            "sirius" => [
                "Sirius",
                [
                    ["distance", 8.659, "ly"],
                ],
            ],
            "vega" => [
                "Vega",
                [
                    ["distance", 25, "ly"],
                ],
            ],
            "arcturus" => [
                "Arcturus",
                [
                    ["distance", 37, "ly"],
                ],
            ],
            "capella" => [
                "Capella",
                [
                    ["distance", 43, "ly"],
                ],
            ],
            "achernar" => [
                "Achernar",
                [
                    ["distance", 139, "ly"],
                ],
            ],
            "local-bubble" => [
                "Local Bubble",
                [
                    ["diameter", 300, "ly"],
                ],
            ],
            "canopus" => [
                "Canopus",
                [
                    ["distance", 310, "ly"],
                ],
            ],
            "betelgeuse" => [
                "Betelgeuse",
                [
                    ["distance", 700, "ly"],
                ],
            ],
            "rigel" => [
                "Rigel",
                [
                    ["distance", 860, "ly"],
                ],
            ],
            "deneb" => [
                "Deneb",
                [
                    ["distance", 2615, "ly"],
                ],
            ],
            "orion-arm" => [
                "Orion Arm",
                [
                    ["width", 3500, "ly"],
                    ["length", 10000, "ly"],
                ],
            ],
            "canis-major" => [
                "Canis Major",
                [
                    ["distance", 4892, "ly"],
                ],
            ],
            "eta-carinae" => [
                "Eta Carinae",
                [
                    ["distance", 7502, "ly"],
                ],
            ],
            "sagdeg" => [
                "Sagittarius Dwarf Elliptical Galaxy",
                [
                    ["distance", 70000, "ly"],
                ],
            ],
            "lmc" => [
                "Large Magellanic Cloud",
                [
                    ["distance", 179000, "ly"],
                ],
            ],
            "andromeda" => [
                "Andromeda Galaxy aka M31",
                [
                    ["diameter", 67000, "pc"],
                    ["distance", 770000, "pc"],
                ]
            ],
            "local-group" => [
                "Local Group",
                [
                    ["diameter", 3, "mpc"],
                ],
            ],
            "virgo" => [
                "Virgo Supercluster",
                [
                    ["distance", 33, "mpc"],
                ],
            ],
            "ga" => [
                "Great Attractor",
                [
                    ["distance", 63, "mpc"],
                ],
            ],
            "coma" => [
                "Coma Supercluster",
                [
                    ["distance", 92, "mpc"],
                ],
            ],
            "laniakea" => [
                "Laniakea Supercluster",
                [
                    ["distance", 160, "mpc"],
                ],
            ],
            "shapley" => [
                "Shapley Supercluster",
                [
                    ["distance", 200, "mpc"],
                ],
            ],
            "horologium" => [
                "Horologium Supercluster",
                [
                    ["distance", 291.4, "mpc"],
                ],
            ],
            "hcb" => [
                "Hercules-Corona Borealis Great Wall",
                [
                    ["distance", 3000, "mpc"],
                ],
            ],
            "icarus" => [
                "Icarus",
                [
                    ["distance", 4400, "mpc"],
                ],
            ],
            "universe" => [
                "Observable Universe",
                [
                    ["distance", 28500, "mpc"],
                ],
            ],
        ];
    }
}
