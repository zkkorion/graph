document.addEventListener('DOMContentLoaded', ()=>
{
    let datasource = [
        {type:'tiket', "tiket's number":'0', "tiket's type" : 'buy', profit:10},
        {type:'tiket', "tiket's number":'1', "tiket's type" : 'buy', profit:15},
        {type:'tiket', "tiket's number":'2', "tiket's type" : 'buy', profit:27},
        {type:'tiket', "tiket's number":'3', "tiket's type" : 'balance', profit:-5}
    ];

	const chart = new Taucharts.Chart(
    {
        data: datasource,
        type: 'line',
        x: "tiket's number",
        y: 'profit',
        color: 'type',
        plugins: [/*Taucharts.api.plugins.get('legend')(), */Taucharts.api.plugins.get('tooltip')()]
    });
    chart.renderTo(document.querySelector('#graph'));
});