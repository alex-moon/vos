<?php

namespace Vos;

class DataProvider
{
    public static function all()
    {
        return [
            'sun' => [
                'Sun',
                [
                    'width' => [1392700, 'km'],
                ],
            ],
            'earth' => [
                'Earth',
                [
                    'width' => [12742, 'km'],
                    'perihelion' => [147095000, 'km'],
                    'aphelion' => [152100000, 'km'],
                ],
            ],
            'milky-way' => [
                'Milky Way',
                [
                    // 'width' => [46.2e3, 'pc'],
                    'width' => [52e3, 'pc'],
                    'length' => [61e3, 'pc'],
                    'distance' => [8e3, 'pc'],
                ],
            ],
            'ceres' => [
                'Ceres',
                [
                    'width' => [946, 'km'],
                    'perihelion' => [382.6e6, 'km'],
                    'aphelion' => [445.4e6, 'km'],
                ],
            ],
            'quaoar' => [
                'Quaoar',
                [
                    'width' => [1110, 'km'],
                    'perihelion' => [41.695, 'au'],
                    'aphelion' => [45.114, 'au'],
                ],
            ],
            'makemake' => [
                'Makemake',
                [
                    'width' => [1430, 'km'],
                    'perihelion' => [38.104, 'au'],
                    'aphelion' => [52.756, 'au'],
                ],
            ],
            'haumea' => [
                'Haumea',
                [
                    'distance' => [1632, 'km'],
                    'perihelion' => [34.767, 'au'],
                    'aphelion' => [51.598, 'au'],
                ],
            ],
            'eris' => [
                'Eris',
                [
                    'distance' => [2326, 'km'],
                    'perihelion' => [38.271, 'au'],
                    'aphelion' => [97.457, 'au'],
                ],
            ],
            'pluto' => [
                'Pluto',
                [
                    'distance' => [2376.6, 'km'],
                    'perihelion' => [29.658, 'au'],
                    'aphelion' => [49.305, 'au'],
                ],
            ],
            'mercury' => [
                'Mercury',
                [
                    'distance' => [4879.4, 'km'],
                    'perihelion' => [46001200, 'km'],
                    'aphelion' => [69816900, 'km'],
                ],
            ],
            'mars' => [
                'Mars',
                [
                    'distance' => [6779, 'km'],
                    'perihelion' => [206700000, 'km'],
                    'aphelion' => [249200000, 'km'],
                ]
            ],
            'venus' => [
                'Venus',
                [
                    'distance' => [12104, 'km'],
                    'perihelion' => [107477000, 'km'],
                    'aphelion' => [108939000, 'km'],
                ],
            ],
            'neptune' => [
                'Neptune',
                [
                    'distance' => [49244, 'km'],
                    'perihelion' => [29.81, 'au'],
                    'aphelion' => [30.33, 'au'],
                ],
            ],
            'uranus' => [
                'Uranus',
                [
                    'distance' => [50724, 'km'],
                    'perihelion' => [18.33, 'au'],
                    'aphelion' => [20.11, 'au'],
                ],
            ],
            'saturn' => [
                'Saturn',
                [
                    'distance' => [116460, 'km'],
                    'perihelion' => [9.0412, 'au'],
                    'aphelion' => [10.1238, 'au'],
                ],
            ],
            'jupiter' => [
                'Jupiter',
                [
                    'distance' => [139820, 'km'],
                    'perihelion' => [4.9501, 'au'],
                    'aphelion' => [5.4588, 'au'],
                ],
            ],
            'heliopause' => [
                'Heliopause',
                [
                    'distance' => [123, 'au'],
                ],
            ],
            'sedna' => [
                'Sedna',
                [
                    'width' => [995, 'km'],
                    'perihelion' => [76.257, 'au'],
                    'aphelion' => [937, 'au'],
                ],
            ],
            'oort-inner' => [
                'Oort Cloud (inner)',
                [
                    'distance' => [2000, 'au'],
                ],
            ],
            'oort-outer' => [
                'Oort Cloud (outer)',
                [
                    'distance' => [100000, 'au'],
                ],
            ],
            'proxima-centauri' => [
                'Proxima Centauri',
                [
                    'width' => [214550, 'km'],
                    'distance' => [4.2441, 'ly'],
                ],
            ],
            'alpha-centauri' => [
                'Alpha Centauri',
                [
                    'width' => [214550, 'km'],
                    'distance' => [4.365, 'ly'],
                ],
            ],
            'sirius' => [
                'Sirius',
                [
                    'width' => [2.381e6, 'km'],
                    'distance' => [8.611, 'ly'],
                ],
            ],
            'vega' => [
                'Vega',
                [
                    'width' => [3.2865e6, 'km'],
                    'distance' => [25, 'ly'],
                ],
            ],
            'arcturus' => [
                'Arcturus',
                [
                    'width' => [35.342e6, 'km'],
                    'distance' => [37, 'ly'],
                ],
            ],
            'capella' => [
                'Capella A',
                [
                    'width' => [17e6, 'km'],
                    'distance' => [42.919, 'ly'],
                ],
            ],
            'aldebaran' => [
                'Aldebaran',
                [
                    'width' => [61e6, 'km'],
                    'distance' => [65.3, 'ly'],
                ],
            ],
            'achernar' => [
                'Achernar',
                [
                    'width' => [16e6, 'km'],
                    'distance' => [139, 'ly'],
                ],
            ],
            'local-bubble' => [
                'Local Bubble',
                [
                    'width' => [300, 'ly'],
                    'distance' => [140, 'ly'],
                ],
            ],
            'canopus' => [
                'Canopus',
                [
                    'width' => [98.789e6, 'km'],
                    'distance' => [310, 'ly'],
                ],
            ],
            'pleiades' => [
                'Pleiades (M45)',
                [
                    'width' => [3, 'pc'],
                    'distance' => [136.2, 'pc'],
                ]
            ],
            'betelgeuse' => [
                'Betelgeuse',
                [
                    'width' => [1.234e9, 'km'],
                    'distance' => [700, 'ly'],
                ],
            ],
            'rigel' => [
                'Rigel',
                [
                    'width' => [110e6, 'km'],
                    'distance' => [860, 'ly'],
                ],
            ],
            'orion' => [
                'Orion Nebula (M42)',
                [
                    'width' => [24, 'ly'],
                    'distance' => [1344, 'ly'],
                ]
            ],
            'omega' => [
                'Omega Nebula (M17)',
                [
                    'width' => [22, 'ly'],
                    'distance' => [5500, 'ly'],
                ]
            ],
            'deneb' => [
                'Deneb',
                [
                    'width' => [282.45e6, 'km'],
                    'distance' => [2615, 'ly'],
                ],
            ],
            'lagoon' => [
                'Lagoon Nebula (M8)',
                [
                    'width' => [50, 'ly'],
                    'length' => [110, 'ly'],
                    'distance' => [4100, 'ly'],
                ],
            ],
            'eagle' => [
                'Eagle Nebula (M16)',
                [
                    'width' => [55, 'ly'],
                    'length' => [70, 'ly'],
                    'distance' => [5700, 'ly'],
                ],
            ],
            'wild-duck' => [
                'Wild Duck Cluster (M11)',
                [
                    'width' => [190, 'ly'],
                    'distance' => [6120, 'ly'],
                ],
            ],
            'orion-arm' => [
                'Orion Arm',
                [
                    'width' => [3500, 'ly'],
                    'length' => [10000, 'ly'],
                    'distance' => [2500, 'ly'],
                ],
            ],
            'canis-major' => [
                'Canis Major',
                [
                    'width' => [1.9758e9, 'km'],
                    'distance' => [4892, 'ly'],
                ],
            ],
            'eta-carinae' => [
                'Eta Carinae',
                [
                    'distance' => [7502, 'ly'],
                ],
            ],
            'sagdeg' => [
                'Sagittarius Dwarf Elliptical Galaxy',
                [
                    'width' => [10e3, 'ly'],
                    'distance' => [70e3, 'ly'],
                ],
            ],
            'lmc' => [
                'Large Magellanic Cloud',
                [
                    'width' => [14e3, 'ly'],
                    'distance' => [179e3, 'ly'],
                ],
            ],
            'smc' => [
                'Small Magellanic Cloud',
                [
                    'width' => [7e3, 'ly'],
                    'distance' => [201e3, 'ly'],
                ],
            ],
            'wlm' => [
                'Wolf-Lundmark-Melotte',
                [
                    'width' => [8000, 'ly'],
                    'distance' => [3.4e6, 'ly'],
                ],
            ],
            'triangulum' => [
                'Triangulum Galaxy (M33)',
                [
                    'width' => [60e3, 'ly'],
                    'distance' => [840e3, 'pc'],
                ],
            ],
            'andromeda' => [
                'Andromeda Galaxy (M31)',
                [
                    'width' => [67000, 'pc'],
                    'distance' => [770e3, 'pc'],
                ],
            ],
            'local-group' => [
                'Local Group',
                [
                    'width' => [3, 'mpc'],
                    'distance' => [2e6, 'ly'],
                ],
            ],
            'virgo-cluster' => [
                'Virgo Cluster',
                [
                    'width' => [20e6, 'ly'],
                    'distance' => [16.5, 'mpc'],
                ],
            ],
            'virgo-supercluster' => [
                'Virgo Supercluster',
                [
                    'width' => [33, 'mpc'],
                    'distance' => [65e6, 'ly'],
                ],
            ],
            'ga' => [
                'Great Attractor',
                [
                    // 'width' => [300e6, 'ly'],
                    'distance' => [63, 'mpc'],
                ],
            ],
            'coma' => [
                'Coma Supercluster',
                [
                    'width' => [20e6, 'ly'],
                    'distance' => [92, 'mpc'],
                ],
            ],
            'laniakea' => [
                'Laniakea Supercluster',
                [
                    'width' => [500e6, 'ly'],
                    'distance' => [250e6, 'ly'],
                ],
            ],
            'shapley' => [
                'Shapley Supercluster',
                [
                    'width' => [200e6, 'ly'],
                    'distance' => [200, 'mpc'],
                ],
            ],
            'horologium' => [
                'Horologium Supercluster',
                [
                    'width' => [550e6, 'ly'],
                    'distance' => [291.4, 'mpc'],
                ],
            ],
            'hcb' => [
                'Hercules-Corona Borealis Great Wall',
                [
                    'distance' => [3000, 'mpc'],
                ],
            ],
            'icarus' => [
                'Icarus',
                [
                    'distance' => [4400, 'mpc'],
                ],
            ],
            'universe' => [
                'Observable Universe',
                [
                    // 'width' => [28500, 'mpc'],
                    'distance' => [14250, 'mpc'],
                ],
            ],
        ];
    }
}
