window.addEventListener('DOMContentLoaded', (event) => {
    fetch('registro.php')
        .then(response => response.json())
        .then(data => {
            const registros = document.getElementById('registros');
            data.forEach(registro => {
                const row = registros.insertRow();
                row.insertCell(0).textContent = registro.id;
                row.insertCell(1).textContent = registro.nombre;
                row.insertCell(2).textContent = registro.email;
                row.insertCell(0).textContent = registro.id;
                row.insertCell(1).textContent = registro.nombre;
                row.insertCell(2).textContent = registro.email;
            });
        });
});
