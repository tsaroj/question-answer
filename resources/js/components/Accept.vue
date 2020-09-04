<tamplate>
  <div>
    <a v-if= "canAccept" title="Mark this answer as best answer"
    :class="classes">
        <i class="fas fa-check fa-2x"></i>
    </a>
    <a v-if="isBest" title="The answer creator accept this answer as best answer"
    :class="classes">
        <i class="fas fa-check fa-2x"></i>
    </a>
  </div>
</tamplate>
<script>
  export default{
    props:['answer'],


    data(){
      return{
        isBest:this.answer.is_best
      }
    },
    computed:{
      canAccept(){
        return true;
      },
       accepted(){
         return !this.canAccept && this.answer.is_best;
       }
    },

    classes(){
      return [
        'mt-2',
          this.accepted() ? 'vote-accepted' : ''
    ]
  },
  mounted() {
      console.log('Component mounted.')
  }
  }
</script>
