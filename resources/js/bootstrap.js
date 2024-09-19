import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import 'bootstrap';

import 'admin-lte';

import DataTable from 'datatables.net-dt';
window.DataTable = DataTable;

import Swal from 'sweetalert2';
window.Swal = Swal;