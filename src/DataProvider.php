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
            'swift-tuttle' => [
                'Comet Swift-Tuttle',
                [
                    'width' => [100, 'km'],
                    'distance' => [6.111e9, 'km'],
                ],
            ],
            'mu-cephei' => [
                'Mu Cephei',
                [
                    'width' => [1.753e9, 'km'],
                    'distance' => [2838, 'ly'],
                ],
            ],
            'ic1396' => [
                'IC 1396',
                [
                    'width' => [100, 'ly'],
                    'distance' => [2400, 'ly'],
                ],
            ],
            'milky-way' => [
                'Milky Way',
                [
                    // 'width' => [46.2e3, 'pc'],
                    // 'width' => [52e3, 'pc'],
                    'width' => [105700, 'ly'],
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
            'arrokoth' => [
                'Arrokoth',
                [
                    'width' => [19, 'km'],
                    'perihelion' => [43.7, 'au'],
                    'aphelion' => [46.4, 'au'],
                ],
            ],
            'albion' => [
                'Albion (QB1)',
                [
                    'width' => [137, 'km'],
                    'perihelion' => [40.809, 'au'],
                    'aphelion' => [47.042, 'au'],
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
                    'width' => [1632, 'km'],
                    'perihelion' => [34.767, 'au'],
                    'aphelion' => [51.598, 'au'],
                ],
            ],
            'gonggong' => [
                'Gonggong',
                [
                    'width' => [1230, 'km'],
                    'perihelion' => [33.703, 'au'],
                    'aphelion' => [101.238, 'au'],
                ]
            ],
            'eris' => [
                'Eris',
                [
                    'width' => [2326, 'km'],
                    'perihelion' => [38.271, 'au'],
                    'aphelion' => [97.457, 'au'],
                ],
            ],
            'pluto' => [
                'Pluto',
                [
                    'width' => [2376.6, 'km'],
                    'perihelion' => [29.658, 'au'],
                    'aphelion' => [49.305, 'au'],
                ],
            ],
            'farfarout' => [
                'FarFarOut (2018 AG37)',
                [
                    'width' => [400, 'km'],
                    // 'distance' => [140, 'au'],
                    'perihelion' => [27.6, 'au'],
                    'aphelion' => [132.6, 'au'],
                ],
            ],
            'mercury' => [
                'Mercury',
                [
                    'width' => [4879.4, 'km'],
                    'perihelion' => [46001200, 'km'],
                    'aphelion' => [69816900, 'km'],
                ],
            ],
            'mars' => [
                'Mars',
                [
                    'width' => [6779, 'km'],
                    'perihelion' => [206700000, 'km'],
                    'aphelion' => [249200000, 'km'],
                ]
            ],
            'venus' => [
                'Venus',
                [
                    'width' => [12104, 'km'],
                    'perihelion' => [107477000, 'km'],
                    'aphelion' => [108939000, 'km'],
                ],
            ],
            'neptune' => [
                'Neptune',
                [
                    'width' => [49244, 'km'],
                    'perihelion' => [29.81, 'au'],
                    'aphelion' => [30.33, 'au'],
                ],
            ],
            'uranus' => [
                'Uranus',
                [
                    'width' => [50724, 'km'],
                    'perihelion' => [18.33, 'au'],
                    'aphelion' => [20.11, 'au'],
                ],
            ],
            'saturn' => [
                'Saturn',
                [
                    'width' => [116460, 'km'],
                    'perihelion' => [9.0412, 'au'],
                    'aphelion' => [10.1238, 'au'],
                ],
            ],
            'jupiter' => [
                'Jupiter',
                [
                    'width' => [139820, 'km'],
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
            /*
            'scattered-disc-inner' => [
                'Scattered Disc (inner)',
                [
                    'distance' => [30, 'au'],
                ],
            ],
            */
            'scattered-disc-outer' => [
                'Scattered Disc (outer)',
                [
                    'distance' => [110, 'au'],
                ],
            ],
            'biden' => [
                '2012 VP113 ("Biden")',
                [
                    'width' => [650, 'km'],
                    'perihelion' => [80.389, 'au'],
                    'aphelion' => [436.143, 'au'],
                ],
            ],
            'alicanto' => [
                '2004 VN112 (Alicanto)',
                [
                    'width' => [314, 'km'],
                    'perihelion' => [47.289, 'au'],
                    'aphelion' => [618.32, 'au'],
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
            'lightyear' => [
                '1 lightyear',
                [
                    'distance' => [1, 'ly'],
                ],
            ],
            'planet-nine-old' => [
                'Planet Nine (2016)',
                [
                    'perihelion' => [280, 'au'],
                    'aphelion' => [1120, 'au'],
                    'width' => [50968, 'km'],
                ],
            ],
            'planet-nine' => [
                'Planet Nine (2021)',
                [
                    'perihelion' => [300, 'au'],
                    'aphelion' => [460, 'au'],
                    'width' => [25484, 'km'],
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
                'Alpha Centauri A',
                [
                    'width' => [1702240, 'km'],
                    'distance' => [4.365, 'ly'],
                ],
            ],
            'barnards-star' => [
                "Barnard's Star",
                [
                    'width' => [272832, 'km'],
                    'distance' => [5.9577, 'ly'],
                ],
            ],
            'luhman-16' => [
                'Luhman 16 A',
                [
                    'width' => [129800, 'km'],
                    'distance' => [6.516, 'ly'],
                ],
            ],
            'wolf-359' => [
                'Wolf 359',
                [
                    'width' => [222720, 'km'],
                    'distance' => [7.86, 'ly'],
                ],
            ],
            'sirius' => [
                'Sirius A',
                [
                    'width' => [2.381e6, 'km'],
                    'distance' => [8.611, 'ly'],
                ],
            ],
            'pollux' => [
                'Pollux',
                [
                    'width' => [12.244e6, 'km'],
                    'distance' => [33.72, 'ly'],
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
/*
            'capella' => [
                'Capella A',
                [
                    'width' => [17e6, 'km'],
                    'distance' => [42.919, 'ly'],
                ],
            ],
*/
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
/*
            'local-bubble' => [
                'Local Bubble',
                [
                    'width' => [300, 'ly'],
                    'distance' => [140, 'ly'],
                ],
            ],
*/
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
            'per-tau' => [
                'Per-Tau Shell',
                [
                    'width' => [156, 'pc'],
                    'distance' => [693, 'ly'],
                ],
            ],
            'bellatrix' => [
                'Bellatrix',
                [
                    'width' => [8e6, 'km'],
                    'distance' => [245, 'ly'],
                ],
            ],
            'betelgeuse' => [
                'Betelgeuse',
                [
                    'width' => [1.234e9, 'km'],
                    'distance' => [548, 'ly'],
                ],
            ],
            'saiph' => [
                'Saiph',
                [
                    'width' => [3.0889e7, 'km'],
                    'distance' => [650, 'ly'],
                ],
            ],
            'rigel' => [
                'Rigel',
                [
                    'width' => [1.09781e8, 'km'],
                    'distance' => [1010, 'ly'],
                ],
            ],
            'meissa' => [
                'Meissa',
                [
                    'width' => [1.8645e7, 'km'],
                    'distance' => [1109, 'ly'],
                ],
            ],
            'mintaka' => [
                'Mintaka',
                [
                    'width' => [2.296e7, 'km'],
                    'distance' => [1239, 'ly'],
                ],
            ],
            'alnitak' => [
                'Alnitak',
                [
                    'width' => [2.783e7, 'km'],
                    'distance' => [1262, 'ly'],
                ],
            ],
            'alnilam' => [
                'Alnilam',
                [
                    'width' => [4.5081e7, 'km'],
                    'distance' => [1977, 'ly'],
                ],
            ],
            'ic-434'=> [
                'IC 434',
                [
                    'width' => [14, 'ly'],
                    'length' => [40, 'ly'],
                    'distance' => [1600, 'ly'],
                ]
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
//            'deneb' => [
//                'Deneb',
//                [
//                    'width' => [282.45e6, 'km'],
//                    'distance' => [2615, 'ly'],
//                ],
//            ],
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
            'vy-canis-majoris' => [
                'VY Canis Majoris',
                [
                    'width' => [1.9758e9, 'km'],
                    'distance' => [3820, 'ly'],
                ],
            ],
            'carina-nebula' => [
                'Carina Nebula',
                [
                    'width' => [460, 'ly'],
                    'distance' => [8500, 'ly'],
                ],
            ],
//            'homunculus' => [
//                'Homunculus Nebula (Eta Carinae)',
//                [
//                    'width' => [0.58, 'ly'],
//                    'distance' => [7500, 'ly'],
//                ],
//            ],
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
            'sculptor-group' => [
                'Sculptor Group',
                [
                    'width' => [2e6, 'pc'],
                    'distance' => [3.9e6, 'pc'],
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
            'centaurus-a' => [
                'Centaurus A',
                [
                    'width' => [97e3, 'ly'],
                    'distance' => [4, 'mpc'],
                ],
            ],
            /* 'm81' => [
                'Messier 81',
                [
                    'width' => [90e3, 'ly'],
                    'distance' => [11.74e6, 'ly'],
                ],
            ], */
            'maffei' => [
                'Maffei 1',
                [
                    'width' => [23e3, 'pc'],
                    'distance' => [9.8e6, 'ly']
                ]
            ],
            'ic342' => [
                'IC 342',
                [
                    'width' => [75000, 'ly'],
                    'distance' => [10.7e6, 'ly'],
                ],
            ],
            'm94' => [
                'Messier 94',
                [
                    'width' => [14e3, 'pc'],
                    'distance' => [4.9e6, 'pc'],
                ]
            ],
            'canes-ii' => [
                'Canes II Group',
                [
                    'width' => [9e6, 'ly'],
                    'distance' => [26.1e6, 'ly'],
                ]
            ],
            'virgo-cluster' => [
                'Virgo Cluster',
                [
                    'width' => [20e6, 'ly'],
                    'distance' => [16.5, 'mpc'],
                ],
            ],
            'ursa-major' => [
                'Ursa Major Cluster',
                [
                    'width' => [5.7e6, 'ly'],
                    'length' => [16.8e6, 'ly'],
                    'distance' => [18.6, 'mpc'],
                ],
            ],
            'virgo-supercluster' => [
                'Virgo Supercluster',
                [
                    'width' => [33, 'mpc'],
                    'distance' => [65e6, 'ly'],
                ],
            ],
            'hydra-centaurus' => [
                'Hydra-Centaurus Supercluster',
                [
                    'width' => [100e6, 'ly'],
                    'distance' => [54, 'mpc'],
                ],
            ],
            'pavo-indus' => [
                'Pavo-Indus Supercluster',
                [
                    'width' => [66, 'mpc'],
                    'distance' => [70, 'mpc'],
                ],
            ],
            'ga' => [
                'Great Attractor',
                [
                    // 'width' => [300e6, 'ly'],
                    'distance' => [200e6, 'ly'],
                ],
            ],
            'coma' => [
                'Coma Supercluster',
                [
                    'width' => [6, 'mpc'],
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
            'markarian-231' => [
                'Markarian 231',
                [
                    'width' => [0.01, 'ly'],
                    'distance' => [581e6, 'ly'],
                ],
            ],
            'pisces-cetus' => [
                'Pisces-Cetus Supercluster Complex',
                [
                    'width' => [150e6, 'ly'],
                    'length' => [1e9, 'ly'],
                    'distance' => [700e6, 'ly'],
                ],
            ],
//            'bootes' => [
//                'Bootes Void',
//                [
//                    'width' => [330e6, 'ly'],
//                    'distance' => [700e6, 'ly'],
//                ],
//            ],
            'horologium' => [
                'Horologium Supercluster',
                [
                    'width' => [550e6, 'ly'],
                    'distance' => [291.4, 'mpc'],
                ],
            ],
            '3c-236' => [
                '3C 236',
                [
                    'width' => [15e6, 'ly'],
                    'distance' => [1.3e9, 'ly'],
                ],
            ],
//            'abell' => [
//                'Abell 2029',
//                [
//                    'width' => [8e6, 'ly'],
//                    'distance' => [315, 'mpc'],
//                ],
//            ],
            'sloan' => [
                'Sloan Great Wall',
                [
                    'width' => [300e6, 'ly'],
                    'length' => [1.37e9, 'ly'],
                    'distance' => [1e9, 'ly'],
                ]
            ],
            'giant-void' => [
                'Giant Void',
                [
                    'width' => [400, 'mpc'],
                    'distance' => [1.588e9, 'ly'],
                ]
            ],
            'caelum' => [
                'Caelum Supercluster',
                [
                    'width' => [910e6, 'ly'],
                    'distance' => [1.855e9, 'ly'],
                ]
            ],
            '3c-273' => [
                '3C 273',
                [
                    'width' => [0.01, 'ly'],
                    'distance' => [2.5e9, 'ly'],
                ],
            ],
            'tesch-engels' => [
                'Tesch Engels LQG',
                [
                    'width' => [75, 'mpc'],
                    'length' => [140, 'mpc'],
                    'distance' => [3.563e9, 'ly'],
                ]
            ],
            'saraswati' => [
                'Saraswati Supercluster',
                [
                    'width' => [80, 'mpc'],
                    'length' => [240, 'mpc'],
                    'distance' => [1200, 'mpc'],
                ],
            ],
            'webster' => [
                'Webster LQG',
                [
                    'width' => [100, 'mpc'],
                    'distance' => [4.763e9, 'ly'],
                ],
            ],
            '3c-295' => [
                '3C 295',
                [
                    'width' => [2e6, 'ly'],
                    'distance' => [5.6e9, 'ly'],
                ],
            ],
            'boss' => [
                'BOSS Great Wall',
                [
                    'width' => [150, 'mpc'],
                    'length' => [300, 'mpc'],
                    'distance' => [5.897e9, 'ly'],
                ],
            ],
            'giant-arc' => [
                'Giant Arc',
                [
                    'width' => [2.5, 'mpc'],
                    'length' => [3.3e9, 'ly'],
                    'distance' => [9.2e9, 'ly'],
                ],
            ],
            'grb-ring' => [
                'GRB Ring',
                [
                    'width' => [720e6, 'ly'],
                    'length' => [5.6e9, 'ly'],
                    'distance' => [9.3e9, 'ly'],
                ],
            ],
            'huge-lqg' => [
                'Huge-LQG',
                [
                    'width' => [1.6e9, 'ly'],
                    'length' => [4e9, 'ly'],
                    'distance' => [9e9, 'ly'],
                ],
            ],
            'hcb' => [
                'Hercules-Corona Borealis Great Wall',
                [
                    'length' => [3000, 'mpc'],
                    'width' => [2200, 'mpc'],
                    'distance' => [16e9, 'ly'],
                ],
            ],
            '3c-9' => [
                '3C 9',
                [
                    'width' => [0.01, 'ly'],
                    'distance' => [17.292e9, 'ly'],
                ],
            ],
            'ton-618' => [
                'TON 618',
                [
                    'width' => [0.01, 'ly'],
                    'distance' => [18.207e9, 'ly'],
                ],
            ],
            'j0313–1806' => [
                'J0313–1806',
                [
                    'width' => [0.01, 'ly'],
                    'distance' => [29.461e9, 'ly'],
                ],
            ],
            'twin-quasar' => [
                'Twin Quasar',
                [
                    'distance' => [2400, 'mpc'],
                ],
            ],
            'cloverleaf' => [
                'Cloverleaf Quasar',
                [
                    'distance' => [3370, 'mpc'],
                ],
            ],
            'icarus' => [
                'Icarus',
                [
                    'distance' => [4400, 'mpc'],
                ],
            ],
            'gn-z11' => [
                'GN-z11',
                [
                    'width' => [4000, 'ly'],
                    'distance' => [9800, 'mpc'],
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
