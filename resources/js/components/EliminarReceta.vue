<template>
    <input 
        type="submit" 
        class="btn d-block m-1 btn-danger w-100" 
        value="Eliminar"
        v-on:click="eliminarReceta"
    >
</template>

<script>
export default {
    props:['recetaId'],
    // mounted() {
    //     console.log('receta actual', this.recetaId)   
    // }

    methods: { 
        eliminarReceta(){
            this.$swal({
                title: '¿Estas seguro?',
                text: "Esta acción no se puede revertir",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrar!',
                cancelButtonText: 'No'
            }).then((result) => {
            if (result.isConfirmed) {

                //enviar al modelo

                const params = {
                    id: this.recetaId
                }

                axios.post(`/recetas/${this.recetaId}`, {params,_method: 'delete'})
                    .then(respuesta => {
                        const elemento = this.$el.parentNode.parentNode;
                        elemento.parentNode.removeChild(elemento);
                        this.$swal(
                            'Eliminada!',
                            'Tu receta fue eliminada.',
                            'success'
                        )
                    })
                    .catch( error=> {
                        console.log(error)
                    })
            }
            })
        }
    }
}
</script>