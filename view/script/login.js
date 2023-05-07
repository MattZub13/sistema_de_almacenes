function LoginStateMachine() {
    // Estados posibles
    const states = {
        INIT: 'init',
        PROCESSING: 'processing',
        SUCCESS: 'success',
        ERROR: 'error'
    };

    let currentState = states.INIT; // Estado inicial

    function init() {
        $("#login").on("submit", function(e) {
            guardaryeditar(e);
        });
    }

    function guardaryeditar(e) {
        e.preventDefault();

        // Actualizar el estado a PROCESSING
        currentState = states.PROCESSING;

        $("#btnGuardar").prop("disabled", true);
        var formData = new FormData($("#login")[0]);

        $.ajax({
            url: "../ajax/empleado.php?op=5",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function(datos) {
                if (datos == 1) {
                    // Actualizar el estado a SUCCESS
                    currentState = states.SUCCESS;

                    $(location).attr("href", "dashboard.php");
                } else {
                    // Actualizar el estado a ERROR
                    currentState = states.ERROR;

                    Swal.fire({
                        type: 'error',
                        title: 'Error',
                        text: 'Usuario y/o Password incorrectos.',
                        footer: 'Cualquier información consulte con el administrador.'
                    });
                }
            }
        });

        limpiar();
    }

    function limpiar() {
        // Lógica de limpiar
    }

    // Getter para el estado actual
    function getCurrentState() {
        return currentState;
    }

    // Método para iniciar la máquina de estados
    function start() {
        init();
    }

    // Retornar los métodos y propiedades públicos
    return {
        start,
        getCurrentState
    };
}

// Crear una instancia de la máquina de estados de login
const loginStateMachine = LoginStateMachine();

// Iniciar la máquina de estados
loginStateMachine.start();
