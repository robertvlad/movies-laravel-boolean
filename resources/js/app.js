import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


const deleteButton = document.querySelectorAll('.confirm-delete-movie[type="submit"]');

deleteButton.forEach((button) =>{
    button.addEventListener('click', function(event){
        event.preventDefault();

        const movieTitle = button.getAttribute('data-title');

        const modal = document.getElementById('delete-movie');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalTitle = modal.querySelector('#modal-title');
        modalTitle.textContent = movieTitle;

        const deleteButton = modal.querySelector('#confirm-delete');
        deleteButton.addEventListener('click', () =>{
                button.parentElement.submit();
        });

    });
});