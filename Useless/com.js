mobiscroll.settings = {
    theme: 'ios',
    themeVariant: 'light'
};

var reg,
    div,
    sub,
    remoteReg,
    remoteDiv,
    remoteSub,
    emptyValue = { value: '', text: '', disabled: true },
    regions = [
        { value: 1, text: 'Northeast' },
        { value: 2, text: 'Midwest' },
        { value: 3, text: 'South' },
        { value: 4, text: 'West' }
    ],
    divisions = {
        1: [
            { value: 1, text: 'New England' },
            { value: 2, text: 'Mid-Atlantic' }
        ],
        2: [
            { value: 3, text: 'East North Central' },
            { value: 4, text: 'West North Central' }
        ],
        3: [
            { value: 5, text: 'South Atlantic' },
            { value: 6, text: 'East South Central' },
            { value: 7, text: 'West South Central' }
        ],
        4: [
            { value: 8, text: 'Mountain' },
            { value: 9, text: 'Pacific' }
        ]
    },
    subdivisions = {
        1: [
            { value: 1, text: 'Connecticut' },
            { value: 2, text: 'Maine' },
            { value: 3, text: 'Massachusetts' },
            { value: 4, text: 'New Hampshire' },
            { value: 5, text: 'Rhode Island' },
            { value: 6, text: 'Vermont' }
        ],
        2: [
            { value: 7, text: 'New Jersey' },
            { value: 8, text: 'New York' },
            { value: 9, text: 'Pennsylvania' }
        ],
        3: [
            { value: 10, text: 'Illinois' },
            { value: 11, text: 'Indiana' },
            { value: 12, text: 'Michigan' },
            { value: 13, text: 'Ohio' }
        ],
        4: [
            { value: 14, text: 'Wisconsin' },
            { value: 15, text: 'Iowa' },
            { value: 16, text: 'Kansas' },
            { value: 17, text: 'Minnesota' },
            { value: 18, text: 'Missouri' },
            { value: 19, text: 'Nebraska' },
            { value: 20, text: 'North Dakota' },
            { value: 21, text: 'South Dakota' }
        ],
        5: [
            { value: 22, text: 'Delaware' },
            { value: 23, text: 'Florida' },
            { value: 24, text: 'Georgia' },
            { value: 25, text: 'Maryland' },
            { value: 26, text: 'North Carolina' },
            { value: 27, text: 'South Carolina' },
            { value: 28, text: 'Virginia' },
            { value: 29, text: 'District of Columbia' },
            { value: 30, text: 'West Virginia' }
        ],
        6: [
            { value: 31, text: 'Alabama' },
            { value: 32, text: 'Kentucky' },
            { value: 33, text: 'Mississippi' },
            { value: 34, text: 'Tennessee' }
        ],
        7: [
            { value: 35, text: 'Arkansas' },
            { value: 36, text: 'Louisiana' },
            { value: 37, text: 'Oklahoma' },
            { value: 38, text: 'Texas' }
        ],
        8: [
            { value: 39, text: 'Arizona' },
            { value: 40, text: 'Colorado' },
            { value: 41, text: 'Idaho' },
            { value: 42, text: 'Montana' },
            { value: 43, text: 'Nevada' },
            { value: 44, text: 'New Mexico' },
            { value: 45, text: 'Utah' },
            { value: 46, text: 'Wyoming' }
        ],
        9: [
            { value: 47, text: 'Alaska' },
            { value: 48, text: 'California' },
            { value: 49, text: 'Hawaii' },
            { value: 50, text: 'Oregon' },
            { value: 51, text: 'Washington' }
        ]
    };

function getData(region, division) {
    var arr;

    if (division) {
        arr = subdivisions[division];
    } else if (region) {
        arr = divisions[region];
    } else {
        arr = regions;
    }

    return arr;
}

reg = mobiscroll.select('#demo-data-reg', {
    touchUi: false,
    placeholder: 'Please select...',
    data: getData(),
    onSet: function (ev, inst) {
        div.settings.invalid.length = 0
        div.setVal('', true);
        div.refresh(getData(inst.getVal()));
        div.enable();

        sub.settings.invalid.length = 0;
        sub.setVal('', true);
        sub.refresh([emptyValue]);
        sub.disable();
    }
});

div = mobiscroll.select('#demo-data-div', {
    touchUi: false,
    disabled: true,
    placeholder: 'Please select...',
    data: [emptyValue],
    onSet: function (ev, inst) {
        sub.settings.invalid.length = 0;
        sub.setVal('', true);
        sub.refresh(getData(null, inst.getVal()));
        sub.enable();
    }
});

sub = mobiscroll.select('#demo-data-sub', {
    touchUi: false,
    disabled: true,
    placeholder: 'Please select...',
    data: [emptyValue]
});

remoteReg = mobiscroll.select('#demo-remote-reg', {
    touchUi: false,
    placeholder: 'Please select...',
    data: {
        url: 'https://trial.mobiscroll.com/regions/',
        dataType: 'jsonp'
    },
    onSet: function (ev, inst) {
        remoteDiv.settings.invalid.length = 0
        remoteDiv.settings.data.url = 'https://trial.mobiscroll.com/divisions/?reg=' + (inst.getVal());
        remoteDiv.setVal('', true);
        remoteDiv.refresh();
        remoteDiv.enable();

        remoteSub.settings.invalid.length = 0;
        remoteSub.setVal('', true);
        remoteSub.disable();
    }
});

remoteDiv = mobiscroll.select('#demo-remote-div', {
    touchUi: false,
    disabled: true,
    placeholder: 'Please select...',
    data: {
        url: 'https://trial.mobiscroll.com/divisions/',
        dataType: 'jsonp'
    },
    onSet: function (ev, inst) {
        remoteSub.settings.invalid.length = 0;
        remoteSub.settings.data.url = 'https://trial.mobiscroll.com/subdivisions/?div=' + (inst.getVal());
        remoteSub.setVal('', true);
        remoteSub.refresh();
        remoteSub.enable();
    }
});

remoteSub = mobiscroll.select('#demo-remote-sub', {
    touchUi: false,
    disabled: true,
    placeholder: 'Please select...',
    data: {
        url: 'https://trial.mobiscroll.com/subdivisions/',
        dataType: 'jsonp'
    }
});