
window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const apiproduct = new Vue({
    el: '#apiproduct',
    methods: {
      eliminarimagen(imagen) { 
            Swal.fire({
            title: '¿Estas seguro de eliminar la imagen '+ imagen.id+ '?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, Eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.value) {
                    let url = '/api/eliminarimagen/'+imagen.id;
                    axios.delete(url).then(response => {
                        console.log(response.data);
                    });
                    var elemento = document.getElementById('idimagen-'+imagen.id);
                    elemento.parentNode.removeChild(elemento);
                    Swal.fire(
                    '¡Eliminado!',
                    'Su archivo ha sido eliminado.',
                    'success'
                    )
                }
            })
        }
    }
});
