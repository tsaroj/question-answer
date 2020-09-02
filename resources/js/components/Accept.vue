<template>
    <div>
        <a v-if= "canAccept" title="Mark this answer as the best answer" :class="classes" @click.prevent="create" >
            <i class="fas fa-check fa-2x"></i>
        </a>

        <a v-if="accepted" title="The question owner accepted this answer as the best answer" :class="classes">
            <i class="fas fa-check fa-2x"></i>
        </a>

    </div>
</template>


<script>
export default {
    props:['answer'],

    data(){
        return{
            isBest: this.answer.is_best,
            id:this.answer.id
        }
    },
    methods:{
        create(){
            axios.post(`/answer/${this.id}/accept`)
            .then(res=>{
                this.$toast.success(res.data.message,"success",{
                    timeout:3000,
                    position:'buttomLeft'
                });
                this.isBest = true;
            })
        }
    },
    computed:{
        canAccept(){
            return true;
        },
        accepted(){
            return !this.canAccept && this.isBest;
        },
        classes(){
            return[
                'mt-2',
                this.isBest ? 'vote-accepted' : ''
            ];
        }
    },
     mounted() {
            console.log('Component mounted.')
        }
}
</script>