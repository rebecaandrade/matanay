$(function() {

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: 'Album 1',
            a: 95,
            b: 90,
            c: 58
        }, {
            y: 'Album 2',
            a: 75,
            b: 65
        }, {
            y: 'Album 3',
            a: 30,
            b: 15
        }, {
            y: 'Album 4',
            a: 75,
            b: 65,
            c: 34
        }, {
            y: 'Album 5',
            a: 50,
            b: 40
        }, {
            y: 'Album 6',
            a: 75,
            b: 65
        }, {
            y: 'Album 7',
            a: 40,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b', 'c'],
        labels: ['Artista A', 'Produtor B', 'Autor C'],
        hideHover: 'auto',
        resize: true
    });

});
