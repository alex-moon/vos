<?php

namespace Vos;

class DataProvider
{
    public static function all()
    {
        return [
            ['pluto', 'Pluto (diameter)', 2376.6, 'km'],
            ['earth', 'Earth (diameter)', 12742, 'km'],
            ['sun', 'Sun (diameter)', 1.3927e6, 'km'],
            ['earth-orbit', 'Earth (orbit diameter)', 2.992e8, 'km'],
            ['pluto-orbit', 'Pluto (orbit diameter)', 79.3, 'au'],
            ['heliopause', 'Heliopause (diameter)', 180, 'au'],
            ['sedna-orbit', 'Sedna (orbit diameter)', 1013.257, 'au'],
            ['proxima-centauri', 'Proxima Centauri (distance)', 4.2441, 'ly'],
            ['alpha-centauri', 'Alpha Centauri (distance)', 4.3650, 'ly'],
            ['sirius', 'Sirius (distance)', 8.659, 'ly'],
            ['vega', 'Vega (distance)', 25, 'ly'],
            ['arcturus', 'Arcturus (distance)', 37, 'ly'],
            ['capella', 'Capella (distance)', 43, 'ly'],
            ['achernar', 'Achernar (distance)', 139, 'ly'],
            ['local-bubble', 'Local Bubble (diameter)', 300, 'ly'],
            ['canopus', 'Canopus (distance)', 310, 'ly'],
            ['betelgeuse', 'Betelgeuse (distance)', 700, 'ly'],
            ['rigel', 'Rigel (distance)', 860, 'ly'],
            ['deneb', 'Deneb (distance)', 2615, 'ly'],
            ['orion-arm', 'Orion Arm (width)', 3500, 'ly'],
            ['canis-major', 'Canis Major (distance)', 4892, 'ly'],
            ['eta-carinae', 'Eta Carinae (distance)', 7502, 'ly'],
            ['orion-arm-length', 'Orion Arm (length)', 10000, 'ly'],
            ['sagdeg', 'Sagittarius Dwarf Elliptical Galaxy (distance)', 70000, 'ly'],
            ['milky-way', 'Milky Way (diameter)', 105700, 'ly'],
            ['lmc', 'Large Magellanic Cloud (distance)', 179000, 'ly'],
            ['andromeda-diameter', 'Andromeda Galaxy aka M31 (diameter)', 67000, 'pc'],
            ['andromeda', 'Andromeda Galaxy aka M31 (distance)', 770000, 'pc'],
            ['local-group', 'Local Group (diameter)', 3, 'mpc'],
            ['virgo', 'Virgo Supercluster (diameter)', 33, 'mpc'],
            ['ga', 'Great Attractor (distance)', 63, 'mpc'],
            ['coma', 'Coma Supercluster (distance)', 92, 'mpc'],
            ['laniakea', 'Laniakea Supercluster (diameter)', 160, 'mpc'],
            ['shapley', 'Shapley Supercluster (distance)', 200, 'mpc'],
            ['horologium', 'Horologium Supercluster (distance)', 291.4, 'mpc'],
            ['hcb', 'Hercules-Corona Borealis Great Wall (diameter)', 3000, 'mpc'],
            ['icarus', 'Icarus (distance)', 4400, 'mpc'],
            ['universe', 'Observable Universe (diameter)', 28.5e3, 'mpc'],
        ];
    }
}
