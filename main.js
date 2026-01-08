document.getElementById('formFiltro').addEventListener('submit', function(e) {
    e.preventDefault();

    const btn = document.getElementById('btnGerar');
    const status = document.getElementById('statusMessage');
    const statusText = document.getElementById('statusText');

    // Feedback Visual (Ano 2019 Style)
    btn.disabled = true;
    btn.innerText = "Processando...";
    status.classList.remove('d-none');
    statusText.innerText = "Conectando ao Banco Oracle e processando procedimentos PL/SQL...";

    // Simulação de chamada AJAX para o PHP
    setTimeout(() => {
        alert("Sucesso!\nOs dados de RH e Frota foram cruzados.\nO download do Excel começará em instantes.");
        btn.disabled = false;
        btn.innerText = "Gerar Planilha (.xlsx)";
        status.classList.add('d-none');
    }, 2000);
});
