const pusher = new Pusher(window.PUSHER_APP_KEY, {
    cluster: window.PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: window.PUSHER_APP_KEY,
    cluster: window.PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Echo.channel('relatorios')
    .listen('.relatorio.pronto', (event) => {
        console.log('Evento recebido:', event);
        Swal.fire({
            title: 'Relatório Pronto!',
            text: `O relatório ${event.relatorio.nome} está pronto para download. Deseja ser redirecionado para a tela de relatórios?`,
            icon: 'success',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-thumbs-up"></i> Sim, redirecionar.',
            cancelButtonText: '<i class="fas fa-thumbs-down"></i> Não, continuar aqui.',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#999999',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/dashboard';
            }
        });
    });
