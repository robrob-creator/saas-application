<template>
    <div class="flex">
        <div class="max-w-xs w-full min-h-screen bg-white">
           <chat-sidebar></chat-sidebar>
        </div>
        
        <div class="flex-1 bg-gray-100">
            <chat-panel></chat-panel>
        </div>
        
    </div>
</template>
<script>
    import ChatSidebar from "./ChatSidebar";
    import ChatPanel from "./ChatPanel";

export default {
    components:{
        ChatSidebar,
        ChatPanel       
    },
    data(){
        return{

        }
    },
    mounted(){

    }
    
}
</script>