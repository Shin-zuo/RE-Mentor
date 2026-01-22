import './bootstrap';
import '../css/app.css';

// Importing Alpine.js for reactive components
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Import SweetAlert2 HERE (Not in CSS)
import Swal from 'sweetalert2';
window.Swal = Swal;
