function Vos(map, turf) {
    this.turf = turf;
    this.map = map;
    this.manager = new Manager();
    this.view = new View(this.map, this.manager, turf);
    this.handler = new Handler(this.map, this.view);
    this.goDefault();
    this.drawPresets();
}
Object.assign(Vos.prototype, {
    controlsToggled: false,
    presets: [
        {
            name: 'Walk #1: The Planets',
            tokens: [
                'sun',
                'width',
                '1',
                'm',
            ]
        },
        {
            name: 'Walk #2: The Nearest Stars',
            tokens: [
                'quaoar',
                'aphelion',
                '0.485',
                'm',
            ]
        },
        {
            name: 'Walk #3: The Milky Way',
            tokens: [
                'alpha-centauri',
                'distance',
                '0.297',
                'm',
            ]
        },
        {
            name: 'Walk #4: The Nearest Clusters',
            tokens: [
                'sagdeg',
                'distance',
                '0.476',
                'm',
            ]
        },
        {
            name: 'Walk #5: The Observable Universe',
            tokens: [
                'pisces-cetus',
                'distance',
                '0.476',
                'm',
            ]
        },
    ],

    getUrl(form) {
        return [
            '',
            'get',
            form.elements.target.value,
            form.elements.measure.value,
            form.elements.value.value,
            form.elements.unit.value
        ].join('/');
    },

    async fetch (url) {
        const response = await fetch(url);
        return response.json();
    },

    handleResponse(response) {
        this.manager.load(response.data);
        this.view.reload();
    },

    goForm(form) {
        this.fetch(this.getUrl(form))
            .then(this.handleResponse.bind(this))
        ;
        if (this.controlsToggled) {
            this.toggleControls();
        }
    },

    goPreset(i) {
        const tokens = this.presets[i].tokens;
        const form = document.getElementById('controls');
        form.elements.target.value = tokens[0];
        form.elements.measure.value = tokens[1];
        form.elements.value.value = tokens[2];
        form.elements.unit.value = tokens[3];
        this.goForm(form);
    },

    goDefault() {
        this.fetch('/get/sun/width/1/m')
            .then(this.handleResponse.bind(this));
    },

    toggleControls() {
        const element = document.getElementById('content');
        if (this.controlsToggled) {
            element.classList.remove('controls-toggled');
            this.controlsToggled = false;
        } else {
            element.classList.add('controls-toggled');
            this.controlsToggled = true;
        }
    },

    drawPresets() {
        let innerHtml = '';
        for (let i = 0; i < this.presets.length; i++) {
            const preset = this.presets[i];
            innerHtml += '<button class="preset" onclick="window.vos.goPreset(' + i + '); return false">'
            innerHtml += '<span class="name">' + preset.name + '</span>';
            innerHtml += '<span class="tokens">';
            for (let token of preset.tokens) {
                innerHtml += '<span class="token">' + token + '</span>';
            }
            innerHtml += '</span>';
            innerHtml += '</button>';
        }
        const element = document.getElementById('presets');
        element.innerHTML += innerHtml;
    },
});

