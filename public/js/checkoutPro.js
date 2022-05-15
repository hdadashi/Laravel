const mp = new MercadoPago('TEST-0b04ce13-11e7-4b50-a330-8d3484bb6405', {
    locale: 'pt-BR'
});

mp.checkout({
    preference: {
        id: document.getElementById("preferenceId").value
    },

    render: {
        container: '.pay-now',
        label: 'Pagar', 
    }
});
