<template>
    <div class="text-center">
        <span class="like-btn" @click="GuardarMeGusta" :class="{ 'like-active': isActive}"></span>
        <p>A <span class="text-primary">{{cantidadLikes}}</span> personas les gusta esta receta</p>
    </div>
</template>
<script>
export default {
    props:['recetaId','like','likes'],
    data() {
        return {
            totalLikes: this.likes,
            isActive: this.like
        }
    },
    methods:{
        GuardarMeGusta(){            
            axios.post('/likes/' + this.recetaId)
                .then(respuesta => {
                    this.isActive = !this.isActive;
                    if(respuesta.data.attached.length){
                        this.totalLikes++;
                    }else{
                        this.totalLikes--;
                    }
                })
                .catch(error => {
                    if(error.response.status === 401){
                        window.location = '/register';
                    }
                });
            // $(this.$el.firstChild).toggleClass('like-active');
        }
    },
    computed:{
        cantidadLikes: function(){
            return this.totalLikes;
        }
    }
}
</script>