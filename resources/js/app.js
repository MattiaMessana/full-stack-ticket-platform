import './bootstrap';
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import '@fortawesome/fontawesome-free/js/all.min.js';
import.meta.glob(["../img/**"]);
import Swal from 'sweetalert2';


//logica per sweet Alert
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Evita che il form venga inviato immediatamente

            const form = this.closest('.delete-form'); // Trova il form che contiene il pulsante di eliminazione
            
            Swal.fire({
                title: 'Sei sicuro?',
                text: "Non potrai più recuperare questo ticket!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sì, elimina!',
                cancelButtonText: 'Annulla'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Invia il form solo se l'utente conferma
                }
            });
        });
    });
});
