<template>
    <div class="flex">
            //Chat Panel
        </div>
</template>
<script>
import { EventBus } from '../../EventBus'
export default {
    data(){
        return{
        selected:null
        }
    },
    mounted(){
        EventBus.$on('chatroom-selected', (e) => {

        });
        
    }
    
}
</script>