document.addEventListener('DOMContentLoaded', function() {
    let selectedAspirante = null;

    function resetAspirantes() {
        const aspirantes = document.querySelectorAll('.aspirante-item');
        aspirantes.forEach(aspirante => {
            aspirante.classList.remove('selected');
            aspirante.style.border = '1px solid #ddd';
        });
    }

    const aspirantes = document.querySelectorAll('.aspirante-item');
    aspirantes.forEach(aspirante => {
        aspirante.addEventListener('click', function() {
            resetAspirantes();
            aspirante.classList.add('selected');
            aspirante.style.border = '3px solid #333';
            selectedAspirante = aspirante;
        });
    });

    function showMessage(message) {
        const modal = document.createElement('div');
        modal.style.position = 'fixed';
        modal.style.top = '50%';
        modal.style.left = '50%';
        modal.style.transform = 'translate(-50%, -50%)';
        modal.style.background = '#fff';
        modal.style.padding = '20px';
        modal.style.border = '1px solid #ddd';
        modal.style.zIndex = '1000';
        modal.innerText = message;
        document.body.appendChild(modal);

        setTimeout(function() {
            document.body.removeChild(modal);
        }, 2000);
    }

    const confirmBtn = document.getElementById('confirmar');
    confirmBtn.addEventListener('click', function() {
        if (selectedAspirante) {
            let aspiranteName = selectedAspirante.querySelector(".aspirante-name");
            if (aspiranteName) {
                let nombre = aspiranteName.innerText;
                showMessage('Has seleccionado a ' + nombre + '. Se ha realizado su voto.');
                
                // Enviar el voto al servidor
                fetch('registrar_voto.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'aspirante=' + encodeURIComponent(nombre)
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);  // Log server response for debugging purposes
                });
                
                setTimeout(function() {
                    window.location.href = "Cedula.php"; // Redirigir a otro HTML después de 5 segundos
                }, 2000);
            }
        } else {
            showMessage('Por favor, selecciona un aspirante.');
        }
    });

    const cancelBtn = document.getElementById('cancelar');
    cancelBtn.addEventListener('click', function() {
        resetAspirantes();
        selectedAspirante = null;
    });
});
