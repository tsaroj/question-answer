<template>
      <div class="d-fex flex-column vote-controls">
          <a @click.prevent="voteUp" :title = "title('up')" class="vote-up" :class="classes">
              <i class="fas fa-caret-up fa-3x"></i>
          </a>
          <span class="votes-count">{{ count }}</span>
          <a @click.prevent="voteDown" :title = "title('down')"  class="vote-down" :class="classes">
              <i class="fas fa-caret-down fa-3x"></i>
          </a>

          <favorite-question v-if="name ==='question'" :question="model"></favorite-question>

         <accept-best v-else :answer= "model"></accept-best>

      </div>
</template>

<script>
  import  FavoriteQuestion from './Favorite.vue';
  import  AcceptBest from './AcceptBest.vue';

    export default {

      props:['name','model'],

      components:{ FavoriteQuestion, AcceptBest },

      computed:{
        
        classes(){
          return this.signedIn ? '' : 'off'

        },

        endpoint(){
          return `/${this.name}s/${this.id}/vote`;
        }
      },

      data() {
        return{
          count: this.model.votes_count || 0 ,
          id:this.model.id,
        }
      },

      methods:{
        title(voteType){
          let titles = {
            up:`This ${this.name} is useful.`,
            down:`This ${this.name} is not useful.`
          };

          return titles[voteType];
        },

        voteUp(){
          this._vote(1);
        },
        voteDown(){
          this._vote(-1);
        },
        _vote(vote){
          if(! this.signedIn){
            this.$toast.warning(`Please login to vote the ${this.name}`,"Warning",{
              timeout:3000,
              position:'bottomLeft'
            });;
            return ; 
          }
          axios.post(this.endpoint, { vote })
          .then(res => {
            this.$toast.success(res.data.message, "Success",{
              timeout:3000,
              position:'bottomLeft'
            });
            this.count = res.data.votesCount;
          })
        }
      },
    }
</script>
